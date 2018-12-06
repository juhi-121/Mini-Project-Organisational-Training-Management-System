<?php
	session_start();
	error_reporting();
	include("styles/view2.css");

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
	<link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans" rel="stylesheet">

	<style type="text/css">
		.i1 .s1{
			visibility: hidden;
			width: 120px;
			color:pink;
			background-color: while;
			text-align: center;
			border-radius: 6px;
			padding: 0px 5px;
			bottom: 100%;
			margin-left: -60px;
			
			left: 50%;

			z-index: 1;
			opacity: 0;
			transition: opacity 1s;


		}
		.i1:hover .s1{
			visibility: visible;
			opacity: 1;
		}


	</style>

</head>
<body>
	<div id="header" style="background-color: #8C4985;">
		<p align="left">
					<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px;float:left; ">

	 <?php echo $_SESSION['user']; ?>
		</p>

	</div>
	<div id="container">
		<div class="nav">
			<ul style="list-style-type: none">
		
	<li>
	
	<a class="a2"href="dashboard.php"><img src="home-icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>HOME</h3></a></li>
	</ul>
			
	<ul style="list-style-type: none">
		
	<li>
	

	<a class="a2"id="active"href="empCourse.php"><img src="purple_icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>Browse Courses</h3></a>

	<a class="a2"href="logout.php"><img src="Logout-01.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>Logout</h3></a>
</li>
</ul>

	</div>
	<div class="content" style="color: #6279B3;font-size: 30px;font-style: oblique;">

	<h1>All Courses</h1>

	<form action="empCourse.php" method="post" style="margin-bottom: 20px;" class="formContent">
		<label for="search">Search By: </label>
		
		<select name="search" style="margin-left: 20px;">
			<option value="course">Course</option>
			<option value="trainer">Trainer Name</option>
		</select>

		<input type="text" name="searchBar" style="margin-left: 50px;">

		<input type="submit" class="lgn" name="searchBtn" value="Search" style="margin-left: 50px;font-family: 'Chakra Petch', sans-serif;">
		<input type="submit" class="lgn" name="clear" value="Clear Search Filter" style="margin-left: 50px;font-family: 'Chakra Petch', sans-serif;width: 200px">
	</form>
	
	<?php

		$result = mysqli_query($conn, $sql);
		$flag = 0;
		$no_of_rows = mysqli_num_rows($result);
		if($no_of_rows > 0){
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
		}else{
			echo "<h4 style='color:red;'>No Courses Found!</h4>";
		}
	?>
</div>
</div>
</body>
</html>