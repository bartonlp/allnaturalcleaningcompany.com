<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);
$h->title = "All Natural Cleaning";
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
<h1 class="title">About us:</h1>
<img id="image1" src="images/AdobeStock_91295220-1.png">

<p> All natural cleaning is the first janitorial cleaning company in the state of New Mexico and
possibly the country to use nothing but 100 percent natural cleaning products like white vinegar,
baking soda, lemon, corn starch, hydrogen peroxide, flour, Isopropyl Alcohol, Lavender oil and many
other naturally occurring products.  We research each and every ingredient we use. Most cleaning
companies use more dangerous and potent products to get the job done fast regardless of the health
consequences to their clients. Do you really know what kinds of chemicals are being used to clean
your home or work?</p>

<p>As for the green cleaning products used by many janitorial companies today,
these products are being produced by the same companies that were producing the old toxic products.
They contain toxins but a lesser level than before.  We have decided to err on the safe side and use
nothing but natural stuff, the majority of our products are 100 percent edible. We are a small
business that is locally owned and operated ready to make a difference in people's lives.
After we clean your home or office you will feel a lot better and we will show you how to get rid of
all the toxins around the house or office that are killing you slowly.  If you care about your
health, the health of your loved ones or those you work </p>

<p>  
We do not use green products simply because 98 percent of them are not telling the truth about their
ingredients also the law does not require them to tell the truth. These products are being produced
by the same companies that were producing the old toxic products or by their subsidiaries to make it
look like a new Green company. So the consumer will not relate the two together even though it is one
company.  We have researched a lot of the so called Green products; we found them to be more
expensive and many of their products are harmful either short term or long term. We did not want to
take a chance on our client's health.  Your health and your family's health cannot be trusted to
corporate America. When it comes to making billions of dollars of profit versus keeping you healthy
who do you think will win?
</p>

<p>
I'll let you answer that question.
</p>

<p>
You care about your health, the health of your loved ones, and those you work with. Call us today; (888)123-4567.
</p>
<p><a href="getquote.php">Get a Quote</a> or
<a href="contact.php">call us for a quote</a></p>
</main>
$footer
EOF;
