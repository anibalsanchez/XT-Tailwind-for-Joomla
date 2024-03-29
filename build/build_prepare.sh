#!/bin/bash -e

# Special composer configuration to download the template from a repo, and
# install it in the template directory.

if [ "$IS_PREFIXING" != "yes" ]; then
    export COMPOSER=composer-with-template.json

    echo "Install anibalsanchez/xt-tailwind-for-joomla-template"
    composer update --no-dev
    composer dump-autoload --classmap-authoritative
fi