<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 

<!DOCTYPE html>
<html lang="en">
<?php include "css/navbar.php";?>
<body style="background-image: url(images/small-logo.png);Background-size: 40%;background-repeat:no-repeat;background-position: 128% 18%;">

<?php 
    include 'config.php';
    $query ="SELECT id FROM users where counter='yes'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<!-----------Counter Selection------------------>
   <form class="select" action="#"  method="post">
   <select class="select-counter" name="id">
   <option>Select the Counter</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['id']; ?> </option>
    <?php 
    }
   ?>
   </select>
   <input class="submit-counter" type="submit" value="submit" name="btn"> 
   </form>
   <div class="selected">
   <?php
   if(isset($_POST['btn'])){
     $id=$_POST['id'];
	 echo '<div class="select-counter" style="padding: 8px;background:rgb(217,12,12);color:#fff">Counter Selected</div>';
     echo '<div class="submit-counter" style="padding: 8px;cursor:default">'. $id.'</div>';	  
   }else{}

   ?>
   </div>
<!--------------End----------------------------->
<div class="assign-container">
   <div class="serving-titles">
	     <div class="serving-token-title">Token Number
	     </div>
	     <div class="serving-counter-title">Counter Number
	     </div>
   </div>
      <?php   $q = "select * from tokens where status=1 AND counter=".$id.""; $query = mysqli_query($conn,$q); 
	  if($res = mysqli_fetch_array($query)){ 
	     echo '<div class="serving-section" style="height: 45px;">';
	     echo '<div class="serving-token" style="font-size: 32px;animation: blink 2000s linear infinite;">'.$res['number'].'</div>';
	     echo '<div class="serving-counter" style="font-size: 32px;animation: blink 2000s linear infinite;">'.$res['counter'].'</div>';
	     echo '</div>';
	  } else
	  {	
          
	  }
	  ?> 
</div>
<!--<div style="display:flex;justify-content: center;">
      <div id="load-assign" class="assign-section"></div> 	  
      <div class="assign-section">
		 <?php 
            $sql = "SELECT * from tokens WHERE counter=".$id." AND status=1 ORDER BY id ASC LIMIT 1";
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
                       <div class="modal-content">
                          <span class="close">&times;</span>
                          <p style="position: absolute;color:grey;font-size:20px">Please confirm to close</p>
                          <div class="assign-section" style="width: 40%;margin-top: 10%;">
                             <form action="php/token_close.php">
                                <button type="submit" style="background:green">Yes</button>
                             </form>
                          </div>
                          <div class="assign-section" style="width: 40%;margin-top: 10%;">
                             <span class="No"><button type="submit">No</button></span>
                          </div>
                       </div>
                    </div>	  
</div>-->
<div style="text-align:center;font-weight:bold;margin-top:1%;color:grey;">Counter <?php echo ''. $id.'';?></div>
<div class="user_statistics_section">
   <div class="user_statistics_text">Tokens - Active</b></div>
   <div class="user_statistics_counter" style="padding:0px;">
   <?php 
        $sql = "SELECT * from tokens WHERE counter=".$id." AND status=1";
		if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
		  if ($rowcount > 0){
          echo "<div class='user_statistics_counter' style='background:rgb(217,12,12);color:#fff;width: 100%;height: 100%;margin: 0px;'>".$rowcount."</div>";		  
		  }
		  else{
			  echo "<div class='user_statistics_counter' style='background:green;color:#fff;filter: none;width: 100%;margin-left: 0px;'>".$rowcount."</div>";
		  }
        }
	?>
	</div>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens - Today</b></div>
    <div class="user_statistics_counter">	
    <?php 
        $sql6 = "SELECT * from tokens where counter=".$id." AND status=10 AND closed_date=CURDATE()";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?>
	</div>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens - All</b></div>
	<div class="user_statistics_counter">
    <?php 
        $sql6 = "SELECT * from tokens where counter=".$id." AND status=10";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?> 
	</div>
</div>	

<div style="text-align:center;font-weight:bold;margin-top:1%;color:grey;border-top:2px dashed lightgrey;">All Counters</div>
<div class="user_statistics_section">
   <div class="user_statistics_text">Tokens - Active</div>
   <div class="user_statistics_counter" style="padding:0px;">
   <?php 
        $sql = "SELECT * from tokens WHERE status=1";
		if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
		  if ($rowcount > 0){
          echo "<div class='user_statistics_counter' style='background:rgb(217,12,12);color:#fff;width: 100%;height: 100%;margin: 0px;'>".$rowcount."</div>";		  
		  }
		  else{
			  echo "<div class='user_statistics_counter' style='background:green;color:#fff;filter: none;width: 100%;margin-left: 0px;'>".$rowcount."</div>";
		  }
        }
	?>
	</div>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens - Today</div>
    <div class="user_statistics_counter">	
    <?php 
        $sql6 = "SELECT * from tokens where status=10 AND closed_date=CURDATE()";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?>
	</div>
</div>
<div class="user_statistics_section">
    <div class="user_statistics_text">Closed Tokens - All</div>
	<div class="user_statistics_counter">
    <?php 
        $sql6 = "SELECT * from tokens where status=10";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?> 
	</div>
</div>
<div class="user_statistics_section" style="margin-bottom:100px;">
    <div class="user_statistics_text">Tokens - All Status</div>
	<div class="user_statistics_counter">
    <?php 
        $sql6 = "SELECT * from tokens";
		if ($result=mysqli_query($conn,$sql6)) {
        $rowcount=mysqli_num_rows($result);
          echo "".$rowcount."";			  
		  }
	?> 
	</div>
</div>	
<?php include "css/footer.php";?>
<!--===============================================================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
<!--===============================================================================================-->

<script type="text/javascript">
$(document).ready( function(){
$('#load-assign').load('php/load-assign.php');
refresh();
});
 
function refresh()
{
setTimeout( function() {
  $('#load-assign').load('php/load-assign.php');
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