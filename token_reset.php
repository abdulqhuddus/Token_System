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
<body style="background-image: url(images/small-logo.png);Background-size: 40%;background-repeat:no-repeat;background-position: 128% 18%;height:auto;">
<div class="select">
   <div class="select-counter" style="background:rgb(217,12,12);color:#fff;padding: 10px;">
   <?php echo "Current Token number";?>
   </div>
   <div class="submit-counter" style="cursor:default;background:none;color:rgb(217,12,12);padding: 10px; border-bottom: 2px solid rgb(217,12,12);">
   <?php echo "G-";echo file_get_contents( "php/seq_file");?>
   </div>
</div>
<div style="width:50%;margin-left:25%;border:1px dashed rgb(217,12,12);margin-top:2%;margin-bottom:2%;"></div>
<!-----------Counter Selection------------------>
   <div class="select">
     <span class="select-counter" style="padding: 10px;">Reset Token Number</span>
     <button class="submit-counter" id='myBtn'>Reset</button>
   </div>
   <div style="width: 100%;margin: auto;text-align: center;margin-top: 20px;">
   <form action="reset_sound.php" method="POST">
	    <button style="background: red;height: 40px;width: 125px;"class="submit-counter" type="submit" name="submit">Sound Off</button>
	 </form>
   </div>
   <div id="myModal" class="modal">
                       <div class="modal-contentt" style="display:block;overflow: scroll;">
                          <span class="close">&times;</span>
                          <p style="color:grey;font-size:15px;text-align:center;margin-top: 10%;color:red"><img src="images/warning.png"><br><br><b>Warning</b><br>If you reset, all the below tickets will get closed by the system and token reset to G-01</p>
				          <div style="margin-top:2%;text-align:center;">
<table style="width:100%;">  
    <tr class="user_statistics_counter" style="background:grey">  
      <th style="border:2px solid #fff;line-height: 2;">Token</th>  
	  <th style="border:2px solid #fff;line-height: 2;">Counter</th>  
	  <th style="border:2px solid #fff;line-height: 2;">Status</th>
    </tr> 
	<?php $q = "select * from tokens where status=0 OR status=1"; $query = mysqli_query($conn,$q); while($res = mysqli_fetch_array($query)){ ?> 
	<tr class="user_statistics_text" style="filter: drop-shadow(4px 5px 3px grey);"> 
	  <td style="border:2px solid #fff;"> <?php echo $res['number'];  ?> </td>  
	  <td style="border:2px solid #fff;"> <?php echo $res['counter'];  ?> </td> 
      <td <?php if($res['status']==="0") { echo"<span style='background:#d39e00;color:#fff;border: 2px solid transparent;';>Waiting</span>";}elseif($res['status']==="1") { echo"<span style='background:#3c42f1;color:#fff;border: 2px solid transparent;'>Assigned</span>";}elseif($res['status']==="10") { echo"<span style='background:rgb(217,12,12);color:#fff;border: 2px solid transparent;'>Closed</span>";} ?></td> 	  
	</tr> <?php  }   ?> 
</table>
</div>
<div style="display:flex">
                          <div class="assign-section" style="width: 40%;margin-top: 10%;">
                             <form class="select" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" style="width: 100%;margin-left: 0px;">
                                <input class="submit-counter" type="submit" value="Reset" name="btn2" style="background:green;margin-left:0px;width:100%;font-size:30px;"> 
                             </form>
                          </div>
                          <div class="assign-section" style="width: 40%;margin-top: 10%;">
                             <span class="No"><button type="submit">No</button></span>
                          </div>
