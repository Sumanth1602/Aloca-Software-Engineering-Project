<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <style>
    label {
      display: block;
      margin-bottom: 5px;
    }
    
    select, textarea {
      margin-bottom: 10px;
    }

  </style>
  <link rel="stylesheet" href="book.css">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>
<body>
<?php include('errors.php') ?>
<div class="box">
  <p class="heading">Book Slot</p>
  <hr class="new">
  <form method="post">
  <label for="Room">Class:&nbsp;&nbsp;
    <select class="styled-dropdown" id="Room" name ="room" required>
      <option value="" disabled selected>Select a Class</option>
      <option value="C-102">C-102</option>
     <option value="C-103">C-103</option>
    </select>
  </label>
  
    <label for="day">Day:&nbsp;&nbsp;
    <select class="styled-dropdown" id="day" name ="day" required>
      <option value="" disabled selected>Select a Day</option>
      <option value="Monday">Monday</option>
      <option value="Tuesday">Tuesday</option>
      <option value="Wednesday">Wednesday</option>
      <option value="Thursday">Thursday</option>
      <option value="Friday">Friday</option>
    </select>
  </label>  

    <label for="time">Time Slot:&nbsp;&nbsp;
    <select class="styled-dropdown" id="time" name ="slot" required>
      <option value="" disabled selected>Select a Time Slot</option>
      <option value="8.50 am - 9.40 am">8:50 am - 9:40 am</option>
      <option value="9.40 am - 10.30 am">9:40 am - 10:30 am</option>
      <option value="10.40 am - 11.30 am">10:40 am - 11:30 am</option>
      <option value="11.30 am - 12.20 pm">11:30 am - 12:20 pm</option>
      <option value="12.20 pm - 01.10 pm">12:20 pm - 1:10 pm</option>
      <option value="01.40 pm - 02.30 pm">1:40 pm - 2:30 pm</option>
      <option value="02.30 pm - 03.20 pm">2:30 pm - 3:20 pm</option>
      <option value="3.20 pm - 04.10 pm">3:20 pm - 4:10 pm</option>
      <option value="04.10 pm - 05.00 pm">4:10 pm - 5:00 pm</option>
    </select>
    </label>

    <label for="message">Period:</label>
    <textarea rows="4" cols="40" class="styled-textarea" id="message" name ="period" required></textarea>
    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
    <br>
    <button class="btn" type="submit" name="book">Book</button>
  </div>
  </form>
</body>
</html>