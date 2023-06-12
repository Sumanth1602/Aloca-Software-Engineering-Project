<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="ab.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Account Recovery</div>
    
    <div class="content">
        <form method="post" action="forgotpass.php">
            <?php include('errors.php'); ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Enter the following details to get a link to reset the password</span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>"required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit" class="btn" name="forget_pass">
        </div>

      </form>
    </div>
  </div>
  <script>
    </script>
</body>
</html>