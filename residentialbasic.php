<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);
$h->title = "Home Cleaning Basic Plan - All Natural Cleaning Company";
$h->desc = "Our basic home cleaning plan. We use no toxic chemical, only natural products.";

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
div.flex {
  display: flex;
  justify-content: space-between;
}
#image1 {
  float: right;
  width: 10rem;
}
.callus {
        display: inline-block;
        padding: 1rem;
        margin-left: 2rem;
        margin-bottom: 1rem;
        background-color: lightblue;
        border: 1px solid black;
        border-radius: .5rem;
        text-decoration: none;
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);


echo <<<EOF
$top
<main>
<h1 class="title">All Natural Cleaning Company Basic Plan</h1>
<h2>Residential Home Cleaning - Basic plan<br>
100% natural - chemical free</h2>
<img id="image1" src="http://bartonphillips.net/images/allnatural/AdobeStock_40037375-3.png">
<ul>
<li>Cleaning the toilets, vanities, sinks and backsplash</li>
<li>Cleaning bathtub, showers (including tile and glass)</li>
<li>Cleaning and wiping kitchen appliances (the outside surfaces)</li>
<li>Clean, wipe and disinfect kitchen and bathroom cabinets from the outside</li>
<li>Clean the kitchen sink, countertops and backsplashes</li>
<li>Clean Stove tops and microwaves</li>
<li>Wash dishes</li>
<li>Dusting picture frames, lamps, ceiling fans</li>
<li>Wiping window sills and ledges</li>
<li>Mirrors cleaning</li>
<li>Wood flooring sweeping and cleaning</li>
<li>Carpets vacuuming</li>
<li>All bare floor surfaces, area rugs, stair cases dusting then vacuuming</li>
<li>Floors sweeping and mopping</li>
<li>Pick up and straighten rooms</li>
<li>Make beds</li>
<li>Trash disposal</li>
</ul>
<p>We will clean anything you would like us to, please notify us ahead of time so we can bring the
proper cleaning items and equipment.</p>
<a class="callus" href="residentialextensive.php">Extensive Plan</a>
<p><a href="getquote.php">Get a Quote</a> or
<a href="contact.php">call us for a quote</a></p>
</main>
$footer
EOF;
