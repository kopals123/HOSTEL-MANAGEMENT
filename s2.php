<?php
session_start();
if(isset($_POST["btn1"]))
{
	$username=$_POST["t1"];
	$password=$_POST["t2"];
	if($username=="prabhat" && $password=="prabhat02")
	{
		$_SESSION["email"]=$username;
		header("location:HOME.php");
	}
	else
	{
		header("location:s1.php");
	}
}	
?>