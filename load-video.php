
  <div class="logo"><img src="images/logo1/logo1.png"></div>
   <?php
   $directory='videos'; // Add your Directory here
   $path    = './'.$directory.'/';
   $allFiles = scandir($path,1);
   $files = array_diff($allFiles, array('.', '..'));
   //print_r($files)
   ?>
   <div class="main">  
     <video src="<?php echo 'videos/'.$files[0];?>" id="myvideo" width="100%" height="100%" autoplay muted poster="bgs\vid-bg.jpg"></video>
<script type='text/javascript'>
  var directory = '<?php echo $directory;?>';
    var myvids = <?php echo json_encode($files); ?>;
    index=0;
    document.getElementById('myvideo').addEventListener('ended',myHandler,false);
    function myHandler(e) {
     index++;
       // For Repeating all video files 
       if(index>=myvids.length)
        index=0;

     var vid = document.getElementById("myvideo");
       vid.src = directory+'/'+myvids[index];
    }

</script>
   </div> 