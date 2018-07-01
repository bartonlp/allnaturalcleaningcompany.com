<?php
// BLP 2018-06-21 -- NOTE we are using PUG and this is ONLY used if the xxx.php is the url!
//  See the pug/layout.pug!

$this->__Phone = "(505)399-9193";
$this->__Fax = "(505)672-7081";
$this->__Address = "120 Madeira NE";
$this->__City = "Albuquerque";
$this->__State = "New Mexico";
$this->__Zip = "87108";

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
  "image": "https://www.allnaturalcleaningcompany.com/images/logo-allnatural.png",
  "description": "All natural cleaning in Albuquerque. We provide cleaning with only natural products.",
  "url": "https://www.allnaturalcleaningcompany.com",
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
  <!--
    All Natural Cleaning Company, Albuquerque NM.
    Home and office cleaning with natural, toxin free products.
  -->
  <meta name="description" content="{$arg['desc']}"/>
  <meta name="keywords" content="$keywords"/>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="vBqb7BadCBGAHjG87iKhlKuzIDgauuxWa2lLP_p8UEE" />
  <!-- Structured Data -->
  $structData
  <!-- CSS -->
  <style>
html {
  display: none;
}
  </style>
  <!-- css is not css but a link to tracker via .htaccess RewriteRule. -->
  <link rel="stylesheet" href="/csstest-$this->LAST_ID.css" title="blp test">
  {$arg['link']}
  <link rel="stylesheet" href="https://bartonphillips.net/css/allnatural/allnatural.css">
  <!-- jQuery and Javascripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script> var lastId = $this->LAST_ID; </script>
  <script src="https://bartonphillips.net/js/tracker.js"></script>
  <!-- Custom Scripts -->
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
EOF;
