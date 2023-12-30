<?php
// BLP 2021-08-17 -- Custon head.i.php
// Renter Head section

return <<<EOF
<head>
  <!-- https://allnaturalcleaningcompany.com head.i.php -->
  $h->title
  $h->viewport
  $h->charset
  $h->copyright
  $h->author
  <!--
    All Natural Cleaning Company.
    Home and office cleaning with natural, toxin free products.
  -->
  $h->desc
  $h->keywords
  $h->canonical
  $h->favicon
  $h->defaultCss
  $h->link
  $jQuery
  $trackerStr
  $h->extra
  $h->script
  $h->inlineScript
  $h->css
</head>
EOF;
