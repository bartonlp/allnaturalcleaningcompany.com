<?php
echo <<<EOF
<!doctype html>
<head>
  <style>
.container {
  display: grid;
  grid-template-columns: 40px 50px auto 50px 40px;
  grid-template-rows: 25% 100px auto;
}
  </style>
</head>
<body>
<div class="container">
  <div class="item1">test1</div>
  <div class="item2">test2</div>
  <div class="item3">test3</div>
</div>
</body>
</html>
EOF;
