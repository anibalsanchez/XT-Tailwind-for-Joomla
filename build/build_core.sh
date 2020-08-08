#!/bin/sh

cd template
npm i
npm run prod
cd ..

npm run build
