/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const FilemanagerWebpackPlugin = require('filemanager-webpack-plugin');

const devMode = process.env.NODE_ENV !== 'production';

module.exports = {
  entry: './src/styles.css',
  mode: process.env.NODE_ENV,
  module: {
    rules: [{
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
    }, ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      // filename: devMode ? '[name].css' : '[name].[hash].css',
      // filename: devMode ? '[name].css' : '[name].[hash].css',
      filename: '[name].css',
      chunkFilename: '[id].css',
    }),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'src/index.html',
    }),
    new FilemanagerWebpackPlugin({
      onEnd: [{
        copy: [{
            source: './dist/main.js',
            destination: './js/template.js',
          },
          {
            source: './dist/main.css',
            destination: './css/template.css',
          },
        ]
      }]
    }),
  ],
};
