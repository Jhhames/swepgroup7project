<?php
include 'functions/database.php';
include 'functions/sessions.php';

$connect = connect_db('swep_project');


if (isset($_SESSION['name']) && isset($_SESSION['matric_number'])) 
{


	$semester = $_SESSION['semester'];
	$part = $_SESSION['current_part'];
	$name = $_SESSION['name'];
	$faculty = $_SESSION['faculty'];
	$matric_number = $_SESSION['matric_number'];
	$email = $_SESSION['email'];
	$table_name = str_replace(" ", "", $name);

	if (isset($_POST['create']) )
	{
		$create_table = "CREATE TABLE $table_name(
			id int (4) NOT NULL auto_increment PRIMARY KEY,
			code varchar(10) NOT NULL,
			exam_date varchar(20) NOT NULL,
			venue varchar (20) NOT NULL

		)";

		$exec = mysqli_query($connect, $create_table) or die(mysqli_error($connect));
		if($exec){
			echo "Table created";
		}
	}

	function exists_course($course, $table_name)
	{
		$connect = connect_db('swep_project');

		$sql = "SELECT * FROM $table_name where code = '$course' ";
		$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

		if (mysqli_num_rows($query)> 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	if(isset($_POST['del']))
	{
		
		$code = $_POST['course'];

		if (exists_course($code,$table_name))
		{
			$sql_delete = "DELETE from $table_name where code='$code'";
			
			$deleted= mysqli_query($connect, $sql_delete);
				if($deleted)
				{	
					$_SESSION['successMessage'] = "Course deleted";
				}
				else
				{
					$_SESSION['errorMessage'] = mysqli_error($connect);
				}
		}
		else
		{

				$_SESSION['errorMessage'] ="Course deleted already" ;
			
		}
	}
	
	if(isset($_POST['reg']))
	{
		
		$code = $_POST['course'];

		if (exists_course($code,$table_name))
		{
			$_SESSION['errorMessage'] = "Course registered already";
		}
		else
		{

		$sql = "INSERT into $table_name(code) values('$code')";
			$query = mysqli_query($connect, $sql) or die(mysqli_error());

			if ($query)
			{
				$_SESSION['successMessage'] = "Course Registered";
			}
		}
	}





			$sql_table = "SHOW TABLES LIKE '$table_name' ";
				
			$result = mysqli_query($connect, $sql_table) or die(mysqli_error($connect));
				if(mysqli_num_rows($result) > 0)
				{

				$sql = "SELECT * from courses 
						where semester =  '$semester' && faculty = ('$faculty' OR 'all') 
						&& part = '$part'
				";

				$mysqli = fetch_custom($connect, $sql);	

				
	$sql_for_regd = "SELECT * from $table_name";

	$result_regd = mysqli_query($connect, $sql_for_regd) or die(mysqli_error($connect));



?>

<!DOCTYPE html>
<html>
<head>
	<title>Course registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">
		body{
			background-image: url(./index.jpg);
		}
		.container{
			margin-right: 50px;
			margin-left: 50px;
			padding: 10px;
			background-color: white;
			height: 540px;
		}
		#heading{
			text-align: center;
		}
		table{
			width: 100%;
		}
		th,td{
			text-align: center;
			padding: 8px;
		}
		tr:nth-child(even){background-color: #f2f2f2}

	</style>
</head>
<body>
<div class="container">
	<div id="heading">
		<h3>Course Registration</h3>
	</div>
	<div>
		<h4 style="background-color: lightblue">Course Listing for Raining Semester</h4>
	</div>
	<div style="overflow-x: auto;">
		<table>
		<tr>
				<th>CODE</th>
				<th>COURSE TITLE</th>
				<th>UNITS</th>
				<th></th>
			</tr>

<?php
				if(isset($mysqli) && $mysqli != NULL )
				{
					while ($row = mysqli_fetch_array($mysqli)) {
				
				
?>
	

			<tr>
				<td> <?=  $row['code']?></td>
				<td>  <?= $row['title'] ?></td>
				<td><?=$row['units'] ?></td>

				<td><form method="POST">
						<input type="checkbox" value="<?= $row['code'] ?>" name="course" required>
						<input type="submit" style="margin-right: 50px;background-color: skyblue;position: 
	relative;" name="reg" value = "Register">
					</form>
				</td>
			</tr>

<?php
						}
					}
					else
					{
						"No courses for you yet";
					}
?>			
			
		</table>

	</div>
	<div>
		
	</div><br><br>
<center style="color: green"> <?=success() ?> </center>
<center style="color: red"> <?=error() ?> </center>

		<table>
			<h2>Registered courses</h2>
		<tr>
				<th>CODE</th>
				<th></th>
			</tr>

<?php
				if(isset($result_regd) && mysqli_num_rows($result_regd)>0 )
				{
					while ($row = mysqli_fetch_array($result_regd)) {
				
				
?>
	

			<tr>
				<td> <?=  $row['code']?></td>

				<td><form method="POST">
						<input type="checkbox" value="<?= $row['code'] ?>" name="course" required>
						<input type="submit" style="margin-right: 50px;background-color: skyblue;position: 
	relative;" name="del" value = "Delete">
					</form>
				</td>
			</tr>

<?php
						}
					}
					else
					{
						"No Reigistered courses yet";
					}
?>			
			
		</table>


 <a href="profilepage.php"><input type="submit" name="Close" value="Close" style="float:right;margin-right: 50px;background-color: skyblue;position: 
        relative;" id="close"></a>

	
</div>
</body>
</html>


<?php
}
else
{
	?>

	<center>
		<form action="" method="POST">
			<input type="submit" name="create" value="Start course Registration">
		</form>
	</center>

	<?php
}

}
else
{
	redirect_to('index.php');
}
?>