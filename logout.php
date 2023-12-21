<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION["id"] = null;
$_SESSION["username"] = null;
$_SESSION["loggedin"] = null;
$_SESSION["counter"] = null;
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>