<?php  	
	session_start();
	include("styles/admin.css");
	error_reporting(0);

	if(!isset($_SESSION['user'])){
		header('Location: home.php');
	}
	elseif(isset($_SESSION['user']) != 'admin'){
		echo "<h1>You Require Administrative Access To View This Page!</h1>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<style>
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 70%;
  position: relative;
  margin: auto;
  margin-top: 20px;
 

}


/* Next & previous buttons */
.prev, .next {
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #14272D;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  -webkit-animation: mymove 5s infinite;
  animation-delay: 1s;
}
@-webkit-keyframes mymove{
	from{top:0px;}
	to {top:  200px;}
}
@keyframes mymove{
	from{top:0px;}
	to {top:  200px;}

}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

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
		<a class="a2"id="active"href="admin.php"><img src="home-icon.png" style="width: 37px;height: 37px;float: left; margin: auto">
<h3>HOME</h3></a>
	</li>

<li>
	<a class="a2"href="addEmployee.php"><img src="business_employee_add_addition_sum_hire_new-512.png" style="width: 37px;height: 37px;float: left;"><h3>Add Employee</h3></a></li>
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
		<div class="slideshow-container">

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<div class="mySlides fade">
  <img src="avatar.png" style="width:100%">
  <div class="text"><a  href="viewEmps.php">View Employees</a></div>
</div>

<div class="mySlides fade">
  <img src="training-courses.jpg" style="width:100%">
  <div class="text"><a  href="viewCourse.php">View Courses</a></div>
</div>

<div class="mySlides fade">
  <img src="Karmick-Training-Institute.jpg" style="width:100%">
  <div class="text"><a  href="https://www.compucert.com/browse-courses.html">EXPLORE!</a></div>
</div>

<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a> -->

</div>
<br>
</div>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 6000); // Change image every 2 seconds
}
</script>
	
	
</body>
</html>
