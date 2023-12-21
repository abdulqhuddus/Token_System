<?php 
include 'config.php';
$qvid = "select * from videos where id=1";
$query = mysqli_query($conn,$qvid); while($resvid = mysqli_fetch_array($query)){
?><?php echo $resvid['status']; ?>
<?php  }   ?>