<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);
$h->title = "Commercial Janitorial Service - All Natural Cleaning Company";
$h->desc = "Comercial Janitorial service in Albuquerque. All Natural products, no harmfull chemicals or toxins.";

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
.li-space {
  margin-bottom: .5rem;
}
div.flex {
  display: flex;
  justify-content: space-between;
}
h2 {
  text-align: center;
}
#image1 {
  float: left;
  width: 10rem;
  padding: .5rem;
}
@media (max-width: 550px) {
  #image1 {
    margin-left: 0px;
  }
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<h1 class="title">Commercial Janitorial Cleaning</h1>

<img id="image1" src="https://bartonphillips.net/images/allnatural/women-img.png" alt="Cleaning Worman in Albuquerque NM">

<p>The <b>All Natural Cleaning Company</b> uses only natural toxin free ingredients.
An important question commercial customers never ask of their cleaning companies; what kind
of chemicals are you using to clean my place? The American worker spends on average 8.8 hrs.
daily in the office. Depending on what kind of harmful chemicals the cleaning company is using
whether daily or weekly the unsuspecting workers are being exposed to these toxic chemicals
from the moment they walk in until they leave, for 8 straight hours. The short term health effects
of these chemicals can range from headaches, allergy, feeling tired, lack of concentration and
moodiness. Long term effects, Parkinson, ADHD, Dementia, Cancer and much more.</p>

<p>Most cleaning companies claim they are using &quot;green products&quot; which is another word for toxic
and deadly but not as much as before. The word &quot;green&quot; is a marketing gimmick to sell more
toxic products to uninformed public. Cleaning companies from an ethical stand point should tell
us what kind of chemicals they are using and their potential side effects then let us decide
whether the risk is acceptable or not. Sadly the toxic side effects of these products usually
appears later in life due to the buildup in our systems resulting in deadly illnesses such as
Parkinson and cancer. I am speaking from personal experience; I lost my dad to Parkinson due to
his exposure to chemicals. Chemical companies by law are not obligated to list all their
ingredients on their labels; for a good reason if they do they will be out of business.</p>

<p>We at the <b>All Natural Cleaning Company</b> take our customer's health very seriously.
We only use products that are safe and 100% natural.
By hiring us you would be making the right choice by your company and employees. We
are different than the rest; we will give you a list of all of our products before we start cleaning.
Here is a short list of our cleaning items: vinegar, olive oil, baking soda, salt, borax, lemons and
essential oils. The majority of our products are edible.</p>

<p>The final decision is yours. Please note our products are as effective and powerful as the
chemically based ones.</p>

<p>Here are a few of the things we promise you:</p>

<ol>

<li class="li-space">We will not use any toxic chemicals to clean your business. Our products are all natural.
We can use regular chemicals if you prefer the choice is yours.</li>

<li class="li-space">We are very competitive, reasonably priced, reliable and trust worthy. We do it right or
it is free. We promise to clean your company or place better than anyone else.</li>

<li class="li-space">We will assign your business a specific cleaning team familiar with your needs.</li>

<li class="li-space">Part of our quality control is to have a manager visit each of the sites before the cleaning
teams leave the building to make sure work is satisfactory.</li>

<li class="li-space">No other company in New Mexico offers the kind of cleaning we do.</li>

</ol>  

<p><a href="getquote.php">Get a Quote</a> or
<a href="contact.php">call us for a quote</a></p>
<p>Commercial facilities we service:</p>
<ul>
<li>Banks</li>
<li>Auto dealership</li>
<li>Business Offices</li>
<li>Restaurants</li>
<li>Showrooms</li>
<li>Schools</li>
<li>Government facilities</li>
<li>Churches</li>
<li>Apartments</li>
<li>Retail stores</li>
</ul>
</main>
$footer
EOF;
