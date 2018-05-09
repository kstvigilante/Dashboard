<!DOCTYPE html>
<html>
<head>
	<title>Sales Analysis!!</title>
	<style type="text/css">
		body
		{
			margin: 0px;
		}
		#lineChart
		{
			float: left;
			background-color: #ffffff;
			width: 684px;
			height: 384px;
			display: block;
			border-right: 1px solid;
		}
		#barChart
		{
			display: block;
			margin-left: 684px;
			border-left: 1px solid;
			width: 684px;
			height: 384px;
			background-color: #ffffff;
		}
		#comboChart
		{
			background-color: #ffffff;
			width: 100%;
			height: 384px;
			border-top: 1px solid;
			padding: 10px;
		}
	</style>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load("current", {packages:["corechart"]});
    	google.charts.setOnLoadCallback(drawBarChart);
    	google.charts.setOnLoadCallback(drawLineChart);
    	google.charts.setOnLoadCallback(drawComboChart);
    	function drawBarChart() 
    	{
      		var data = google.visualization.arrayToDataTable([
        	["Product", "Quantity"],
        	<?php  
        		include 'includes/connect.php';
				$query = "SELECT product_name,quantity FROM sales";
				$result = mysqli_query($conn,$query);
        		while($row = mysqli_fetch_array($result))  
        		{  
            		echo "['".$row["product_name"]."', ".$row["quantity"]."],";  
        		}  
        	?>
        	]);

    		var view = new google.visualization.DataView(data);

    		var options = 
    		{
        		title: "Total quantity sold",
        		bar: {groupWidth: "95%"},
        		legend: { position: "none" },
      		};
    		var chart = new google.visualization.BarChart(document.getElementById("barChart"));
    		chart.draw(view, options);
  		}

  		function drawLineChart()
  		{
  			var data = google.visualization.arrayToDataTable([
          	['Year', 'Earnings', 'Expenditure', 'Net Profit'],
          	<?php  
          	include 'includes/connect.php';
			$query = "SELECT year,sales,expenses,profit FROM performance";
			$result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result))  
            	{  
                	echo "['".$row["year"]."', ".$row["sales"]." ,".$row["expenses"].", ".$row["profit"]."],";  
            	}  
          	?>   
        	]);

        	var options = 
        	{
          		title: 'Company Performance',
          		legend: { position: 'bottom' }
        	};

        	var chart = new google.visualization.LineChart(document.getElementById('lineChart'));

        	chart.draw(data, options);
  		}

  		function drawComboChart()
  		{
  			var data = google.visualization.arrayToDataTable([
        	['Year', 'Uttar Pradesh', 'Bihar', 'Gujarat', 'Maharashtra', 'Karnatak', 'Average'],
        	<?php
        		include 'includes/connect.php';
				$query = "SELECT year,UP,Bihar,Gujarat,Maharashtra,Karnatak,Average FROM salesbystate";
				$result = mysqli_query($conn,$query);  
            	while($row = mysqli_fetch_array($result))  
            	{  
                	echo "['".$row["year"]."', ".$row["UP"]." ,".$row["Bihar"].", ".$row["Gujarat"].",".$row["Maharashtra"].", ".$row["Karnatak"].",".$row["Average"]."],";  
            	}  
          	?>   
      		]);

    		var options = 
    		{
      			title : 'Sales by State',
      			vAxis: {title: '₹'},
      			hAxis: {title: 'Year'},
      			seriesType: 'bars',
      			series: {5: {type: 'line'}},
    		};

    		var chart = new google.visualization.ComboChart(document.getElementById('comboChart'));
    		chart.draw(data, options);
  		}
	</script>
</head>
<body>
	<div id = "lineChart"></div>
	<div id = "barChart"></div>
	<div id = "comboChart"></div>
</body>
</html>