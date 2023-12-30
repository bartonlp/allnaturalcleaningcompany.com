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

<footer>
<!-- https://allnaturalcleaningcompany.com footer.i.php -->
<address>
$b->copyright
$lastmod
</address>
</footer>
</body>
</html>
EOF;
