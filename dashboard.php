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
<body>
<?Php
require "config.php";// Database connection
$query1 = "SELECT * from tokens where counter=1 AND status=10";
$query2 = "SELECT * from tokens where counter=2 AND status=10";
  if ($result1=mysqli_query($conn,$query1)) {
      $rowcount1=mysqli_num_rows($result1);
  //echo "No of records : ".$rowcount1."<br>";
}else{
echo $query->error;
}
  if ($result2=mysqli_query($conn,$query2)) {
      $rowcount2=mysqli_num_rows($result2);
  //echo "No of records : ".$rowcount2."<br>";
}else{
echo $query->error;
}


// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = [['Counter-1','".$rowcount1."'],['Counter-2','".$rowcount2."'],true];
</script>";
?>

<p style="width:100%;margin:auto;text-align:center;font-size:20px;font-weight:bold;color:rgb(217,12,12)">Tokens Closed Share</p>
<div class="chart_div" id="chart_div" style="width: 50% !important;margin-left: 25% !important;border:2px dashed rgb(217,12,12)">></div>
<br><br>
<?php include "css/footer.php";?>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'counter');
        data.addColumn('number', 'status');
for(i=0;i<my_2d.length;i++)
data.addRow([my_2d[i][0],parseInt(my_2d[i][1])]);

// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'',
           width:900,
           height:700,
		   legend:'center',
           is3D:true,
		   };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>
<script>
document.addEventListener("contextmenu", function(event){
event.preventDefault();   
}, false);
</script>
</body>
</html>