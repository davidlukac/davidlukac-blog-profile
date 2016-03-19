#!/usr/bin/env bash

start_time=$(date +%s)

# This script should be run inside local Drupal VM, because it needs to
# restart the Memcache and prepare folders.
# You can run it from outside the VM as:
#
# $ envoy run reinstall-local

RED='\033[0;31m'
GREEN='\033[0;32m'
ORANGE='\033[0;33m'
NC='\033[0m' # No Color

print_info() {
  printf "${GREEN}[INFO] ${1}${NC}\n"
}

print_warn() {
  printf "${ORANGE}[WARNING] ${1}${NC}\n"
}

# Define local Drush alias.
local_alias="@dl.local"

# Wherever we were, let move to the root of the project.
INIT_DIR=$(pwd)
cd $(git rev-parse --show-toplevel)

# Clear files directory.
print_info "Preparing folders."
chmod -R 777 sites/davidlukac.com/files

# Install profile installation.
print_info "Starting installation."
drush ${local_alias} sql-drop -y
drush ${local_alias} si davids_blog --site-name="Blog of David Lukac" --site-mail=david.lukac@gmail.com -y

# Enable site-specific features.
# @todo Backport functionality for this from Virgin.
print_info "Enable site-specific Features."
drush ${local_alias} en devel -y
drush ${local_alias} en features -y
drush ${local_alias} en ft_site_administration -y

print_info "Reverting Features."
# This is really silly, but we need to revert the Features couples of times.
drush ${local_alias} cc drush
drush ${local_alias} cc all
drush ${local_alias} fra -y
drush ${local_alias} cc all
drush ${local_alias} fra -y
drush ${local_alias} cc all
drush ${local_alias} fra -y
drush ${local_alias} cc all

print_warn "Still non-default Features are:"
drush ${local_alias} fl | grep "Overridden\|Needs review\|Rebuilding"

print_info "Setting up users."
drush ${local_alias} ucrt user --mail="david.lukac+user@gmail.com"
drush ${local_alias} urol "authenticated user" user

print_info "Performing final clean-up."
drush ${local_alias} cc all
drush ${local_alias} cron
# @todo Set up `FT: Solr search` first.
#drush ${local_alias}solr-delete-index
#drush ${local_alias}solr-mark-all
#drush ${local_alias}solr-index

print_info "BOSS, here is your login link:"
drush ${local_alias} uli --no-browser

# Go back where we started.
cd ${INIT_DIR}

end_time=$(date +%s)
echo
print_info "Execution time of the installation was $(expr ${end_time} - ${start_time})s."
