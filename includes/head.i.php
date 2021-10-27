<?php
// BLP 2021-08-17 -- Custon head.i.php, it does not do the standard replacements from $h or
// mysitemap.json.
// We do not use PUG.

$this->__Phone = " (407) 779-1777";
$this->__Fax = "";
$this->__Address = "";
$this->__City = "";
$this->__State = "";
$this->__Zip = "";

if($this->noTrack === true || $this->nodb === true) {
  $trackerStr = '';
} else {
  $trackerStr =<<<EOF
<script data-lastid="$this->LAST_ID" src="https://bartonphillips.net/js/tracker.js"></script>
EOF;
} 

$keywords = "All Natural Cleaning, Cleaning Services, Home and Office Cleaning, ".
            "Chemical Free Cleaning, Toxin Free Cleaning, ".
            "Window Cleaning, Carpet Cleaning, Janitorial Services";

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
  <title>{$h->title}</title>
  <!-- METAs -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta charset='utf-8'/>
  <meta name="copyright" content="$this->copyright">
  <meta name="Author" content="$this->author"/>
  <!--
    All Natural Cleaning Company.
    Home and office cleaning with natural, toxin free products.
  -->
  <meta name="description" content="{$h->desc}"/>
  <meta name="keywords" content="$h->keywords"/>
  <meta name="google-site-verification" content="vBqb7BadCBGAHjG87iKhlKuzIDgauuxWa2lLP_p8UEE" />

  <!--  Add Open Graph meta tags -->
  <meta property="og:title" content="All Natural Cleaning Company" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://www.allnaturalcleaningcompany.com" />
  <meta property="og:image" content="https://bartonphillips.net/images/allnatural/woman-left-croped.png" />

  <!-- Add canonical link because we have multiple urls pointing here -->
  <link rel="canonical" href="https://www.allnaturalcleaningcompany.com" />
  <link rel="shortcut icon" href="https://bartonphillips.net/images/favicon.ico" />
  <!-- Structured Data -->
  $structData
  <!-- CSS -->
  <style>
html {
  display: none;
}
  </style>
  {$h->link}
  <link rel="stylesheet" href="https://bartonphillips.net/css/allnatural/allnatural.css">
  <!-- jQuery and Javascripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
  <script>jQuery.migrateMute = false; jQuery.migrateTrace = false;</script>
$trackerStr
  <!-- Custom Scripts -->
{$h->extra}
{$h->script}
{$h->css}
</head>
EOF;
