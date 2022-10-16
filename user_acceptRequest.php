<?php
session_start();
		
if(!isset($_SESSION['user_login'])) 
    header('location:index.php');

if(!isset($_GET["requestid"])){
    header("location:user_home.php");
}
include './dbConnection.php';
$request_id=$_GET["requestid"];


$sender_id=$_SESSION['user_id'];
$sender_name=$_SESSION['username'];

$sql="SELECT * FROM requests where request_id=$request_id";
$result=mysqli_query($conn, $sql) or die(mysql_error());
$rws= mysqli_fetch_array($result);
$owner_id=$rws[1];
$sender_id=$rws[2];
$bookname = $rws[5];
$ISBN=$rws[4];
$date =  date("Y-m-d h:i:a");

//insert request into record table

$sql= "INSERT INTO record(owner_id, sender_id, bookname, ISBN, date) VALUES('$owner_id', '$sender_id', '$bookname', '$ISBN', '$date')";
mysqli_query($conn, $sql) or die();

 //update the loandate of onwership table

$sql="UPDATE ownership SET loanDate='$date' WHERE owner_id=$owner_id AND ISBN=$ISBN";
mysqli_query($conn, $sql);


$sql="DELETE FROM requests where owner_id='$owner_id' AND sender_id='$sender_id' AND ISBN='$ISBN'";
mysqli_query($conn, $sql);
header("location:user_home.php");












?>