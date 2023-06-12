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
    <div class="title">Edit User</div>
    <br>
    <div class="content">
        <form method="post" action="delete.php">
        <?php include('errors.php'); ?>
        <!-- <div class="gender-details">
            <label>Role</label>
            <select name="role" class="input-box">
              <option value="admin">Admin</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
        </div> -->
        <div class="user-details">
          <div class="input-box">
            <span class="details">Enter the email</span>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"required>
          </div>
        </div>
        <div class="button">
          <input type="submit" onclick="return confirm('Do you want to delete the record ?')" value="Delete" class="btn" name="delete">
        </div>

      </form>
    </div>
  </div>

</body>
</html>