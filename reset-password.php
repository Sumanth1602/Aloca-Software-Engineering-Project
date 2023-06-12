<?php

include('server.php');
include('errors.php');

$servername = "localhost";
$user = "Project";
$pass = "Project";
$database_name = "data";
$error="";

// Create MySQL connection fom PHP to MySQL server
$db = new mysqli($servername, $user, $pass, $database_name);


if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($db,
  "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
  );
  $row = mysqli_num_rows($query);

  if ($row==""){

    header("Refresh:0; invalid.php?msg=Invalid Link");




	}else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
  <link rel="stylesheet" href="ab.css">
    <div class="container">
        <div class="title">Reset Password</div>
        <br>
        <div class="content">
            <div class="user-details">
                <form method="post" action="" name="update">
                <div class="user-details">
                    <input type="hidden" name="action" value="update" />
                    <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pass1" maxlength="15" placeholder="Enter your password" required />
                    </div>
                    <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="pass2" placeholder="Confirm your password" maxlength="15" required/>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email;?>"/>
            </div>
            <div class="button">
                <input type="submit" name=reset value="Reset" />
            </div>
        </form>
    </div>

<?php
}else{
    header("Refresh:0; expire.php?msg=Invalid Link");


            }
            
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  

  }			
} // isset email key validate end







?>