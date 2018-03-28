<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

$h->title = "Albuquerque, New Mexico - All Natural Cleaning Company";
$h->desc = "All Natural Cleaning Company of Albuquerque. We clean with 100% toxin free products. Full service Commercial Janitorial and Home cleaning.";

$h->css = <<<EOF
  <style>
main img {
  width: 100%;
}
main {
  position: relative;
  padding: .5%;
}
h1 {
  font-size: 100%;
  margin: 0;
  color: black;
}
.center {
  text-align: center;
}
.callus {
  position: absolute;
  top: 6%;
  right: 10%;
  font-size: 200%;
  color: red;
  text-align: center;
  font-weight: bold;
}
.toxinfree {
  color: blue;
}
.content {
  padding-top: .1%;
  padding-left: 1%;
}
.phone {
  color: red;
}
.getquote {
  display: inline-block;
  padding: 1rem;
  margin-left: 2rem;
  margin-bottom: 1rem;
  background-color: lightblue;
  border: 1px solid black;
  border-radius: .5rem;
  text-decoration: none;
}
.image2 {
  float: left;
  width: 10rem;
}
.clearboth {
  clear: both;
}
.followus {
  width: 200px; /* should be rem */
}
@media (max-width: 1000px) {
  .callus {
    top: 3%;
    right: 5%;
    font-size: 150%;
  }
}
@media (max-width: 550px) {
  main button.emailus, main button.makeappointment {
    padding: .5rem;
    margin-left: 1.5rem;
  }
  .callus {
    top: 2%;
    right: 5%;
    font-size: 100%;
  }
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<!-- All Natural Cleaning Company, Albuquerque NM. Toxin Free, Chemical Free, All natural and Organic. Home and Office Cleaning. -->
<div class="callus">
  <h1>All Natural Cleaning Company</h1>
  <span class="toxinfree">100% Toxin Free<br>100% Natural</span><br>Call us $S->__Phone<br>
<a href="getquote.php">Get a free quote</a></div>
<img src="https://bartonphillips.net/images/allnatural/woman-left-croped.png" alt="All Natural Cleaning Company of Albuquerque: Woman with Cleaning Equipment">

<div class="content">
<p>The <b>All Natural Cleaning Company</b> is the first company in Albuquerque, New Mexico, to use 100%
natural organic products like lemons, baking soda, olive oil, vinegar and other
toxin free substances to clean your home or office.</p>

<p>The toxins and chemicals you are using today in the cleaning of your home and
office are killing you and your loved ones slowly. These poisonous products short
term effect leads to fatigue, headache, asthma and allergy. Their long term health
effects to name a few, ADHD, cancer, hormonal disruption, Parkinson, Brain
damage. Can you afford to continue using these products? Let us show you a
healthy alternative.</p>

<p>We formed the <b>All Natural Cleaning Company</b> to make a difference in people's lives by
showing them that there is an alternative to using these deadly chemicals. We do not
have to poison our environment our kids and ourselves to get a clean house or
office. Once you have us clean your home or office, we will educate you on natural
cleaning and show you how to get rid of all these poisonous products from your
home or office with the hope next time you clean you will do it the natural way.</p>

<p>Our natural products are as effective as the chemically based ones; they smell
better and clean better. Our product formulas are homemade and specifically
tailored to each cleaning task. 99% of the products we use are ingestible.</p>

<p>Here is an example of one cleaning formula:</p>
<p>All purpose cleaner and deodorizer <i>for:</i> Kitchen counters, appliances, inside the refrigerator</p>

<img class="image2" src="https://bartonphillips.net/images/allnatural/AdobeStock_40037375-3.png" alt="100% natural">
<p><i>Ingredients</i></p>

<ul>
<li>4 tablespoons baking soda</li>
<li>1 quart warm water</li>
</ul>

<p>Pour solution on a clean sponge and wipe. It is that simple.</p>
<a href="recipes.php">More recipes</a>
<p class="clearboth">Call us today $S->__Phone. That will be the healthiest thing you will do today.</p>

<p>As for the &quot;Green&quot; cleaning products; 99% of these products contain something
toxic in them. When we use lemon and salt to clean we do not have to second guess
ourselves about the chemicals we left behind.</p>

<div class="center">
<a class="getquote" href="employment.php">Employment Application</a>&nbsp;
<a class="getquote" href="contact.php">Email or Call Us</a>&nbsp;
<a class="getquote" href="contact.php?value=I+want+to+make+an+appointment">Appointment</a>&nbsp;
<a class="getquote" href="getquote.php">Get A Quote</a>
</div>
<br>

</div>
</div>
</main>
$footer
EOF;
