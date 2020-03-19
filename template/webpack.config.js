/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2012-2020 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const prototypePages = [
  'index',
  'blog-post'
];

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const WebpackOnBuildPlugin = require('webpack-copy-on-build-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const path = require('path');
const packageConfig = require('./package.json');

const devMode = process.env.NODE_ENV === 'development';
const productionMode = !devMode;
const proxyMode = process.env.npm_lifecycle_event === 'dev-proxy' &&
  packageConfig.config &&
  packageConfig.config.proxyURL;

const cssOutputfilename = devMode ? '[name].css' : '[name].css'; // [hash].
const cssOutputchunkFilename = devMode ? '[id].css' : '[id].css'; // [hash].

const plugins = [
  new MiniCssExtractPlugin({
    filename: cssOutputfilename,
    chunkFilename: cssOutputchunkFilename,
  }),
];

if (devMode && !proxyMode) {
  plugins.push(
    ...prototypePages.map(
      page => new HtmlWebpackPlugin({
        filename: page + '.html',
        template: 'src/' + page + '.html',
      }))
  );
}

if (proxyMode) {
  // Watch php files
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

if (proxyMode || productionMode) {
  // Copy files
  plugins.push(
    new WebpackOnBuildPlugin([{
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
    rules: [{
      test: /\.css$/,
      use: [{
          loader: MiniCssExtractPlugin.loader,
          options: {
            hmr: devMode,
          },
        },
        'css-loader',
        'postcss-loader',
      ],
    }, ],
  },
  plugins,
};
