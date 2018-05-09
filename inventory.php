<?php 
include 'includes/connect.php';
$query = "SELECT category,quantity FROM inventory";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Inventory </title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load("current", {packages:['corechart']});
    	google.charts.setOnLoadCallback(drawChart);
    	function drawChart() 
      {
      	var data = google.visualization.arrayToDataTable([  
                          ['category', 'quantity'],
                          <?php  
            while($row = mysqli_fetch_array($result))  
              {  
                echo "['".$row["category"]."', ".$row["quantity"]."],";  
              }  
          ?>   
                          
                           
      ]);

      var view = new google.visualization.DataView(data);

      var options = {
        title: "Inventory",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("barchart"));
      chart.draw(view, options);
  }
	</script>
</head>
<body>
	<div id="barchart" style = "width:900px; height:500px;">
		
	</div>
</body>
</html>