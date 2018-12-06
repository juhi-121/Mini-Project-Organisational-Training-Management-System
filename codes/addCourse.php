<?php
	require_once('includes/functions.php');
	include("styles/admin.css");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Course</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Slab" rel="stylesheet">

</head>
<body>
	<div id="header">
		<p align="left">
					<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px;float:left; ">

	 <?php echo $_SESSION['user']; ?>
		</p>

	</div>
	<div id="container">
		<div class="nav">
	<ul style="list-style-type: none">
		
	<li>
		<a class="a2"href="admin.php"><img src="home-icon.png" style="width: 37px;height: 37px;float: left; margin: auto">
<h3>HOME</h3></a>
	</li>

<li>
	<a class="a2"href="addEmployee.php"><img src="business_employee_add_addition_sum_hire_new-512.png" style="width: 37px;height: 37px;float: left;"><h3>Add Employee</h3></a></li>
	<li>
	<a class="a2"id="active"href="addCourse.php"><img src="Add.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>Add Course</h3></a>
	</li>
	
	<li>
	<a class="a2"href="viewEmps.php"><img src="icon-employee-time-attendance.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>View Employees</h3></a>
	</li>
	<li>
	<a class="a2"href="viewCourse.php"><img src="icon_off_the_shelf_off-ef938c99c4bc24884573ab4290ba5114d3aacba84e0d79c55e111bafd746fa35.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>View Courses</h3></a>
	</li>
	<li>
	<a class="a2"href="logout.php"><img src="Logout-01.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>Logout</h3></a>
	</li>
	</ul>
	</div>
	
	<div class="content">
		
		<h1>Add Course</h1>
	<form action="includes/functions.php" method="post">
		<table style="padding: 10px; border-collapse: collapse;">
			<tr>
				<td><b>Course:</b></td>
				<td><input class="bharo" type="text"  name="course_name" required></td>
			</tr>
			<tr>
				<td>Taught By:</td>
				<td><input class="bharo" type="text" name="lecturer" required></td>
			</tr>
			<tr>
				<td>Subject:</td>
				<td><input class="bharo" type="text" name="subject" required></td>
			</tr>
			<tr>
				<td>Duration:</td>
				<td><input class="bharo" type="text" name="duration" required></td>
				<td><input class="lgn" type="submit" name="addCourse"></td>
			</tr>
			<tr>
				<td>Syllabus:</td>
				<td><textarea name="syllabus" rows="20" cols="100"></textarea></td>
			</tr>
			
		</table>
	</form>
<
	</div>
</div>

	</body>
</html>
