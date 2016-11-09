<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);
$h->title = "All Natural Cleaning";

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main class='cleaning'>
<div style="height: 800px"></div>
</main>
$footer
EOF;
