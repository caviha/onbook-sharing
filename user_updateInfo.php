<?php 
	session_start();
	//Check login	
	if(!isset($_SESSION['user_login'])||$_SESSION["user_login"]=='0') {
		header('location:index.php');
	}
	
	//Get the current info of this user
	$user_id=$_SESSION['user_id'];
	include './dbConnection.php';
	$sql="SELECT * FROM users WHERE user_id='$user_id'";
	$result=mysqli_query($conn, $sql) or die(mysql_error());
	$rws= mysqli_fetch_array($result);
	$username=$rws['username'];
	$email=$rws['email'];

	//Check the password (there is checking password before process)
	if(isset($_REQUEST['passwordBtn'])){
		$password=mysqli_real_escape_string($conn, $_REQUEST['newPassword']);
		$previous=mysqli_real_escape_string($conn, $_REQUEST['previousPassword']);
		$sql="SELECT password FROM users WHERE user_id='$user_id'";
		$result=mysqli_query($conn, $sql) or die(mysql_error());
		$rws= mysqli_fetch_array($result);
		if($rws[0]==$previous){
			$sql="UPDATE users SET password='$password' WHERE user_id='$user_id'";
			mysqli_query($conn, $sql) or die("An error occurs.");
			header('location:index.php?updateSuccess=');
		}
		else {
			echo "<script>alert('Your password is incorrect.');window.history.back();</script>";
			// header('location:user_error.php?err=password');
			// echo "Your password is incorrect";
			// echo "<a href='user_updateInfo.php'><i class='fa fa-chevron-circle-left'></i>Back</a><br/><br/>";
		}

	}
	//Change the email
	if(isset($_REQUEST['emailBtn'])){
		$email=mysqli_real_escape_string($conn, $_REQUEST['email']);
		$sql="UPDATE users SET email='$email' WHERE user_id='$user_id'";
		mysqli_query($conn, $sql) or die("An error occurs.");

		header('location:index.php?updateSuccess=');
	}
	//Change the username
	if(isset($_REQUEST['usernameBtn'])){
		$username=mysql_real_escape_string($conn, $_REQUEST['username']);
		$sql="UPDATE users SET username='$username' WHERE user_id='$user_id'";
		mysql_query($conn, $sql) or die("An error occurs.");

		header('location:index.php?updateSuccess=');
	}
	
	
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Update Information</title>
	<script type='text/javascript' src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDrZKefG18zkB7_EgVgGng25SwyzK1ZXgA"></script>
<style>
	#nullAddress{display:none;}
</style>
<link rel="stylesheet" href="./css/userhome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="outContainer">
	<a href="user_home.php"><i class="fa fa-chevron-circle-left"></i>Back to User Center</a><br/><br/>
    <h2 class="titleBar"><i class="fa fa-user-circle"></i>&nbsp;Update Information</h2>
    <p class="titleForm"><b>Dear &nbsp;<?php echo $_SESSION['username']  ?></br></p>
	<div class="inContainer">
    
    <h4 class="titleBar"><i class="fa fa-key"></i>&nbsp;Change password</h4>
    <form onsubmit="return checkPassword()" class="titleForm">
        Previous password:<input type="password" name="previousPassword" id="previousPassword" size="30" required="required"/><br/><br/>
        New password:<input type="password" name="newPassword" id="password" size="30" required="required" /><br/><br/>
        Confirm password:<input type="password" id="confirm" size="30" required="required"/><br/><br/>
        <input class="btn" type="submit" value="Change" name="passwordBtn"/></br></br>
    </form>
	</div></br>
	<div class="inContainer">
    <h4 class="titleBar"><i class="fa fa-envelope"></i>&nbsp;Change Email</h4>
    <form method="POST" class="titleForm">
        New email:<input type="email" name="email" <?php print("value='".$email."'"); ?> size="30" required="required"/></br>
        <input class="btn" type="submit" value="Change" name="emailBtn"/></br></br>
    </form>
	</div></br>
	
	<div class="inContainer">
    <h4 class="titleBar"><i class="fa fa-calendar"></i>&nbsp;Change username</h4>
    <form class="titleForm">
        New Username:<input type="text" <?php print("value='".$username."'"); ?> name="username"/></br>
        <input class="btn" type="submit" value="Change" name="usernameBtn"/></br></br>
    </form>
	</div></br>
</div>
	<script type='text/javascript' src='./js/geocode.js'></script>
    <script>
    function checkPassword(){
        var password=document.getElementById("password").value;
        var confirm=document.getElementById("confirm").value;
        if(password!=confirm)
        {
            document.getElementById("password").value="";
            document.getElementById("confirm").value="";
            document.getElementById("previousPassword").value="";
            window.alert("The passwords you have entered are different!");
            
            return false;
        }
        return true;
    }
    </script>

</body>
</html>