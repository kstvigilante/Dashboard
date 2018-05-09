<!DOCTYPE html>
<?php
include 'includes/connect.php';
$errors = array();
$em='';
$pwd='';
if(!empty($_POST['email']))
{	
	$em = mysqli_real_escape_string($conn,trim($_POST['email']));

}
else
{
	 $errors[] = 'Enter your email';
}
if(!empty($_POST['password']))
{
	$pwd = mysqli_real_escape_string($conn,trim($_POST['password']));
}
else
{
	$errors[] = 'Enter your password';

}


$q = "SELECT user_id,first_name,last_name FROM users WHERE email = '$em' AND password = sha1('$pwd')";
$r = mysqli_query($conn,$q );
if(mysqli_num_rows($r)!= 1)
{
	$errors[] =  'Inncorrect username or password';
}
else if(empty($errors))
{
	session_start();
	$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row['last_name'];
	include 'home.php';
	mysqli_close($conn);
	exit();
}

?>
<html>
<head>
	<title>Welcome!!</title>
	<style type="text/css">
		body
		{
			background-image: url("images/wallpaper.jpg");
			color: #ffffff;
		}
		table
		{
			margin-top: 190px;
			margin-left: auto;
			margin-right: auto;
		}

		table tr td
		{
			padding: 10px;
		}

		table tr td input
		{
			border-radius: 12px;
		}

		table tr td a
		{
			text-decoration: none;
			color: #ffffff;
		}
	</style>
</head>
<body>
<div>	
	<table>
		<form action="index.php" method="POST">
			<tr>
				<td> Email </td>
				<td> <input type="text" name="email"> </td>
			</tr>
			<tr>
				<td> Password </td>
				<td> <input type="Password" name="password"> </td>
			</tr>
			<tr>
				<td> <input type="submit" name="submit"> </td>
				<td> <a href = "signup.php" target = "_blank"> Sign up </a> </td>
			</tr>
		</form>
	</table>
</div>
</body>
</html>
