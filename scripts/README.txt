# These are the backups.sh, updatesitemap.pl and updatesitemap.sh files for 'allnaturalcleaningcompany'.
# These file are fun via 'cron' and are in the 'crontab' file. The database ('allnatural') is backed up to the
# 'allnaturalcleaningcompany/other' directory, and the 'Sitemap.xml' file is recreated and the old version is backed up 
# to the same directory.
# See the MySitemap.php file. NOTE MySitemap.php and the other/ and scripts/
# directories are not rsync'ed from 'allnaturaltest'! The ~/bin/update-allnatural.sh file uses --exclude's to prevent the
# copying of the MySitemap.php and other/ and scripts/ directories from being copied or deleted!
# We do not backup the 'allnaturaltest' database. And we do not backup the Sitemap.xml file.
#
