# XT Tailwind for Joomla

For future reference:

- [Tailwind CSS has arrived at the Joomla scene](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/47-tailwind-css-has-arrived-at-the-joomla-scene.html)
- [anibalsanchez/XT-TailwindCSS-Starter](https://github.com/anibalsanchez/XT-TailwindCSS-Starter)
- [FAQ - XT Tailwind for Joomla](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/55-faq-xt-tailwind-for-joomla.html). Questions and Answers about Tailwind on Joomla.

**Prerequisites**: Before you use this template, you must install [Node.js](https://nodejs.org/).

The project has two levels:

- The Joomla extension build files at the `root` folder
- The Tailwind template in the `template` folder

## The Joomla extension build files

To build the extension to create the installer package:

For more information about the build scripts, please, visit [anibalsanchez/extly-buildfiles-for-joomla](https://github.com/anibalsanchez/extly-buildfiles-for-joomla).

```bash
# Using npm
npm install
npm run build
```

As an alternative, there is a script with everything that must be done for each build:

```bash
./build/build_core.sh
```

These steps create the installable package in the `build/release` directory.

The original XT build files, used to manage the extension development, can be found here [anibalsanchez/extly-buildfiles-for-joomla](https://github.com/anibalsanchez/extly-buildfiles-for-joomla).

## The Tailwind template

Tailwind CSS framework is used in the development context of [Node.js](https://nodejs.org/en/). So, Node.js must be installed to continue.

The Tailwind template can be executed in the following modes:

- Development Mode
- Proxy Server Mode for Joomla
- Development Build
- Production Build

### Development Mode

From the source (src/) directory, the live server is executed to design the template interactively. The objective of this mode is to create as many HTML files as necessary to develop the prototypes. In our case:

- Blog Home Page, index.html
- Blog Post, blog-post.html

The HTML pages must be declared in `webpack.config.js`.

To get started, clone the project and install the dependencies:

```bash
# Access to the repo folder where the template is developed
cd template
# Using npm
npm install
```

After the dependencies installation step, start the Webpack Development Server:

```bash
cd template
npm i
npm run dev
```

The page is rendered here `http://localhost:8080/`.

Webpack Development Server will watch `/src/styles.css` and `/tailwind.config.js` and rebuild your stylesheet on every change. You can play around with `/src/index.html` (or the rest of the pages) to design the template.

### Proxy Server Mode for Joomla

Beyond the basic development alternatives, now I'm adding the choice to develop the template in **Proxy Server Mode**. In the proxy mode, the Tailwind CSS template can be installed on the Joomla site and reloaded automatically from Joomla and tested dynamically.

So, first, create the template as an installable extension:

```bash
cd template
npm i
npm run prod
```

Then, zip all files (exclude the node_modules folder), install it on the Joomla site, and adjust the proxy `proxyURL` in the installed `templates/xttailwind/package.json`:

```bash
  "config": {
    "proxyURL": "http://jed.lndo.site/index.php"
  }
```

On our development server, the site runs on `http://jed.lndo.site/index.php`. Finally, execute the command to activate the Webpack development proxy. After the proxy is active, the generated site is rendered on `http://localhost:3000/index.php` so you can change the source style interactively in `templates/xttailwind/src` and navigate the final output simultaneously.

```bash
# Access to the site folder where the template is developed in Proxy Mode
cd templates/xttailwind
npm i
npm run dev-proxy
```

When you are done, remember to copy the changes back from the site to the repository and commit to making them permanent. Of course, if the repository is mapped to the site, you can commit the changes.

### Development Build

This is almost the final step. It compiles all files, but it does not compress and optimize the styles. It is useful to test the template on different sites.

```bash
npm i
npm run dev-build
```

After that, you will have a ready to deploy bundle at `/dist`. Then, zip all files (exclude the node_modules folder), and install it on a Joomla site.

### Production Build

This is the final step to produce the compressed and optimized template. To build a production bundle run:

```bash
npm i
npm run prod
```

After that, you will have a ready to deploy bundle at `/dist`. Then, zip all files (exclude the node_modules folder) and install it on a Joomla site.

To build everything and produce the installable template:

```bash
./build/build_core.sh
```

## Changelog

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

- Copyright (c)2012-2020 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE
- This project is dedicated to [Andrea Gentil](http://www.twitter.com/andreagentil) ;-D
