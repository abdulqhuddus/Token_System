<?php
// Initialize the session
session_start();
include 'config.php'; 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 

<!DOCTYPE html>
<html lang="en">
<?php include "css/navbar.php";?>
<!--<button id="accordion-button-1" onclick="logos()" type="button" class="collapsible">Logos</button>
<div id="logos" class="content-collapsible">
<div class="logo-section">
   <div class="logo-main">
      <div class="logo-details">Main Logo<br>(Please upload size width=2480p height=357p only)</div>
	  <div class="logo-preview"><img src="images/logo1/logo1.png">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload3.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/logo1");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/logo1/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
   <div class="logo-main">
      <div class="logo-details">Footer Logo<br>(Please upload size width=224p height=226p only)</div>
	  <div class="logo-preview"><img src="images/logo2/footer.png">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload4.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/logo2");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/logo2/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
   <div class="logo-main">
      <div class="logo-details">Side Image<br>(Please upload size width=1200 height=675 only)</div>
	  <div class="logo-preview"><img src="images/sideimage/sideimage.png">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload6.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/sideimage");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/sideimage/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>
</div>
<button id="accordion-button-2" type="button" class="collapsible">Background</button>
<div id="background" class="content-collapsible">
<div class="logo-section">
   <div class="logo-main">
      <div class="logo-details">Main Background<br>(Please upload size width=1240p height=1754 only)</div>
	  <div class="logo-preview"><img src="images/bg2/bg-main.png" style="max-height: 200px;">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload5.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/bg2");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/bg2/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>
</div>
<button id="videos" type="button" class="collapsible">Videos</button>
<div class="content-collapsible">
<div class="videos-container">
<div class="vid-upl">
<p class="random1">Videos "mp4 file with size width=1920p height=1080p only"</p>
<form method="POST" action="php/upload.php" enctype="multipart/form-data">
    <input type="file" name="file" style="width:69%">
    <input type="submit" value="Upload" class="submit-cpl">
</form>
<div class="vid-details" style="margin-left: 1%;margin-top: 3%;width:98%;">
<table style="width:100%; margin-bottom:2.5%;">
<?php

$files = scandir("videos");
for ($a = 2; $a < count($files); $a++)
{
    ?>
  <tr class="user_statistics_text" style="filter: none;">
    <td style="border:2px solid #fff;color: grey;line-height:3;padding-left:10px;"><img src="images/playlist.png"> Playlist</td>
    <td style="border:2px solid #fff;color: grey;line-height:3;padding-left:10px;">
        <?php echo $files[$a]; ?>
    </td>
    <td class="download-cpl">
        <a href="videos/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
            Download
        </a>
    </td>
    <td class="delete-cpl">
        <a href="php/delete.php?name=../videos/<?php echo $files[$a]; ?>" style="color:#fff;">
            Delete
        </a>
    </td>
  </tr>
    <?php
}

?>
</table>
</div>
 <div>
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:right">
      <textarea rows="4" name="reloadvalue" style="display:none"></textarea>
      <button type="submit" name="reload" class="submit-cpl" style="margin-left:0px;">Reload Videos</button>
	  <?php 
      if(isset($_POST['reload'])) {
		 $reload = $_POST['reload'];
		 $sqlreload="UPDATE videos SET status='5000' where id='1'";
         mysqli_query($conn,$sqlreload);
		 echo"<br><span style='color:green;'>Wait for 20 seconds to reload</span>";
		 sleep(5);
		 $sqlreload="UPDATE videos SET status='2000000000' where id='1'";
      }else{
      }
      ?>
   </form>
 </div>
</div>
<div class="logo-section" style="padding:0px;border:none">
   <div class="logo-main">
      <div class="logo-details">Video Background Image<br>"jpg, jpeg, png file with size width=1920p height=1080p only"</div>
	  <div class="logo-preview"><img src="images/bgs/vid-bg.jpg">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload2.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/bgs");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/bgs/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>

