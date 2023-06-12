<?php include('server.php') ?>
<?php include('errors.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	

<h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>

<table class="table table-bordered col-md-12">
  <thead>
  <tr>
  <th scope="col">ID</th>
  <th scope="col">REQUESTED BY</th>
  <th scope="col">ROOM</th>
	 <th scope="col">DAY</th>
	 <th scope="col">SLOT</th>
   <th scope="col">PERIOD</th>
	 <th scope="col">STATUS</th>
    </tr>
  </thead>

<?php 

$query = "SELECT * FROM  pending_status WHERE status = 'pending'";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_array($result))  { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['room']; ?></td>
      <td><?php echo $row['Day']; ?></td>
      <td><?php echo $row['Slot']; ?></td>
      <td><?php echo $row['period']; ?></td>


     <td>
		<form method="POST">
    <input type="hidden" name="username" value="<?php echo $row['username']; ?>"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <input type="hidden" name="room" value="<?php echo $row['room']; ?>"/>
        <input type="hidden" name="day" value="<?php echo $row['Day']; ?>"/>
        <input type="hidden" name="slot" value="<?php echo $row['Slot']; ?>"/>
        <input type="hidden" name="period" value="<?php echo $row['period']; ?>"/>
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp <br>
		 <input type="submit" name="delete" value="delete"> 

		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>









<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 


 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">REQUESTED BY</th>
    <th scope="col">ROOM</th>
	 <th scope="col">DAY</th>
	 <th scope="col">SLOT</th>
   <th scope="col">PERIOD</th>
	 <th scope="col">STATUS</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  pending_status where status = 'approved'" ;
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
     
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['room']; ?></td>
      <td><?php echo $row['Day']; ?></td>
      <td><?php echo $row['Slot']; ?></td>
      <td><?php echo $row['period']; ?></td>
    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>