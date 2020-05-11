#!/bin/sh

cd template
npm ci
npm run prod
cd ..

npm run build
