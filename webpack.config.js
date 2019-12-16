/**
 * webpack.config.js
 *
 * @license   License GNU General Public License version 2 or later; see LICENSE.txt
 * @author    Andrea Gentil - Anibal Sanchez <team@extly.com>
 * @copyright (c)2007-2018 Extly, CB. All rights reserved.
 *
 */

// Array of Generation plugins
let buildPlugins = [];

// Extension directories to be visited
const packageTypeDir = 'package';
const extensionTypesDirs = [
  'component',
  'modules',
  'plugins',
  'file',
  'template',
  'library',
  'platform',
];

// Required plugins
const path = require('path');
const ZipFilesPlugin = require('webpack-zip-files-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const readDirRecursive = require('fs-readdir-recursive');
const fs = require('fs');
const fsExtra = require('fs-extra');
const Dotenv = require('dotenv-webpack');
const moment = require('moment');

let definitions;
const releaseDate = moment().format('YYYY-MM-DD');
const year = moment().format('YYYY');
const releaseDir = 'build/release';
const releaseDirAbs = path.resolve(__dirname, releaseDir);
const templatesDir = 'build/templates';
const translationsDir = 'build/translations';
const packageDirAbs = path.resolve(__dirname, packageTypeDir);

function loadEnvironmentDefinitions() {
  const defs = {};

  const env = new Dotenv();
  Object.keys(env.definitions).forEach((definition) => {
    const key = definition.replace('process.env.', '');
    let value = env.definitions[definition];

    value = value.replace(/^"(.+(?="$))"$/, '$1');
    value = value.replace(/%CR%/g, '\n');
    value = value.replace(/%TAB%/g, '\t');

    defs[key] = value;
  });

  return defs;
}

function removeReleaseDirectory() {
  fsExtra.removeSync(releaseDirAbs);
  fs.mkdirSync(releaseDirAbs);
}

const tagTransformation = (content) => content
  .toString()
  .replace(/\[MANIFEST_COPYRIGHT\]/g, definitions.MANIFEST_COPYRIGHT)
  .replace(/; \[TRANSLATION_COPYRIGHT\]/g, definitions.TRANSLATION_COPYRIGHT)
  .replace('// [PHP_COPYRIGHT]', definitions.PHP_COPYRIGHT)
  .replace('/* [CSS_COPYRIGHT] */', definitions.CSS_COPYRIGHT)
  .replace('// [JS_COPYRIGHT]', definitions.JS_COPYRIGHT)
  .replace(/\[COPYRIGHT\]/g, definitions.COPYRIGHT)
  .replace(/\[AUTHOR_EMAIL\]/g, definitions.AUTHOR_EMAIL)
  .replace(/\[AUTHOR_URL\]/g, definitions.AUTHOR_URL)
  .replace(/\[AUTHOR\]/g, definitions.AUTHOR)
  .replace(/\[EXTENSION_CDN\]/g, definitions.EXTENSION_CDN)
  .replace(/\[EXTENSION_CLASS_NAME\]/g, definitions.EXTENSION_CLASS_NAME)
  .replace(/\[EXTENSION_ALIAS\]/g, definitions.EXTENSION_ALIAS)
  .replace(/\[EXTENSION_DESC\]/g, definitions.EXTENSION_DESC)
  .replace(/\[EXTENSION_NAME\]/g, definitions.EXTENSION_NAME)
  .replace(/\[LICENSE_CODE\]/g, definitions.LICENSE_CODE)
  .replace(/\[LICENSE\]/g, definitions.LICENSE)
  .replace(/\[RELEASE_VERSION\]/g, definitions.RELEASE_VERSION)
  .replace(/\[TRANSLATION_KEY\]/g, definitions.TRANSLATION_KEY)
  .replace(/\[DATE\]/g, releaseDate)
  .replace(/\[YEAR\]/g, year);

