<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<head>
	<title>Al Ihsan Medical Complex</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!--===============================================================================================-->
</head>
<div class="header">
   <h1 style="text-align:center;padding: 10px;">Token System</h1>
   <img src="images/logo.png">
</div>
<div class="user-title">
<?php echo ($_SESSION["username"]); ?>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php 
  if($_SESSION["id"] > 2){
	}
	else{
         echo"<a href='welcome.php' class='btn btn-danger ml-3'>Tokens</a>";
	}?>
    <?php 
  if($_SESSION["id"] > 2){
	echo"<a href='dashboard.php' class='btn btn-danger ml-3'>Dashboard</a>";
	echo"<a href='counters.php' class='btn btn-danger ml-3'>Counters</a>";
	echo"<a href='token_reset.php' class='btn btn-danger ml-3'>Tokens</a>";
    echo"<a href='settings.php' class='btn btn-danger ml-3'>Settings</a>";
	}
	else{}?>
  <a href="reset-password.php" class="btn btn-danger ml-3">Password Reset</a>
  <a href="logout.php" class="btn btn-danger ml-3">Log Out</a>
</div>
<div class="disclaimer">Unauthorized access is prohibited and subject to legal proceedings!<br>Al Ihsan Medical Complex</div>
<span class="navli" onclick="openNav()">&#9776;</span>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>