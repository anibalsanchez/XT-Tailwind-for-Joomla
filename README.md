# XT Tailwind for Joomla

For future reference:

- [Tailwind CSS has arrived at the Joomla scene](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/47-tailwind-css-has-arrived-at-the-joomla-scene.html)
- [anibalsanchez/XT-TailwindCSS-Starter](https://github.com/anibalsanchez/XT-TailwindCSS-Starter)
- [FAQ - XT Tailwind for Joomla](https://blog.anibalhsanchez.com/en/10-blogging/lost-and-found/55-faq-xt-tailwind-for-joomla.html). Questions and Answers about Tailwind on Joomla.

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

## The Tailwind template

To get started, clone the project and install the dependencies:

```bash
cd template

# Using npm
npm install
```

After that, start up Webpack Development Server:

```bash
npm run dev
```

The page is rendered here <http://localhost:8080/>.

Webpack Development Server will watch `/src/styles.css` and `/tailwind.js` and rebuild your stylesheet on every change. You can play around with `/src/index.html` to see the effects of your changes.

The sample page renders [my blog](https://blog.anibalhsanchez.com) layout redesigned with Tailwind ;-)

To build a production bundle run:

```bash
npm run prod
```

After that, you will have a ready to deploy bundle at `/dist`

## Proxy Server for Joomla Template Development

Beyond the basic development alternatives, now I'm adding the choice to develop the template in **Proxy mode** in the site context. In the proxy mode, the Tailwind CSS template can be installed on the Joomla site and reloaded automatically from Joomla and tested dynamically.

So, first, create the template as an installable extension:

```bash
npm run prod
```

Then, install it on the Joomla site and adjust the proxy `proxyURL` in the installed `templates/xttailwindcss/package.json`:

```bash
  "config": {
    "proxyURL": "http://blogdb.lndo.site/index.php"
  }
```

On our development server, the site runs on `http://blogdb.lndo.site/index.php`. Finally, execute the command to activate the Webpack development proxy. After the proxy is active, the generated site is rendered on `http://localhost:3000/index.php` so you can change the source style interactively in `templates/xttailwindcss/src` and navigate the final output simultaneously.

```bash
npm run dev-proxy
```

## Changelog

### 3.2.0

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

- Copyright (c)2007-2019 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE
- This project is dedicated to [Andrea Gentil](http://www.twitter.com/andreagentil) ;-D
