/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2012-2023 Extly, CB All rights reserved.
 * @license    MIT; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

// Declaration of Webpack plugins
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

// Define the pages to be prototyped
const prototypePages = [
  'index',
  'index.es',
  '74-using-composer-in-joomla-and-other-content-management-systems',
  '80-desde-phpmad-2021-usando-composer-en-un-cms,-gracias-al-php-prefixing',
];

// Read the package configuration
const packageConfig = require('./package.json');

// Read the control flags
const devMode = process.env.NODE_ENV === 'development';
const productionMode = !devMode;

// The proxy mode is only used within a template package
const proxyMode = process.env.npm_lifecycle_event === 'dev-proxy'
  && packageConfig.config
  && packageConfig.config.proxyURL;

// Output filenames
const cssOutputfilename = devMode ? '[name].css' : '[name].css'; // [hash].
const cssOutputchunkFilename = devMode ? '[id].css' : '[id].css'; // [hash].

// Configure plugins for Webpack
const plugins = [
  new MiniCssExtractPlugin({
    filename: cssOutputfilename,
    chunkFilename: cssOutputchunkFilename,
  }),
];

// In Dev mode and not proxied,
//  declare the pages to be processed
if (devMode && !proxyMode) {
  plugins.push(
    ...prototypePages.map(
      (page) => new HtmlWebpackPlugin({
        filename: `${page}.html`,
        template: `src/pages/${page}.html`,
      }),
    ),
  );
}

// In proxy mode, keep php files updated
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

// In proxy mode or production mode,
//  copy the css and js files to the template
if (proxyMode || productionMode) {
  // Copy files
  plugins.push(
    new CopyPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, './dist/main.css'),
          to: path.resolve(__dirname, './css/template.css'),
        },
        {
          from: path.resolve(__dirname, './dist/main.js'),
          to: path.resolve(__dirname, './js/template.js'),
        },
      ]
    }),
  );

  // If there is an extra folder,
  //  copy also the css file to the extra destination
  if (packageConfig.config && packageConfig.config.extraCCProxyFolder) {
    plugins.push(
      new CopyPlugin({
        patterns: [
          {
            from: path.resolve(__dirname, './dist/main.css'),
            to: path.resolve(
              packageConfig.config.extraCCProxyFolder,
              './css/template.css',
            ),
          },
          {
            from: path.resolve(__dirname, './dist/main.js'),
            to: path.resolve(
              packageConfig.config.extraCCProxyFolder,
              './js/template.js',
            ),
          },
        ]
      }),
    );
  }
}

// Declare export for webpack processing
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
          },

          // Load css
          'css-loader',

          // Load PostCss, see postcss.config.js
          'postcss-loader',
        ],
      },
    ],
  },
  plugins,
};
