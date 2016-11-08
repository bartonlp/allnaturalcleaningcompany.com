<?php
// BLP 2016-08-06 -- BLOG for allnatural  
//$AutoLoadDEBUG = 1;
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);

session_start();

// Switch to correct page

switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
  case 'POST':
    switch($_POST['page']) {
      case 'postcreate': // insert new post into database
        postcreate($S);
        break;
      case 'postedit': // update a post to database
        postedit($S);
        break;
      case 'show': // show/edit item. Can call postedit
        show($S);
        break;
      case 'postlogin':
        postlogin($S);
        break;
      case 'postcomment':
        postcomment($S);
        break;
      case 'docomment':
        docomment($S);
        break;
      case 'readcomments':
        readcomments($S);
        break;
        
      default:
        echo "bad post<br>";
        break;
    }
    break;
  case 'GET':
    switch($_GET['page']) {
      case 'newpost': // create a new blog post. Calls postcreate.
        newpost($S);
        break;
      case 'login':
        login($S);
        break;
      case 'comment':
        comment($S);
        break;
        
      default: // Default GET action is to show the start page
        start($S);
        break;
    }
    break;
  default:
    throw(new Exception("Not GET or POST: {$_SERVER['REQUEST_METHOD']}"));
    break;
}

exit();

// POST. Post an Edit.

function postedit($S) {
  extract($_POST);
  $S->query("update blog set email='$email', title='$title', msg='$msg', lasttime=now() where id=$item");
  start($S);
}

// Show an item with a possible postedit()

function show($S) {
  extract($_POST);
  $S->query("select * from blog where id=$item");
  $page = <<<EOF
<h1>Show Item</h1>
EOF;

  while($row = $S->fetchrow('assoc')) {
    $page .= <<<EOF
  <style>
main {
  padding: 1rem;
}
form {
  width: 90%;
}
input, textarea {
  width: 100%;
  margin-bottom: .5rem;
  padding: 1rem;
}
textarea {
  height: 20rem;
}
input[type='submit'] {
  width: 15rem;
  height: 2rem;
  border-radius: 1rem;
  color: white;
  background-color: green;
  padding: 0;
}
  </style>

<form method="post">
<input type="text" name="title" value="{$row['title']}"><br>
<textarea name="msg">{$row['msg']}</textarea><br>
<input type="submit" value="If You Make Changes Submit"><br>
<input type="hidden" name="page" value="postedit">
<input type="hidden" name="item" value="{$row['id']}">
</form>
EOF;
  }
  echo $page;
  exit();
}

// POST. Ceate a new blog post. Do an insert

function postcreate($S) {
  extract($_POST);
  $S->query("insert into blog (email, title, msg, created, lasttime) ".
            "values('$email', '$title', '$msg', now(), now())");

  // Now do a start to show the new post
  
  start($S);
}


// New Post. This is via <a GET> above

function newpost($S) {
  $h->title = "new post";
  $h->css = <<<EOF
  <style>
main {
  padding: 1rem;
}
form {
  width: 90%;
}
input, textarea {
  width: 100%;
  margin-bottom: .5rem;
  padding: 1rem;
}
textarea {
  height: 20rem;
}
input[type='submit'] {
  width: 10rem;
  height: 2rem;
  border-radius: 1rem;
  color: white;
  background-color: green;
  padding: 0;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);

  echo <<<EOF
$top
<main>
<h1>Blog Post</h1>
<form method="post">
<input type="text" name="email" placeholder="Enter your email address (optional)"><br>
<input type="text" name="title" required placeholder="Enter a short title"><br>
<textarea name="msg" required placeholder="Enter Your Post"></textarea>
<br>
<input type="hidden" name="page" value="postcreate">
<input type="submit">
</form>
</main>
$footer
EOF;
  exit();
}

// Login

