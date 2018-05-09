
<?php 
include 'includes/connect.php';
$query = "SELECT year,UP,Bihar,Gujarat,Maharashtra,Karnatak,Average FROM salesbystate";
$result = mysqli_query($conn,$query);
?>

 <html>
  <head>
    <title>Sales by State</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Year', 'Uttar Pradesh', 'Bihar', 'Gujarat', 'Maharashtra', 'Karnatak', 'Average'],
         <?php  
            while($row = mysqli_fetch_array($result))  
              {  
                echo "['".$row["year"]."', ".$row["UP"]." ,".$row["Bihar"].", ".$row["Gujarat"].",".$row["Maharashtra"].", ".$row["Karnatak"].",".$row["Average"]."],";  
              }  
          ?>   
      ]);

    var options = {
      title : 'Sales by State',
      vAxis: {title: '₹'},
      hAxis: {title: 'Year'},
      seriesType: 'bars',
      series: {5: {type: 'line'}},
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>