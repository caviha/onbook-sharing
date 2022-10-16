
<?php
session_start();
include './dbConnection.php';		
if(isset($_SESSION['user_login'])){ 
   

if(isset($_POST["addbook_btn"])){


$owner_id=$_SESSION['user_id'];
$owner_name=$_SESSION['username'];
$adddate =  date("Y/m/d h:i:a");
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
$bookname = mysqli_real_escape_string($conn, $_POST['bookname']);



$addbook_query= "INSERT INTO ownership(owner_id, owner_name, ISBN, bookname, addDate) VALUES( '$owner_id', '$owner_name', '$isbn', '$bookname', '$adddate')";
                
mysqli_query($conn, $addbook_query) or die("Account already exists.");

header("location:user_home.php");
}
}else{
    header('location:index.php'); 
}
?>
                




<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign in</title>
	<link rel="stylesheet" href="./css/userhome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<?php
	include "header.php";
?>


<div id="outContainer">
        <h3 class="titleBar">Add your book</h3>
	<div class="inContainer" >
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p class="titleForm"><i class="fa fa-user-circle"></i>
               Book Name :<input type="text" name="bookname" id="username" required="required" oninvalid="setCustomValidity('Please input the book name!')" oninput="setCustomValidity('')"/>
            </p>
            <p class="titleForm"><i class="fa fa-key"></i>
                ISBN:<input type="text" name="isbn" id="password" required="required" oninvalid="setCustomValidity('Please input the book's isbn!')" oninput="setCustomValidity('')"/>
            </p>
            <input class="btn" type="submit" value="Add!" name="addbook_btn"/></br></br>
        </form>
	</div>
</div>
    </body>
</html>