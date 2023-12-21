<?php
session_start();
$_SESSION['username'] = 'counter3';
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<title>Al Ihsan Charity Association</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body style="overflow: hidden !important;background-image: url(images/bg2/bg-main.png);">
<div id="load-sound" style="display:none"></div>
<div id="load-sound-recall" style="display:none"></div>
<div class="full">
<div class="container">
   <div class="serving">
      <div class="serving-notes">Currently Serving</div>
	  <div class="serving-titles">
	     <div class="serving-token-title">Token Number</div>
	     <div class="serving-counter-title">Counter Number</div>
	  </div>
      <div id="load-active-token"></div>		  
   </div>
   <div class="sideimage">
      <img src="images/sideimage/sideimage.png">
   </div>
   <div id="load-token" style="width: 100%;"></div> 
   <div class="footer">Please be seated and wait for your turn.
   </div>   
</div>

<div id="load" class="container2"></div>

<!--<div class="container2">
  <div class="logo"><img src="images/logo.png">
   </div>
   <?php
   echo '<video style="width:100%;height:auto;pointer-events: none;" controls="hidden" autoplay muted loop controls preload="auto">';
   //fetch and list all the files found in the video folder. Make sure to change the path to your video folder.
   foreach(glob('videos/*') as $video){
    //echo '- <a href="#" class="isVideo" data-video="'.$video.'">'.$video.'</a><br/>';
    echo '<source id="vidsrc" src="'.$video.'" type="video/mp4">
   </video>';
    }
   ?>
</div>-->
</div>
<div class="container3">
   <div id="breaking"><img src="images/logo2/footer.png"></div>
   <div id="newsTicker">
      <?php include 'config.php';  $qnewspeed = "select * from newspeed where id=1"; $query = mysqli_query($conn,$qnewspeed); while($res = mysqli_fetch_array($query)){ ?> 
      <p style="animation: tickerTape <?php echo $res['speed'];  ?>s linear infinite;"></p>
	  <?php  }   ?>
   </div>
   <div id="contact" style="display:flex;padding-left: 33%;"><div>For Booking, Contact&nbsp;&nbsp;</div><div style="animation: blink 2s linear infinite;">067421979</div></div>
</div>	
<div class="clock"><canvas id="canvas" width="175" height="175"></canvas></div>
<!--<div class="blinker">test-->
</div>
<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<script>
$(document).ready( function(){
$('#load-active-token').load('php/load-active-token_up.php');
$('#load-token').load('php/load-token.php');
$('#load-sound').load('php/load-sound.php');
$('#load-sound-recall').load('php/load-sound-recall.php');
$('#load').load('load-video.php');
refresh();
});
 
function refresh()
{
setTimeout( function() {
  $('#load-active-token').load('php/load-active-token_up.php');
  $('#load-token').load('php/load-token.php');
  $('#load-sound').load('php/load-sound_up.php');
  $('#load-sound-recall').load('php/load-sound-recall_up.php');

  refresh();
}, 8000);
}
</script>
<script>
<?php 
include 'config.php';
$qnot = "select * from notifications";
$query = mysqli_query($conn,$qnot); while($res = mysqli_fetch_array($query)){
?>
var puns = [
"<?php echo $res['line']; ?>",
//"Select a mix of colorful vegetables. Vegetables of different colors provide a variety of nutrients. Try collards, kale, spinach, squash, sweet potatoes, and tomatoes.",
//"At restaurants, eat only half of your meal and take the rest home.",
//"Walk in parks, around a track, or in your neighborhood with your family or friends.",
//"Make getting physical activity a priority.",
//"Try to do at least 150 minutes a week of moderate-intensity aerobic activity, like biking or brisk walking.",
//"If your time is limited, work in small amounts of activity throughout your day."
];

for (i = 0; i < puns.length; i++) {
  $("#newsTicker p").append(
    "<span class='date'>Alihsan Medical:</span>" +
    "<span class='story'>" + puns[i] + "</span>"
  );
}
<?php  }   ?>
</script>
<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2.3;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = '#b10808';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, 'white');
  grad.addColorStop(0.5, '#b10808');
  grad.addColorStop(1, 'white');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
<!-- <script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script> -->
</body>
</html>