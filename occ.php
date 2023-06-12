<?php include('server.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="occ.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
<meta charset="UTF-8">
<title>Occupancy Chart</title>

</head>
<body>
  <header>

<div id="bg"></div>
<?php include('errors.php'); ?>	
<div class="box">
  <p class="heading">Occupancy Chart Generation</p>
<form method="post">
<label for="cars">Choose Class</label>

<select class="styled-dropdown"name="room" action="occ.php" >
  <option value="C-102">C-102</option>
  <option value="C-103">C-103</option>
</select>
<button class="btn" type="submit" name="Occ">Go</button>
<hr class="new">
</header>
<!-- Insert Table here -->

</form>
</div>
<script type="text/javascript" language="javascript">

/*
$('#getdata').click(function(){

$.ajax({
		url: "getdata.php",
		type:'POST',
		dataType: 'json',
		success: function(output_string){
				$("#result_table").html(output_string);
			} // End of success function of ajax form
		}); // End of ajax call	

});
*/
</script>

</body>

</html>

</body>
</html>

