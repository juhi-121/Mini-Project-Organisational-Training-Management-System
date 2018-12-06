<?php 
	session_start();
	error_reporting(0);

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "training";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	if(!$conn){
		die("Could Not Connect To Database: ".mysqli_error());
	}

	if(isset($_POST['loginBtn'])){
		userLogin($conn);
	}
	elseif(isset($_POST['addEmp'])){
		newEmployee($conn);
	}
	elseif(isset($_POST['addCourse'])){
		newCourse($conn);
	}
	elseif(isset($_POST['register'])){
		registration($conn);
	}elseif(isset($_POST['addSess'])){
		newSession($conn);
	}

	function userLogin($conn){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM employee WHERE employee.email='$email'";
		$result = mysqli_query($conn, $sql);
		$check = mysqli_num_rows($result);
		if($check == 1){
			$row = mysqli_fetch_assoc($result);
			if($password == $row['password']){
				$_SESSION['user'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['emp_id'];

				if($_SESSION['user'] == 'admin'){
					header('Location: ../admin.php');
				}else{
					header('Location: ../dashboard.php');
				}
				
			}else{
				header('Location: ../home.php?login_error=true');
			}
		}else{
			header('Location: ../home.php?user_exists=false');
		}
	}

	function newEmployee($conn){
		//name email password contact dept select salary
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
		$type = mysqli_real_escape_string($conn, $_POST['choice']);

		$sql = "SELECT * FROM employee WHERE employee.email='$email'";
		$result = mysqli_query($conn, $sql);
		$check = mysqli_num_rows($result);
		if($check == 1){
			// Employee with this email already exists
			header('Location: ../addEmployee.php?user_exists=true');
		}else{
			// Create new Employee
			if($type == "normal"){
				// Permanent Employee
				$salary = mysqli_real_escape_string($conn, $_POST['ann_salary']);

				$sql = "INSERT INTO employee(name,email,password,contact,department,salary) VALUES('$name','$email','$password','$contact','$dept','$salary')";

				$result = mysqli_query($conn, $sql);
				if($result){
					$last_id = mysqli_insert_id($conn);
					$sql = "INSERT INTO permanent_trainer(emp_id) VALUES($last_id)";
					$result2 = mysqli_query($conn, $sql);
					
					header('Location: ../admin.php?p_emp_added=true');
				}
			}elseif($type == "temp"){
				// Temporary Employee
				$salary = mysqli_real_escape_string($conn, $_POST['mon_salary']);

				$sql = "INSERT INTO employee(name,email,password,contact,department) VALUES('$name','$email','$password','$contact','$dept')";
				$result = mysqli_query($conn, $sql);
				if($result){
					$last_id = mysqli_insert_id($conn);
					$sql = "INSERT INTO temporary_trainer(emp_id,monthly_salary) VALUES($last_id,$salary)";
					$result2 = mysqli_query($conn, $sql);
					header('Location: ../admin.php?t_emp_added=true');
				}
			}
		}
	}

	function newCourse($conn){

		$course = mysqli_real_escape_string($conn, $_POST['course_name']);
		$emp = mysqli_real_escape_string($conn, $_POST['lecturer']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$duration = mysqli_real_escape_string($conn, $_POST['duration']);
		$syllabus = mysqli_real_escape_string($conn, $_POST['syllabus']);

		$sql = "INSERT INTO course(emp_id,course_name,subject,duration,syllabus) VALUES('$emp','$course','$subject','$duration','$syllabus')";
		$result = mysqli_query($conn, $sql);
		if($result){
			header('Location: ../admin.php');
		}else{
			header('Location: ../addCourse.php');
		}
	}

	function registration($conn){
		$emp_id = $_SESSION['id'];
		$course_id = mysqli_real_escape_string($conn, $_POST['course']);

		$sql = "INSERT INTO registered(emp_id, course_id) VALUES('$emp_id', '$course_id')";
		$result = mysqli_query($conn, $sql);
		if($result){
			header('Location: ../dashboard.php');
		}else{
			header('Location: ../details.php?cid='.$course_id.'');
		}
	}

	function newSession($conn){
		$id = mysqli_real_escape_string($conn, $_POST['no']);
		$cid = mysqli_real_escape_string($conn, $_POST['course']);
		$dets = mysqli_real_escape_string($conn, $_POST['d']);

		$sql = "INSERT INTO lecture(id,course_id,details) VALUES('$id','$cid','$dets')";
		$result = mysqli_query($conn, $sql);
		if($result){
			header('Location: ../viewSessions.php?cid='.$cid);
		}else{
			echo $id,$cid,$dets;
			// header('Location: ../addSession.php?cid='.$cid.'&errored=true');
		}
	}
 ?>