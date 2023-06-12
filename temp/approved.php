<?php  include("server.php");  ?>
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
      <td><?php echo $row['room']; ?></td>
      <td><?php echo $row['Day']; ?></td>
      <td><?php echo $row['Slot']; ?></td>
      <td><?php echo $row['Period']; ?></td>


     <td>
		<form action="approved.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp <br>
		 <input type="submit" name="delete" value="delete"> 

		</form>
   </td>
    </tr>
   
  </tbody>
  <?php } ?>
</table>


<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
	$select = "UPDATE pending_list SET status = 'approved' WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:approved.php");
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM pending_list  WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:approved.php");
}

 ?>






<!-- ================================================================== -->



 
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 


 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">ROOM</th>
	 <th scope="col">DAY</th>
	 <th scope="col">SLOT</th>
   <th scope="col">PERIOD</th>
	 <th scope="col">STATUS</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  pending_status";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['subject']; ?></td>
      <td><?php echo $row['content']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>