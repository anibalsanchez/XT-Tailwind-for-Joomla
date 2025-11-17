#!/bin/bash

set -euo pipefail

cd template
npm i
npm run update-browserslist
npm run prod
cd ..

npm run build
