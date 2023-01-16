/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2012-2023 Extly, CB All rights reserved.
 * @license    MIT; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const aspectRatio = require('@tailwindcss/aspect-ratio');
const forms = require('@tailwindcss/forms');
const lineClamp = require('@tailwindcss/line-clamp');
const typography = require('@tailwindcss/typography');
// const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './dist/**/*.html',
    './src/**/*.{js,jsx,ts,tsx,vue}',
  ],

  theme: {
    extend: {
    },
  },
  plugins: [
    aspectRatio,
    forms,
    lineClamp,
    typography,
  ],
};
