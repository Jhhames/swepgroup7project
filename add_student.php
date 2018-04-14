<?php
	include 'functions/database.php';
	include 'functions/sessions.php';

	
		$connect= $GLOBALS['connect'];
		
		$sql = "SELECT * FROM `courses` ";
		$select_all = fetch_custom($connect,$sql);

	function student_exists($matric, $table_name)
	{
		$connect = connect_db('swep_project');

		$sql = "SELECT * FROM $table_name where matric_no = '$matric' ";
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
		

	if(post('add_student') != NULL )
	{
		$matric_no = post('matric');

		if(student_exists($matric_no, 'students'))
		{
			$_SESSION['errorMessage'] = "This student has been added already";
		}
		else
		{
			$array = array(
			'name' => mysqli_real_escape_string($connect, post('name')),
			'email' => mysqli_real_escape_string($connect, post('email')),
			'password' => 'computer',
			'matric_no' => mysqli_real_escape_string($connect, post('matric')),
			'department' => post('department'),
			'faculty' => post('faculty'),
			'course' => mysqli_real_escape_string($connect, post('course')),
			'current_part' => post('part')
			);

			$insert =  insert($array, $connect, 'students');

			if($insert)
			{
				$_SESSION['successMessage'] = "Student added";
			}
		}
	}

	$sql = "SELECT * FROM `students`";
	$student_list = fetch_custom($connect, $sql);

?>
<!DOCTYPE html>
<html>
<head>

	<title>
		Add courses
	</title>

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

<center>
	<form method="POST">
		<strong>Name</strong>
	<input type="text" name="name" required placeholder="Enter student name">  

		<strong>Email</strong>
		<input type="email" name="email" required placeholder="Enter student email">


		<strong>Matric number</strong>
		<input type="text" name="matric" placeholder="Enter students matric no" required="yes">

		<strong>Faculty</strong>
		<select name="faculty">
			<option value="technology">technology </option>
			<option value="sciences">sciences </option>

		</select>

		<strong>Department</strong>
		<select name="department">
			<option value="Computer Science And Engineering"> Computer Science And Engineering</option>
			<option value="Chemical Engineering"> Chemical Engineering</option>
			<option value="Mechanical Engineering"> Mechanical Engineering</option>
			<option value="Food Science And Technology">food  Science And Technology </option>
			<option value="Civil Engineering"> Civil Engineering</option>
			<option value="Material Science And Engineering "> Material Science And Engineering </option>
			<option value="Electrical And Electronical Engineering"> Electrical And Electronical Engineering</option>
			<option value=" Agricultural And Environmental Engineering"> Agricultural And Environmental Engineering</option>

		</select>

		<strong> Part </strong> 
		<select name="part">
			<option value="1"> 1 </option>
			<option value="2"> 2 </option>
			<option value="3"> 3 </option>
			<option value="4"> 4 </option>
			<option value="5"> 5 </option>
			<option value="6"> 6 </option>
		</select> <p>

		<strong>Course</strong>
		<input type="text" name="course" placeholder="Enter Course student is studying" required>


		<input type="submit" value="Add Student" name="add_student">
	</form>
</center>

<center>
<?=error(); ?>
<?=success(); ?>
</center>
		<div style="overflow-x: auto;">
        <h2 align="center"> ALREADY ADDED STUDENT </h2>
		<table>
		<tr>
				<th>NAME</th>
				<th> EMAIL </th>
				<th> MATRIC NO </th>
				<th> FACULTY </th>
				<th> DEPARTMENT </th>
				<th> COURSE </th>
				<th> CURRENT PART </th>
				<th></th>
			</tr>

				<?php
				if(isset($student_list) && $student_list != NULL && !empty($student_list) )
				{
					while ($row = mysqli_fetch_array($student_list)) {
				
				
				?>
	

			<tr>
				<td> <?=  $row['name']?></td>
				<td>  <?= $row['email'] ?></td>
				<td><?=$row['matric_no'] ?> </td>
				<td><?=$row['faculty'] ?> </td>
				<td><?=$row['department'] ?> </td>
				<td><?=$row['course'] ?> </td>
				<td><?=$row['current_part'] ?> </td>

			
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

</body>
</html>