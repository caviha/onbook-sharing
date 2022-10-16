<?php
	//session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Contact us</title>
<link rel="stylesheet" href="./css/userhome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
 
    
 
<div id="outContainer">
  
    
	<a href="user_home.php"><i class="fa fa-chevron-circle-left"></i>&nbsp;Back</a><br/>
	<div  class="inContainer" id="feedbackPanel" style="border:2px solid Maroon;border-radius:10px;width:40%;">
		<a name="feedback"></a>
		<h3 class="titleBar"><i class="fa fa-book"></i>&nbsp;Request a Book</h3>
		<form id='feedbackForm' method='POST' action="submitBookRequest.php" style="color:Maroon;font-weight:bold;">
		<i class="fa fa-book"></i>&nbsp;Book Name:<input type="text" name='bookname' required="required"/><br/></br>
                <i class="fa fa-book"></i>&nbsp;ISBN:<input type="text" name='ISBN' required="required"/><br/></br>
                <i class="fa fa-book"></i>&nbsp;Owners's ID:<input type="text" name='owner_id' required="required"/><br/></br>
		
		<input class="btn" type='submit' name="request_btn" value='Send!'/></br></br>
		</form>

	</div>
        
</div>
</body>
</html>
