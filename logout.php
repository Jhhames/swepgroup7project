<?php
session_start();
ob_start();

	if(isset($_SESSION['location']) or isset($_SESSION['name']))
	{
		session_destroy();
		header("location:index.php");

	}
	else
	{
		
	}
?>