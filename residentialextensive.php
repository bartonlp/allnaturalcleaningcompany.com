<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOAD")."/siteload.php");
$S = new $_site->className($_site);

$h->title = "Home Cleaning Extensive Plan - All Natural Cleaning Company";
$h->desc = "Our Extensive home cleaning plan. We do everything that needs cleaning with all natural products. No toxic chemicals.";
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
  margin-right: 2rem;
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
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<main>
<h1 class="title">All Natural Cleaning Company Extensive Plan</h1>
<h2>Residential Home Cleaning - Extensive plan<br>
100% natural - chemical free</h2>
<img id="image1" src="http://bartonphillips.net/images/allnatural/cleaning-service.png">
<ul>
<li>Cleaning toilets, vanities, sinks and backsplash</li>
<li>Wipe and disinfect the Kitchen and bathroom cabinets</li>
<li>Clean bathtub, showers (including tile and glass)</li>
<li>Clean the kitchen sink, under the sink, countertops and backsplashes</li>
<li>Kitchen appliances, including refrigerator, cleaning and wiping inside out.</li>
<li>Dusting picture frames, lamps, ceiling fans</li>
<li>Wood flooring sweeping then cleaning</li>
<li>All bare floor surfaces, area rugs, stair cases dusted and vacuumed</li>
<li>Pick up and straighten rooms</li>
<li>Dishes washed</li>
<li>Mirrors cleaned</li>
<li>Blinds cleaned </li>
<li>Vanity top cleaned (more time may be required to remove and replace items on top)</li>
<li>Countertops and backsplashes cleaned (all items removed and replaced)</li>
<li>Exterior and interior of appliances (oven, microwave, dishwasher, stovetop, refrigerator)</li>
<li>Fingerprints removed from all woodwork, doorframes and switch plates</li>
<li>Carpets vacuumed</li>
<li>Make beds, Linens changed and beds made (if left out)</li>
<li>Baseboards wiped & cleaned</li>
<li>Wiping window sills and ledges</li>
<li>Door frames cleaned</li>
<li>Cobwebs cleared</li>
<li>Laundry folded and put away (if requested and time allows)</li>
<li>vacuuming of upholstered furniture</li>
<li>Organizing of clothes drawers and closets (upon request)</li>
<li>Trash disposal</li>
</ul>
<p>We will clean anything you would like us to, please notify us ahead of time so we can bring the
proper cleaning items and equipment.</p>
<a class="callusnow" href="residentialbasic.php">Basic Plan</a>
<p><a href="getquote.php">Get a Quote</a> or
<a href="contact.php">call us for a quote</a></p>
</main>
$footer
EOF;
