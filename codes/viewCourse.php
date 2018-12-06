<?php
	session_start();
	error_reporting();
	include("styles/view.css");

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "training";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	if(!$conn){
		die("Could not connect to database: ".mysqli_error());
	}

	if(isset($_POST['searchBtn'])){
		$word = $_POST['searchBar'];
		$category = $_POST['search'];
		$toSearch = "%".$word."%";

		if($category == 'course'){
			$sql = "SELECT * FROM courseView WHERE LOWER(course_name) LIKE LOWER('$toSearch')";
		}
		elseif($category == 'trainer'){
			$sql = "SELECT * FROM courseView WHERE LOWER(name) LIKE LOWER('$toSearch')";
		}
	}
	elseif(isset($_POST['clear'])){
		$sql = "SELECT * FROM courseView";
	}
	else{
		$sql = "SELECT * FROM courseView";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All Courses</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>
<body>
	<div id="header" style="background-color: #2A3545;">
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
						<h3>HOME</h3>
					</a>
				</li>

				<li>
					<a class="a2" href="addEmployee.php"><img src="business_employee_add_addition_sum_hire_new-512.png" style="width: 37px;height: 37px;float: left;">
						<h3>Add Employee</h3>
					</a>
				</li>

				<li>
					<a class="a2"href="addCourse.php">
						<img src="Add.png" style="width: 37px;height: 37px;float: left; margin: auto">
						<h3>Add Course</h3>
					</a>
				</li>
			
				<li>
					<a class="a2"href="viewEmps.php"><img src="icon-employee-time-attendance.png" style="width: 37px;height: 37px;float: left; margin: auto">
						<h3>View Employees</h3>
					</a>
				</li>

				<li>
					<a class="a2"id="active"href="viewCourse.php"><img src="icon_off_the_shelf_off-ef938c99c4bc24884573ab4290ba5114d3aacba84e0d79c55e111bafd746fa35.png" style="width: 37px;height: 37px;float: left; margin: auto">
						<h3>View Courses</h3>
					</a>
				</li>

				<li>
					<a class="a2"href="logout.php"><img src="Logout-01.png" style="width: 37px;height: 37px;float: left; margin: auto">
						<h3>Logout</h3>
					</a>
				</li>
			</ul>
		</div>

		<div class="content">

			<h1>All Courses</h1>

			<form action="viewCourse.php" method="post" style="margin-bottom: 20px;">
				<label for="search">Search By: </label>
				
				<select name="search" style="margin-left: 20px;">
					<option value="course">Course</option>
					<option value="trainer">Trainer Name</option>
				</select>

				<input type="text" name="searchBar" style="margin-left: 50px;">

				<input type="submit" name="searchBtn" value="Search" style="margin-left: 50px;">
				<input type="submit" name="clear" value="Clear Search Filter" style="margin-left: 50px;">
			</form>
			
			<?php

				$result = mysqli_query($conn, $sql);
				$flag = 0;

				echo '<table>';
				echo "<thead><tr><td>Course Name</td><td>Taught By</td></tr><thead>";
				while($row = mysqli_fetch_assoc($result)){

					$link = "details.php?cid=".$row['course_name'];
					$flag = 1;
					echo "<tr>";
					echo '<td style="padding: 5px;">';
					echo "<a href='$link'><h3>".$row['course_name']."</h3></a>";
					echo "</td>";
					echo "<td>".$row['name']."</td>";
					echo "</tr>";
				}
				echo "</table>";

				if(!$flag){
					echo "<h4>No Courses Found!</h4>";
				}
			?>
		</div>
	</div>
</body>
</html>