</div>
</div>
<button type="button" class="collapsible">News</button>
<div id="news" class="content-collapsible">
<div class="news-section">
 <div class="news-upl">
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center">
      <textarea rows="4" name="news" style="width:100%;min-height:100px;border-radius:10px;margin-bottom:2%;padding:10px" placeholder="Type your news here..."></textarea>
      <button type="submit" name="submit1" class="submit-cpl" style="margin-left:0px;">Submit</button>
	  <?php 
      if(isset($_POST['submit1'])) {
		 $news = $_POST['news'];
		 $sqlnews="UPDATE notifications SET line='".$news."' where id='1'";
         mysqli_query($conn,$sqlnews);
		 echo"<br><span style='color:green;'>updated successfully</span>";
      }else{
      }
      ?>
   </form>
 </div>
   <div class="news-details">
   <?php
   $qnews = "select line from notifications"; 
   $query = mysqli_query($conn,$qnews); 
   while($res = mysqli_fetch_array($query)){
   echo "".$res['line']."";
   }
   ?>
   </div>
   <p class="random1">News Bulletin on screen</p>
   <div class="newspeed">
   <div class="number">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center">
      <span class="minus">-</span>
	  <input class="speedinput" type="text" name="newspeed" value="40"/>
	  <span class="plus">+</span>
	  <button type="submit" name="submit2" class="submit-cpl" style="margin-left:0px;">Submit</button>
	  <?php 
      if(isset($_POST['submit2'])) {
		 $newspeed = $_POST['newspeed'];
		 $sqlnewspeed="UPDATE newspeed SET speed='".$newspeed."' where id='1'";
         mysqli_query($conn,$sqlnewspeed);
		 echo"<br><span style='color:green;'>updated successfully</span>";
      }else{
      }
      ?>
    </form>
   </div>
   <div class="news-details" style="width:20%;min-height:0px;text-align: center;font-weight:bold;font-size:15px;">Current Speed<span style="color:red;font-size:18px">
   <?php
   $qnewspeed = "select speed from newspeed"; 
   $query = mysqli_query($conn,$qnewspeed); 
   while($res = mysqli_fetch_array($query)){
   echo "".$res['speed']."";
   }
   ?></span>
   </div>
   </div>
   <p class="random1">Adjust news speed</p>
</div>
</div>-->




<div class="container-settings">
  <h2>Settings</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="true"><span class="accordion-title">Logos</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <div class="logo-section">
   <div class="logo-main">
      <div class="logo-details">Main Logo<br>(Please upload size width=2480p height=357p only)</div>
	  <div class="logo-preview"><img src="images/logo1/logo1.png">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload3.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/logo1");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/logo1/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
   <div class="logo-main">
      <div class="logo-details">Footer Logo<br>(Please upload size width=224p height=226p only)</div>
	  <div class="logo-preview"><img src="images/logo2/footer.png" style="background:lightgrey;">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload4.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/logo2");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/logo2/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
   <div class="logo-main">
      <div class="logo-details">Side Image<br>(Please upload size width=1200 height=675 only)</div>
	  <div class="logo-preview"><img src="images/sideimage/sideimage.png">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload6.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/sideimage");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/sideimage/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Background</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <div class="logo-section">
   <div class="logo-main">
      <div class="logo-details">Main Background<br>(Please upload size width=1240p height=1754 only)</div>
	  <div class="logo-preview"><img src="images/bg2/bg-main.png" style="max-height: 200px;">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload5.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/bg2");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/bg2/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Videos</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <div class="videos-container">
<div class="vid-upl">
<p class="random1">Videos "mp4 file with size width=1920p height=1080p only"</p>
<form method="POST" action="php/upload.php" enctype="multipart/form-data">
    <input type="file" name="file" style="width:69%">
    <input type="submit" value="Upload" class="submit-cpl">
</form>
<div class="vid-details" style="margin-left: 1%;margin-top: 3%;width:98%;">
<table style="width:100%; margin-bottom:2.5%;">
<?php

$files = scandir("videos");
for ($a = 2; $a < count($files); $a++)
{
    ?>
  <tr class="user_statistics_text" style="filter: none;">
    <td style="border:2px solid #fff;color: grey;line-height:3;padding-left:10px;"><img src="images/playlist.png"> Playlist</td>
    <td style="border:2px solid #fff;color: grey;line-height:3;padding-left:10px;">
        <?php echo $files[$a]; ?>
    </td>
    <td class="download-cpl">
        <a href="videos/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
            Download
        </a>
    </td>
    <td class="delete-cpl">
        <a href="php/delete.php?name=../videos/<?php echo $files[$a]; ?>" style="color:#fff;">
            Delete
        </a>
    </td>
  </tr>
    <?php
}

?>
</table>
</div>
<div style="width:20%;margin:auto;">
<?php
   echo '<video style="height:100px;border:1px dashed lightgrey;pointer-events: none;" controls="hidden" autoplay muted loop controls preload="auto">';
   //fetch and list all the files found in the video folder. Make sure to change the path to your video folder.
   foreach(glob('videos/*') as $video){
    //echo '- <a href="#" class="isVideo" data-video="'.$video.'">'.$video.'</a><br/>';
    echo '<source id="vidsrc" src="'.$video.'" type="video/mp4">
   </video>';
    }
   ?>
</div>
 <div style="display:none;">
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:right">
      <textarea rows="4" name="reloadvalue" style="display:none"></textarea>
      <button type="submit" name="reload" class="submit-cpl" style="background: rgb(248 51 51);width: 20%;margin-left: 10%;color: #fff;filter: drop-shadow(4px 5px 3px grey);border: none;padding: 2px;margin: auto;font-size: 16px;text-align: center;">Reload Videos</button>
	  <?php 
      if(isset($_POST['reload'])) {
		 $reload = $_POST['reload'];
		 $sqlreload="UPDATE videos SET status='5000' where id='1'";
         mysqli_query($conn,$sqlreload);
		 echo"<br><span style='color:green;'>Wait for 20 seconds to reload</span>";
		 sleep(5);
		 $sqlreload="UPDATE videos SET status='2000000000' where id='1'";
      }else{
      }
      ?>
   </form>
 </div>
