<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malaybalay_hotel_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Dashboard</title>
	<link rel="stylesheet" href="admin.css" />
	<link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
	<link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
</head>

<body>
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

			<div class="dropdown" style="left: 190px">
				<button class="btn rounded-circle btn-secondary">
					<i class="fa-solid fa-comment-dots"></i>
				</button>
				<div class="content">
					<a href="#">Inbox</a>
				</div>
			</div>

			<div class="dropdown" style="left: 70px">
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
					<a href="admin-profile.php">Profile</a>
					<a href="../firstpage.php">Logout</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link-active" href="admin-dashboard.php">
							<button class="btn btn-block text-left">
								Dashboard
							</button>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link-active" href="user-management.php">
							<button class="btn btn-block text-left">
								User-management
							</button>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link-active" href="room-management.php">
							<button class="btn btn-block text-left">
								Room Management
							</button>
						</a>
					</li>
				</ul>
			</nav>
			<main role="main" class="col-md-5 ml-sm-auto col-lg-10 px-4">
				<div class="row">
					<div class="container-fluid">
						<div class="dasht">
							<h3>Dashboard</h3>
						</div>
						<div class="line"></div>

						<div class="dashboard" style="margin-top: 70px">
							<div class="card">
								<div class="text-center">
									<h2>Today's Arrival</h2>
									<p>20 <span style="color: rgb(85, 192, 85)">↑3.15%</span></p>
									(Last 7 hours)
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Today's Departure</h2>
									<p>20 <span style="color: rgb(85, 192, 85)">↑3.15%</span></p>
									(Last 7 hours)
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Today's Booked</h2>
									<p>20 <span style="color: rgb(85, 192, 85)">↑3.15%</span></p>
									(Last 7 hours)
								</div>
							</div>
							<a href="admin-checker.php" style="text-decoration: none;">
								<div class="card">
									<div class="text-center">
										<h2>Today's Room Available</h2>
										<p>3 <span style="color: rgb(85, 192, 85)"><i class="fa-solid fa-bed"></i></span></p>
										(Last 7 hours)
									</div>
								</div>
							</a>
							<div class="card">
								<div class="text-center">
									<h2>Total Booked</h2>
									<p>20 <span style="color: rgb(85, 192, 85)">↑3.15%</span></p>
									(Last 7 hours)
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Staying</h2>
									<p>20 <span style="color: rgb(85, 192, 85)">↑3.15%</span></p>
									(Last 7 hours)
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Customer Reviews Rates</h2>
									<p style="margin-right: 47px">
										4.5<span style="color: rgb(214, 214, 26)">★</span>
									</p>
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Monthly Revenue</h2>
									<p>5,000 <span style="color: rgb(85, 192, 85)">↑50%</span></p>
								</div>
							</div>
							<div class="card">
								<div class="text-center">
									<h2>Yearly Revenue</h2>
									<p>5,000 <span style="color: rgb(85, 192, 85)">↑50%</span></p>
								</div>
							</div>
						</div>

						<div style="margin-top: 30px"></div>

						<?php
						// Assuming you have already connected to your database

						// Check if there are any reservations
						if ($result->num_rows > 0) {
						?>
							<div class="container" style="margin-top: 20px">
								<div class="col-md-w-100">
									<div class="card">
										<div class="card-header"><a href="Manage.php" style="text-decoration: none; color: black;">Current Room Reservation</a></div>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>User ID</th>
													<th>Name</th>
													<th>Type</th>
													<th>Number</th>
													<th>Arrival</th>
													<th>Departure</th>
													<th>Payment</th>
												</tr>
											</thead>
											<tbody>
												<?php
												// Fetch and display each reservation
												while ($row = $result->fetch_assoc()) {
												?>
													<tr>
														<td><?php echo $row['user_id']; ?></td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['room_type']; ?></td>
														<td><?php echo $row['room_num']; ?></td>
														<td><?php echo $row['checkin']; ?></td>
														<td><?php echo $row['checkout']; ?></td>
														<td><?php echo $row['price']; ?></td>
													</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						<?php
						} else {
							// If no reservations found
							echo "No reservations found.";
						}
						?>

						<!-- <div class="container">
							<div class="row justify-content-center">
								<div class="col-md-w-100">
									<div class="card">
										<div style="background-color: rgb(36, 36, 116); color: white" class="card-header">
											Reservation Details
										</div>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Name</th>
													<th>Type</th>
													<th>Number</th>
													<th>Date</th>
													<th>Arrival</th>
													<th>Departure</th>
													<th>Payment</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="user"><a href="user-management.php" style="text-decoration: none; color: black;">Ubald Jones Tuquib</a></td>
													<td>Two Bed</td>
													<td>1</td>
													<td>Feb 14, 2024</td>
													<td>9:00am - 12:00pm</td>
													<td>February 15, 2024 9:00am - 10:00am</td>
													<td class="paid" style="color: rgb(85, 192, 85)">Paid</td>
												</tr>

												<tr>
													<td>Jarell Portillas</td>
													<td>Two Bed</td>
													<td>1</td>
													<td>Feb 14, 2024</td>
													<td>9:00am - 12:00pm</td>
													<td>February 15, 2024 9:00am - 10:00am</td>
													<td class="paid" style="color: rgb(85, 192, 85)">Paid</td>
												</tr>

												<tr>
													<td>Juan Tamad</td>
													<td>Two Bed</td>
													<td>1</td>
													<td>Feb 14, 2024</td>
													<td>9:00am - 12:00pm</td>
													<td>February 15, 2024 9:00am - 10:00am</td>
													<td class="pending" style="color: red">Pending</td>
												</tr>

												<tr>
													<td>Filemon</td></a>
													<td>Two Bed</td>
													<td>1</td>
													<td>Feb 14, 2024</td>
													<td>9:00am - 12:00pm</td>
													<td>February 15, 2024 9:00am - 10:00am</td>
													<td class="pending" style="color: red">Pending</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> -->

					</div>
				</div>
			</main>
		</div>
	</div>

</body>

</html>