<?php 
include 'includes/connect.php';
$query = "SELECT Quarter,Emp1,Emp2,Emp3,Emp4 FROM empperformance";
$result = mysqli_query($conn,$query);
?>
<html>
  <head>
  	<title> Employee Performance</title>
  	<style type="text/css">
  		body
  		{
  			background: #558E54;
  		}
  	</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['Quarter', 'Ritik', 'Shantanu', 'Harsh','Geeta'],
          <?php  
            while($row = mysqli_fetch_array($result))  
              {  
                echo "['".$row["Quarter"]."', ".$row["Emp1"]." ,".$row["Emp2"].", ".$row["Emp3"].",".$row["Emp4"]."],";  
              }  
          ?>   
        ]);

        var options = {
          title: 'Employee Performance',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>