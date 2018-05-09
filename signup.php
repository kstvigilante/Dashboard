<!DOCTYPE html>
<?php
include 'includes/connect.php';
$errors = array();
if(empty($_POST['first_name']))
{
	$errors[] = 'Enter your first name';
}
else
{
	$first_name = mysqli_real_escape_string($conn,trim($_POST['first_name']));
}
if(empty($_POST['last_name']))
{
	$errors[] = 'Enter your last name';
}
else
{
	$last_name = mysqli_real_escape_string($conn,trim($_POST['last_name']));
}
if(empty($_POST['email']))
{
	$errors[] = 'Enter your email';
}
else
{
	$email = mysqli_real_escape_string($conn,trim($_POST['email']));
}
if(empty($_POST['password1']))
{
	$errors[] = 'Enter your password';
}
else
{
	if($_POST['password1'] != $_POST['password2'])
	{
		$errors[] = 'Password does not match';
	}
	else
	{
		$password1 = mysqli_real_escape_string($conn,trim($_POST['password1']));
	}
}
if(empty($errors))
{
	$q = "SELECT user_id FROM users WHERE email = '$email'";
	$r = mysqli_query($conn,$q);
	if(mysqli_num_rows($r)!= 0)
	{
		$errors[] = 'Email id already registered';
	}
}
if(empty($errors))
{
	$q = "INSERT INTO users(first_name,last_name,email,password) VALUES
		  ('$first_name','$last_name','$email',sha1('$password1'))";
	$r = mysqli_query($conn,$q);
	if($r)
	{
		echo"<center>Registration complete , now login</center";
		include 'index.php';
	}
	mysqli_close($conn);
	exit();
}
else
{
	echo'';
	mysqli_close($conn);
}
?>
<html>
<head>
	<title>Sign up!!</title>
</head>
<style type="text/css">
	body
	{
		margin: 0px;
		background-image: url("images/wallpaper.jpg");
		color: #ffffff;
	}
	table
	{
		margin-top: 75px;
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
<body>
	<center><h3>Sign up here</h3></center>
	<table>
		<form action = "signup.php" method="POST">
			<tr>
				<td> First name </td>
				<td> <input type="text" name="first_name"> </td>
			</tr>
			<tr>
				<td> last name </td>
				<td> <input type="text" name="last_name"> </td>
			</tr>
			<tr>
				<td> Email </td>
				<td> <input type="text" name="email"> </td>
			</tr>
			<tr>
				<td> Password </td>
				<td> <input type="password" name="password1"> </td>
			</tr>
			<tr>
				<td> Confirm password </td>
				<td> <input type="password" name="password2"> </td>
			</tr>
			<tr>
				<td colspan="2" align="center"> <input type="submit" name="submit"> </td>
			</tr>
		</form>
	</table> 
</body>
</html>