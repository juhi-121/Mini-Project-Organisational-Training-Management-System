<?php
	session_start();
	error_reporting(0);
	include("styles/emp.css");


	require_once('includes/functions.php');
	
	if (!(isset($_SESSION['user']))) {
	    header('Location: home.php');
	}

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "training";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	if(!$conn){
		die("Could not connect to database: ".mysqli_error());
	}

	$emp = $_SESSION['id'];
	$sql = "SELECT * FROM registered WHERE emp_id='$emp'";
	$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashnoard</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="styles/dashboard.css">
</head>
<body>
	<div id="header">
		<p class="i1" align="left">
		<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px;float: left;">
		<?php echo $_SESSION['user']; ?><span class="s1"><?php echo $_SESSION['email'] ?></span>
		</p>
	</div>

	<div id="container">
		<div class="nav">
			<ul style="list-style-type: none">
				<li><a class="a2"id="active"href="dashboard.php"><img src="home-icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>HOME</h3></a></li>
				<li><a class="a2"href="empCourse.php"><img src="purple_icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>Browse Courses</h3></a></li>
				<li><a class="a2"href="logout.php"><img src="Logout-01.png" style="width: 30px;height: 30px;float: left; margin: auto"><h4><h3>Logout</h3></h4></a>
				</li>
			</ul>
		</div>
		
		<div class="content" >
			<h2 align="left" style="padding: 30px;color: #3A528B;font-size: 30px;border-bottom-style: dotted;border-bottom-color: #3465A4">My Courses</h2>
	
			<?php
				while($row = mysqli_fetch_assoc($result)){
					$c = $row['course_id'];

					$sql2 = "SELECT * FROM course WHERE course_id='$c'";
					$result2 = mysqli_query($conn, $sql2);
					
					while($row1 = mysqli_fetch_assoc($result2)){
						$link = "details.php?cid=".$row1['course_name'];
						echo "<ul class='u1' align=left><li><a  href='$link'>";
						echo "<h3 align='left' style='color:#729FCF'>". $row1['course_name'] ."</h3>";
						echo "</a></li></ul>";
					}
				}
			?>		
		</div>
	</div>
</body>
</html>