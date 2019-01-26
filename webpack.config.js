/**
 * webpack.config.js
 *
 * @license   License GNU General Public License version 2 or later; see LICENSE.txt
 * @author    Andrea Gentil - Anibal Sanchez <team@extly.com>
 * @copyright (c)2007-2018 Extly, CB. All rights reserved.
 *
 */

// Array of Generation plugins
var buildPlugins = [];

// Extension directories to be visited
var packageTypeDir = 'package';
var extensionTypesDirs = ['component', 'modules', 'plugins', 'file', 'template', 'library', 'platform'];

// Required plugins
const path = require('path');
const ZipFilesPlugin = require('webpack-zip-files-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const readDirRecursive = require('fs-readdir-recursive');
const fs = require('fs');
const fsExtra = require('fs-extra');
const Dotenv = require('dotenv-webpack');
const moment = require('moment');

var definitions;
var releaseDate = moment().format('YYYY-MM-DD');
var year = moment().format('YYYY');
var releaseDir = 'build/release';
var releaseDirAbs = path.resolve(__dirname, releaseDir);
var templatesDir = 'build/templates';
var translationsDir = 'build/translations';
var packageDirAbs = path.resolve(__dirname, packageTypeDir);

function loadEnvironmentDefinitions() {
  var defs = {};

  var env = new Dotenv();
  Object.keys(env.definitions).forEach((definition) => {
    var key = definition.replace('process.env.', '');
    var value = env.definitions[definition];

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

var tagTransformation = content => content
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
  var renderTpls = [];
  var tplDirectories = [templatesDir, translationsDir];
  var allExtensionTypes = extensionTypesDirs.concat([packageTypeDir]);

  tplDirectories.forEach((tplDirectory) => {
    allExtensionTypes.forEach((extensionType) => {
      var extTplDir = path.resolve(__dirname, `${tplDirectory}/${extensionType}`);
      var templates = readDirRecursive(path.resolve(__dirname, `${tplDirectory}/${extensionType}`));

      templates.forEach((file) => {
        var dest = path.resolve(__dirname, `${extensionType}/${file}`);
        var item = {
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
  var packageMode = false;

  try {
    packageMode = fs.lstatSync(packageDirAbs).isDirectory();
  } catch (e) {
    console.log('Package definition not detected.');
  }

  return packageMode;
}

function generatePackage() {
  var pkgEntries = [];

  // Include all files from the package directory
  var pkgFiles = readDirRecursive(packageDirAbs);

  pkgFiles.forEach((file) => {
    var packageFile = path.resolve(packageDirAbs, file);

    var item = {
      src: packageFile,
    };

    pkgEntries.push(item);
  });

  // Add all extension types directories into the package
  extensionTypesDirs.forEach((extensionTypeDir) => {
    var extTemplates = readDirRecursive(path.resolve(__dirname, `${templatesDir}/${extensionTypeDir}`));

    extTemplates.forEach((extTemplate) => {
      var srcFile = path.resolve(__dirname, `${extensionTypeDir}/${extTemplate}`);
      var srcDir = path.dirname(srcFile);

      var item = {
        src: srcDir,
        dist: path.basename(srcDir),
      };

      pkgEntries.push(item);
    });
  });

  // Complete the definition of the zip file
  var outputFile = path.resolve(__dirname, `${releaseDir}/pkg_${definitions.EXTENSION_ALIAS}_v${definitions.RELEASE_VERSION}`);

  var zipFile = {
    entries: pkgEntries,
    output: outputFile,
    format: 'zip',
  };

  return new ZipFilesPlugin(zipFile);
}

function generateZips() {
  var zipDirectories = [templatesDir];
  var zipPlugins = [];

  zipDirectories.forEach((tplDirectory) => {
    extensionTypesDirs.forEach((extensionType) => {
      var extZipDir = path.resolve(__dirname, `${tplDirectory}/${extensionType}`);
      var templates = readDirRecursive(path.resolve(__dirname, `${tplDirectory}/${extensionType}`));

      templates.forEach((tplFile) => {
        var srcFile = path.resolve(__dirname, `${extensionType}/${tplFile}`);
        var srcDir = path.dirname(srcFile);
        var extname = path.extname(srcFile);

        if (extname !== '.xml') return;

        var manifestTplFile = `${extZipDir}/${tplFile}`;
        var extensionTplDir = path.dirname(manifestTplFile);
        var parts = extensionTplDir.split('/');
        var extElement = parts.pop();

        var renamedExtElement = extElement;

        if (renamedExtElement === 'component') {
          renamedExtElement = definitions.EXTENSION_ALIAS;
        } else if (renamedExtElement === 'file') {
          renamedExtElement = 'cli';
        }

        var outputFile = path.resolve(__dirname, `${releaseDir}/${renamedExtElement}_v${definitions.RELEASE_VERSION}`);

        var zipFile = {
          entries: [
            {
              src: srcDir,
              dist: extElement,
            },
          ],
          output: outputFile,
          format: 'zip',
        };

        var itemZip = new ZipFilesPlugin(zipFile);
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
