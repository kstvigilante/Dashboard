<?php 
include 'includes/connect.php';
$query = "SELECT status, count(*) as number FROM custrelation GROUP BY status";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Customer Relation</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['status', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Customer relation',  
                      //is3D:true
                      pieHole: 0.4,   
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
		</script>
</head>
<body>
	<div id="piechart" style = "width:900px; height:500px;">

	</div>

</body>
</html>