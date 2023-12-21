<div id="load-video"></div>
<script>
$(document).ready( function(){
$('#load-video').load('load-video.php');
refresh();
});
 
function refresh()
{
setTimeout( function() {
  $('#load-video').load('load-video.php');
  refresh();
}, 
<?php 
include 'config.php';
$qvid = "select * from videos where id=1";
$query = mysqli_query($conn,$qvid); while($resvid = mysqli_fetch_array($query)){
?>
<?php echo $resvid['status']; ?>);
}
</script>
<?php  }   ?>