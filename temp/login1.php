<?php include('server.php') ?>
<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset="UTF-8">
  <title>Occupancy Chart</title>
  <link rel="stylesheet" href="./st.css">

</head>
<body>
<div id="bg"></div>
<?php include('errors.php'); ?>	 
<form method="post" action="login1.php">

<div class="form-field">
	<input type="text" placeholder="Username" name = "username" required />
</div>
<div class="form-field">
    <input type="password" placeholder="Password" name= "password" required/>                         </div>
<div class="form-field">
    <button class="btn" type="submit" name="login_user">Log in</button>
</div>
</form>
</body>
</html>