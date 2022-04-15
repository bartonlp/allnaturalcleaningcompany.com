<?php
// BLP 2021-08-17 -- Custon head.i.php
// We do not use PUG.

$this->__Phone = " (407) 779-1777";
$this->__Fax = "";
$this->__Address = "";
$this->__City = "";
$this->__State = "";
$this->__Zip = "";

$structData = <<<EOF
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Service",
  "name": "All Natural Cleaning Company",
  "image": "https://www.allnaturalcleaningcompany.com/images/logo-allnatural.png",
  "description": "All natural cleaning. We provide cleaning with only natural products.",
  "url": "https://www.allnaturalcleaningcompany.com",
  "serviceType": "Janitorial Services",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.4",
    "reviewCount": "89"
  }
}
</script>
EOF;

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
  <meta name="google-site-verification" content="vBqb7BadCBGAHjG87iKhlKuzIDgauuxWa2lLP_p8UEE">
  <!--  Add Open Graph meta tags -->
  <meta property="og:title" content="All Natural Cleaning Company">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.allnaturalcleaningcompany.com">
  <meta property="og:image" content="https://bartonphillips.net/images/allnatural/woman-left-croped.png">
  <!-- Add canonical link because we have multiple urls pointing here -->
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
  <!-- Structured Data -->
  $structData
</head>
EOF;
