<?php
	
	session_start();
	
	error_reporting(0);
	include("styles/admin.css");


	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "training";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	if(!$conn){
		die("Could Not Connect To Database: ".mysqli_error());
	}

	$emp = $_GET['e'];

	if(isset($_POST['increment'])){
		$sql = "CALL salaryIncrement('$emp')";
		$result = mysqli_query($conn, $sql);
	}

	$temp = 0; $empSalary = 0;

	$sql = "SELECT * FROM employee WHERE emp_id='$emp'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['salary'] == NULL){
		$sql1 = "SELECT * FROM temporary_trainer WHERE emp_id='$emp'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$empSalary = $row1['monthly_salary'];
	}
	else{
		$temp = 1;
		$empSalary = $row['salary'];		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['name']; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>
<body>
	<div id="header">
		<p align="left">
					<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px; float: left;">

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
		
		<h6 style="color: white">hello</h6>
		<h1><?php echo $row['name']; ?></h1>
	<h3>Email: <?php echo $row['email']; ?></h3>
	<h3>Contact Number: <?php echo $row['contact']; ?></h3>
	<h3>Department: <?php echo $row['department']; ?></h3>
	<h3>Type Of Employee: <span id="type"></span></h3>
	<h3>Salary: <span id="sal"></span></h3>


	<form action="empProfile.php?e=<?php echo $emp; ?>" method="post" id="salOption">
		<input type="submit" name="increment" value="Increment Salary">
	</form>
	</div>



	

		<script type="text/javascript">
		if(<?php echo $temp; ?> === 1){
			document.getElementById('salOption').style.visibility = "visible";
			document.getElementById('type').textContent = "Permanent";
			document.getElementById('sal').textContent = <?php echo $empSalary; ?>;
		 }
		if(<?php echo $temp; ?> === 0){
			document.getElementById('salOption').style.visibility = "hidden";
			document.getElementById('type').textContent = "Temporary";
			document.getElementById('sal').textContent = <?php echo $empSalary; ?>;
		}
	</script>
</div>
</body>
</html>