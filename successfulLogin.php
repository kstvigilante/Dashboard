<?php
if(!isset($_SESSION['user_id']))
{
	include 'index.php';
}
else
{
	echo '<center>Login successful '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</center>';
}
?>

