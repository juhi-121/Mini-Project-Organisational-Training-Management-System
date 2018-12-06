<?php
	require_once('includes/functions.php');
	include("styles/home.css");
	
	if ((isset($_SESSION['user']))) {
	    header('Location: dashboard.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Inconsolata|Josefin+Sans|Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Roboto+Condensed|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">

</head>
<body>
	<div class="oh" style="width: 100%;height:60px;border:2px solid black;background:linear-gradient(to bottom,#354D66,#999);position: fixed;"><img class="headImage" style="float:left;height:60px;width:70px;margin-left: 30px" src="266ab394b86b4ac6-2048x1024.jpg"><h1 style="font-family: 'Lobster Two', cursive;;color: #fff;padding-top: 8px;letter-spacing: 1.1;">WHITE HAT ORGANISATION PVT. LTD.</h1>
	</div>

	<div class="bg">
	<div align="center">
	<form action="includes/functions.php" method="post">
		<h1 style="color: white;font-family: 'Chakra Petch', sans-serif;">Login</h1>
		<table style="border-spacing: 30px";>
			<tr>
				<td style="color: white;font-family: 'Chakra Petch', sans-serif;">Email:</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td style="color: white;font-family: 'Chakra Petch', sans-serif;">Password:</td>
				<td><input type="password" name="password" required></td>
			</tr>
		</table>
		<input class="lgn" type="submit" name="loginBtn">
	</form>
</div>
	</div>
</body>
</html>