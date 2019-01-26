#!/bin/sh

cd webpack-starter
npm run prod
cd ..
cp webpack-starter/dist/main.js template/js/template.js
cp webpack-starter/dist/style.css template/css/template.css

npm run build
rename 's/template/xttailwind/' build/release/*.zip
