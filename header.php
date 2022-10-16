<!DOCTYPE HTML>
<html>
<head>
<title>Book Exchange System</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="./css/homeStyle.css">
<body>

<div class="w3-top">
<div class="w3-bar navBar">
	
	<a href="index.php" class="w3-bar-item w3-button">Home</a>
<?php
	//If logged in already, show the user center button instead of login and sign up
	if(isset($_SESSION["user_login"]) && $_SESSION["user_login"]=='1'){
		print("<a href='user_home.php' class='w3-bar-item w3-button'>User Center</a>");
	}else{
		print("<a href='user_login.php' class='w3-bar-item w3-button'>Login</a>");
		print("<a href='signUp.php' class='w3-bar-item w3-button'>Sign Up</a>");
	}
?>
	
	<a href="aboutUs.php" class="w3-bar-item w3-button">About Us</a>
	
	
	
</div>
</div>

<br><br><br><br>
</body>
</html>