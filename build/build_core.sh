#!/bin/sh

cd library
/usr/bin/composer update --no-dev
/usr/bin/composer dump-autoload --classmap-authoritative
cd ..

cd template
npm ci
npm run prod
cd ..

npm run build
