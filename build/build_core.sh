#!/bin/sh

cd template/
rm css/template*.css
rm dist/main*.css

npm ci
npm run prod
cd ..

rm -rf template/node_modules

# JavaScript to be deferred
cat template/dist/main.js > template/js/template.js
cat template/js/prism.js >> template/js/template.js

npm run build
