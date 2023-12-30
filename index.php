<?php
// BLP 2023-09-19 - This site is no longer in use.

$_site = require_once(getenv("SITELOADNAME"));

$S = new SiteClass($_site);

// Updated the phone number in includes/head.i.php

$S->title = "All Natural Cleaning Company";

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<hr>
<h1 style="text-align: center">This site is no longer in business</h1>
<hr>
$footer
EOF;