function renderTemplates() {
  const renderTpls = [];
  const tplDirectories = [templatesDir, translationsDir];
  const allExtensionTypes = extensionTypesDirs.concat([packageTypeDir]);

  tplDirectories.forEach((tplDirectory) => {
    allExtensionTypes.forEach((extensionType) => {
      const extTplDir = path.resolve(
        __dirname,
        `${tplDirectory}/${extensionType}`,
      );
      const templates = readDirRecursive(
        path.resolve(__dirname, `${tplDirectory}/${extensionType}`),
      );

      templates.forEach((file) => {
        const dest = path.resolve(__dirname, `${extensionType}/${file}`);
        const item = {
          context: extTplDir,
          from: file,
          to: dest,
          transform: tagTransformation,
        };

        renderTpls.push(item);
      });
    });
  });

  return new CopyWebpackPlugin(renderTpls);
}

function isPackageType() {
  let packageMode = false;

  try {
    packageMode = fs.lstatSync(packageDirAbs).isDirectory();
  } catch (e) {
    console.log('Package definition not detected.');
  }

  return packageMode;
}

function generatePackage() {
  const pkgEntries = [];

  // Include all files from the package directory
  const pkgFiles = readDirRecursive(packageDirAbs);

  pkgFiles.forEach((file) => {
    const packageFile = path.resolve(packageDirAbs, file);

    const item = {
      src: packageFile,
    };

    pkgEntries.push(item);
  });

  // Add all extension types directories into the package
  extensionTypesDirs.forEach((extensionTypeDir) => {
    const extTemplates = readDirRecursive(
      path.resolve(__dirname, `${templatesDir}/${extensionTypeDir}`),
    );

    extTemplates.forEach((extTemplate) => {
      const srcFile = path.resolve(
        __dirname,
        `${extensionTypeDir}/${extTemplate}`,
      );
      const srcDir = path.dirname(srcFile);

      const item = {
        src: srcDir,
        dist: path.basename(srcDir),
      };

      pkgEntries.push(item);
    });
  });

  // Complete the definition of the zip file
  const outputFile = path.resolve(
    __dirname,
    `${releaseDir}/pkg_${definitions.EXTENSION_ALIAS}_v${definitions.RELEASE_VERSION}`,
  );

  const zipFile = {
    entries: pkgEntries,
    output: outputFile,
    format: 'zip',
  };

  return new ZipFilesPlugin(zipFile);
}

function generateZips() {
  const zipDirectories = [templatesDir];
  const zipPlugins = [];

  zipDirectories.forEach((tplDirectory) => {
    extensionTypesDirs.forEach((extensionType) => {
      const extZipDir = path.resolve(
        __dirname,
        `${tplDirectory}/${extensionType}`,
      );
      const templates = readDirRecursive(
        path.resolve(__dirname, `${tplDirectory}/${extensionType}`),
      );

      templates.forEach((tplFile) => {
        const srcFile = path.resolve(__dirname, `${extensionType}/${tplFile}`);
        const srcDir = path.dirname(srcFile);
        const extname = path.extname(srcFile);

        if (extname !== '.xml') return;

        const manifestTplFile = `${extZipDir}/${tplFile}`;
        const extensionTplDir = path.dirname(manifestTplFile);
        const parts = extensionTplDir.split('/');
        const extElement = parts.pop();

        let renamedExtElement = extElement;

        if (renamedExtElement === 'component') {
          renamedExtElement = definitions.EXTENSION_ALIAS;
        } else if (renamedExtElement === 'file') {
          renamedExtElement = 'cli';
        }

        const outputFile = path.resolve(
          __dirname,
          `${releaseDir}/${renamedExtElement}_v${definitions.RELEASE_VERSION}`,
        );

        const zipFile = {
          entries: [
            {
              src: srcDir,
              dist: extElement,
            },
          ],
          output: outputFile,
          format: 'zip',
        };

        const itemZip = new ZipFilesPlugin(zipFile);
        zipPlugins.push(itemZip);
      });
    });
  });

  return zipPlugins;
}

// Let's build something

// Global constant definitions (.env)
definitions = loadEnvironmentDefinitions();

// Start clean
removeReleaseDirectory();

// Render the manifests and translations
buildPlugins.push(renderTemplates());

if (isPackageType()) {
  // Define the package generation
  buildPlugins.push(generatePackage());
} else {
  // Just define the zips with everything
  buildPlugins = buildPlugins.concat(generateZips());
}

// We are ready, Webpack generate!
module.exports = {
  entry: './.gitkeep',
  output: {
    filename: '.gitkeep',
    path: path.resolve(__dirname, releaseDir),
  },

  plugins: buildPlugins,
};
