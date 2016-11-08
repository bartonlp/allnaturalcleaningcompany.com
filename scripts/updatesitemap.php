#!/usr/bin/php
<?php
$path = getcwd();
  
$file = file_get_contents($path ."/sitemap-new.txt");
$files = json_decode($file);

$sitemap = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<urlset  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

EOF;

foreach($files as $file) {
  $sitemap .= "\t<url>\n\t\t<loc>$file->item</loc>\n";
  if($file->lastmod != "no") {
    $thisfile = basename($file->item);
    $time = gmdate("Y-m-d\TH:i:s\Z", filemtime($path ."/$thisfile"));
    $sitemap .= "\t\t<lastmod>$time</lastmod>\n";
  }
  $sitemap .= "\t\t<changefreq>$file->frequency</changefreq>\n";
  $sitemap .= "\t\t<priority>$file->priority</priority>\n";
  $sitemap .= "\t</url>\n";
}
$sitemap .= "</urlset>\n";

echo $sitemap;

