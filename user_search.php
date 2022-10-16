<?php 
	session_start();
	include './dbConnection.php';
        include './function.php';
        
        
	if(!isset($_SESSION['user_login'])) {
		header('location:index.php');
	}
           
                
                     
        ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Search</title>  
		<link rel="stylesheet" href="./css/search.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	    
    </head>
    <body>
	<div id="outContainer">
        	<a href="user_home.php"><i class="fa fa-chevron-circle-left"></i>&nbsp;Back to User Center</a><br/><br/>
                <a><i class="fa fa-chevron-circle-left"></i>&nbsp;Available Books</a><br/><br/>
               
       		
                
                <table class="bookshell" align="center">
            <thead>
                <tr>
                   
                    <th>Owner ID</th>
                    <th>Name</th>
                    <th>ISBN</th>
                <th>Book Name</th>
                
                <th>Time Added</th>
                
                </tr>
            </thead>
            <tbody>
                 <?php 
            $book = getAll('ownership');
            if(mysqli_num_rows($book)>0){
                
                foreach ($book as $item){
                   
                    ?>
                 <tr>
                <td> <?= $item['owner_id']; ?></td>
                <td> <?= $item['owner_name']; ?></td>
                <td> <?= $item['ISBN']; ?></td> 
                <td> <?= $item['bookname']; ?></td>
                <td> <?= $item['addDate']; ?></td>
               
               
            </tr>
            
      
            <?php
                
              
                }
            }else{
                echo "No records found";
            }
            
            
            ?>
        </tbody>
        
		
        </table>
                
                    
	</div>
       
    </body>
</html>
            
                