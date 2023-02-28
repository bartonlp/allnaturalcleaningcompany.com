<?php
// BLP 2023-02-25 - use new approach
/*
CREATE TABLE `employment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) DEFAULT NULL,
  `agent` varchar(254) DEFAULT NULL,
  `message` text,
  `verify` tinyint(1) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
*/

$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

$S->h_script = <<<EOF
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
EOF;

$recaptcha = require_once("/var/www/PASSWORDS/allnatural-recaptcha.php"); // This is a assoc array

if($_POST['submit']) {
  //vardump($_POST);  
  extract($_POST);
  $post['response'] = $_POST['g-recaptcha-response'];
  $post['secret'] = $recaptcha['secretKey']; // google grcapcha key
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $ret = curl_exec($ch);
  $retAr = json_decode($ret, true);

  $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  
  $coinfo = $avfrom = $avtill = $r = $rphone = $dble = '';

  for($i=0; $i < 2; ++$i) {
    $coinfo .= "company: $company[$i], From: $from[$i], To: $to[$i]\n".
               "phone: $companyphone[$i], Job: $jobtitle[$i], Super: $supername[$i]\n";
  }
  
  foreach($av_from as $key=>$val) {
    $avfrom .= "$days[$key]: $val\n";
  }
  foreach($av_till as $key=>$val) {
    $avtill .= "$days[$key]: $val\n";
  }
  foreach($dbl as $key=>$val) {
    $dble .= "$days[$key]: $val\n";
  }
  
  foreach($ref as $key=>$val) {
    $r .= "ref$key: $val\n";
  }
  foreach($refphone as $key=>$val) {
    $rphone .= "refphone$key: $val\n";
  }
  
  $msg = <<<EOF
Full name: $name
Email: $email
Address: $address
Primary Phone: $phone
Legal: $legal
Can Start: $start

$coinfo
Available from:
$avfrom
Till
$avtill
Can Work Double
$dble
Reference
$r
Ref Phone
$rphone
EOF;

  $verify = $retAr['success'] == "1" ? 1 : "0";
  $reason = $retAr['error-codes'][0];
  $agent = substr($S->agent, 0, 254);
  
  $S->query("insert into employment (ip, agent, message, verify, reason, created, lasttime) ". 
            "values('$S->ip', '$agent', '$msg', '$verify', '$reason', now(), now())");

  if($verify == 1) {
    $address = $S->EMAILADDRESS;
    //$address = "bartonphillips@gmail.com";
    mail($address, "Employment Request", $msg, "From: allnatural@allnaturalcleaningcompany.com\r\nBcc: bartonphillips@gmail.com", "-fbarton@bartonphillips.com");
    header("refresh:5;url=index.php");    

    $msg = <<<EOF
<h1>Message Sent</h1>
<pre>$msg</pre>
<a href="index.php">Back to Home Page</a>
EOF;
  } else {
    header("refresh:5;url=employment.php");

    $msg = <<<EOF
<main>
<h1>Captcha Failed. Try Again</h1>
<p>$reason</p>
<a href='contactus.php'>Return to Employment</a>
EOF;
  }

  $S->title = "Employment Posted";
    
  [$top, $footer] = $S->getPageTopBottom();

  echo <<<EOF
$top
$msg
$footer
EOF;

  exit();
}

// Start Main

$S->title = "Employment";
$S->css = <<<EOF
main {
  margin: auto;
  display: flex;
  justify-content: space-around;
}
#personel, #history, #available, #references {
  background-color: white;
  border: 1px solid black;
  width: 98%;
  margin-left: 2%;
}
th, td {
  border: 1px solid black;
  padding: .3rem;
}
input {
  width: 100%;
  border: none;
}
input:focus {
  outline: none;
  box-shadow: none;
}
input[type='radio'] {
  width: .7rem;
  height: .7rem;
  vertical-align: middle;
}
input[type='submit'] {
  border-radius: .5rem;
  width: 5rem;
  margin: 5px 2%;
  padding: .5rem;
  background-color: green;
  color: white;
}
.dblshift td {
  font-size: .8rem;
}
h1 {
  text-align: center;
}
.g-recaptcha { margin: 5px 2%; }
@media (max-width: 600px) {
  main {
    display: block;
  }
}
EOF;

[$top, $footer] = $S->getPageTopBottom();

echo <<<EOF
$top
<h1>Employment Application</h1>

