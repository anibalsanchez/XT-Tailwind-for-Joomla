/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const WebpackOnBuildPlugin = require('webpack-copy-on-build-plugin');
const path = require('path');
const packageConfig = require('./package.json');

const devMode = process.env.NODE_ENV !== 'production';
const proxyMode = devMode && packageConfig.config && packageConfig.config.proxyURL;

const cssOutputfilename = devMode ? '[name].css' : '[name].css'; // [hash].
const cssOutputchunkFilename = devMode ? '[id].css' : '[id].css'; // [hash].

const plugins = [
  new MiniCssExtractPlugin({
    filename: cssOutputfilename,
    chunkFilename: cssOutputchunkFilename,
  }),
];

if (proxyMode) {
  plugins.push(
    new BrowserSyncPlugin({
      proxy: {
        target: packageConfig.config.proxyURL,
      },
      files: ['**/*.php'],
      cors: true,
      reloadDelay: 0,
    }),
  );
}

if (proxyMode || !devMode) {
  plugins.push(
    new WebpackOnBuildPlugin([
      {
        from: path.resolve(__dirname, './dist/main.css'),
        to: path.resolve(__dirname, './css/template.css'),
      },
      {
        from: path.resolve(__dirname, './dist/main.js'),
        to: path.resolve(__dirname, './js/template.js'),
      },
    ]),
  );
}

module.exports = {
  entry: './src/styles.css',
  mode: process.env.NODE_ENV,
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              hmr: process.env.NODE_ENV === 'development',
            },
          },
          'css-loader',
          'postcss-loader',
        ],
      },
    ],
  },
  plugins,
};
