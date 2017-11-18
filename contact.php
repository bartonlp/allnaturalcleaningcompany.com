<?php
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("SITELOAD")."/siteload.php");
//ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);
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
        padding: 1rem;
        background-image: url(http://bartonphillips.net/images/allnatural/AdobeStock_51734467.jpg);
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
pre {
        background-color: white;
        padding: 5px;
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
$h->desc = "Contact Us at 120 Madeira NE . Albuquerque , NM 87108. All Natural Cleaning Company. Toxin free Home and Commercial cleaning.";
$h->banner = "<h1>Contact Us</h1>";

list($top, $footer) = $S->getPageTopBottom($h, $b);

// Submit from main page

if(isset($_POST['submit'])) {
  extract($_POST);
  $subject = $S->escape($subject);
  $message = $S->escape($message);
  
  $S->query("insert into contact_emails (site, email, name, subject, message, created) ".
            "values('$S->siteName', '$email', '$name', '$subject', '$message', now())");

  $info = <<<EOF
site: $S->siteName\n
email: $email\n
name: $name\n
subject: $subject\n
message: $message\n
EOF;

   mail(EMAILADDRESS, "$subject", "$info", "From: allnatural@allnaturalcleaningcompany.com");
  
  // The Submit page

  echo <<<EOF
$top
<main>
<h1>Thank You for your email</h1>
<pre>$info
<a href="/index.php">Return to home page</a>
</pre>
</main>
$footer
EOF;
  
  exit();
}

// Main Page

$hq = <<<EOF
<b>All Natural Cleaning Company</b><br>
$S->__Address, $S->__City<br>
$S->__State, $S->__Zip<br>
Phone: $S->__Phone<br>
Fax: $S->__Fax<br>
Email: <a href="mailto:allnaturalcleaningcompany@gmail.com">allnaturalcleaningcompany@gmail.com</a>
EOF;

$appointment = <<<EOF
Make an Appointment<br>
just call us 7AM to 5PM:<br>
EOF;

$appointment = '';

$phones = <<<EOF
<div>
  <p>Mailing Address<br>
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
<button name='submit'>Submit</button>
</form>
<div id="getquote">
<a class="callus" href="getquote.php">Get A Quote</a>
</div>
</main>
<br>
$footer
EOF;
