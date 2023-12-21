<?php
error_reporting(0);
?><!DOCTYPE html>
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

<body style="background-image: url(bg2/bg-main.png);overflow: hidden;">
<div style="width:100%;">
<div class="dispenser-logo"><img src="images/logo.png"></div>
<div class="dispenser-container">
<?php
   echo '<video style="width:100%;height:auto;pointer-events: none;" controls="hidden" autoplay muted loop controls preload="auto">';
   //fetch and list all the files found in the video folder. Make sure to change the path to your video folder.
   foreach(glob('videos/*') as $video){
    //echo '- <a href="#" class="isVideo" data-video="'.$video.'">'.$video.'</a><br/>';
    echo '<source id="vidsrc" src="'.$video.'" type="video/mp4">
   </video>';
    }
?>
</div>
<!--<img src="images/maintenance.gif">-->
<div class="dispenser-container">
<!-- <div class="dispenser-logo" style="margin-top:0px;"></div> -->
<h2>Please make a suitable selection</h2>
   <div class="dispenser-section">
      <form action="php/token_generate.php">
	     <button name="submit" value="General" type="submit">General</button>
	     <button name="submit" value="GP1" type="submit" style="margin-top:20px;">Dr. Amel Mohammed</button>
	     <button name="submit" value="DM1" type="submit" style="margin-top:20px;">Dr. Loai Sami Fadil </button>
      </form>
   </div> 	  
</div>
</div>
<div class="dot-cont-l">
  <span class="dot"></span>
</div>
<div class="dot-cont-r">
  <span class="dot"></span>
</div>
<div class="disclaimer">Unauthorized access is prohibited and subject to legal proceedings!<br>Al Ihsan Medical Complex</div>
<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<!-- <script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script> -->
</body>
</html>