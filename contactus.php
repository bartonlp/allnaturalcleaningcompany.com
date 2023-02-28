<?php
// BLP 2023-02-25 - use new approach

$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);
$S->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

// BLP 2022-02-04 -- add recaptcha
$S->h_script = <<<EOF
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
EOF;

$recaptcha = require_once("/var/www/PASSWORDS/allnatural-recaptcha.php"); // This is an assoc array

$S->css = <<<EOF
.title {
  font-family: 'Tangerine', serif;
  text-align: center;
}
main {
  padding: 1rem;
  background-image: url(https://bartonphillips.net/images/allnatural/AdobeStock_51734467.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
main >div {
  margin: auto;
  width: 70%;
  display: flex;
  justify-content: space-around;
  margin-bottom: 1rem;
}
main >div p {
  border: .2rem groove green;
  padding: .2rem;
  background-color: #FBF5E6;
}
main >form {
  width: 70%;
  opacity: 1;
  margin: auto;
  padding: 1rem;
  border: 1px solid black;
  background-color: white;
}
main >form p {
  text-align: center;
} 
main >form span {
  font-size: 1.5rem;
}
main >form table td {
  padding: .5rem;
}
#info {
  background-color: white;
  padding: 10px;
  text-align: left;
  display: block;
}
#getquote {
  width: 10rem;
  margin: 1rem auto;
}
#getquote .callus {
  display: inline-block;
  padding: 1rem;
  background-color: lightblue;
  border: 1px solid black;
  border-radius: .5rem;
  text-decoration: none;
  text-align: center;
}
button { background: green; color: white; }  
@media (max-width: 760px) {
  main >form {
    margin-left: 1%;
    margin-right: .5%;
  }
  main table td {
    padding: .1rem;
  }
}
@media (max-width: 550px) {
  main >form {
    width: 95%;
  }
}
EOF;

$S->title = "Contact Us - All Natural Cleaning Company";
$S->banner = "<h1>Contact Us</h1>";

[$top, $footer] = $S->getPageTopBottom();

// Submit from main page

if(isset($_POST['submit'])) {
  extract($_POST); // email, name, subject, msg
  $subject = $S->escape($subject);
  $msg = $S->escape($msg);
  $response = $_POST['g-recaptcha-response'];
  $secret = $recaptcha['secretKey']; // google grcaptcha key

  $options = ['http' => [
                         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                         'method'  => 'POST',
                         'content' => http_build_query(["response"=>$response, "secret"=>$secret])
                        ]
             ];

  // Now we create a context from the options

  $context  = stream_context_create($options);

  // Now this is going to do a POST!
  // NOTE we must have the full url with https!
  // If we are doing a post that does not need to return anything we can avoid the assignment.

  $ret = file_get_contents("https://www.google.com/recaptcha/api/siteverify", false, $context);
  $retAr = json_decode($ret, true);

  $msg = <<<EOF
Name: $name
Email: $email
Message: $msg
EOF;
  
  $verify = empty($retAr['success']) ? 0 : 1; 
  $reason = $retAr['error-codes'][0];

  $agent = substr($S->agent, 0, 254);
  
  $S->query("insert into $S->masterdb.contact_emails (site, ip, agent, subject, message, verify, reason, created, lasttime) ".
            "values('$S->siteName', '$S->ip', '$agent', '$subject', '$message', '$verify', '$reason', now(), now())");
  
  if($verify == '1') {
    $address = $S->EMAILADDRESS;
    //$address = 'barton@bartonphillips.com';

    mail($address, "AllNaturalInfoRequest", "$msg", "From: $S->EMAILFROM\r\nBcc: bartonphillips@gmail.com", "-fbarton@bartonphillips.com");

    $msg = <<<EOF
<main>
<h1>Thank You for your email</h1>
<div id="info">
$msg
</div>
</main>
<p>This page will redirect to <a href="index.php"><b>the Home Page</b></a> in five seconds.</p>
EOF;
    header( "refresh:5;url=index.php" );
  } else {
    $msg = <<<EOF
<main>
<h1>Captcha Failed. Try Again</h1>
<p>$reason</p>
<a style='background: white; padding: 10px;' href='contactus.php'>Return to Contact Us</a><hr>"
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

// Main Page

$hq = <<<EOF
<b>All Natural Cleaning Company</b><br>
Email: <a href="mailto:allnaturalcleaningcompany@gmail.com">allnaturalcleaningcompany@gmail.com</a>
EOF;

$appointment = <<<EOF
Make an Appointment<br>
just call us 7AM to 5PM:<br>
EOF;

$appointment = '';

$phones = <<<EOF
<div>
  <p>Email Address<br>
$hq</p>
</div>
EOF;

$val = $_GET["value"];

// Render Page

echo <<<EOF
$top
<main>
<h1 class="title">Contact Us</h1>
$phones
<form method='post'>
<p><span>Send Us an Email</span><br>Please fill in this form.</p>
<table>
<tbody>
<tr><td>Email</td><td><input id='email' type='email' name='email' autofocus required></td></tr>
<tr><td>Name</td><td><input id='name' type='text' name='name' required></td></tr>
<tr><td>Subject</td><td><input id='subject' type='text' name='subject' value='$val' required></td></tr>
<tr><td>Message</td><td><textarea id='message' name='msg' required></textarea></td></tr>
</tbody>
</table>
<div class="g-recaptcha" data-sitekey={$recaptcha['siteKey']}></div>
<button name='submit'>Submit</button>
</form>
<div id="getquote">
<a class="callus" href="getquote.php">Get A Quote</a>
</div>
</main>
<br>
$footer
EOF;
