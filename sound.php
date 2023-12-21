<?php 
            include 'config.php'; 
            $sql = "SELECT * from tokens2022 WHERE status=1";
		    if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
		      if ($rowcount > 0){
              $myAudioFile = "images/tingtong.mp3";
echo '<audio autoplay controls muted>
         <source src="'.$myAudioFile.'" type="audio/mp3">
      </audio>';		  
		      }
		      else{
		      }			    
            }
			else{
			}			
	     ?> 