function login($S) { // GET
  $h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

  $h->css =<<<EOF
  <style>
.title {
  font-family: 'Tangerine', serif;
  text-align: center;
}
main {
  display: flex;
  justify-content: space-around;
}
input[type="submit"] {
  margin-top: 1rem;
  padding: .3rem;
  border-radius: .5rem;
  background-color: lightgreen;
}
#login, #register {
  border:2px solid black;
  border-radius: 1rem;
  padding: .5rem;
  background-color: blanchedalmond;
}
  </style>
EOF;

  $h->script = <<<EOF
  <script>
function doneall() {
  $("form").submit(function() {
    if($(this).parent().attr("id") == "login") {
      var email = $("input[type='email']").val();
      $.ajax({
        url: "blog.php",
        data: {page: "postlogin", email: email},
        type: "post",
        success: function(data) {
          console.log(data);
          if(data == "loginOK") {
            location = "blog.php";
          } else {
            $(".signin").after("<h3>Login Failed</h3>");
          }
        },
        error: function(err) {
          console.log(err);
        }
      });
    } else {
      alert("register");
    }
    return false;
  });

}
  </script>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);
  
  echo <<<EOF
$top
<h1 class="title">Please Login or Register</h1>
<main>
<div id="login">
<p>Login</p>
<form>
<input type="email" placeholder="Email Address" required><br>
<input type="submit">
</form>
</div>
<div id="register">
<p>Register</p>
<form>
<input type="text" placeholder="Full Name" required><br><br>
<input type="email" placeholder="Email Address" required><br>
<input type="submit">
</form>
</div>
</main>
$footer
EOF;
  exit();
}

function postlogin($S) { // POST
  // check email address if OK

  $_SESSION['loggedin'] = true;

  echo "loginOK";
  exit();
}

function comment($S) { // GET
  $h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;

  $h->css =<<<EOF
  <style>
input, textarea {
  width: 100%;
  margin-bottom: .5rem;
  padding: 1rem;
}
textarea {
  height: 20rem;
}
input[type='submit'] {
  width: 15rem;
  height: 2rem;
  border-radius: 1rem;
  color: white;
  background-color: green;
  padding: 0;
}
.title {
  font-family: 'Tangerine', serif;
  text-align: center;
}
main {
 padding: 1rem;
}
input[type="submit"] {
  margin-top: 1rem;
  padding: .3rem;
  border-radius: .5rem;
  background-color: lightpink;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);

  echo <<<EOF
$top
<main>
<h1 class="title">Comment</h1>
<form method="post">
<textarea name="msg" placeholder="Enter Your Comment" required></textarea><br>
<input type="hidden" name="page" value="postcomment">
<input type="hidden" name="item" value="{$_GET['item']}">
<input type="submit">
</form>
</main>
$footer
EOF;

  exit();
}

function postcomment($S) {
  $id = $_POST['item'];
  $msg = $_POST['msg'];
  $S->query("insert into comment (id, msg, lasttime) values('$id', '$msg', now())");

  start($S);
  exit();
}

function docomment($S) {
  $id = $_POST['id'];
  if($S->query("select * from comment where id=$id")) {
    echo "found";
  } else {
    echo "notfound";
  }
  exit();
}

function readcomments($S) {
  $id = $_POST['id'];
  $S->query("select msg, lasttime from comment where id=$id");
  $comment = <<<EOF
<style>
#comments table:nth-of-type(odd) {
  background-color: lightblue;
}
#comments table:nth-of-type(even) {
  background-color: lightgreen;
}
</style>  
<table id='comments'>
<tbody>
EOF;
  
  while(list($c, $last) = $S->fetchrow("num")) {
    $comment .= <<<EOF
<tr><td>
<table>
<tbody>
<tr><td><b>$last</b></td></tr>
<tr><td>$c</td></tr>
</tbody>
</table>
</td>
</tr>
EOF;
  }
  $comment .= <<<EOF
</tbody></table>
EOF;
  echo $comment;
  exit();
}

// Render Start Screen

