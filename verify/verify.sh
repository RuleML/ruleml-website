#!/bin/bash
VERIFY_DIR=$( cd "$(dirname "$0")" ; pwd -P )
VERIFY_HOME="${VERIFY_DIR}"/
PHP_CLI_INI=${VERIFY_HOME}php-cli.ini
LISTFILE_PHP_SCRIPT=${VERIFY_HOME}listFiles.php
LISTFILE_BALLISTIC_PHP_SCRIPT=${VERIFY_HOME}listBallistic.php

top="${VERIFY_DIR}/.."
echo "$top"

# List files from the extracted copy of the ballistic backup
 php -f "${LISTFILE_BALLISTIC_PHP_SCRIPT}" -c "${PHP_CLI_INI}" "top=${top}"> "$VERIFY_HOME"filesOriginal.txt

# Download the file listings from Hawkhost
curl http://ruleml.org/verify/listFiles.php > "$VERIFY_HOME"filesMigrated.txt

# Compare the sets of files
rm "${VERIFY_HOME}"dif
ghc -o "${VERIFY_HOME}"dif "${VERIFY_HOME}"Main.hs
"${VERIFY_HOME}"dif > "${VERIFY_HOME}"filesMissing.txt