<?php
if(!isset($_SESSION['user_id']))
{
	include 'index.php';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Home </title>
	<style type="text/css">
	* 
	{
		margin: 0px;
		padding: 0px;
	}
	#top_bar
	{
		background-color: #ABB6AD;
		height: 89px;
		width: 100%;
		margin:0px;
		display: block;
		background-image: url("images/logo.jpg");
		padding: 5px;
	}
		
	body
	{
		margin: 0px;
		background-color: #EFF0EF;
	}

	#side_menu
	{
		background-color: #ABB6AD;
		height: 100%;
		width: 150px;
		margin-top: 0px;
		display: block;
		position: fixed;
	}

	#side_menu ul li
	{
		padding-top: 20px;
		padding-left: 20px;
		list-style: none;
		border-bottom: 1px solid rgba(100,100,100,0.9);
	}

	#side_menu ul li a
	{
		text-decoration: none;
	}

	#side_menu ul li:hover
	{
		background-color: #EFF0EF;
	}
	</style>
</head>
<body>
	<div id = "top_bar"></div>
	<div id = "side_menu">
		<ul>
			<li> <a href="kpi.php" target = "_blank"> KPI </a></li>
			<li> <a href="salesResult.php" target = "_blank"> Sales </a></li>
			<li> <a href="employeeInfo.php" target = "_blank"> Employees </a></li>
			<li> <a href="logout.php" target = "_blank"> Logout </a></li>
		</ul>
	</div>
	<?php
		echo '<center>Login successful '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</center>';
	?>
</body>
</html>
}
