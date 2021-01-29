#!/bin/sh

composer update --no-dev

cd template
npm i
npm run update-browserslist
npm run prod
cd ..

npm run build
