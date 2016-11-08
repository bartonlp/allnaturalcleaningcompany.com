<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);
$h->title = "All Natural Cleaning";

$h->css = <<<EOF
  <style>
main img {
  width: 100%;
}
main {
        position: relative;
        padding: .5%;
}
.callus {
        position: absolute;
        top: 10%;
        right: 5%;
        font-size: 200%;
        transform: rotate(40deg);
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
@media (max-width: 1000px) {
       .callus {
          top: 10%;
          right: 1%;
          font-size: 150%;
       }
}
@media (max-width: 550px) {
       main button.emailus, main button.makeappointment {
         padding: .5rem;
         margin-left: 1.5rem;
       }
       .callus {
          top: 5%;
          right: 1%;
          font-size: 90%;
       }
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h, $b);

echo <<<EOF
$top
<main>
<!-- All Natural Cleaning Company, Albuquerque NM. Toxin Free, Chemical Free, All natural, Organic -->
<div class="callus"><span class="toxinfree">100% Toxin Free<br>100% Natural</span><br>Call Us (888)123-4467<br>
<a href="getquote.php">Get a free quote</a></div>
<img src="images/woman-left.jpg">
<div class="content">
<p><b>All Natural Cleaning</b> is just that, no chemicals or synthetic products just good old fashion
soap, elbow grease and Eco-friendly toxin free compounds.</p>

<p> All natural cleaning company is the first company in New Mexico to use 100 % chemical
free natural organic products like lemons, baking soda, olive oil and other toxin free substances to clean your home or
office.</p>

<p> Most &quot;Green&quot; cleaning products are made by the large chemical companies. They still
use toxic chemicals as before but with less toxicity nonetheless they are still toxic. It may be
good for the earth but not for you and me. In our opinion chemical companies cannot be trusted.
Beware of anyone that says we use &quot;Green&quot; products. The difference between us and other
cleaning companies our products are chemical free.</p>

<div>
<p>Did you know that the toxins in your home and work are killing you and your family slowly?
Here is how we can help with this serious problem.
All natural cleaning company is the first and only cleaning companies in the state of New Mexico to use only
natural products in cleaning your home or office while educating you to get rid of all the deadly toxins.
Some of the things we use to clean:
<ul>
<li>100% natural products like baking soda, lemons, kosher salt, olive oil, vinegar.
<li>100% chemical free products that do not harm, pets, plants or humans.
</ul>
We don't simply clean and leave we will educate you and show you how to get rid of all the poisons in
your home or office. You become better informed about cleaning chemicals by the time we leave.
<a href="contact.php">Call us now</a>. You are not obligated to buy anything.
</p>
</div>
<div>
<p> We can ingest every single product we use, can other cleaning companies do the same?</p>
<p>Our job is to clean your house or office without poisoning you. Our natural cleaning products
are just as effective as the toxins other cleaning companies use. Our products clean better and
smell better.</p>
<p>We would love to help educate you, your family and office staff, and help you get
rid of all the toxins in your home or office forever.</p>
</div>

<p><b>Call us now</b>, that will be the most important thing you do today (<span class="phone">888-123-4567</span>).</p>

<a class="getquote" href="contact.php">Email or Call Us</a>&nbsp;
<a class="getquote" href="contact.php?value=I+want+to+make+an+appointment">Appointment</a>&nbsp;
<a class="getquote" href="getquote.php">Get A Quote</a>
</div>
</div>
</main>
$footer
EOF;