</div>
<div class="logo-section" style="padding:0px;border:none">
   <div class="logo-main">
      <div class="logo-details">Video Background Image<br>"jpg, jpeg, png file with size width=1920p height=1080p only"</div>
	  <div class="logo-preview"><img src="images/bgs/vid-bg.jpg">
	     <div class="download-cpl" style="margin-top: 20px; width:100%;background:transparent;">
            <form method="POST" action="php/upload2.php" enctype="multipart/form-data">
               <input type="file" name="file" style="width:68%;margin-bottom: 10px;">
               <input type="submit" value="Replace" class="submit-cpl">
            </form>
            <table style="width:100%;">
            <?php

            $files = scandir("images/bgs");
            for ($a = 2; $a < count($files); $a++)
            {
            ?>
               <tr class="user_statistics_text" style="filter: none;">
                  <td class="download-cpl">
                     <a href="images/bgs/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
                     Download
                     </a>
                  </td>
               </tr>
            <?php
            }

            ?>
            </table>		   
		 </div>
	  </div>
   </div>
</div>
<!--<div class="vid-upl" style="margin-top:2.5%;text-align: center;">
<p class="random1" style="text-align:center">Video Background Image "jpg, jpeg, png file with size 1920px1080p only"</p>
<img src="bgs/vid-bg.jpg" style="max-height: 200px;">
<form method="POST" action="php/upload2.php" enctype="multipart/form-data">
    <input type="file" name="file" style="width:69%">
    <input type="submit" value="Replace" class="submit-cpl">
</form>
</div>
<div class="vid-details">
<table style="width:100%;">
<?php

$files = scandir("bgs");
for ($a = 2; $a < count($files); $a++)
{
    ?>
  <tr class="user_statistics_text" style="filter: none;">
    <td style="border:2px solid #fff;color: grey;line-height:3;padding-left:10px;">
        <?php echo $files[$a]; ?>
    </td>
    <td class="download-cpl">
        <a href="bgs/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>" style="color:#fff;">
            Download
        </a>
    </td>
  </tr>
    <?php
}

?>
</table>
</div>-->
</div>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">News</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <div class="news-section">
 <div class="news-upl">
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center">
      <textarea rows="4" name="news" style="width:100%;min-height:100px;border-radius:10px;margin-bottom:2%;padding:10px" placeholder="Type your news here..."></textarea>
      <button type="submit" name="submit1" class="submit-cpl" style="background: rgb(248 51 51);width: 20%;margin-left: 10%;color: #fff;filter: drop-shadow(4px 5px 3px grey);border: none;padding: 2px;margin: auto;font-size: 16px;text-align: center;">Submit</button>
	  <?php 
      if(isset($_POST['submit1'])) {
		 $news = $_POST['news'];
		 $sqlnews="UPDATE notifications SET line='".$news."' where id='1'";
         mysqli_query($conn,$sqlnews);
		 echo"<br><span style='color:green;'>updated successfully</span>";
      }else{
      }
      ?>
   </form>
 </div>
   <div class="news-details">
   <?php
   $qnews = "select line from notifications"; 
   $query = mysqli_query($conn,$qnews); 
   while($res = mysqli_fetch_array($query)){
   echo "".$res['line']."";
   }
   ?>
   </div>
   <p class="random1">News Bulletin on screen</p>
   <div class="newspeed">
   <div class="number">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center">
      <span class="minus">-</span>
	  <input class="speedinput" type="text" name="newspeed" value="40"/>
	  <span class="plus">+</span>
	  <button type="submit" name="submit2" class="submit-cpl" style="background: rgb(248 51 51);width: 20%;margin-left: 10%;color: #fff;filter: drop-shadow(4px 5px 3px grey);border: none;padding: 2px;margin: auto;font-size: 16px;text-align: center;">Submit</button>
	  <?php 
      if(isset($_POST['submit2'])) {
		 $newspeed = $_POST['newspeed'];
		 $sqlnewspeed="UPDATE newspeed SET speed='".$newspeed."' where id='1'";
         mysqli_query($conn,$sqlnewspeed);
		 echo"<br><span style='color:green;'>updated successfully</span>";
      }else{
      }
      ?>
    </form>
   </div>
   <div class="news-details" style="width:40%;min-height:0px;text-align: center;font-weight:bold;font-size:15px;">Current Speed<span style="color:red;font-size:18px">
   <?php
   $qnewspeed = "select speed from newspeed"; 
   $query = mysqli_query($conn,$qnewspeed); 
   while($res = mysqli_fetch_array($query)){
   echo "".$res['speed']."";
   }
   ?></span>
   </div>
   </div>
   <p class="random1">Adjust news speed</p>
</div>
      </div>
    </div>
  </div>
</div>
<?php include "css/footer.php";?>



<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<!--<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>-->
<script>
	$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
</script>
<!--<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>-->
<script>
const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>
</body>
</html>