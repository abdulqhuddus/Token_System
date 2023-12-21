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
<!--<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>-->
<script type="text/javascript">
//jQuery code that will trigger when you click on one of the links displayed by the PHP script
$('.isVideo').on('click',function(){
   //this will change the video source to the chosen video
   $('#vidsrc').attr('src',$(this).data('video'));
   return false;
   });
<?php  }   ?>
</script>