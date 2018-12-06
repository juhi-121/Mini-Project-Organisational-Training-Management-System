<?php
	require_once('includes/functions.php');
	include("styles/emp.css");
	
	session_start();
	error_reporting(0);
	
	$flag1 = 0;
	$flag2 = 0;

	$conn = mysqli_connect("localhost", "root", "", "training");
	if(!$conn){
		die("Could not connect to database: ".mysqli_error());
	}

	$cname = mysqli_real_escape_string($conn, $_GET['cid']);

	$sql = "SELECT * FROM course WHERE course_name='$cname'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$cid = $row['course_id'];
		
	$emp_id = $_SESSION['id'];
	$trainer_id = $row['emp_id'];

	// Trainer for course is logged in
	if($emp_id == $trainer_id){
		$flag2 = 1;
	}

	// To get name of trainer
	$sql = "SELECT * FROM employee WHERE emp_id='$trainer_id'";
	$result2 = mysqli_query($conn, $sql);			
	$row2 = mysqli_fetch_assoc($result2);

	// To check if logged in employee is registered in course
	$sql = "SELECT * FROM registered WHERE emp_id='$emp_id'";
	$result3 = mysqli_query($conn, $sql);
	while($row3 = mysqli_fetch_assoc($result3)){
		if($row3['course_id'] == $cid){
			$flag1 = 1;
		}
	}

	$link1 = 'viewSessions.php?cid='.$cid;
	$link2 = 'addSession.php?cid='.$cid;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Course Details</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<style type="text/css">
		.i1 .s1{
			visibility: hidden;
			width: 120px;
			color:pink;
			background-color: white;
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
	<div id="header">
		<p class="i1" align="left">
					<img src="blue-user-icon.svg" style="width: 42px;height: 42px;margin-left: 5px;margin-right: 5px;float: left;">

	 <?php echo $_SESSION['user']; ?><span class="s1"><?php echo $_SESSION['email'] ?></span>
		</p>
	</div>

	<div id="container">
		<div class="nav">
			<ul style="list-style-type: none">
		
	<li>
	
	<a class="a2" href="dashboard.php"><img src="home-icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>HOME</h3></a></li>
	</ul>

	
			
	<ul style="list-style-type: none">
		
	<li>
	
	<a class="a2"id="active"href="empCourse.php"><img src="purple_icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>Browse Courses</h3></a></li>
	
	<li>
	<a class="a2"href="logout.php"><img src="Logout-01.png" style="width: 30px;height: 30px;float: left; margin: auto"><h4><h3>Logout</h3></h4></a>
</li>
</ul>
</div>
		<div class="content" style="color: #6279B3;font-size: 30px;font-style: oblique;">
	<div id="dets">
		<?php
			echo "<h3>Course: ".$row['course_name']."</h3><br>";
			echo "<h3 align=left>Taught By: ".$row2['name']."</h3>";
			echo "<h3 align=left>Syllabus: ".$row['syllabus']."</h3>";
			echo "<h3 align=left>Duration: ".$row['duration']."</h3>";
		?>
	</div>

	<div  id="reg" style="display: block;">
		<form action="includes/functions.php" method="post">
			<input type="hidden" name="course" value=<?php echo $cid ?>>
			<input type="submit"class="b1" name="register" value="Sign Up!">
		</form>
	</div><br>

	<div class="sessionDetails">
		<a class="a1"href=<?php echo $link1; ?>>All Sessions' Details</a>
	</div><br><br>

	<div class="addSession" id="add" style="display: none;">
		<a class="a1"href=<?php echo $link2; ?>>Add Session Details</a>
	</div>

	<script type="text/javascript">
		if(<?php echo $flag1; ?>){
			var d = document.getElementById("reg");
			d.style.display = "none";
		}
		if(<?php echo $flag2; ?>){
			var d = document.getElementById("reg");
			d.style.display = "none";

			document.getElementById('add').style.display = "block";
		}
	</script>
</div>

</body>
</html>