#!/bin/bash
# Backup the database before starting.
cd /var/www/allnaturalcleaningcompany
dir=other
bkupdate=`date +%B-%d-%y`
filename="ALLNATURAL_BACKUP.$bkupdate.sql"

mysqldump --defaults-file=/home/barton/ps --user=root --no-data allnatural 2>/dev/null > $dir/allnatural.schema
mysqldump --defaults-file=/home/barton/ps --user=root --add-drop-table  allnatural 2>/dev/null >$dir/$filename

# remove old files
find $dir -atime +28 -type f -exec rm '{}' \;

gzip $dir/$filename

