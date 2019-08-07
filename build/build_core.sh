#!/bin/sh

cd template/
npm i
npm run prod
cd ..

rm -rf template/node_modules

# Stylesheet to be included inline
cat template/dist/main.css > template/css/template.css

# Stylesheet to be included at the bottom of the document
cp template/src/prism.css template/css/

# JavaScript to be deferred
cat template/dist/main.js > template/js/template.js
cat template/js/prism.js >> template/js/template.js

npm run build
