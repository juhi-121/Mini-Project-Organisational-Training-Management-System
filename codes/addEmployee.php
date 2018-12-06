<?php
	require_once('includes/functions.php');
	include("styles/admin.css")
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


	<script type="text/javascript">
		function showOption(elem){
			if(elem.value == "temp"){
				console.log("in");
				document.getElementById('mayShow').style.visibility = 'visible';
				document.getElementById('shown').style.visibility = 'hidden';
			}
			else if(elem.value == "normal"){
				document.getElementById('mayShow').style.visibility = 'hidden';
				document.getElementById('shown').style.visibility = 'visible';	
			}
		}
	</script>

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
	<a class="a2"id="active"href="addEmployee.php"><img src="business_employee_add_addition_sum_hire_new-512.png" style="width: 37px;height: 37px;float: left;"><h3>Add Employee</h3></a></li>
	<li>
	<a class="a2"href="addCourse.php"><img src="Add.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>Add Course</h3></a>
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
	<h1>Add Employee</h1>
	<form action="includes/functions.php" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input class="bharo" type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input class="bharo" type="email" name="email"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input class="bharo" type="password" name="password"></td>
			</tr>
			<tr>
				<td>Contact:</td>
				<td><input class="bharo" type="text" name="contact"></td>
			</tr>
			<tr>
				<td>Department:</td>
				<td><input class="bharo" type="text" name="dept"></td>
			</tr>
			<tr>
				<td>Type of Employee:</td>
				<td>
					<select name="choice" onchange="showOption(this)" required>
						<option value="normal">Normal Employee</option>
						<option value="temp">Temporary Trainer</option>
					</select>
				</td>
			</tr>
			<tr id="shown">
				<td>Annual Salary:</td>
				<td><input class="bharo" type="text" name="ann_salary"></td>
			</tr>
			<tr id="mayShow" style="visibility: hidden;">
				<td>Monthly Salary:</td>
				<td><input class="bharo" type="text" name="mon_salary"></td>
			</tr>
		</table>
		<input style="float: left;margin-left: 100px;" class="lgn" type="submit" name="addEmp">
	</form>
</div>
</body>
</html>