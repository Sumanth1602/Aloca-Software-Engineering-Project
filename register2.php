<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Create a User </title>
    <link rel="stylesheet" href="ab.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <br>
    <div class="content">
        <form method="post" action="register2.php">
        <?php include('errors.php'); ?>
        <!-- <div class="gender-details">
            <label>Role</label>
            <select name="role" class="input-box">
              <option value="admin">Admin</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
        </div> -->
        <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="admin">
            <input type="radio" name="gender" id="dot-2" value="teacher">
            <input type="radio" name="gender" id="dot-3" value="student">
            <span class="gender-title">Role</span>
            <div class="category">
              <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Admin</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Teacher</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Student</span>
              </label>
            </div>
          </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" value="<?php echo $username; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>"required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password_1" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_2" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" class="btn" name="reg_user">
        </div>

      </form>
    </div>
  </div>

</body>
</html>