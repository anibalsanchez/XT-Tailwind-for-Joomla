/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2019-2021 Extly, CB All rights reserved.
 * @license    MIT; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const cssnano = require('cssnano');

const isProductionMode = process.env.NODE_ENV === 'production';

module.exports = {
  plugins: [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
    require('autoprefixer'),

    // Only minify for production
    ...(isProductionMode
      ? [
        cssnano({
          preset: 'advanced',
        }),
      ]
      : []),
  ],
};