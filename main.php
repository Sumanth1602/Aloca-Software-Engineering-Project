<!DOCTYPE html>
<html lang="en">

<?php 
    include('server.php'); 
  

  ?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<link rel="stylesheet"
		href="admin.css">
	<!-- <link rel="stylesheet"
		href="responsive.css"> -->
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

	<!-- for header part -->
	<div class="header1">

		<div class="logosec">

		</div>


	<div class="message" style="opacity: 1;">
	<h3>Welcome <?php echo $_SESSION["username"]?></h3>
			<div class="circle"></div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
				class="icn"
				alt="">
			<div class="dp">
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp">
			</div>
		</div>

	</div>


		<div class="main" style="padding-top: 100px;">


			<div class="box-container">

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading">50</h2>
						<h2 class="topic">Total Rooms</h2>
					</div>

					<img src=
"https://img.icons8.com/ios7/600w/000000/room.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading">34</h2>
						<h2 class="topic">Occupied</h2>
					</div>

					<img src=
					https://cdn-icons-png.flaticon.com/128/4994/4994708.png
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading">16</h2>
						<h2 class="topic">Vacant</h2>
					</div>

					<img src=
"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4G2wfYOTWTpf0Js5sVoRdo_TAv1UUUwEE4V3kvWg3j_KHJjK0Myuzy46h-xLL2QUlvI0&usqp=CAU"
						alt="comments">
				</div>
			</div>

			<!-- <div class="report-container"> 
				<div class="report-header">
					<h1 class="recent-Articles">Room Bookings</h1>
					<button class="view">View All</button>
				</div> -->

				<!-- <div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">Article</h3>
						<h3 class="t-op">Views</h3>
						<h3 class="t-op">Comments</h3>
						<h3 class="t-op">Status</h3>
					</div>

					<div class="items">
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 73</h3>
							<h3 class="t-op-nextlvl">2.9k</h3>
							<h3 class="t-op-nextlvl">210</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 72</h3>
							<h3 class="t-op-nextlvl">1.5k</h3>
							<h3 class="t-op-nextlvl">360</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 71</h3>
							<h3 class="t-op-nextlvl">1.1k</h3>
							<h3 class="t-op-nextlvl">150</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 70</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">420</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 69</h3>
							<h3 class="t-op-nextlvl">2.6k</h3>
							<h3 class="t-op-nextlvl">190</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 68</h3>
							<h3 class="t-op-nextlvl">1.9k</h3>
							<h3 class="t-op-nextlvl">390</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 67</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">580</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 66</h3>
							<h3 class="t-op-nextlvl">3.6k</h3>
							<h3 class="t-op-nextlvl">160</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Article 65</h3>
							<h3 class="t-op-nextlvl">1.3k</h3>
							<h3 class="t-op-nextlvl">220</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>-->

	<script src="./index.js"></script>
</body>
</html>
