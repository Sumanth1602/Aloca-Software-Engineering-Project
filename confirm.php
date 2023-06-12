<?php

if(isset($_GET["msg"])){

    $message = $_GET["msg"];
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="UTF-8">
        <title> Confirmation </title>
        <link rel="stylesheet" href="ab.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
       </head>
    <body>
      <div class="container">
        <div class="title">Password Updated Successfully</div>
        <p><a href="http://10.11.236.155/Project/login1.php">
        Click here</a> to login</p>
      </div>
    
    </body>
    </html>
    <?php

}
?>