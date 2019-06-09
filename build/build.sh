#!/bin/sh

cd template/
npm i
npm run prod
cd ..

rm -rf template/node_modules
cat template/dist/main.css > template/css/template.css
cat template/src/prism.min.css >> template/css/template.css

npm run build
