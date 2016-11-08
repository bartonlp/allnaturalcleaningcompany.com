<?php
require_once("MySitemap.php");
$json = json_encode($siteinfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

echo "\n<pre>$json</pre>\n";

file_put_contents("./mysitemap.json", $json);
