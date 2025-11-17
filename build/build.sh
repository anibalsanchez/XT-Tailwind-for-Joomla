#!/bin/bash

set -euo pipefail

$NVM_DIR/nvm.sh use 16

$XT_BUILD_SCRIPTS_HOME/core/build-j-extension.sh update
rm -rf template/.git

$XT_BUILD_SCRIPTS_HOME/php-prefixer/build-prefixed-j-extension.sh

$NVM_DIR/nvm.sh use default
