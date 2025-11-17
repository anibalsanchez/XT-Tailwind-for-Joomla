# XT Tailwind for Joomla

For future reference:

- [Tailwind CSS v3 for Joomla 4 is here!](https://blog.anibalhsanchez.com/en/blogging/81-tailwind-css-v3-for-joomla-4-is-here.html)
- [Tailwind CSS has arrived at the Joomla scene](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/47-tailwind-css-has-arrived-at-the-joomla-scene.html)
- [anibalsanchez/XT-TailwindCSS-Starter](https://github.com/anibalsanchez/XT-TailwindCSS-Starter)
- [FAQ - XT Tailwind for Joomla](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/55-faq-xt-tailwind-for-joomla.html). Questions and Answers about Tailwind on Joomla.

**Prerequisites**: Before you use this template, you must install [Node.js](https://nodejs.org/).

The project has two repositories:

- **The Joomla extension build files**, in this repository: [anibalsanchez/XT-Tailwind-for-Joomla](https://github.com/anibalsanchez/XT-Tailwind-for-Joomla)
- **The Tailwind template itself**, in this repository: [anibalsanchez/xt-tailwind-for-joomla-template](https://github.com/anibalsanchez/xt-tailwind-for-joomla-template). The dependency is managed with the composer plugin [mnsami/composer-custom-directory-installer](https://github.com/mnsami/composer-custom-directory-installer) to download the template files in the `template` folder.

To develop and design in the context of the template, please go to [anibalsanchez/xt-tailwind-for-joomla-template](https://github.com/anibalsanchez/xt-tailwind-for-joomla-template).

## The Joomla extension build files

To build the extension to create the installer package:

For more information about the build scripts, please, visit [anibalsanchez/extly-buildfiles-for-joomla](https://github.com/anibalsanchez/extly-buildfiles-for-joomla).

```bash
# Using npm
npm install
npm run build
```

There is a also a script with everything that must be done for each build to be sure that everything is updated to the latest version:

```bash
./build/build_core.sh
```

These steps create the installable package in the `build/release` directory.

The original XT build files, used to build the extension, can be found here [anibalsanchez/extly-buildfiles-for-joomla](https://github.com/anibalsanchez/extly-buildfiles-for-joomla).

## Changelog

### 7.0.0

- Upgrade to Tailwind CSS v3
- Usability improvements, optimizations and code styling

### 6.0.0

- Review for Joomla 4. Updates to the Pagination, Languages and Breadcrumbs modules
- Usability improvements, optimizations and code styling

### 5.0.0

- Update to Tailwind CSS v2.0.2
- Clean dependencies to have Tailwind CSS and WebPack
- Purge with Tailwind CSS
- Remove @fullhuman/postcss-purgecss
- Remove @tailwindcss/custom-forms
- Integrate @tailwindcss/aspect-ratio
- Integrate @tailwindcss/forms
- Integrate @tailwindcss/line-clamp
- Usability improvements, optimizations and code styling

### 4.0.0

- Reorganization of the project in two repositories
- Update @tailwindcss/custom-forms 0.2.1
- Update @tailwindcss/typography 0.2.0
- Update @tailwindcss/ui 0.5.0
- Update Tailwind CSS 1.6.2

### 3.7.0

- Update Tailwind 1.5.2
- Add Typography plugin

### 3.6.0

- Component, Error and Off-line pages

### 3.5.0

- Add XT Renderers library

### 3.4.0

- Update to Tailwind CSS v1.4
- Reorganization of the build scripts

### 3.3.5

- Update to Tailwind CSS v1.3.5

### 3.3.0

Update to Tailwind CSS v1.2.0, including Tailwind UI support.

- Tailwind CSS v1.2.0
- Support of [Tailwind UI](https://tailwindui.com/)
- Addition of PostCSS best practices, [postcss-import](https://www.npmjs.com/package/postcss-import) and [postcss-nested](https://www.npmjs.com/package/postcss-nested)
- Minimum tailwind.config.js
- Pagination Component implementation

### 3.2.0

- Support of Proxy Mode for Webpack / Tailwind CSS
- Webpack Proxy support

### 3.1.0

- Minor library updates
- Styling

### 3.0.0

- Implementation of the [HTML Asset Tags Builder](https://github.com/anibalsanchez/extly-html-asset-tags-builder)
  - InlineScriptTag
  - InlineStyleTag
  - LinkCriticalStylesheetTag
  - LinkPreloadStylesheetTag
  - LinkStylesheetTag
  - ScriptTag

### 2.1.0

- Update to Tailwind CSS v1.1.0

### 2.0.3

- Update to Tailwind CSS v1.0.3

### 2.0.0

- Update to Tailwind CSS v1.0.0-beta.1

### 1.0.0

- Initial version
- Tailwind CSS v0.7.4.

## Acknowledgements

- [Tailwind CSS](https://tailwindcss.com) - The Utility-First CSS Framework. A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink), David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).
- [Webpack](https://webpack.js.org/)
- [PostCSS](https://postcss.org/)
- [cssnano](https://cssnano.co/)
- [Purgecss](https://www.purgecss.com)

## Copyright & License

- Copyright (c)2012-2025 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE
- This project is dedicated to [Andrea Gentil](http://www.twitter.com/andreagentil) ;-D


'/library/vendor_prefixed
'/xttailwind/vendor_prefixed

