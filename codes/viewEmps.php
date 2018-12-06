<?php
	include("styles/view.css");
	
	session_start();
		error_reporting(0);

		$dbServerName = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "training";

		$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	if(!isset($_SESSION['user'])){
		header('Location: home.php');
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>All Employees</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>
<body>
	<div id="header">
		<p align="left">
					<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px;float: left;">

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
	<a class="a2"href="addCourse.php"><img src="Add.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>Add Course</h3></a>
	</li>
	
	<li>
	<a class="a2"id="active"href="viewEmps.php"><img src="icon-employee-time-attendance.png" style="width: 37px;height: 37px;float: left; margin: auto"><h3>View Employees</h3></a>
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
		<div class="bkg"></div>
		<h1 style="margin-bottom: 20px">All Employees</h1>
		<div align="center" style="color: black">
		<?php 
	
		if(!$conn){
			die("Could Not Connect To Database: ".mysqli_error());
		}

		$sql = "SELECT * FROM employee";
		$result = mysqli_query($conn, $sql);
		echo "<table>
		<tr>
			<th>Employee ID</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		";

		while($row = mysqli_fetch_assoc($result)){
			if($row['name'] != 'admin'){
				$link = "empProfile.php?e=".$row['emp_id'];

				echo "<tr>";
				echo '<td style="padding: 20px">'. $row['emp_id'] ."</td>";
				echo '<td style="padding: 20px";color:blue><a href='.$link.'>'. $row['name'] ."</a></td>";
				echo '<td style="padding: 20px">'. $row['email'] ."</td>";
				echo "</tr>";
			}
		}

		echo "</table>";
		mysqli_close($conn);
	?>
	</div>
	</div>
</div>
	
</body>
</html>