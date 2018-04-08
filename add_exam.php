<?php
	include 'functions/database.php';
	include 'functions/sessions.php';

	
		$connect= $GLOBALS['connect'];
		
		$sql = "SELECT * FROM `courses` ";
		$select_all = fetch_custom($connect,$sql);

	function course_exists($course, $table_name)
	{
		$connect = connect_db('swep_project');

		$sql = "SELECT * FROM $table_name where course_code = '$course' ";
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
		

	if(post('add_time') != NULL )
	{
		$course = post('course');

		if(course_exists($course, 'exam_timetable'))
		{
			$_SESSION['errorMessage'] = "Date set already for this course";
		}
		else
		{

			$array = array(
			'course_code' => post('course'),
			'venue' => mysqli_real_escape_string($connect, post('venue')),
			'month' => post('month'),
			'day' => post('day'),
			'time' => post('time')
			);

			$insert =  insert($array, $connect, 'exam_timetable');

			if($insert)
			{
				$_SESSION['successMessage'] = "Timetable added";
			}
		}
	}

	$sql = "SELECT * FROM `exam_timetable`";
	$timetable = fetch_custom($connect, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Add Exam time table
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
		<select name="course">
			<?php
				if(isset($select_all))
				{
					while ($row = mysqli_fetch_array($select_all))
					{
			?>
			<option>
				<?= $row['code'] ?>
			</option>

			<?php
					}
				}

			?>
		</select>
		<strong>Venue</strong>
		<input type="text" name="venue" required>

		<strong>Month</strong>
		<select name="month">
			<option value="JAN">JAN </option>
			<option value="FEB">FEB </option>
			<option value="MAR">MAR </option>
			<option value="APR">APR </option>
			<option value="MAY">MAY </option>
			<option value="JUN">JUN </option>
			<option value="JUL">JUL </option>
			<option value="AUG">AUG </option>
			<option value="SEP">SEP </option>
			<option value="OCT">OCT </option>
			<option value="NOV">NOV </option>
			<option value="DEC">DEC </option>
		</select>

		<strong>Day</strong>
		<select name="day">
			<option value="01">01 </option>
			<option value="02">02 </option>
			<option value="03">03 </option>
			<option value="04">04 </option>
			<option value="05">05 </option>
			<option value="06">06 </option>
			<option value="07">07 </option>
			<option value="08">08 </option>
			<option value="09">09 </option>
			<option value="10">10 </option>
			<option value="11">11 </option>
			<option value="12">12 </option>
			<option value="13">13 </option>
			<option value="14">14 </option>
			<option value="15">15 </option>
			<option value="16">16 </option>
			<option value="17">17 </option>
			<option value="18">18 </option>
			<option value="19">19 </option>
			<option value="20">20 </option>
			<option value="21">21 </option>
			<option value="22">22 </option>
			<option value="23">23 </option>
			<option value="24">24 </option>
			<option value="25">25 </option>
			<option value="26">26 </option>
			<option value="27">27 </option>
			<option value="28">28 </option>
			<option value="29">29 </option>
			<option value="30">30</option>
			<option value="31">31 </option>
		</select>

		<strong>Time </strong> 
		<select name="time">
			<option value="8AM - 9AM"> 8AM - 9AM</option>
			<option value="9AM - 10AM"> 9AM - 10AM </option>
			<option value="10AM - 11AM"> 10AM - 11AM </option>
			<option value="11AM - 12PM"> 11AM - 12PM </option>
			<option value="12PM - 1PM"> 12PM - 1PM </option>
			<option value="1PM - 2PM"> 1PM - 2PM </option>
			<option value="2PM - 3PM"> 2PM - 3PM </option>
			<option value="3PM - 4PM"> 3PM - 4PM  </option>
			<option value="4PM - 5PM"> 4PM - 5PM  </option>
			<option value="5PM - 6PM"> 5PM - 6PM  </option>
			<option value="6PM - 7PM"> 6PM - 7PM  </option>
		</select>
		<input type="submit" value="Add" name="add_time">
	</form>
</center>

<center>
<?=error(); ?>
<?=success(); ?>
</center>
		<div style="overflow-x: auto;">
		<table>
		<tr>
				<th>CODE</th>
				<th>VENUE</th>
				<th>DATE</th>
				<th></th>
			</tr>

				<?php
				if(isset($timetable) && $timetable != NULL && !empty($timetable) )
				{
					while ($row = mysqli_fetch_array($timetable)) {
				
				
				?>
	

			<tr>
				<td> <?=  $row['course_code']?></td>
				<td>  <?= $row['venue'] ?></td>
				<td><?=$row['day'] ?> <?=$row['month'] ?> <?=$row['time'] ?></td>

			
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