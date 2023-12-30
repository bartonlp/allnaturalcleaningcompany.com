<?php
// BLP 2018-06-21 -- NOTE we are using PUG and this is ONLY used if the xxx.php is the url!
//  See the pug/layout.pug!
// BLP 2023-08-10 - add style to not display $image2. Also correct spelling, it is $image2 not
// $imge2. That could be why I was not seeing any normals.

return <<<EOF
<header id="header">
<!-- https://allnaturalcleaningcompany.com banner.i.php -->
<img src="https://bartonphillips.net/images/allnatural/BubbleLogo.png" alt="bubble-logo">
<style> #headerImage2 { display: none; } </style>
$image2

<div>All Natural Cleaning Company</div>
<noscript>
<p style='color: red; background-color: #FFE4E1; padding: 10px'>
$image3
Your browser either does not support <b>JavaScripts</b> or you have JavaScripts disabled, in either case your browsing
experience will be significantly impaired. If your browser supports JavaScripts but you have it disabled consider enabling
JavaScripts conditionally if your browser supports that. Sorry for the inconvienence.</p>
</noscript>
</header>
EOF;
