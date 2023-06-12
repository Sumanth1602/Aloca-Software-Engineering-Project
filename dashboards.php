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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>GeeksForGeeks</title>
	<link rel="stylesheet"
		href="admin.css">
	<!-- <link rel="stylesheet"
		href="responsive.css"> -->
            <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

	<!-- for header part -->
	<header>
        <nav class="nav">
            <div class="logo" style = "position:relative; left:50px; top:-18px;">
                <h1>Aloca</h1>
            </div>
            <div class="nav-upper-options">
            <a href="main.php" target="main"  onclick="myFunction(1)">
                <div id="opt1" class="nav-option option">
                    <h3> Dashboard</h3>
                </div>
            </a>
            <!-- <a href="register2.php" target="main" onclick="myFunction(2)">
                <div id="opt2" class="option nav-option">
                    <h3>Create User</h3>
                </div>
            </a>
            <a href="register2.php" target="main" onclick="myFunction(3)">
                <div id="opt3" class="nav-option option">
                    <h3>Edit User</h3>
                </div>
            </a> -->
            <a href="occ.php" target="main" onclick="myFunction(4)">
                <div id="opt4" class="nav-option option">
                    <h3>Occupancy Chart</h3>
                </div>
            </a>
            <!-- <a href="delete.php" target="main" onclick="myFunction(5)">
                <div id="opt5" class="nav-option option">
                    <h3>Delete User</h3>
                </div>
            </a>
            <a href="#" target="main" onclick="myFunction(6)">
                <div id="opt6" class="nav-option option">
                    <h3>Book Slot</h3>
                </div>
            </a> -->
            <?php  if (isset($_SESSION['username'])) : ?>
                    <form id="f1" method="post">
                    <input type="hidden" name="logout" value=1>
                    <a href="logout.php?logout='1'" target="_top" onclick="myFunction(8)" onclick="document.getElementById('f1').submit();">
                </form>
                    <div id="opt7" class="nav-option option">
                    <h3>Logout</h3>
                </div>
            </a>  
            <?php endif ?>
            </div>
        </nav>
</header>
<script>
var lastSelected = null;

function myFunction(a) {
    // If there's a previously selected option, reset its style
    if (lastSelected) {
        lastSelected.style.backgroundColor = "white";
        lastSelected.style.color = "black";
        lastSelected.style.borderLeft = "none";
    }

    // Set the active element's style
    var currentSelected = document.getElementById("opt"+a);
    currentSelected.style.backgroundColor = "#926930c3";
    currentSelected.style.color = "white";
    currentSelected.style.borderLeft = "5px solid black";

    // Remember this option as the last selected one for next time
    lastSelected = currentSelected;
}
window.onload = function() {
    myFunction(1); // Set Dashboard as active
}
</script>
</body>
</html>