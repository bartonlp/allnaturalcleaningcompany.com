<?php
// BLP 2018-06-21 -- NOTE we are using PUG and this is ONLY used if the xxx.php is the url!
//  See the pug/layout.pug!

return <<<EOF
<header id="header">
<img src="https://bartonphillips.net/images/allnatural/BubbleLogo.png" alt="bubble-logo">
<img id="logo" data-image="" src="https://bartonphillips.net/images/blank.png" alt="blank image">
<img id="dummyimg" src="https://bartonphillips.net/tracker.php?page=noscript&id=$this->LAST_ID">
<div>All Natural Cleaning Company <span class="phone">Call Us Today: $this->__Phone</span>

<!-- Big Nav bar for large screens -->
  <span id="bignavbar">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="residential.php">Residential</a></li>
      <li><a href="commercial.php">Commercial</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="https://allnaturalcleaningcompany.blogspot.com">Blog</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </span>

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
      <li><a href="/contact.php">Contact</a></li>
    </ul>
  </div>
  
</div>

<noscript id="noscript">
<style>
html {
  display:block;
}
</style>
<link rel="stylesheet" href="https://bartonphillips.net/css/allnatural/css/allnatural.css"/>
<p>
<img src="https://bartonphillips.net/tracker.php?page=noscript&id=$this->LAST_ID" alt="noscript image">
Your browser either does not support <b>JavaScripts</b> or you have JavaScripts disabled, in either case your browsing
experience will be significantly impaired. If your browser supports JavaScripts but you have it disabled consider enabaling
JavaScripts conditionally if your browser supports that. Sorry for the inconvienence.</p>
</noscript>
</header>
EOF;
