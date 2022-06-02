<?php
$article_content = file_get_contents("/Users/rachel/Sites/myprojects/phoi/collectiveaccess/pawtucket2/themes/phoi/views/About/Article2-file.json");
$obj = json_decode($article_content);
?>

<h1>Test form captcha</h1>
<form>
<input type="text" name="name" /><br/>
<input type="text" name="clicked" />
<div id="captcha" style="height:240px;width:600px;background-color:rgba(0,0,0,0.01);" ></div>
<img src="https://www.phoi.io/captcha2.php" />
<script>
var captcha = {};

$(document).ready(function(){
  $.ajax({
    url: "/captcha2.php"
  }).done(function(data) {
    $("#captcha").append("<img class='captchaimage' src='data:image/png;charset=utf-8;base64,"+data.image+"' />");
    captcha.x = data.x;
    captcha.y = data.y;
    captcha.size = Math.round(data.size / 2);
    console.log(captcha);
    //console.log(data.angle);
    //console.log("x "+data.x);
    console.log(data.y);
  });

  $("#captcha").on("click", ".captchaimage",function(event) {
    console.log("clicked");
    let xclicked = event.offsetX - 20;
    let yclicked = event.offsetY;
    let minx = captcha.x - captcha.size;
    let maxx = captcha.x + captcha.size;
    let miny = captcha.y - captcha.size;
    let maxy = captcha.y + captcha.size;
    if((xclicked>minx) && (xclicked<maxx)) {
      console.log("ok x");
    }
    if((yclicked>miny) && (yclicked<maxx)) {
      console.log("ok y");
    }
    /*if((yclicked < (captcha.y - captcha.size)) && (yclicked > (captcha.y + captcha.size))) {
      console.log("clic hors zone");
    }*/
  });
});
</script>