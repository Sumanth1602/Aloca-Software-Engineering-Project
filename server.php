<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 


$servername = "localhost";
$user = "Project";
$pass = "Project";
$database_name = "data";

// Create MySQL connection fom PHP to MySQL server
$db = new mysqli($servername, $user, $pass, $database_name);




// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  if (empty($_POST['gender'])) { array_push($errors, "Select the role"); }
  else { $role = mysqli_real_escape_string($db, $_POST['gender']);
  }
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      $message="Username already exists";
      
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  $user_check_query = "SELECT * FROM teacher WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      $message="Username already exists";
      
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  $user_check_query = "SELECT * FROM student WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      $message="Username already exists";
      
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    
    
    if ($role == "student"){$query = "INSERT INTO student (username, email, password) 
      VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = 'admin';
      $_SESSION['success'] = "You are now logged in";
      array_push($errors, "Record inserted successfully");

    
    }
    else if ($role == "teacher"){$query = "INSERT INTO teacher (username, email, password) 
      VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      array_push($errors, "Record inserted successfully");
      
    
    }
    else if ($role == "admin"){$query = "INSERT INTO admin (username, email, password) 
      VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      array_push($errors, "Record inserted successfully");
    
    }

  
  	
  }
}

//Book slot
if (isset($_POST['book'])) {
  $day = $_POST['day'];
  $slot =   $_POST['slot'];
  $period = $_POST['period'];
  $room = $_POST['room'];
  $username = $_POST['username'];  

  $query = "Select `$slot` from `$room` where Day ='$day'";

  $result = mysqli_query($db, $query);

  $row = mysqli_fetch_assoc($result);
  

  if ($row[$slot] == NULL){

    $query = "Insert into pending_status(username,room,day,slot,period,status)value('$username','$room','$day','$slot','$period','pending')";

    $result = mysqli_query($db, $query);

  if($result>0){


    array_push($errors, "your request is  under process! ");
    
    }
    else
    {
    array_push($errors, "something went wrong ! ");
    
    
    }

  }
  else{
    array_push($errors, "Slot Already Occupied ! ");


  }

  



 
}
//approve or reject
if(isset($_POST['approve'])){
  $username = $_POST['username'];
	$id = $_POST['id'];
    $room = $_POST['room'];
    $period = $_POST['period'];
    $slot = $_POST['slot'];
    $day = $_POST['day'];
    echo $id;
    echo $room;
    echo $period;
    echo $slot;
    echo $day;
    $ab = "(Booked) ";
    $ab .= $period;


	$select = "UPDATE pending_status SET status = 'approved' WHERE id = '$id' ";
    $up = "Update `$room` SET `$slot` = '$ab' WHERE day = '$day'";
    
    

    $res = mysqli_query($db,$up);
	$resut = mysqli_query($db,$select);

  $user_check_query = "SELECT email FROM admin WHERE username='$username' LIMIT 1";
  $result1 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT email FROM teacher WHERE username='$username' LIMIT 1";
  $result2 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT email FROM student WHERE username='$username LIMIT 1";
  $result3 = mysqli_query($db, $user_check_query);

  if ($result1) { // if user exists
    $user = mysqli_fetch_assoc($result1);
    $email = $user['email'];
    
  }
  else if ($result2) { // if user exists
    $user = mysqli_fetch_assoc($result2);
    $email = $user['email'];
    
  }
  else if ($result3) { // if user exists
    $user = mysqli_fetch_assoc($result3);
    $email = $user['email'];
    
  }

  

  $output='<p>Dear '.$username.'</p>';
         $output.='<p></p>';
    
         

         $output.='<p>Congratulations! Your Request For Slot '.$slot.' Is Approved For '.$period.' </p>';
         $output.='<p>For Any Queries Contact Administrator</p>';   	
         $output.='<p>Thanks,</p>';
         $output.='<p>Alocaroom Team</p>';
         $body = $output; 
         $subject = "Approval Of Slot ";
         
         $email_to = $email;
         $fromserver = "noreply@alocaroom.com";
    
         require("vendor/autoload.php");
    
         $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
         
         $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
             new GuzzleHttp\Client(),
             $config
         );
         $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
         $sendSmtpEmail['subject'] = $subject;
         $sendSmtpEmail['htmlContent'] = $body;
         $sendSmtpEmail['sender'] = array('name' => 'Alocaroom Team', 'email' => $fromserver);
         $sendSmtpEmail['to'] = array(
             array('email' => $email_to, 'name' => 'Anonymous')
         );
         
         try {
             $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
             if (strlen($result)==70){
              array_push($errors, "Email Send Successfully");
             }
            else{
              
              
              
              array_push($errors, "Email wasn't send successfully :( Try again");
              
            }
         } catch (Exception $e) {
          array_push($errors, "Email wasn't send successfully :( Try again");
         }











