

<?php 
    include('server.php'); 
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login1.php");
  
 
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> LOGOUT</title>
    <link rel="stylesheet" href="ab.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">You Have Been Successfully logout</div>
    <p><a href="http://10.11.236.155/Project/login1.php">
        Click here</a> to login</p>

    <br>
  </div>

</body>
</html>