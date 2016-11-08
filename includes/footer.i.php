<?php
// Footer file
$google =<<<EOF
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80497078-1', 'auto');
  ga('send', 'pageview');

</script>
EOF;

$statcounter = <<<EOF
<!-- Start of StatCounter Code for Default Guide -->
<script>
var sc_project=11038676; 
var sc_invisible=1; 
var sc_security="3fe8bab6"; 
var sc_https=1; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' async src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hit counter"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="//c.statcounter.com/11038676/0/3fe8bab6/1/" alt="hit
counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
EOF;

$hubspot = <<<EOF
<!-- Start of Async HubSpot Analytics Code -->
  <script>
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/2461465.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script>
<!-- End of Async HubSpot Analytics Code -->
EOF;

// Render the Footer

$lastmod = date("M j, Y H:i", getlastmod());

return <<<EOF
<style>
.social {
  text-align: center;
  margin-bottom: 1em;
}
.icon-button {
  font-size: 1.5em;
}
</style>

<div class="social">
<!-- fb.me/allnaturalcleaningcompany -->
<span itemscope itemtype="http://schema.org/Organization">
  <link itemprop="url" href="http://www.allnaturalcleaningcompany.com">
    <a itemprop="sameAs" href="http://twitter.com/minimalmonkey" class="icon-button twitter">
      <i class="icon-twitter"></i>
      <span></span>
    </a>
    <a itemprop="sameAs" href="https://www.facebook.com/All-Natural-Cleaning-Company-495591230635431/" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
    <a href="http://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
</span>  
</div>

<footer>
<address>
  Copyright &copy; $this->copyright<br>
  Last Modified: $lastmod
</address>
</footer>
$statcounter
</body>
</html>
EOF;
