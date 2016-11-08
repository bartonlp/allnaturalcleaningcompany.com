<?php
/* IMPORTANT:
   This file is NOT rsync'ed to 'allnaturalcleaningcompany'!
   IMPORTANT
*/
// For Digital Ocian
// For bartonlp.com we have /var/www which has two directories: html and mpc.
// The html directory has the expermental home page and mpc has the myphotochannel
// expermental site.
// This is www.bartonlp.com site.

// Site map
// This is included by the siteautoload.php which is called from each page file.
// This file should only be loaded via the siteautoload.php file.
// This file has the sitemap which defines the various location where things can be found.
// DOC_ROOT, SITE_ROOT and TARGET_ROOT are defined by the siteautoload.php

// TOP would be '/var/www' on bartonlp.com because we keep the include file that
// are common to all sites in the '/var/www/ludes' directory which also has the
// 'database-engines' directory.
// SITE_INCLUDES is under the SITE_ROOT which is where we found the '.sitemap.php'
// file during our search in siteautoload.php.
// After the four path defines we have defines for our LOGFILE and the email addresses
// used to send emails when errors occur.
// After the email defines we have two arrays, one for the database information
// ($dbinfo), and one for the site information ($siteinfo).
// These are used by the Database class and the SiteClass.
   
define('TOP', '/var/www'); // for bartonlp.com which is like our Dell-530 home system.
define('INCLUDES', TOP."/includes"); // /var/www/includes
define('DATABASE_ENGINES', INCLUDES."/database-engines");
define('SITE_INCLUDES', SITE_ROOT."/includes"); // SITE_ROOT is defined in siteautoload.php!

// Email info and logfile location

//define('EMAILADDRESS', "bouhamdanw@gmail.com");
//define('EMAILRETURN', "bouhamdanw@gmail.com");
//define('EMAILFROM', "webmaster@allnaturalcleaningcompany.com");
// These are the new email addresses at gmail.com
define('EMAILADDRESS', "allnaturalcleaningcompany@gmail.com");
define('EMAILRETURN', "allnaturalcleaningcompany@gmail.com");
define('EMAILFROM', "webmaster@allnaturalcleaningcompany.com");

// Database connection information
// 'engine' is the type of database engine to use. Options are 'mysqli', 'sqlite'.
// Others may be added later
           
$dbinfo = array('host' => 'localhost',
                'user' => 'barton',
                'password' => '7098653',
                'database' => 'allnatural',
                'engine' => 'mysqli'
               );

// SiteClass information
// This site has no members so no membertable.
// See the SiteClass constructor for other possible values like 'count',
// 'emailDomain' etc.

$siteinfo = array('siteDomain' => "allnaturalcleaningcompany.com",
                  'siteName' => 'AllNatural',
                  'mainTitle' => "All Natural Cleaning",
                  //'emailDomain' => "allnaturalcleaningcompany.com",
                  'path' => "/var/www/allnaturalcleaningcompany",
                  'className' => "SiteClass",
                  'copyright' => "2016 All Natural Cleaning Company",
                  'author' => "Barton L. Phillips, mailto:bartonphillips@gmail.com, http://www.bartonphillips.com",
                  //'memberTable' => "blpmembers", // www.bartonlp.com has not members
                  'masterdb' => 'barton', // This is where bots, tracker and analysis are.
                  'dbinfo' => $dbinfo,
                  'headFile' => SITE_INCLUDES."/head.i.php",
                  'bannerFile' => SITE_INCLUDES."/banner.i.php",
                  'footerFile' => SITE_INCLUDES."/footer.i.php",
                  'count' => true,
                  'countMe' => true, // Count BLP
                  //'daycountwhat' => 'all', // what should we daycount? Can be a filename, all, or an array of filenames.
                  // NO LONGER USED; 'analysis' => true, // update the barton.analysis table // NO LONGER USED
                  //'trackerImg1' => "/images/blank.png", // script
                  //'trackerImg2' => "/images/blank.png", // normal
                  'myUri' => "bartonphillips.dyndns.org" // If we are local (at home) then 'localhost'
                 );

