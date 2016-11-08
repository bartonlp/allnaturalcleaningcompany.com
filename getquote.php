<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
//ErrorClass::setDevelopment(true);
$S = new $_site['className']($_site);

$h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

$h->css =<<<EOF
  <style>
.title {
        font-family: 'Tangerine', serif;
        text-align: center;
}
.title {
        font-family: 'Tangerine', serif;
        text-align: center;
}
main {
  padding: 1rem;
}
h1 {
  text-align: center;
}
select {
  background-color: white;
  font-size: 1rem;
}
span {
  color: red;
}
button {
  border: 1px solid black;
  border-radius: .5rem;
  background-color: green;
  color: white;
  padding: .5rem;
}
th {
  text-align: left;
}
pre {
  padding: 1rem;
}
.center {
  text-align: center;
}
  </style>
EOF;

$h->script = <<<EOF
  <script src="http://bartonphilliips.net/js/allnatural/js/maskedinput.js"></script>
  <script>
jQuery(document).ready(function($) {
  $("main .phone").mask("999-999-9999? ext 9999");
});
  </script>
EOF;

$h->title = "Get A Quote - All Natural Cleaning Company";
$h->desc = "Get a Quote for Home or Commercial cleaning in Albuquerque. Cheamical free cleaning. Residential and Commercial cleaning.";

list($top, $footer) = $S->getPageTopBottom($h, $b);

// POST Date from form.

if($_POST) {
  $keys = $values = $info = '';
  
  foreach($_POST as $k=>$v) {
    $keys .= "$k,";
    $values .= "'". $S->escape($v) ."',";
    $info .= "$k: $v\n";
  }
  $keys = rtrim($keys, ',');
  $values = rtrim($values, ',');
  $sql = "insert into getquote ($keys) values($values)";

   $S->query($sql);
   mail(EMAILADDRESS, "Get Quote", $info, "From: info@allnaturalcleaningcompany.com");
  echo <<<EOF
$top
<main>
<h1 class="title">Your Quote</h1>
<pre>$info</pre>
<h2>Your Data Has Been Sent</h2>
<p>Thank You</p>
</main>
$footer
EOF;
  exit();
}

echo <<<EOF
$top
<main>
<h1 class="title">Get A Quote</h1>

<h2 class="center">All Natural Cleaning Company</h2>

<p><span>Items with an * are required.</span></p>
<form action="getquote.php" method="post">
<table>
<tbody>
<tr><th>Full Name <span>*</span></th><td><input type="text" autofocus required name="name"></td></tr>
<tr><th>E-mail <span>*</span></th><td><input type="email" name="email" required></td></tr>
<tr><th>Phone Number <span>*</span></th><td><input type="tel" name="phone" class="phone" required></td></tr>
<tr><th>Address</th><td><input type="text" name="address"></td></tr>
<tr><th>City</th><td><input type="text" name="city"></td></tr>
<tr><th>State</th><td><input type="text" name="state"></td></tr>
<tr><th>Zip Code</th><td><input type="zipcode" name="zipcode"></td></tr>
<tr><th>Type of Service</th>
<td><select name="service">
  <option>Residential Cleaning</option>
  <option>Commercial Cleaning</option>
  <option>Other ('Additional Info' below)</option>
</select></td></tr>
<tr><th>Frequency</th>
<td><select name="frequency">
  <option>One Time</option>
  <option>Weekly</option>
  <option>Every Other Week</option>
  <option>Monthly</option>
  <option>Other ('Additional Info' below)</option>
</select></td></tr>
<tr><th>Approx. Square Footage</th><td><input type="number" name="sqrfeet"></td></tr>
<tr><th>Additional Info</th><td><textarea name="extrainfo"></textarea></td><tr>
</tbody>
</table>
<button type="submit">Get A Quote</button>
</form>
<p>Or <a href="contact.php">Call up for a quote $S->__Phone</a></p>
</main>
$footer
EOF;
