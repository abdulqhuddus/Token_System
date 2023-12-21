<?php
// Initialize the session
session_start();
include 'config.php'; 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(ISSET($_POST['search'])){
			$date1 = date("Y-m-d", strtotime($_POST['date1']));
			$token = $_POST['token'];
			if($_POST['date2']==null){
				$date2 = "2030-12-31";
			}else{
		    $date2 = date("Y-m-d", strtotime($_POST['date2']));}			
		}
            if($_POST['active-status']==null){
				$activestatus = "null";
			}else{
		    $activestatus = $_POST['active-status'];
			}
			
$_SESSION['date1'] = $date1;
$_SESSION['date2'] = $date2;
$_SESSION['token'] = $token;
$_SESSION['active-status'] = $activestatus;
 
$limit = 10;
$sql = "SELECT COUNT(id) FROM tokens where date between '$date1' AND '$date2' AND (number='$token' OR status IN ($activestatus))";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
$_SESSION['total_records'] = $total_records;
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include "css/navbar.php";?>
<body style="background-image: url(images/small-logo.png);Background-size: 40%;background-repeat:no-repeat;background-position: 128% 18%;height:auto;font-size:1.5rem">
<div class="container" style="border:none">
<div style="width:100%;text-align: center;">
		<form class="form-inline" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="justify-content: center;">
			<label style="margin: 10px;">Date From</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" style="height: 37px;font-size: 1.5rem;"/>
			<label style="margin: 10px;">Date To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>" style="height: 37px;font-size: 1.5rem;"/>
			<!--<label style="margin: 10px;">Counter</label>
			<select class="form-control" name="counter" style="height: 37px;">
			                                  <option></option>
                                              <option  value="1" selected>Counter 1</option>
                                                 <option value="2">Counter 2</option>
            </select>-->
			<label style="margin: 10px;">Token</label>
			<input type="text" class="form-control" placeholder="Token"  name="token" value="<?php echo isset($_POST['token']) ? $_POST['token'] : '' ?>" style="height: 37px;width:100px;font-size: 1.5rem;"/>
			<label style="margin: 10px;">Status</label>
			<select class="form-control" name="active-status" id="active-status" style="height: 37px;font-size: 1.5rem;">
			                                  <option></option>
											     <option value="0,1,10,100" <?php if ($_POST['active-status'] == "0,1,10,100") echo 'selected="selected" '; ?>
 >All</option>
                                                 <option  value="0" <?php if ($_POST['active-status'] == "0") echo 'selected="selected" '; ?>>Waiting</option>
                                                 <option value="1" <?php if ($_POST['active-status'] == "1") echo 'selected="selected" '; ?>>Assigned</option>
												 <option value="10" <?php if ($_POST['active-status'] == "10") echo 'selected="selected" '; ?>>Closed</option>
												 <option value="100" <?php if ($_POST['active-status'] == "100") echo 'selected="selected" '; ?>>Reset</option>												 
            </select>
			<button class="submit-cpl" name="search" style="width:100px;height:37px;margin-top:0px;margin:10px;border-radius:5px"><span class="glyphicon glyphicon-search"></span> Search</button><!-- <a href="admin-dashboard-booking3.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span>Clear</a>-->
		</form>
</div>

        <div class="table-wrapper" style="width:85%;margin-bottom:50px;">
			<div id="target-content">loading...</div>
            
			<div class="clearfix">
               
					<ul class="pagination" style="display:inline">
                    <?php 
					if(!empty($total_pages)){
						for($i=1; $i<=$total_pages; $i++){
								if($i == 1){
									?>
								<li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
															
								<?php 
								}
								else{
									?>
								<li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php
								}
						}
					}
								?>
					</ul>
               </ul>
            </div>
        </div>
    </div>
	<?php include "css/footer.php";?>
	<script>
	$(document).ready(function() {
		$("#target-content").load("php/tokens_data.php?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			var select_id = $(this).parent().attr("id");
			$.ajax({
				url: "php/tokens_data.php",
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$("#target-content").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
			});
		});
    });
</script>
<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>
</body>
</html>