</div>
                       </div>
                    </div>
   <div class="selected">
   <?php
   if(isset($_POST['btn2'])){
       require_once "config.php";          

        // Check connection

        if($conn === false){

            die("ERROR: Could not connect. " 

                . mysqli_connect_error());

        }
$closed_date = date('Y-m-d');
$closed_time = date('H:i:s');
$_SESSION['closed_date'] = $closed_date;
$_SESSION['closed_time'] = $closed_time;
$sql = "UPDATE tokens SET closed_date='".$_SESSION['closed_date']."', closed_time='".$_SESSION['closed_time']."', status='100' WHERE status=0 OR status=1";
if(mysqli_query($conn, $sql)){ 
if (file_exists("php/seq_file")) {
  file_put_contents("php/seq_file", 0);
  echo 
  "<div class='select' style='width:100%;margin-left:0px;'>
   <div class='select-counter'  style='background:green;border-color:green;color:#fff;padding: 10px;'>Tokens reset to</div>
   <div class='submit-counter' style='cursor:default;background:none;color:green;padding: 10px; border-bottom: 2px solid green;'>G-";echo file_get_contents( 'php/seq_file');
   echo "</div>
  </div>";
  echo "<meta http-equiv='refresh' content='0'>";
} else {
  
}
$count = file_get_contents("php/seq_file");
$count++;
}

mysqli_close($conn);
   }
   //echo sprintf("%'.03d\n", $count);
   ?>
   </div>
<!--------------End----------------------------->
<div style="width: 50%;justify-content: center;margin-left: 25%;">  
   <div id="load-token"></div>
</div>
<div class="token-data" style="width:50%;margin-left:25%;margin-bottom:10%;text-align:center;">
<?php           
        $sql = "select * from tokens where date=CURDATE()";
		if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
		  if ($rowcount > 0){
          echo "<span style='font-weight:bold;color:grey;font-size:25px;'>Total Tokens Today - ".$rowcount."</span>";		  
		  }
		  else{
		  }
        }
	?>
<table style="width:100%;">  
    <tr class="user_statistics_counter" style="background:grey">  
      <th style="border:2px solid #fff;">Token</th>  
	  <th style="border:2px solid #fff;">Counter</th> 
	  <th style="border:2px solid #fff;">Category</th> <!--<th> Classification </th>--> 
	  <th style="border:2px solid #fff;">Date</th>  
	  <th style="border:2px solid #fff;">Time</th>  
	  <th style="border:2px solid #fff;">Closed Date</th> 
	  <th style="border:2px solid #fff;">Closed Time</th>
	  <th style="border:2px solid #fff;">Status</th>
    </tr > 
	<?php   $q = "select * from tokens where date=CURDATE()"; $query = mysqli_query($conn,$q); while($res = mysqli_fetch_array($query)){ ?> 
	<tr class="user_statistics_text" style="filter: drop-shadow(4px 5px 3px grey);"> 
	  <td style="border:2px solid #fff;"> <?php echo $res['number'];  ?> </td>  
	  <td style="border:2px solid #fff;"> <?php echo $res['counter'];  ?> </td> 
	  <td style="border:2px solid #fff;"> <?php echo $res['category'];  ?> </td> 
	  <td style="border:2px solid #fff;"> <?php echo $res['date'];  ?> </td> 
	  <td style="border:2px solid #fff;"> <?php echo $res['time'];  ?> </td> 
	  <td style="border:2px solid #fff;"> <?php echo $res['closed_date'];  ?> </td> 
	  <td style="border:2px solid #fff;"> <?php echo $res['closed_time'];  ?> </td>
      <td <?php if($res['status']==="0") 
	  { echo"<span style='background:#d39e00;color:#fff;border: 2px solid transparent;';>Waiting</span>";}
        elseif($res['status']==="1") { echo"<span style='background:#3c42f1;color:#fff;border: 2px solid transparent;'>Assigned</span>";}
		elseif($res['status']==="10") { echo"<span style='background:green;color:#fff;border: 2px solid transparent;'>Closed</span>";} 
		elseif($res['status']==="100") { echo"<span style='background:rgb(217,12,12);color:#fff;border: 2px solid transparent;'>Reset</span>";}
		?></td> 	  
	</tr> <?php  }   ?> 
</table>
</div>
<?php include "css/footer.php";?>
<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<script type="text/javascript">
$(document).ready( function(){
$('#load-token').load('php/load-token.php');
refresh();
});
 
function refresh()
{
setTimeout( function() {
  $('#load-token').load('php/load-token.php');
  refresh();
}, 2000);
}
</script>
<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>

</body>
</html>