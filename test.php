<script>
document.addEventListener("DOMContentLoaded", domload, false);

function domload() {
  console.log("DomReady");
  var pp = document.querySelector('p');
  pp.innerHTML = "TWO";
}
window.addEventListener("load", load, false);

function load() {
  console.log("Load");
  var ppp = document.querySelector('p');
  ppp.innerHTML = "THREE";
}
</script>
<h1>TEST</h1>
<p>test</p>
