<?php
/*
CREATE TABLE `getquote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `frequency` varchar(30) DEFAULT NULL,
  `sqrfeet` int DEFAULT NULL,
  `extrainfo` text,
  `verify` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
*/

$_site = require_once(getenv("SITELOADNAME"));
//ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://bartonphillips.net/js/allnatural/js/maskedinput.js"></script>
  <script>
jQuery(document).ready(function($) {
  $("main .phone").mask("999-999-9999? ext 9999");
});
  </script>
EOF;

$h->title = "Get A Quote - All Natural Cleaning Company";

[$top, $footer] = $S->getPageTopBottom($h, $b);

$recaptcha = require_once("/var/www/PASSWORDS/allnatural-recaptcha.php"); // This is an assoc array

// POST Date from form.

if($_POST) {
  $keys = $values = $info = '';

  $post['response'] = $_POST['g-recaptcha-response'];
  $post['secret'] = $recaptcha['secretKey']; // google grcapcha key
  unset($_POST['g-recaptcha-response']);
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $ret = curl_exec($ch);
  $retAr = json_decode($ret, true);

  foreach($_POST as $k=>$v) {
    if($k == 'submit') continue;
    $keys .= "$k,";
    $values .= "'". $S->escape($v) ."',";
    $info .= "$k: $v\n";
  }

  $agent = substr($S->agent, 0, 254);
  
  $keys = "ip, agent, " . $keys . 'verify';
  $verify = $retAr['success'] == '1' ? 1 : 0;
  $values = "'$S->ip', '$agent', $values" . $verify;
  $reason = $retAr['error-codes'][0];

  $sql = "insert into getquote ($keys) values($values)";

  $S->query($sql);

  $address = $S->EMAILADDRESS;
  //$address = "bartonphillips@gmail.com";
  
  if($verify == 1) {
    mail($address, "Get Quote", $info, "From: info@allnaturalcleaningcompany.com\r\nBcc: bartonphillips@gmail.com", "-fbarton@bartonphillips.com");
    
    $msg = <<<EOF
<main>
<h1 class="title">Your Quote</h1>
<pre>$info</pre>
<h2>Your Data Has Been Sent</h2>
<p>Thank You</p>
<p>This page will redirect to <a href="index.php"><b>The Home Page</b></a> in five seconds.</p>
</main>
EOF;
    header( "refresh:5;url=index.php" );
  } else {
    $msg = <<<EOF
<main>
<h1>Failed Verification. Try Again.</h1>
<p>$reason</p>
<p>This page will redirect to <a href="contactus.php"><b>Contact Us</b></a> in five seconds.</p>
$footer
EOF;
    header( "refresh:5;url=contactus.php" );
  }
  
  echo <<<EOF
$top
$msg
$footer
EOF;
  exit();
}

// Start Page

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
<tr><th>Approx. Square Footage</th><td><input type="number" name="sqrfeet" value="0"></td></tr>
<tr><th>Additional Info</th><td><textarea name="extrainfo"></textarea></td><tr>
</tbody>
</table>
<div class="g-recaptcha" data-sitekey="{$recaptcha['siteKey']}"></div>
<button type="submit">Get A Quote</button>
</form>
<p>Or <a href="contactus.php">Call up for a quote $S->__Phone</a></p>
</main>
$footer
EOF;
