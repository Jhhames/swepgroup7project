<?php
	include 'functions/database.php';
	include 'functions/sessions.php';

	
		$connect= $GLOBALS['connect'];
		
		$sql = "SELECT * FROM `courses` ";
		$select_all = fetch_custom($connect,$sql);

	function course_exists($course, $table_name)
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
		

	if(post('add_course') != NULL )
	{
		$course = post('course');

		if(course_exists($course, 'courses'))
		{
			$_SESSION['errorMessage'] = "This has been added already";
		}
		else
		{
			$array = array(
			'code' => mysqli_real_escape_string($connect, post('course')),
			'title' => mysqli_real_escape_string($connect, post('title')),
			'units' => post('units'),
			'faculty' => post('faculty'),
			'semester' => post('semester'),
			'part' => post('part')
			);

			$insert =  insert($array, $connect, 'courses');

			if($insert)
			{
				$_SESSION['successMessage'] = "Course added";
			}
		}
	}

	$sql = "SELECT * FROM `courses`";
	$course_list = fetch_custom($connect, $sql);

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
		<strong>Course</strong>
	<input type="text" name="course" required placeholder="Enter Course code">  

		<strong>Course title</strong>
		<input type="text" name="title" required placeholder="Enter course title">


		<strong>Units</strong>
		<select name="units">
			<option value="0">0 </option>
			<option value="1">1 </option>
			<option value="2">2 </option>
			<option value="3">3 </option>
			<option value="4">4 </option>
			<option value="5">5 </option>
			<option value="6">6 </option>
			
		</select>

		<strong>Faculty</strong>
		<select name="faculty">
			<option value="all">all </option>
			<option value="technology">technology </option>
			<option value="sciences">sciences </option>

		</select>

		<strong>Part </strong> 
		<select name="part">
			<option value="1"> 1 </option>
			<option value="2"> 2 </option>
			<option value="3"> 3 </option>
			<option value="4"> 4 </option>
			<option value="5"> 5 </option>
			<option value="6"> 6 </option>
		</select>

		<strong>Semester</strong>
		<select name="semester">
			<option value="harmattan"> harmattan </option>
			<option value="rain"> rain </option>
		</select>

		<input type="submit" value="Add Course" name="add_course">
	</form>
</center>

<center>
<?=error(); ?>
<?=success(); ?>
</center>
		<div style="overflow-x: auto;">
        <h2 align="center"> ALREADY ADDED COURSES </h2>
		<table>
		<tr>
				<th>CODE</th>
				<th>COURSE TITLE</th>
				<th> UNITS </th>
				<th> FACULTY </th>
				<th> PART </th>
				<th> SEMESTER </th>
				<th></th>
			</tr>

				<?php
				if(isset($course_list) && $course_list != NULL && !empty($course_list) )
				{
					while ($row = mysqli_fetch_array($course_list)) {
				
				
				?>
	

			<tr>
				<td> <?=  $row['code']?></td>
				<td>  <?= $row['title'] ?></td>
				<td><?=$row['units'] ?> </td>
				<td><?=$row['faculty'] ?> </td>
				<td><?=$row['part'] ?> </td>
				<td><?=$row['semester'] ?> </td>

			
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