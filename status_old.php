<?php
include 'config.php';
//echo session_id();
$token = $_GET['token'];
//echo $token;
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<title>Al Ihsan Medical Complex</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body style="background-image: url(images/bg2/bg-main.png);">
<img src="images\logo1\logo1.png" style="width:100%;height:100%;">
<div class="full">
<div>
   <div class="serving" style="height:250px;">
      <?php
	  $sql = "select * from tokens2022 where number='".$token."' AND date=CURDATE() AND status=0"; 
	  $query = mysqli_query($conn,$sql); 
	  $res = mysqli_fetch_array($query);
	  $rowcount=mysqli_num_rows($query);
	  if ($rowcount > 0)
      { ?> 
      <div class="serving-notes" style="border:0px;">Token Status</div>
	  <div class="serving-titles">
	     <div class="serving-token-title" style="font-size: 16px;margin:auto;">Token Number</div>
	  </div>
      <div>
	  <div class="serving-section" style="height:auto;">
	     <div class="serving-token" style="margin:auto;"><?php echo $res['number'];  ?></div>
	  </div>
	  <div class="footer" style="width:80%;margin:auto;margin-top:10px;font-size:12px;">Please be seated and wait for your turn</div> 
	  </div>
	  <?php  } else { 
	  echo ""; }
	  ?>

      <?php
	  $sql = "select * from tokens2022 where number='".$token."' AND date=CURDATE() AND status=1"; 
	  $query = mysqli_query($conn,$sql); 
	  $res = mysqli_fetch_array($query);
	  $rowcount=mysqli_num_rows($query);
	  if ($rowcount > 0)
      { ?> 
      <div class="serving-notes">Token Status</div>
	  <div class="serving-titles">
	     <div class="serving-token-title" style="font-size: 16px;">Token Number</div>
	     <div class="serving-counter-title" style="font-size: 16px;">Counter Number</div>
	  </div>
      <div>
	  <div class="serving-section">
	     <div class="serving-token"><?php echo $res['number'];  ?></div>
	     <div class="serving-counter"><?php echo $res['counter'];  ?></div>
	  </div>
	  <div class="footer" style="margin:auto">Please be seated and wait for your turn</div> 
	  </div>
	  <?php  } else { 
	  echo ""; }
	  ?>	  
   </div>
   <div class="sideimage">
      <img src="images/sideimage/sideimage.png" style="width:50%;">
   </div>
   <!--<?php
   echo '<video style="width:100%;height:auto;pointer-events: none;" controls="hidden" autoplay muted loop controls preload="auto">';
   //fetch and list all the files found in the video folder. Make sure to change the path to your video folder.
   foreach(glob('videos/*') as $video){
    //echo '- <a href="#" class="isVideo" data-video="'.$video.'">'.$video.'</a><br/>';
    echo '<source id="vidsrc" src="'.$video.'" type="video/mp4">
   </video>';
    }
   ?>-->
   <!--<div id="load-token" style="width: 100%;"></div>--> 
<iframe src="https://alihsan-ch.ae/medical/smartscreen/survey.php"  style="width: 100%;height: 200px;border: 0px;margin-top: 20px;">
</iframe>   
</div>


</body>
</html>