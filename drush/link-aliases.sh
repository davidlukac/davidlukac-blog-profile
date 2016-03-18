#!/usr/bin/env bash

# Get current dir where script is located, so we can call other scripts on
# relative path. The script assumes it's located in `scripts` folder.
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ -f ~/.drush/davidlukac.aliases.drushrc.php ]; then
  echo "Making backup of current Drush aliases into a '.bak' file."
  mv ~/.drush/davidlukac.aliases.drushrc.php ~/.drush/davidlukac.aliases.drushrc.php.bak
fi

echo "Linking site's Drush aliases to ~/.drush."
ln -s ${DIR}/davidlukac.aliases.drushrc.php ~/.drush/davidlukac.aliases.drushrc.php
