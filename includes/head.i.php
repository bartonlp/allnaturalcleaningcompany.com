<?php
// BLP 2016-01-09 -- check to see if this may be a robot
// Google Analytics id: UA-80497078-1

$this->__Phone = "(505)857-3709";
// fax:  (505)672-7081

$keywords = "All Natural Cleaning, Cleaning Services in Albuquerque NM, Home and Office Cleaning, ".
            "Chemical Free Cleaning in Albuquerque NM, Toxin Free Cleaning in Albuquerque NM, ".
            "Albuquerque Window Cleaning, Albuquerque Carpet Cleaning, Albuquerque Janitorial Services";

if(!empty($arg['keywords'])) {
  $keywords .= ", {$arg['keywords']}";
}

$structData = <<<EOF
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Service",
  "name": "All Natural Cleaning Company",
  "image": "http://www.allnaturalcleaningcompany.com/images/logo-allnatural.png",
  "description": "All natural cleaning in Albuquerque. We provide cleaning with only natural products.",
  "url": "http://www.allnaturalcleaningcompany.com",
  "serviceType": "Janitorial Services",
  "areaServed" : {
    "@type": "Place",
    "address": {
      "@type": "PostalAddress",
      "addressCountry": "US",
      "addressRegion": "NM",
      "postOfficeBoxNumber": "94358",
      "addressLocality": "Albuquerque",
      "postalCode": "87199"
    }
  },
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
  <title>{$arg['title']}</title>
  <!-- METAs -->
  <meta charset='utf-8'/>
  <meta name="copyright" content="$this->copyright">
  <meta name="Author" content="$this->author"/>
  <!-- All Natural Cleaning Company, Albuquerque NM. Home and office cleaning with natural, toxin free products. -->
  <meta name="description" content="{$arg['desc']}"/>
  <meta name="keywords" content="$keywords"/>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <!-- Structured Data -->
  $structData
  <!-- ICONS, RSS -->
  <!--<link rel="shortcut icon" href="favicon.ico" />-->
  <!-- CSS -->
  <style>
html {
  display: none;
}
  </style>
  {$arg['link']}
<!--
  <link rel="preload" href="http://bartonphillips.net/css/allnatural/allnatural.css" onload="this.rel='stylesheet'">

  <link rel="preload" href="http://bartonphillips.net/css/allnatural/social/css/font-awesome.css" onload="this.rel='stylesheet'">
  <link rel="preload" href="http://bartonphillips.net/css/allnatural/social/css/style.css" onload="this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/allnatural.css">
    <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/social/css/font-awesome.css">
    <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/social/css/style.css">
  </noscript>
-->
  <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/allnatural.css">
  <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/social/css/font-awesome.css">
  <link rel="stylesheet" href="http://bartonphillips.net/css/allnatural/social/css/style.css">

  <!-- jQuery and Javascripts -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script> var lastId = $this->LAST_ID; </script>
  <script src="http://bartonphillips.net/js/tracker.js"></script>
<!--  <script src="http://bartonphillips.net/js/loadCSS.js"></script>
  <script src="http://bartonphillips.net/js/cssrelpreload.js"></script> -->

  <script>
//loadCSS("http://bartonphillips.net/css/allnatural/allnatural.css");
//loadCSS("http://bartonphillips.net/css/allnatural/social/css/font-awesome.css");
//loadCSS("http://bartonphillips.net/css/allnatural/social/css/style.css");
  </script>
  <!-- Custom Scripts -->
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
EOF;
