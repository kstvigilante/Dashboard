<?php 
include 'includes/connect.php';
$query = "SELECT year,sales,expenses,profit FROM performance";
$result = mysqli_query($conn,$query);
?>
<html>
  <head>
    <title> Financial Report</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          <?php  
            while($row = mysqli_fetch_array($result))  
              {  
                echo "['".$row["year"]."', ".$row["sales"]." ,".$row["expenses"].", ".$row["profit"]."],";  
              }  
          ?>  
        ]);

        var options = {
          chart: {
            title: 'Financial Report',
            subtitle: 'Sales, Expenses, and Profit',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>