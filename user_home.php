<?php 
	session_start();
		
	if(!isset($_SESSION['user_login'])||$_SESSION["user_login"]=='0') 
		header('location:user_login.php');   
?>


<?php
	$user_id=$_SESSION['user_id'];
	include './dbConnection.php';
	$sql="SELECT * FROM users WHERE user_id='$user_id'";
	$result=  mysqli_query($conn, $sql) or die(mysql_error());
	$rws=  mysqli_fetch_array($result);
	
	
	$username = $rws[1];
	
	$_SESSION['username']  = $username;
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="./css/userhome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src='./js/cookie.js'></script>
</head>
<body>
<div id="welcome">Welcome, 
<?php
    echo $_SESSION["username"];
?>
!

<div id="outContainer">
	<a href="index.php"><i class="fa fa-chevron-circle-left"></i>&nbsp;Go to Homepage</a><br/>
	<div class="inContainer" style="height:20%">
		<h2 class="titleBar"><i class="fa fa-book"></i>&nbsp;Book</h2>
                <a href="user_inventory.php">My Books</a><br/></br>
			<a href="user_search.php">View available Books</a><br/></br>
			<a href="user_checkRequest.php">Check Requests</a><br/></br>
			<a href="user_showExchange.php">My Exchanges</a><br/></br>
			<a href="user_requestbook.php">Borrow a Book</a></br></br>
		
	</div>
	<div class="inContainer" style="height:20%">
		<h2 class="titleBar"><i class="fa fa-user-circle"></i>&nbsp;Account</h2>
			
                
			<a href="user_addBook.php">Add Book</a><br/></br>
			<a href="user_updateInfo.php">Account Information Update</a><br/></br>
                        <a href="user_logout.php">Log Out</a><br/></br>
		
	</div>

	
	
	
</div>
	
</div>

<script>


</body>
</html>