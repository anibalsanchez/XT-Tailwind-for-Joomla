# XT Tailwind for Joomla - The template

For future reference:

- [Tailwind CSS has arrived at the Joomla scene](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/47-tailwind-css-has-arrived-at-the-joomla-scene.html)
- [anibalsanchez/XT-TailwindCSS-Starter](https://github.com/anibalsanchez/XT-TailwindCSS-Starter)
- [FAQ - XT Tailwind for Joomla](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/55-faq-xt-tailwind-for-joomla.html). Questions and Answers about Tailwind on Joomla.

**Prerequisites**: Before you use this template, you must install [Node.js](https://nodejs.org/).

The project has two repositories:

- **The Joomla extension build files**, in this repository: [anibalsanchez/XT-Tailwind-for-Joomla](https://github.com/anibalsanchez/XT-Tailwind-for-Joomla).
- **The Tailwind template itself**, in this repository: [anibalsanchez/xt-tailwind-for-joomla-template](https://github.com/anibalsanchez/xt-tailwind-for-joomla-template). The dependency is managed with the composer plugin [mnsami/composer-custom-directory-installer](https://github.com/mnsami/composer-custom-directory-installer) to download the template files in the `template` folder.

To build the extension to package everything to have it ready for installation, please go to [anibalsanchez/xt-tailwind-css](https://github.com/anibalsanchez/XT-Tailwind-for-Joomla).

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
# Using npm
npm install
```

After the dependencies installation step, start the Webpack Development Server:

```bash
npm i
npm run dev
```

The page is rendered here `http://localhost:8080/`.

Webpack Development Server will watch `/src/styles.css` and `/tailwind.config.js` and rebuild your stylesheet on every change. You can play around with `/src/index.html` (or the rest of the pages) to design the template.

### Proxy Server Mode for Joomla

Beyond the basic development alternatives, now I'm adding the choice to develop the template in **Proxy Server Mode**. In the proxy mode, the Tailwind CSS template can be installed on the Joomla site and reloaded automatically from Joomla and tested dynamically.

So, first, create the template as an installable extension:

```bash
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

## Acknowledgements

- [Tailwind CSS](https://tailwindcss.com) - The Utility-First CSS Framework. A project by Adam Wathan (@adamwathan), Jonathan Reinink (@reinink), David Hemphill (@davidhemphill) and Steve Schoger (@steveschoger).
- [Webpack](https://webpack.js.org/)
- [PostCSS](https://postcss.org/)
- [cssnano](https://cssnano.co/)

## Copyright & License

- Copyright (c)2012-2024 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE
- This project is dedicated to [Andrea Gentil](http://www.twitter.com/andreagentil) ;-D
