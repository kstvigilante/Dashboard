<?php 
include 'includes/connect.php';
$query = "SELECT year,sales,expenses,profit FROM performance";
$result = mysqli_query($conn,$query);
?>

 <html>
  <head>
  	<title> Company Performance</title>
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
          ['Year', 'Earnings', 'Expenditure', 'Net Profit'],
          <?php  
            while($row = mysqli_fetch_array($result))  
              {  
                echo "['".$row["year"]."', ".$row["sales"]." ,".$row["expenses"].", ".$row["profit"]."],";  
              }  
          ?>   
        ]);

        var options = {
          title: 'Company Performance',
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