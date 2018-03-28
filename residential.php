<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);
$h->title = "Home Cleaning Plans - All Natural Cleaning Company";
$h->desc = "Home Cleaning with all natural products. Residential cleaning in Albuquerque. No toxins or harmfull chemicals.";
$h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

$h->css = <<<EOF
  <style>
main {
  padding: .5rem;
}
.title {
  font-family: 'Tangerine', serif;
  text-align: center;
}
#image1 {
  float: left;
  width: 12rem;
  margin-right: 1rem;
}
#image2 {
  float: right;
  width: 12rem;
}
.li-space {
  margin-bottom: .5rem;
}
div.flex {
  display: flex;
  justify-content: space-between;
}
.callusnow {
        display: inline-block;
        padding: 1rem;
        margin-left: 2rem;
        margin-bottom: 1rem;
        background-color: lightblue;
        border: 1px solid black;
        border-radius: .5rem;
        text-decoration: none;
}
@media (max-width: 760px) {
        #image2 {
          display: none;
        }
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<img id="image1" src="https://bartonphillips.net/images/allnatural/AdobeStock_100422682-2.jpg" alt="Cleaning Service">
<img id="image2" src="https://bartonphillips.net/images/allnatural/AdobeStock_26146158-1.png" alt="100% Natural">
<h1 class="title">All Natural Residential Cleaning</h1>
<p><b>Dear Home Owner,</b></p>

<p><b>The All Natural Cleaning Company</b> is the first janitorial company in Albuquerque New Mexico, and possibly in
the country, to use all natural nontoxic chemical free cleaning solutions to clean your house.</p>

<p>What do we mean by natural? We mean things that you use around your house, in your food pantry, things in
your refrigerator, in your garden, things that you eat and use on a daily basis.  Like lemon juice,
sea salt, Baking soda, vinegar, olive oil, coconut oil, Castle soap, Hydrogen peroxide. Most of our
ingredients are edible.</p>

<p>We do not use any &quot;Green products&quot;; they contain toxins and harmful chemicals. Simply Google
the content of these &quot;green&quot; products and their side effects you will understand what we mean.
Keep in mind these products are produced by chemical companies.
Our products are produced by farmers and are made from such things as lemon and olive oil.</p>

<p>After our initial home cleaning visit to your home we will take notes and put together special cleaning formulas
unique to the characteristics of your home. Each home cleaning is different and requires a lot of attention
to detail before we start the cleaning process.</p>

<p>If you were to schedule a home cleaning with us here is what we will do for you:</p>

<ol>
<li class="li-space">We will clean your house.</li>
<li class="li-space">Teach you how to make your own natural cleaning mixes.</li>
<li class="li-space">Show you how to eliminate the toxins from your home.</li>
<li class="li-space">If you are willing to gather your friends and neighbors at your house we would love to
speak to them free and teach them how to eliminate the toxins from their homes too.</li>
</ol>

<p>We currently offer two home residential cleaning plans:</p>
<a class="callusnow" href="residentialbasic.php">Basic Plan</a>&nbsp;
<a class="callusnow" href="residentialextensive.php">Extensive Plan</a>
<p><a href="getquote.php">Get a Quote</a> or

<a href="contact.php">call us for a quote</a></p>
</main>
$footer
EOF;
