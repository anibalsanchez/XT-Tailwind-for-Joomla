/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

module.exports = {
  plugins: [
    require('tailwindcss')('./tailwind.config.js'),

    // Only at the final final pass
    require('cssnano')({
      preset: 'default',
    }),
  ],
};
