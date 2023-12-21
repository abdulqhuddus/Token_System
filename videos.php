<?php?>
<!DOCTYPE html>

<html lang="en">
<head>
	<title>Al Ihsan Charity Association</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body style="overflow: hidden !important;background-image: url(images/bg2/bg-main.png);">

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
</body>
</html>