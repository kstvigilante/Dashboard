<!DOCTYPE html>
<html>
<head>
	<title>Key Performance Indicator</title>
	<style type="text/css">
		body
		{
			margin: 0px;
		}
		#piechart
		{
			float: left;
			background-color: #ffffff;
			width: 684px;
			height: 384px;
			display: block;
			border-right: 1px solid;
		}

		#columnchart
		{
			display: block;
			margin-left: 684px;
			border-left: 1px solid;
			width: 684px;
			height: 384px;
			background-color: #ffffff;
		}

		#combochart
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
		google.charts.load('current', {'packages':['corechart']});
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawPieChart);
		google.charts.setOnLoadCallback(drawColumnChart);
		google.charts.setOnLoadCallback(drawComboChart);
		function drawPieChart()  
        {  
            var data = google.visualization.arrayToDataTable([  
                       ['status', 'number'],  
                       <?php  
                       	include 'includes/connect.php';
						$query = "SELECT status, count(*) as number FROM custrelation GROUP BY status";
						$result = mysqli_query($conn,$query);
						while($row = mysqli_fetch_array($result))  
                        {  
                        	echo "['".$row["status"]."', ".$row["number"]."],";  
                        }  
                        ?>  
                    	]);  
            var options = 
            {  
            	title: 'Customer relation',  
             	pieHole: 0.4,   
            };  
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
            chart.draw(data, options);  
        }

        function drawColumnChart()
        {
        	var data =  google.visualization.arrayToDataTable([  
                        ['category', 'quantity'],
                        <?php  
                        include 'includes/connect.php';
					    $query = "SELECT category,quantity FROM inventory";
						$result = mysqli_query($conn,$query);
            			while($row = mysqli_fetch_array($result))  
              			{  
                			echo "['".$row["category"]."', ".$row["quantity"]."],";  
              			}  
          				?>
          				]);
          	var view = new google.visualization.DataView(data);

      		var options = 
      		{
        		title: "Inventory",
        		bar: {groupWidth: "100%"},
        		legend: { position: "none" },
      		};
      		var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
      		chart.draw(view, options); 
        }

        function drawComboChart()
        {
        	var data = google.visualization.arrayToDataTable([
          	['Year', 'Sales', 'Expenses', 'Profit'],
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
        		chart: 
        		{
        			title: 'Financial Report',
            		subtitle: 'Sales, Expenses, and Profit',
          		}
        	};
			var chart = new google.charts.Bar(document.getElementById('combochart'));
			chart.draw(data, google.charts.Bar.convertOptions(options))
        }
    </script> 
</head>
<body>
	<div id = "piechart"></div>
	<div id = "columnchart"></div>
	<div id = "combochart"></div>
</body>
</html>