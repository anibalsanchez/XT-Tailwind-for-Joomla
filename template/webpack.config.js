/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const path = require('path');
const glob = require('glob');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');
const FilemanagerWebpackPlugin = require('filemanager-webpack-plugin');

const PATHS = {
  src: path.join(__dirname, 'src'),
};

module.exports = {
  entry: './src/styles.css',
  mode: process.env.NODE_ENV,
  module: {
    rules: [{
      test: /\.css$/,
      use: ExtractTextPlugin.extract({
        fallback: 'style-loader',
        use: [{
            loader: 'css-loader',
            options: {
              importLoaders: 1
            }
          },
          'postcss-loader',
        ],
      }),
    }, ],
  },
  plugins: [
    new ExtractTextPlugin('styles.css', {
      disable: process.env.NODE_ENV === 'development',
    }),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'src/index.html',
    }),

    // Only at the final final pass
    new PurgecssPlugin({
      paths: glob.sync(`${PATHS.src}/*`),
      whitelistPatterns: [/^w-/, /^sm:flex-no-wrap$/, /^sm:w-/, /^sm:pr-4$/, /^sm:ml-8$/, /^lg:px-0$/]
    }),

    new FilemanagerWebpackPlugin({
      onEnd: [{
        copy: [{
            source: './dist/main.js',
            destination: './js/template.js',
          },
          {
            source: './dist/styles.css',
            destination: './css/template.css',
          },
        ]
      }]
    }),
  ],
};