function start($S) {
  $h->title = "Blog About Cleaning - All Natural Cleaning Company";
  $h->desc = "All Natural Cleaning Company of Albuquerque. We clean with 100% toxin free products. No harmfull chemicals.";

  $h->link = <<<EOF
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
EOF;
  
  $h->css = <<<EOF
  <style>
main {
  margin: 1rem 1rem 0;
}
.title {
  font-family: 'Tangerine', serif;
  text-align: center;
}
/* #bloclist is the top <table> */
#bloglist {
  margin-bottom: 1rem;
}
/* This is the table inside the table */
#bloglist table {
  width: 100%;
  border-bottom: 2px solid black;
}
/* This is the top table's odd tr */
#bloglist >tbody >tr:nth-of-type(odd) {
  background-color: white;
}
/* This is the top table's even tr */
#bloglist >tbody >tr:nth-of-type(even) {
  background-color: #EBECE4;
}
/* This is the td inside the second table */
#bloglist table td {
  padding: 1rem;  
}
/* This is the first child td in the first child tr of the second table */
#bloglist table tbody >tr:first-child >td:first-child {
  padding: 1rem 0 0 1rem;
  border-bottom: 1px solid;
}
.comment {
  color: lightpink;
}
.readcomment {
  background-color: lightgreen;
}
  </style>
EOF;

  $h->script = <<<EOF
  <script>
function doneall() {
  var loggedin = "{$_SESSION['loggedin']}" ? true : false;

  $("#bloglist table").click(function() {
    if(loggedin) {
      var id = $(this).attr("data-id");
      $.ajax({
        url: "blog.php",
        data: {page: "show", item: id},
        type: "post",
        success: function(data) {
          $("main").html(data);
        },
        error: function(err) {
          console.log(err);
        }
      });
    } else {
      $(".errmsg").remove();
      $(".signin").after("<h3 class='errmsg'>You MUST Login to Edit comments</h3>");
    }
  });

  $(".title").after("<button class='signin'>To comment or edit please sign in</button>");

  $(".signin").click(function() {
    location = "blog.php?page=login";
  });

  // Comment button

  if(loggedin) {
    $("#bloglist table tbody").append("<tr><td><button class='comment'>Comment</td></tr>");

    $(".comment").click(function(e) {
      var item = $(this).closest("table").attr("data-id");
      location = "blog.php?page=comment&item="+item;
    });
  }

  $("#bloglist table").each(function() {
    var id = $(this).attr("data-id");
    var body = $(this).find("tbody");
    $.ajax({
      url: "blog.php",
      data: {page: "docomment", id: id},
      type: "post",
      success: function(data) {
        if(data == "found") {
          body.append("<tr><td><button class='readcomment'>Read Comments</td></tr>");
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $("body").on("click", ".readcomment", function(e) {
    id = $(this).closest("table").attr("data-id");
    $.ajax({
      url: "blog.php",
      data: {page: "readcomments", id: id},
      type: "post",
      success: function(data) {
        $("#content").html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
    e.stopPropagation();
  });
}
  </script>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);

  $bloglist = <<<EOF
<table id="bloglist">
<tbody>
EOF;

  $S->query("select id, title, msg, created from blog order by created desc");

  while(list($id, $title, $msg, $created) = $S->fetchrow($r, 'num')) {
    $msg = preg_replace('~\n~', "<br>", $msg);
    $created = date("l F j Y H:i", strtotime($created));
    $bloglist .= <<<EOF
<tr>
<td>
<table data-id="$id">
<tbody>
<tr><td><b>$created</b><br>
Title: <b><i>$title</i></b></td></tr>
<tr><td>$msg</td></tr>
$comment
</tbody>
</table>
</td>
</tr>
EOF;
  }

  $bloglist .= "</tbody></table>";

  echo <<<EOF
$top
<main>
<h1 class="title">Blogs</h1>

<p><a href="blog.php?page=newpost">Create a new blog post.</a></p>

<div id="content">
$bloglist
</div>

</main>
$footer
EOF;
  exit();
}
