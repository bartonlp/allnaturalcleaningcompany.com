<?php
// BLP 2018-06-21 -- NOTE we are using PUG and this is ONLY used if the xxx.php is the url!
//  See the pug/layout.pug!

return <<<EOF
<header id="header">
<!-- https://allnaturalcleaningcompany.com banner.i.php -->
<img src="https://bartonphillips.net/images/allnatural/BubbleLogo.png" alt="bubble-logo">
$image1
$imsge2
<div>All Natural Cleaning Company <span class="phone">Call Us Today: $this->__Phone</span>

<!-- Big Nav bar for large screens -->
<!--  <span id="bignavbar"> -->
    <ul id="bignavbar">
      <li><a href="index.php">Home</a></li>
      <li><a href="residential.php">Residential</a></li>
      <li><a href="commercial.php">Commercial</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="https://allnaturalcleaningcompany.blogspot.com">Blog</a></li>
      <li><a href="contactus.php">Contact</a></li>
    </ul>
<!--  </span> -->

<!-- Small Nav bar for smaller screens, phones and tablets -->
  <div id="smallnavbar">
    <label for="smallmenu" class="xicon-menu">Menu</label>
    <input type="checkbox" id="smallmenu">

    <ul id="smenu">
      <li><a href="/index.php">Home</a></li>
      <li><a href="/residential.php">Residential</a></li>
      <li><a href="/commercial.php">Commercial</a></li>
      <li><a href="/about.php">About</a></li>
      <li><a href="https://allnaturalcleaningcompany.blogspot.com">Blog</a></li>
      <li><a href="/contactus.php">Contact</a></li>
    </ul>
  </div>
  
</div>

<noscript id="noscript">
<style>
html {
  display:block;
}
</style>
<p>
$image3
Your browser either does not support <b>JavaScripts</b> or you have JavaScripts disabled, in either case your browsing
experience will be significantly impaired. If your browser supports JavaScripts but you have it disabled consider enabling
JavaScripts conditionally if your browser supports that. Sorry for the inconvienence.</p>
</noscript>
</header>
EOF;
