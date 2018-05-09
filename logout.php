<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		include 'index.php';
	}
	else
	{
		$_SESSION = array();
		session_destroy();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Logging Out !!</title>
</head>
<body>
	<?php
		echo '<center> You have logged out , log in to view dashboard again</center>';
		include 'index.php';
	?>
</body>
</html>