<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login1.php');
  }
  if (($_SESSION['role'])!="student"){
    $_SESSION['msg'] = "You must log in first";
    header('location: login1.php');
}
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login1.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
</head>

<frameset cols="17%,*" frameborder="no">
    <frame name="top" src="dashboards.php" />
    <frame name="main" src="main.php" />

    <noframes>

        <body>Your browser does not support frames.</body>
    </noframes>

</frameset>

</html>