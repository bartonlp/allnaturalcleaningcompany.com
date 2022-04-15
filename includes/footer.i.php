<?php
// BLP 2022-04-10 - update for SiteClass 3.2.1
// Footer file

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
<!--
  This div has the 'twitter', 'facebook' and 'g+' icons and links.
  It uses "FontAwesome" from the "https://bartonphillips.net/css/allnatural/social/font/"
  directory. FontAwesome has gliphs for the social media companies. XXX
-->
<div class="social">
  <a href="http://twitter.com" class="icon-button twitter">
    <i class="icon-twitter">&nbsp;</i>
    <span>&nbsp;</span>
  </a>
  <a href="https://www.facebook.com/allnaturalcleaningcompany/"
    class="icon-button facebook">
    <i class="icon-facebook">&nbsp;</i>
    <span>&nbsp;</span>
  </a>
</div>
<!--
  Normal footer
-->
<footer>
<!-- https://allnaturalcleaningcompany.com footer.i.php -->
<address>
$b->copyright
$lastmod
</address>
</footer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121110438-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-121110438-1');
</script>
$geo
$b->script
$b->inlineScript
</body>
</html>
EOF;