<main>
<form method="post">
<table id="personel">
<thead>
<tr><th>Personal Information</th></tr>
</thead>
<tbody>
<tr>
<td><input type='text' name='name' placeholder="Enter Full Name (required)" required autofocus></td>
</tr>
<tr>
<td><input type='email' name='email' placeholder="Email Address (required)" required></td>
</tr>
<tr>
<td><input type='text' name='address' placeholder="Address, City, State and zipcode"></td>
</tr>
<tr>
<td><input type='tel' name='phone' pattern="(\(\d{3}\)\d{3}-\d{4})|(\d{10})"
placeholder="Primary phone number (required)" required
title="Phone format (999)999-9999 or 999999999"></td>
</tr>
<tr>
<td>Are you legally allowed to work in the United States<br>
  <label for="ck1">YES</label><input id="ck1" type='radio' name='legal' value='yes' required>&nbsp;&nbsp;
  <label for="ck2">NO</label><input id="ck2" type='radio' name='legal' value='no' required>
</td>
</tr>
<tr>
<td>When can you start working (required) <input type='text' class='date' name='start' required></td>
</tr>
</tbody>
</table>
<br>

<table id="history">
<thead>
<tr><th colspan=3>Employment Information</th></tr>
</thead>
<tbody>
<tr>
<td><input type='text' name='company[]' placeholder="Company you worked for"></td>
<td><input type='text' class='date' name='from[]'placeholder="From: mm/dd/yyyy"></td>
<td><input type='text' class='date' name='to[]' placeholder="To: mm/dd/yyyy"></td>
</tr>
<tr>
<td><input type='tel' name='contactphone[]' placeholder="Company phone"></td>
<td><input type='text' name='jobtitle[]' placeholder="Job title"></td>
<td><input type='text' name='supername[]' placeholder="Supervisors Name"></td>
</tr>
<tr><td colspan=3></td></tr>
<tr>
<td><input type='text' name='company[]' placeholder="Company you worked for"></td>
<td><input type='text' class='date' name='from[]' placeholder="From: mm/dd/yyyy"></td>
<td><input type='text' class='date' name='to[]' placeholder="To: mm/dd/yyyy"></td>
</tr>
<tr>
<td><input type='tel' name='contactphone[]' placeholder="Company phone"></td>
<td><input type='text' name='jobtitle[]' placeholder="Job title"></td>
<td><input type='text' name='supername[]' placeholder="Supervisors Name"></td>
</tr>
<tr>
</tbody>
</table>
<br>
<table id="available">
<thead>
<tr><th colspan=8>Shift Availability</th></tr>
</thead>
<tbody>
<tr><td></td><th>Monday</th><th>Tuesday</th><th>Wednesday</th>
<th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr>
<tr><th>From</th>
<td><input type='text' name='av-from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_from[]' placeholder="hh:mm am/pm"></td>
</tr>
<tr><th>Till</th>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
<td><input type='text' name='av_till[]' placeholder="hh:mm am/pm"></td>
</tr>
<tr class="dblshift">
<th>Double Shift</th>
<td>Yes:<input type="radio" name='dbl[0]' value="yes"> No:<input type="radio" name='dbl[0]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[1]' value="yes"> No:<input type="radio" name='dbl[1]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[2]' value="yes"> No:<input type="radio" name='dbl[2]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[3]' value="yes"> No:<input type="radio" name='dbl[3]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[4]' value="yes"> No:<input type="radio" name='dbl[4]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[5]' value="yes"> No:<input type="radio" name='dbl[5]' value="no"></td>
<td>Yes:<input type="radio" name='dbl[6]' value="yes"> No:<input type="radio" name='dbl[6]' value="no"></td>
</tr>
</tbody>
</table>
<br>

<table id="references">
<thead>
<tr><th colspan=2>References</th></tr>
</thead>
<tbody>
<tr><td><input type='text' name='ref[]' placeholder="Name"></td><td><input type='tel' name='refphone[]' placeholder="Phone"></td></tr>
<tr><td><input type='text' name='ref[]' placeholder="Name"></td><td><input type='tel' name='refphone[]' placeholder="Phone"></td></tr>
<tr><td><input type='text' name='ref[]' placeholder="Name"></td><td><input type='tel' name='refphone[]' placeholder="Phone"></td></tr>
</tbody>
</table>
<div class="g-recaptcha" data-sitekey={$recaptcha['siteKey']}></div>
<input type='submit' name="submit" value="Submit">
</form>
</main>
<hr>
$footer
EOF;
