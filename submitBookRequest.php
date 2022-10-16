<?php
   
 session_start();
    include './dbConnection.php';
    include './function.php';
    include './user_requestbook.php';
    
    
    if(isset($_POST['request_btn'])){
          $sender_id=$_SESSION['user_id'];
          $sender_name=$_SESSION['username'];

    $sql="SELECT * FROM ownership";
    $result=mysqli_query($conn, $sql) or die(mysql_error());
    $rws= mysqli_fetch_array($result);
    
    $sender_id=$_SESSION['user_id'];
    $sender_name=$_SESSION['username'];
    $owner_id=$_POST['owner_id'];
    $bookname = $_POST['bookname'];
    $ISBN=$_POST['ISBN'];
    $message=$_SESSION['username']." requested this book: ";
    $date =  date("Y-m-d h:i:a");
                        
                   
                 
		$request_query="INSERT into requests(owner_id, sender_id, sender_name,ISBN, bookname, message, date ) 
                         VALUES('$owner_id', '$sender_id', '$sender_name','$ISBN', '$bookname', '$message', '$date')";
                         mysqli_query($conn, $request_query);
                         
                             header('location:user_home.php');
		
                } 
            
    
		else {
                    echo 'Could not send request';
		}
            	

		
  ?>