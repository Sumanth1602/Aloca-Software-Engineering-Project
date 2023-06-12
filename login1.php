<?php include('server.php') ?>
<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./st.css">

</head>
<body>
<div id="bg"></div>
<?php include('errors.php'); ?>	 
<form method="post" action="login1.php">
<h1 style="color: black;">Login</h1>
<div class="form-field">
	<input type="text" placeholder="Username" name = "username" required />
</div>
<div class="form-field">
    <input type="password" placeholder="Password" name= "password" required/>                         </div>
<p style="opacity: 0.55;">
    <a style="background-color: aliceblue;opacity: 1.0;" href="forgotpass.php">Forgot Password? </a>
</p>
<div class="form-field">
    <button class="btn" type="submit" name="login_user">Log in</button>
</div>
</form>
</body>
</html>