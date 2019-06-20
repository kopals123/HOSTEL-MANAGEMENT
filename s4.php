<?php
session_start();
if(isset($_POST["btn2"]))
{
	session_destroy();
	header("location:s1.php");
}
?>