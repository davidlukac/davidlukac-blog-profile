#!/usr/bin/env bash

start_time=$(date +%s)

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

print_info "Create DB dump."
dump_folder="~/drush-backups/dr_prod/"
dump_file="dr_prod_${start_time}.sql"
drush @dl.prod sql-dump --result-file=${dump_folder}${dump_file} --gzip
# After dumping the DB the file name is given `.gz` extension.
dump_file_gz="${dump_file}.gz"

print_info "Download the DB dump."
mkdir -p ${dump_folder}
scp davidlukac.com:${dump_folder}${dump_file_gz} ${dump_folder}
gunzip ${dump_folder}${dump_file_gz}

print_info "Backup current LOCAL database."
drush @dl.local sql-dump --result-file --gzip

print_warn "Upload production database!"
drush @dl.local sql-drop -y
drush @dl.local sql-cli < ${dump_folder}${dump_file}

print_info "Clean up."
ssh davidlukac.com "rm ${dump_folder}${dump_file_gz}"
rm ${dump_folder}${dump_file}

end_time=$(date +%s)
print_info "Execution time of DB sync was $(expr ${end_time} - ${start_time})s."
