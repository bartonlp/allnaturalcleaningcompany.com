<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
ErrorClass::setDevelopment(true);
$S = new $_site['className']($_site);
$h->css = <<<EOF
  <style>
main {
  padding: .5rem;
}
  </style>
EOF;

$h->title = "All Natural Cleaning";
$h->banner = "<h3>Contact Us</h3>";
list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<h1>Text Us</h1>
</main>
$footer
EOF;
