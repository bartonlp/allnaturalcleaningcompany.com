#!/bin/bash
# Backup the database before starting.
# I create a file CE_BACKUP.sql which can be used to create a new database
cd /var/www/allnaturalcleaningcompany
dir=other
bkupdate=`date +%B-%d-%y`
filename="ALLNATURAL_BACKUP.$bkupdate.sql"

mysqldump --user=root --no-data --password=bartonl411 allnatural 2>/dev/null > $dir/allnatural.schema
mysqldump --user=root --add-drop-table --password=bartonl411 allnatural 2>/dev/null >$dir/$filename

gzip $dir/$filename

