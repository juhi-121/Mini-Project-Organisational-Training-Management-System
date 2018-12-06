<?php
	session_start();
	error_reporting(0);
	include("styles/emp.css");

	if(!isset($_SESSION['user'])){
		header('Location: home.php');
	}

	$conn = mysqli_connect("localhost", "root", "", "training");
	if(!$conn){
		die("Could not connect to database: ".mysqli_error());
	}

	$cid = mysqli_real_escape_string($conn, $_GET['cid']);

	$sql = "SELECT * FROM course WHERE course_id='$cid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($_SESSION['id'] != $row['emp_id']){
		header('Location: viewSessions.php?cid="$cid"&trainer=false');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Session Details</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

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
	
	<a class="a2" id="active"href="dashboard.php"><img src="home-icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>HOME</h3></a></li>		
	<li>
	
	<a class="a2" href="empCourse.php"><img src="purple_icon.png" style="width: 30px;height: 30px;float: left; margin: auto"><h3>Browse Courses</h3></a></li>
	
	<li>
	<a class="a2" href="logout.php"><img src="Logout-01.png" style="width: 30px;height: 30px;float: left; margin: auto"><h4><h3>Logout</h3></h4></a>
</li>
</ul>
</div>
	<div class="content" ><h2 style="color: #6279B3;font-size: 30px;font-style: oblique;">
	<div class="content">
		<h1 style="margin-left: -220px">Add Session Details</h1><br><br>


	<div>
		<form action="includes/functions.php" method="post">
			<table>
				<tr>
					<td>Session No: </td>
					<td><input type="text" name="no"></td>
				</tr>
				<tr>
					<td>Details: </td>
					<td><textarea rows="10" cols="30" required name="d"></textarea></td>
				</tr>
			</table>

			<input type="hidden" name="course" value=<?php echo $cid; ?>>
			<input type="submit" class="b1" name="addSess">
		</form>
	</div>
</div>
</div>
</body>
</html>