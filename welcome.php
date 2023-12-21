<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION['id'] === '21'){$flow = '11';}else{$flow = '0';}
?>
 

<!DOCTYPE html>
<html lang="en">
<?php include "css/navbar.php";?>
<body style="background-image: url(images/small-logo.png);Background-size: 40%;background-repeat:no-repeat;background-position: 128% 18%;">
<div class="assign-container">
   <div class="serving-titles">
	     <div class="serving-token-title">Token Number
	     </div>
	     <div class="serving-counter-title">Counter Number
	     </div>
	  </div>
      <?php include 'config.php';  $q = "select * from tokens where status=1 AND counter=".$_SESSION['id'].""; $query = mysqli_query($conn,$q); while($res = mysqli_fetch_array($query)){
	  ?> 
	  <div class="serving-section">
	     <div class="serving-token"><?php echo $res['number'];  ?></div>
	     <div class="serving-counter"><?php echo $res['counter'];  ?></div>
	  </div>
	  <?php  }   ?> 
</div>
<?php 
		    if ($result=mysqli_query($conn,$q)) {
            $rowcount=mysqli_num_rows($result);
		      if ($rowcount == 0){
              echo "<div style='text-align: center;font-weight: bold;color: grey;border: 2px grey dashed;width: -webkit-fit-content;margin: auto;padding: 10px;border-radius: 5px;margin-top: 1%;'>You have no active tokens</div>";		  
		      }
		      else{
		      }
            }			
?>  
<div style="display:flex;justify-content: center;">
      <div id="load-assign" class="assign-section"></div> 	  
      <div class="assign-section">
		 <?php 
            $sql = "SELECT * from tokens WHERE counter=".$_SESSION['id']." AND status=1 ORDER BY id ASC LIMIT 1";
		    if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
		      if ($rowcount > 0){
              echo "<button id='myBtn'>Close</button>";		  
		      }
		      else{
			      echo "<button type='submit' style='background:grey;cursor:default'>Close</button>";
		      }
            }			
	     ?> 
      </div> 
                    <div id="myModal" class="modal">
                       <div class="modal-contentt" style="display:block;">
                          <span class="close">&times;</span>
                          <p style="color:grey;font-size:15px;text-align:center;margin-top: 10%;color:red"><img src="images/warning.png"><br><br><b>Warning</b><br>Select "Yes" if you want to close the token</p>
						  <div style="display:flex">
                          <div class="assign-section" style="width: 40%;margin-top: 3%;">
                             <form action="php/token_close.php">
                                <button id="Yes" type="submit" style="background:green">Yes</button>
                             </form>
                          </div>
                          <div class="assign-section" style="width: 40%;margin-top: 3%;">
                             <span class="No"><button type="submit">No</button></span>
                          </div>
						  </div>
                       </div>
                    </div>	  
</div>
<div class="user_statistics_section" style="margin-top:3%;">
   <div class="user_statistics_text">Active Tokens</div>
   <?php 
        $sql = "SELECT * from tokens WHERE counter=".$_SESSION['id']." AND status=1";
		if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
		  if ($rowcount > 0){
          echo "<div class='user_statistics_counter' style='background:rgb(217,12,12);color:#fff'>".$rowcount."</div>";		  
		  }
		  else{
			  echo "<div class='user_statistics_counter' style='background:green;color:#fff'>".$rowcount."</div>";
		  }
        }
	?>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens Today</div>
    <div class="user_statistics_counter">	
    <?php 
        $sql6 = "SELECT * from tokens where counter=".$_SESSION['id']." AND status=10 AND closed_date=CURDATE()";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?>
	</div>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens All</div>
	<div class="user_statistics_counter">
    <?php 
        $sql6 = "SELECT * from tokens where counter=".$_SESSION['id']." AND status=10";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?> 
	</div>
</div>	
<div class="load-box">   
   <div id="load-token"></div>
</div>
<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->

<script type="text/javascript">
$(document).ready( function(){
$('#load-token').load('php/load-token.php');
$('#load-assign').load('php/load-assign.php');
refresh();
});
 
function refresh()
{
setTimeout( function() {
  $('#load-token').load('php/load-token.php');
  $('#load-assign').load('php/load-assign.php');
  refresh();
}, 2000);
}
</script>
<!-- <script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script> -->
</body>
</html>