header("location:admin1.php");
	
}

if(isset($_POST['de'])){

	$username = $_POST['username'];
	$id = $_POST['id'];
    $room = $_POST['room'];
    $period = $_POST['period'];
    $slot = $_POST['slot'];
    $day = $_POST['day'];


	$select = "DELETE  FROM pending_status  WHERE id = '$id' ";
	$resut = mysqli_query($db,$select);

  $user_check_query = "SELECT email FROM admin WHERE username='$username' LIMIT 1";
  $result1 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT email FROM teacher WHERE username='$username' LIMIT 1";
  $result2 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT email FROM student WHERE username='$username LIMIT 1";
  $result3 = mysqli_query($db, $user_check_query);

  if ($result1) { // if user exists
    $user = mysqli_fetch_assoc($result1);
    $email = $user['email'];
    
  }
  else if ($result2) { // if user exists
    $user = mysqli_fetch_assoc($result2);
    $email = $user['email'];
    
  }
  else if ($result3) { // if user exists
    $user = mysqli_fetch_assoc($result3);
    $email = $user['email'];
    
  }

  

  $output='<p>Dear '.$username.'</p>';
         $output.='<p></p>';
    
         

         $output.='<p>Sorry! Your Request For Slot '.$slot.' Was Rejected For '.$period.' </p>';
         $output.='<p>For Any Queries Contact Administrator</p>';   	
         $output.='<p>Thanks,</p>';
         $output.='<p>Alocaroom Team</p>';
         $body = $output; 
         $subject = "Rejection Of Slot ";
         
         $email_to = $email;
         $fromserver = "noreply@alocaroom.com";
    
         require("vendor/autoload.php");
    
         $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
         
         $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
             new GuzzleHttp\Client(),
             $config
         );
         $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
         $sendSmtpEmail['subject'] = $subject;
         $sendSmtpEmail['htmlContent'] = $body;
         $sendSmtpEmail['sender'] = array('name' => 'Alocaroom Team', 'email' => $fromserver);
         $sendSmtpEmail['to'] = array(
             array('email' => $email_to, 'name' => 'Anonymous')
         );
         
         try {
             $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
             if (strlen($result)==70){
              array_push($errors, "Email Send Successfully");
             }
            else{
              
              
              
              array_push($errors, "Email wasn't send successfully :( Try again");
              
            }
         } catch (Exception $e) {
          array_push($errors, "Email wasn't send successfully :( Try again");
         }


	header("location:admin1.php");
}



//delete manually
if(isset($_POST['dels'])){

  $room = $_POST['room'];
    $slot = $_POST['slot'];
    $day = $_POST['day'];
  $up = "Update `$room` SET `$slot` = NULL WHERE day = '$day'";
  $resut = mysqli_query($db,$up);
  array_push($errors, "Slot Deleted Successfully ! ");
  
}



//updating password for forget password functionality
if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($db,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($db,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
array_push($errors,"Password do not match, both password should be same.");


header("Refresh:0");
  }
  else{
$pass1 = md5($pass1);
mysqli_query($db,
"UPDATE admin SET `password`='".$pass1."'
WHERE `email`='".$email."';"
);

mysqli_query($db,
"UPDATE teacher SET `password`='".$pass1."'
WHERE `email`='".$email."';"
);

mysqli_query($db,
"UPDATE student SET `password`='".$pass1."'
WHERE `email`='".$email."';"
);

mysqli_query($db,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
header("Refresh:0; confirm.php?msg=Password Updated Successfully");

	  }		

}


//Occupancy chart generation
if (isset($_POST['Occ'])){
  $room = mysqli_real_escape_string($db, $_POST['room']);
    $query = "SELECT * FROM `$room`";
    
  	$result = mysqli_query($db, $query);
    
    echo "<table border='1'>

<tr>

<th>DAY</th>

<th>8.50 am - 9.40 am</th>

<th>9.40 am - 10.30 am</th>

<th>10.40 am - 11.30 am</th>

<th>11.30 am - 12.20 pm</th>

<th>12.20 pm - 01.10 pm</th>

<th>01.40 pm - 02.30 pm</th>

<th>02.30 pm - 03.20 pm</th>

<th>3.20 pm - 04.10 pm</th>

<th>04.10 pm - 05.00 pm</th>

</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['Day'] . "</td>";

  echo "<td>" . $row['8.50 am - 9.40 am'] . "</td>";

  echo "<td>" . $row['9.40 am - 10.30 am'] . "</td>";

  echo "<td>" . $row['10.40 am - 11.30 am'] . "</td>";

  echo "<td>" . $row['11.30 am - 12.20 pm'] . "</td>";

  echo "<td>" . $row['12.20 pm - 01.10 pm'] . "</td>";

  echo "<td>" . $row['01.40 pm - 02.30 pm'] . "</td>";

  echo "<td>" . $row['02.30 pm - 03.20 pm'] . "</td>";

  echo "<td>" . $row['3.20 pm - 04.10 pm'] . "</td>";

  echo "<td>" . $row['04.10 pm - 05.00 pm'] . "</td>";

  echo "</tr>";

  }

echo "</table>";



}

