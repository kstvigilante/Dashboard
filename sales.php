<?php 
include 'includes/connect.php';
$query = "SELECT product_name,quantity FROM sales";
$result = mysqli_query($conn,$query);
?>

<html>
<head>
  <title> Sales </title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Product", "Quantity"],
        <?php  
          while($row = mysqli_fetch_array($result))  
          {  
            echo "['".$row["product_name"]."', ".$row["quantity"]."],";  
          }  
        ?>
        
      ]);

      var view = new google.visualization.DataView(data);

      var options = {
        title: "Total quantity sold",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
</head>
<body>
<div id="barchart_values" style="width: 900px; height: 300px;"></div>
</body>
</html>