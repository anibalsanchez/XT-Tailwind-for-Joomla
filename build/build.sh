#!/bin/sh

cat template/dist/styles.css > template/css/template.css
cat template/src/prism.min.css >> template/css/template.css

npm run build
