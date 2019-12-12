/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const tailwindcss = require('tailwindcss');

const autoprefixer = require('autoprefixer');

const purgecss = require('@fullhuman/postcss-purgecss')({
  content: [
    './src/**/*.html',
  ],

  defaultExtractor: (content) => content.match(/[A-Za-z0-9-_:\-/]+/g) || [],
});

const cssnano = require('cssnano')({
  preset: 'advanced',
});

module.exports = {
  plugins: [
    tailwindcss,
    autoprefixer,
    ...process.env.NODE_ENV === 'production' ? [purgecss, cssnano] : [],
  ],
};
