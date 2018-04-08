<?php
function post($var)
{
	if(isset($_POST[$var]))
	{
		return $_POST[$var];
	}
}

function connect_db($database)
{
	$connect = mysqli_connect('localhost', 'root', '', $database) or die('unable to make databse connection');
	return $connect;
}

function insert($array,$connect,$tablename)
{
	$columns = implode(", ",array_keys($array));
	// $escaped_values = array_map('mysqli_real_escape_string', array_values($array));
	$values  = implode("', '", $array);

	$sql = "INSERT INTO `$tablename`($columns) VALUES ('$values'); ";
	$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

	return $query;
} 

function fetch_custom($connect, $sql)
{
	$query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
	return $query;
}

function exists($email, $tablename)
{
	$sql = "SELECT * FROM $tablename where email = '$email' ";
	$query = mysqli_query($connect, $sql);

	if (mysqli_num_rows($query)> 0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

// <a href="javascript: history.go(-1)">Go Back</a>

$GLOBALS['connect'] = connect_db('swep_project');



?>