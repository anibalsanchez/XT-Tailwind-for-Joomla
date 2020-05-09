/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2012-2020 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

 // Declaration of PostCss plugins
 const postcssImport = require('postcss-import');
 const tailwindCss = require('tailwindcss');
 const postcssNested = require('postcss-nested');
 const autoprefixer = require('autoprefixer');

 const productionMode = process.env.NODE_ENV === 'production';

 // Configure PostCss
 const purgecss = require('@fullhuman/postcss-purgecss')({
   // Specify the paths to all of the template files in your project
   content: [
     './src/**/*.html',
     './src/**/*.vue',
     './src/**/*.jsx',
     // etc.
   ],

   // Include any special characters you're using in this regular expression
   //   Ref: https://tailwindcss.com/course/optimizing-for-production
   defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || []
 });

 // More minification of CSS
 const cssnano = require('cssnano')({
   preset: 'advanced',
 });

 // Declare export for PostCss processing
 module.exports = {
   plugins: [
     postcssImport,
     tailwindCss,
     postcssNested,
     autoprefixer,

     // Only purge and minify in production
     ...(productionMode ? [purgecss, cssnano] : []),
   ],
 };
