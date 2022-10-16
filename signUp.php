<?php
if(isset($_REQUEST['signupBtn'])){
	include './dbConnection.php';
	$username=mysqli_real_escape_string($conn, $_REQUEST['username']);
	$count_query = "SELECT * FROM users WHERE username='$username'";
         $result = mysqli_query($conn, $count_query);
	if (mysqli_num_rows($result)>0) {
		header('location:index.php?regerr=');
		die(0);
	}
	else {
		$username=mysqli_real_escape_string($conn, $_REQUEST['username']);
		$email=mysqli_real_escape_string($conn,$_REQUEST['email']);
		$password=md5($_REQUEST['password']);
		$insert_query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($conn, $insert_query) or die("Account already exists.");
	}

	header('location:index.php');
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
<style>
        #map{
            height: 400px;
            width: 400px;
        }
		#nullAddress{display:none;}
		#hidden_coord{display:none;}
</style>
<link rel="stylesheet" href="./css/userhome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type='text/javascript' src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDrZKefG18zkB7_EgVgGng25SwyzK1ZXgA"></script>
</head>
<body>
<?php
	include "header.php";
?>

<?php
    $name=$password="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST["username"];
        $password=$_POST["password"];
        
    }
?>
<div id="outContainer">
<h3 class="titleBar">Sign Up</h3>
<form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="inContainer" style="width:40%;">
   <p class="titleForm"><i class="fa fa-user-circle"></i>
        Username:<input type="text" name="username" id="username" required="required" oninvalid="setCustomValidity('Please create your username!')" oninput="setCustomValidity('')"/>
    <span style="color:tomato">*</span></p>
   <p class="titleForm"><i class="fa fa-envelope"></i>
        Email:<input type="email" name="email" id="email" required="required" oninvalid="setCustomValidity('Please create your email!')" oninput="setCustomValidity('')" />
     <span style="color:tomato">*</span></p>
   <p class="titleForm"><i class="fa fa-key"></i>
        Password:<input type="password" name="password" id="password" required="required" oninvalid="setCustomValidity('Please create your password!')" oninput="setCustomValidity('')"/>
     <span style="color:tomato">*</span></p>
  
      
    <input class="btn" type="submit" value="Sign up!" name="signupBtn"/></br></br>

</div>
</form>
<br>
</div>
<script>

</body>
</html>
