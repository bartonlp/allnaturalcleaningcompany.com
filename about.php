<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);
$h->title = "About Us - All Natural Cleaning Company";
$h->desc = "All Natural Cleaning Company. About Us. ".
           "Cleaning service for home and business. We use only all natural products, no toxic chemicals. ".
           "Our products are 99% edable.";

$h->keywords = "About All Natural Cleaning Company";

$h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

$h->css = <<<EOF
  <style>
.title {
        font-family: 'Tangerine', serif;
        text-align: center;
}
main {
  padding: .5rem;
}
#image1 {
  width: 15rem;
  float: left;
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<h1 class="title">About us</h1>
<img id="image1" src="https://bartonphillips.net/images/allnatural/AdobeStock_91295220-1.png" alt="Cleaning Services in Albuquerque, NM">

<p>The <b>All Natural Cleaning Company</b> is the first janitorial cleaning company to use nothing but 100 percent natural cleaning products like white vinegar,
baking soda, lemon, corn starch, hydrogen peroxide, flour, Isopropyl Alcohol, Lavender oil and many
other naturally occurring products.</p>

<p>We research each and every product before using it. We use only natural
products that we are familiar with. The majority of our products are 100
percent edible.</p>

<p>At the <b>All Natural Cleaning Company</b> we are trend setters.
We are locally owned and operated. We are ready to make a
positive difference in people's lives. After we clean your home or office
we will educate you on natural cleaning and show you how to do it
yourself next time. We will also help you get rid of all the toxins stored
around your house or office that are poisoning you slowly.</p>

<p>Most if not all other cleaning companies use dangerous and potent
products to get the job done fast regardless of the health consequences to
their clients so they can move on to their other clients. Do you actually
know what kind of harmful chemicals are being used to clean your home
or work? You will be surprised.</p>

<p>As for the so called &quot;Green&quot; cleaning products used by many janitorial
companies today, these products are being produced by the same
chemical companies that were producing the old toxic products.
Currently 98% of the so called &quot;Green&quot; products contain harmful chemicals.</p>

<p>If you care about your health, the health of your loved ones, and those you work with; Call us today $S->__Phone. Consultation is free.</p>

<p><a href="getquote.php">Get a Quote</a> or
<a href="contactus.php">call us for a quote</a></p>
</main>
$footer
EOF;