//Delete a record
if (isset($_POST['delete'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);

  if (empty($email)) {
    $message="Email is required";
    array_push($errors, $message);
  }
  else{
    $user_check_query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
    $result1 = mysqli_query($db, $user_check_query);
  
    $user_check_query = "SELECT * FROM teacher WHERE email='$email' LIMIT 1";
    $result2 = mysqli_query($db, $user_check_query);
  
    $user_check_query = "SELECT * FROM student WHERE email='$email' LIMIT 1";
    $result3 = mysqli_query($db, $user_check_query);
  
  
  
    $user1 = mysqli_fetch_assoc($result1);
    $user2 = mysqli_fetch_assoc($result2);
    $user3 = mysqli_fetch_assoc($result3);
  
    
      if ($user1['email'] !== $email) {
        if ($user2['email'] !== $email) {
          if ($user3['email'] !== $email) {
            array_push($errors, "Email Doesnt exists");
            
          }
          else{
            mysqli_query($db,"DELETE FROM `student` WHERE `email`='".$email."';");
            array_push($errors, "Record Deleted successfully");
          }
        }
        else{

          mysqli_query($db,"DELETE FROM `teacher` WHERE `email`='".$email."';");
          array_push($errors, "Record Deleted successfully");
        }
      }
      else{
        mysqli_query($db,"DELETE FROM `admin` WHERE `email`='".$email."';");
        array_push($errors, "Record Deleted successfully");
        
      }
          
      








  }




}

//if user click continue button in forgot password form
if (isset($_POST['forget_pass'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  if (empty($email)) { array_push($errors, "Email is required"); }
  
  $user_check_query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
  $result1 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT * FROM teacher WHERE email='$email' LIMIT 1";
  $result2 = mysqli_query($db, $user_check_query);

  $user_check_query = "SELECT * FROM student WHERE email='$email' LIMIT 1";
  $result3 = mysqli_query($db, $user_check_query);



  $user1 = mysqli_fetch_assoc($result1);
  $user2 = mysqli_fetch_assoc($result2);
  $user3 = mysqli_fetch_assoc($result3);

  
  
    if ($user1['email'] !== $email) {
      if ($user2['email'] !== $email) {
        if ($user3['email'] !== $email) {
          array_push($errors, "Email Doesnt exists");
        }
        else{
          $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
            );
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(rand(10,1000));
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;
         // Insert Temp Table
         mysqli_query($db,
         "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
         VALUES ('".$email."', '".$key."', '".$expDate."');");
         
         $output='<p>Dear user,</p>';
         $output.='<p>Please click on the following link to reset your password.</p>';
         $output.='<p>-------------------------------------------------------------</p>';
         //change ip here
         $output.='<p><a href="https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
          https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
         $output.='<p>-------------------------------------------------------------</p>';
         $output.='<p>Please be sure to copy the entire link into your browser.
         The link will expire after 1 day for security reason.</p>';
         $output.='<p>If you did not request this forgotten password email, no action 
         is needed, your password will not be reset. However, you may want to log into 
         your account and change your security password as someone may have guessed it.</p>';   	
         $output.='<p>Thanks,</p>';
         $output.='<p>Alocaroom Team</p>';
         $body = $output; 
         $subject = "Password Recovery ";
         
         $email_to = $email;
         $fromserver = "noreply@alocaroom.com";
    
         require("vendor/autoload.php");
    
         $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
         
         $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
             new GuzzleHttp\Client(),
             $config
         );
         $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
         $sendSmtpEmail['subject'] = $subject;
         $sendSmtpEmail['htmlContent'] = $body;
         $sendSmtpEmail['sender'] = array('name' => 'Alocaroom Team', 'email' => $fromserver);
         $sendSmtpEmail['to'] = array(
             array('email' => $email_to, 'name' => 'Anonymous')
         );
         
         try {
             $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
             if (strlen($result)==70){
              array_push($errors, "Email Send Successfully");
             }
            else{
              
              
              
              array_push($errors, "Email wasn't send successfully :( Try again");
              
            }
         } catch (Exception $e) {
          array_push($errors, "Email wasn't send successfully :( Try again");
         }
    
    
    
    
        }
      }
      else{
        $expFormat = mktime(
          date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
          );
          $expDate = date("Y-m-d H:i:s",$expFormat);
          $key = md5(rand(10,1000));
          $addKey = substr(md5(uniqid(rand(),1)),3,10);
          $key = $key . $addKey;
       // Insert Temp Table
       mysqli_query($db,
       "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
       VALUES ('".$email."', '".$key."', '".$expDate."');");
       
       $output='<p>Dear user,</p>';
       $output.='<p>Please click on the following link to reset your password.</p>';
       $output.='<p>-------------------------------------------------------------</p>';
       //change ip here
       $output.='<p><a href="https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
      https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
       $output.='<p>-------------------------------------------------------------</p>';
       $output.='<p>Please be sure to copy the entire link into your browser.
       The link will expire after 1 day for security reason.</p>';
       $output.='<p>If you did not request this forgotten password email, no action 
       is needed, your password will not be reset. However, you may want to log into 
       your account and change your security password as someone may have guessed it.</p>';   	
       $output.='<p>Thanks,</p>';
       $output.='<p>Alocaroom Team</p>';
       $body = $output; 
       $subject = "Password Recovery ";
       
       $email_to = $email;
       $fromserver = "noreply@alocaroom.com";
  
       require("vendor/autoload.php");
  
       $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
       
       $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
           new GuzzleHttp\Client(),
           $config
       );
       $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
       $sendSmtpEmail['subject'] = $subject;
       $sendSmtpEmail['htmlContent'] = $body;
       $sendSmtpEmail['sender'] = array('name' => 'Alocaroom Team', 'email' => $fromserver);
       $sendSmtpEmail['to'] = array(
           array('email' => $email_to, 'name' => 'Anonymous')
       );
       
       try {
           $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
           if (strlen($result)==70){
            array_push($errors, "Email Send Successfully");
           }
          else{
            
            
            
            array_push($errors, "Email wasn't send successfully :( Try again");
            
          }
       } catch (Exception $e) {
        array_push($errors, "Email wasn't send successfully :( Try again");
       }
      }
    }
    else{
      $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5(rand(10,1000));
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;

     // Insert Temp Table
     mysqli_query($db,
     "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
     VALUES ('".$email."', '".$key."', '".$expDate."');");
     
     $output='<p>Dear user,</p>';
     $output.='<p>Please click on the following link to reset your password.</p>';
     $output.='<p>-------------------------------------------------------------</p>';
     //change ip here
     $output.='<p><a href="https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
     https://b00a-14-139-187-130.ngrok-free.app/Project/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
     $output.='<p>-------------------------------------------------------------</p>';
     $output.='<p>Please be sure to copy the entire link into your browser.
     The link will expire after 1 day for security reason.</p>';
     $output.='<p>If you did not request this forgotten password email, no action 
     is needed, your password will not be reset. However, you may want to log into 
     your account and change your security password as someone may have guessed it.</p>';   	
     $output.='<p>Thanks,</p>';
     $output.='<p>Alocaroom Team</p>';
     $body = $output; 
     $subject = "Password Recovery ";
     
     $email_to = $email;
     $fromserver = "noreply@alocaroom.com";

     require("vendor/autoload.php");

     $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
     
     $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
         new GuzzleHttp\Client(),
         $config
     );
     $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
     $sendSmtpEmail['subject'] = $subject;
     $sendSmtpEmail['htmlContent'] = $body;
     $sendSmtpEmail['sender'] = array('name' => 'Alocaroom Team', 'email' => $fromserver);
     $sendSmtpEmail['to'] = array(
         array('email' => $email_to, 'name' => 'Anonymous')
     );
     
     try {
         $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
         if (strlen($result)==70){
          array_push($errors, "Email Send Successfully");
         }
        else{
          
          
          
          array_push($errors, "Email wasn't send successfully :( Try again");
          
        }
     } catch (Exception $e) {
      array_push($errors, "Email wasn't send successfully :( Try again");
     }




    }

  





}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    $message="Username is required";
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	
    $query1 = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	$results1 = mysqli_query($db, $query1);

    $query2 = "SELECT * FROM student WHERE username='$username' AND password='$password'";
  	$results2 = mysqli_query($db, $query2);

    $query3 = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
  	$results3 = mysqli_query($db, $query3);


  	if (mysqli_num_rows($results1) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['role'] = "admin";
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: book.php');
      header('location: adminf.php');
  	}
    else if (mysqli_num_rows($results2) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['role'] = "student";
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: book.php');
      header('location: main.php');
      header('location: student.php');
  	}

    else if (mysqli_num_rows($results3) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['role'] = "teacher";
  	  $_SESSION['success'] = "You are now logged in";
      header('location: book.php');
      header('location: main.php');
  	  header('location: teacher.php');
  	}
    else {
      
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
}


?>