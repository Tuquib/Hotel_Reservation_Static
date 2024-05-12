<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Online Booking</title>
	<link rel="stylesheet" href="../style.css" />
	<link rel="stylesheet" href="homepage.css" />
	<link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
</head>

<body>

	<style>
		.card {
			transition: all 0.5s;
		}

		.card:hover {
			transform: scale(1.15);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}
	</style>
	<nav class="navbar">
		<div class="container-fluid">
			<a class="navbar-brand d-flex align-items-center" href="dashboard.php">
				<img class="logo" src="../Images/logo.png" alt="logo" /><span class="sdash">
					<?php
					// Check if the user is logged in
					if (isset($_SESSION['username'])) {
						// Fetch the username from the session or database
						$username = $_SESSION['username']; // Assuming the username is stored in a session variable
						echo "Welcome, $username";
					} else {
						echo "Welcome";
					}
					?>
				</span>
			</a>
			<form class="d-flex" role="search">
				<div class="input-group">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
					<span class="input-group-text" id="basic-addon1">
						<i class="fa-solid fa-magnifying-glass"></i>
					</span>
				</div>
			</form>
			<div class="dropdown" style="left: 150px">
				<button class="btn rounded-circle btn-secondary">
					<i class="fa-solid fa-comment-dots"></i>
				</button>
				<div class="content">
					<a href="#">Inbox</a>
				</div>
			</div>

			<div class="dropdown" style="left: 50px">
				<button class="btn rounded-circle btn-secondary">
					<i class="fa-solid fa-bell"></i>
				</button>
				<div class="content">
					<a href="#">Notification</a>
					<a href="#">Announcement</a>
				</div>
			</div>

			<div class="dropdown" style="right: 50px">
				<button class="btn rounded-circle btn-secondary" id="iconButton">
					<i class="fa-solid fa-user"></i>
				</button>
				<div class="content">
					<a href="profile.php">Profile</a>
					<a href="firstpage.php">Logout</a>
				</div>
			</div>
		</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link-active" href="dashboard.php">
							<button class="btn btn-block text-center"><i class="fas fa-tachometer-alt"></i>
								Dashboard
							</button>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link-active" href="booking.php">
							<button class="btn btn-block text-center"><i class="fa-sharp fa-solid fa-calendar-days"></i>
								Booking
							</button>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link-active" href="Manage.php">
							<button class="btn btn-block text-center"><i class="fa-solid fa-list-check"></i>
								Manage
							</button>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link-active" href="room-availability.php">
							<button class="btn btn-block text-center"><i class="fa-sharp fa-solid fa-bed"></i>
								Room Availability
							</button>
						</a>
					</li>
				</ul>
			</nav>

			<main role="main" class="col-md-5 ml-sm-auto col-lg-10 px-4">
				<div class="row">
					<div class="container-fluid">
						<div class="dasht" style="left: 250px;">
							<h3>Room Availability</h3>
						</div>
						<div class="line" style="left: 250px; width: 1100px">
							<div class="text-center" style="right: 50px;">
								<p style="margin-top: 10px;">Available Rooms</p>
							</div>
						</div>

						<div class="container" style="margin-top: 80px;">
							<div class="popular__grid">
								<?php
								require_once '../config.php';

								// Fetch data from the rooms table
								$query = $conn->query("SELECT * FROM `rooms` ORDER BY `price` ASC") or die(mysqli_error($conn));

								// Loop through each fetched row
								while ($fetch = $query->fetch_assoc()) {
									// Output the fetched data
								?>
									<div class="popular__card">
										<img src=" ../Images/<?php echo $fetch['photo'] ?>" alt="popular hotel" />
										<div class="popular__content">
											<div class="popular__card__header">
												<h4 id="room_type"><?php echo $fetch['room_type'] ?></h4>
												<h4 id="price"> P<?php echo $fetch['price'] ?></h4>
											</div>
											<p id="room_num"><?php echo $fetch['room_num'] ?></p>
											<a href="booking.php">
												<button style="width: 150px;" type="button" class="btn btn-success">
													Check Now
												</button>
											</a>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<div style="margin-bottom: 20px;"></div>

					</div>
				</div>
			</main>
		</div>
	</div>



	<footer class="footer" id="contact">
		<div class="section__container footer__container">
			<div class="footer__col">
				<h3 style="color: black">Malaybalay Air BnB Travellers Inn</h3>
				<p style="color: black">
					With a user-friendly interface and a vast selection of hotels,
					Malaybalay Air BnB Travellers Inn aims to provide a stress-free
					experience for travelers seeking the perfect stay.
				</p>
				<p style="color: black">
					You can contact us in our Social Media , Phone Number +639631308925
				</p>
			</div>
			<div class="footer__col">
				<h4 style="color: black">Hotel</h4>
				<p style="color: black">About Us</p>
				<p style="color: black">Contact Us</p>
			</div>
			<div class="footer__col">
				<h4 style="color: black">Legal</h4>
				<p style="color: black">FAQs</p>
				<p style="color: black">Terms & Conditions</p>
				<p style="color: black">Privacy Policy</p>
			</div>
			<div class="footer__col">
				<h4 style="color: black">Resources</h4>
				<p style="color: black">Social Media</p>
				<p style="color: black">Help Center</p>
				<p style="color: black">Partnerships</p>
			</div>
		</div>
		<div class="footer__bar" style="color: black">
			Copyright © 2024 Ubald Jones L. Tuquib. All rights reserved.
		</div>
	</footer>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap 4 JS -->

</html>