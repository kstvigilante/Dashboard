<!DOCTYPE html>
<html>
<head>
	<title>Employee Data</title>
	<style type="text/css">
		body
		{
			margin: 0px;
		}

		#pieChart
		{
			float: left;
			background-color: #ffffff;
			width: 684px;
			height: 384px;
			display: block;
		}

		#lineChart
		{
			display: block;
			margin-left: 684px;
			width: 684px;
			height: 384px;
			background-color: #ffffff;
		}
	</style>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawPieChart);
		google.charts.setOnLoadCallback(drawLineChart);
		
		function drawPieChart()  
        {  
            var data = google.visualization.arrayToDataTable([  
            			['Gender', 'Number'],  
                       	<?php  
                       		include 'includes/connect.php';
							$query = "SELECT gender,count(*) as number FROM employees GROUP BY gender";
							$result = mysqli_query($conn,$query);
                        		while($row = mysqli_fetch_array($result))  
                          		{  
                            		echo "['".$row["gender"]."', ".$row["number"]."],";  
                        		}  
                        ?>  
                     		]);  
            var options = 
            {  
                title: 'Percentage of Male and Female Employee',  
                is3D:true
                //pieHole: 0.4,   
            };  
            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));  
            chart.draw(data, options);  
        }
        
        function drawLineChart()
        {
        	var data = google.visualization.arrayToDataTable([
          				['Quarter', 'Ritik', 'Shantanu', 'Harsh','Geeta'],
          				<?php  
          					include 'includes/connect.php';
							$query = "SELECT Quarter,Emp1,Emp2,Emp3,Emp4 FROM empperformance";
							$result = mysqli_query($conn,$query);
            				while($row = mysqli_fetch_array($result))  
              				{  
                				echo "['".$row["Quarter"]."', ".$row["Emp1"]." ,".$row["Emp2"].", ".$row["Emp3"].",".$row["Emp4"]."],";  
              				}  
          				?>   
        				]);

        	var options = 
        	{
          		title: 'Employee Performance',
          		legend: { position: 'bottom' }
        	};

        	var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
			chart.draw(data, options);
        } 
    </script>
</head>
<body>
	<div id = "pieChart"></div>
	<div id = "lineChart"></div>
</body>
</html>