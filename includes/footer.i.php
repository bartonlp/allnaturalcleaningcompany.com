<?php
// BLP 2021-12-15 -- add geo.js
// BLP 2021-10-24 -- counterWigget and lastmod passed in form getPageFooter($b). We don't use
// counterWigget.
// BLP 2021-04-11 -- g+ is no more.
// BLP 2018-06-21 -- NOTE we are using PUG and this is ONLY used if the xxx.php is the url!
//  See the pug/layout.pug!

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
    <i class="icon-twitter"></i>
    <span></span>
  </a>
  <a href="https://www.facebook.com/allnaturalcleaningcompany/"
    class="icon-button facebook">
    <i class="icon-facebook"></i>
    <span></span>
  </a>
</div>
<!--
  Normal footer
-->
<footer>
<address>
  Copyright &copy; $this->copyright<br>
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
{$b->script}
</body>
</html>
EOF;
