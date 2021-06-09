/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2012-2021 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const postcssImport = require('postcss-import');
const tailwindcss = require('tailwindcss');
const postcssNested = require('postcss-nested');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const isProductionMode = process.env.NODE_ENV === 'production';

// Declare export for PostCss processing
module.exports = {
  plugins: [
    postcssImport,
    tailwindcss,
    postcssNested,
    autoprefixer,

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
