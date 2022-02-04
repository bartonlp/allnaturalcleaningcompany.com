<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOADNAME"));
//ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);
$h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

// BLP 2022-02-04 -- add recaptcha
$h->script = <<<EOF
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
EOF;

$h->css = <<<EOF
  <style>
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
  </style>
EOF;

$h->title = "Contact Us - All Natural Cleaning Company";
$h->desc = "Contact Us at allnatural@allnaturalcleaningcompany.com. All Natural Cleaning Company. Toxin free Home and Commercial cleaning.";
$h->banner = "<h1>Contact Us</h1>";

list($top, $footer) = $S->getPageTopBottom($h, $b);

// Submit from main page

if(isset($_POST['submit'])) {
  extract($_POST);
  $subject = $S->escape($subject);
  $message = $S->escape($message);
  $post['response'] = $_POST['g-recaptcha-response'];
  $post['secret'] = "6LfRzVgeAAAAALWlx1YcjVdzGyBt62DKszulrqeX"; // google grcapcha key
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $ret = curl_exec($ch);
  //vardump('ret', $ret);
  $retAr = json_decode($ret, true);
  //vardump("retAr", $retAr);
  
  $verify = $retAr['success'] == "1" ? 1 : "0";
  $reason = $retAr['error-codes'][0];

  $S->query("insert into contact_emails (site, email, name, subject, message, verify, reason, created) ".
            "values('$S->siteName', '$email', '$name', '$subject', '$message', '$verify', '$reason', now())");

  $message = preg_replace("~\\\\r\\\\n~", "<br>", $message);

  $info = <<<EOF
Site: $S->siteName<br>
Email: $email<br>
Name: $name<br>
Subject: $subject<br>
Message:<br>
$message
EOF;
  if($verify == '1') {
    //$infoMail = preg_replace("~\n~", "<br>", $info);

    $headers = array(
    'From' => "$S->EMAILFROM",
    'Reply-To' => "$S->EMAILFROM",
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/HTML; charset=ISO-8859-1' ,
    'Bcc' => 'bartonphillips@gmail.com',
    'X-Mailer' => 'PHP/' . phpversion()
    );

    $address = $S->EMAILADDRESS;
    //$address = 'barton@bartonphillips.com';

    //echo "to: $address , info: $info, headers: ".print_r($headers, true);

    mail($address, "AllNaturalInfoRequest", "$info", $headers, "-fbarton@bartonphillips.com");

    $msg = "<h1>Thank You for your email</h1>";
    // The Submit page
  } else {
  $msg = <<<EOF
<h1>Captcha Failed. Try Again</h1>
<p>$reason</p>
<a style='background: white; padding: 10px;' href='contact.php'>Return to Contact Us</a><hr>";
EOF;
  }
  echo <<<EOF
$top
<main>
$msg
<div id="info">
$info
</div>
</main>
<a href="/index.php">Return to home page</a>
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
<tr><td>Email Address</td><td><input id='email' type='email' name='email' autofocus required></td></tr>
<tr><td>Your Name</td><td><input id='name' type='text' name='name' required></td></tr>
<tr><td>Subject</td><td><input id='subject' type='text' name='subject' value='$val' required></td></tr>
<tr><td>Message</td><td><textarea id='message' name='message' required></textarea></td></tr>
</tbody>
</table>
<div class="g-recaptcha" data-sitekey="6LfRzVgeAAAAAEqAA0OYYn4mTjvLfm6823AmRiBz"></div>
<button name='submit'>Submit</button>
</form>
<div id="getquote">
<a class="callus" href="getquote.php">Get A Quote</a>
</div>
</main>
<br>
$footer
EOF;
