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
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="homepage.css" />
    <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
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

            <div class="dropdown" style="left: 130px">
                <ul class="nav user-menu">
                    <li class="nav-item dropdown noti-dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <button class="btn rounded-circle btn-secondary">
                                <i class="fa-solid fa-bell"></i>
                            </button> <span class="badge badge-pill">3</span>
                        </a>
                        <div class="dropdown-menu notifications" style="width: 220px;">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                            </div>
                            <div class="noti-content" style="max-height: 300px; overflow-y: auto;">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <!-- Added style to ensure fixed height and enable scrolling -->
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar avatar-sm">
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details">
                                                        <span class="noti-title">International Software Inc</span>
                                                        has sent you a invoice in the amount of
                                                        <span class="noti-title">$218</span>
                                                    </p>
                                                    <p class="noti-time">
                                                        <span class="notification-time">6 mins ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <!-- Added style to ensure fixed height and enable scrolling -->
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar avatar-sm">
                                                    <!-- Removed image -->
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details">
                                                        <span class="noti-title">Mercury Software Inc</span>
                                                        added a new product
                                                        <span class="noti-title">Apple MacBook Pro</span>
                                                    </p>
                                                    <p class="noti-time">
                                                        <span class="notification-time">12 mins ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <!-- Added style to ensure fixed height and enable scrolling -->
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar avatar-sm">
                                                    <!-- Removed image -->
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details">
                                                        <span class="noti-title">Philip Beronio</span>
                                                        sent a cancelation request
                                                        <span class="noti-title">Book a Room</span>
                                                    </p>
                                                    <p class="noti-time">
                                                        <span class="notification-time">12 mins ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="#">View all Notifications</a>
                            </div>
                        </div>
                    </li>
                </ul>
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
                            <h3>Dashboard</h3>
                        </div>
                        <div class="line" style="left: 250px; width: 1100px">
                            <div class="text-center" style="right: 50px;">
                                <p style="margin-top: 10px;">Best Rooms</p>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 80px;">
                            <div class="popular__grid">
                                <div class="popular__card">
                                    <img src="../Images/Bed1.jpg" alt="popular hotel" />
                                    <div class="popular__content">
                                        <div class="popular__card__header">
                                            <h4>Supreme</h4>
                                            <h4>P2500</h4>
                                        </div>
                                        <p>Room 1</p>
                                        <a href="booking.php">
                                            <button style="width: 150px" type="submit" class="btn btn-success">
                                                Book Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular__card">
                                    <img src="../Images/Back2.jpg" alt="popular hotel" />
                                    <div class="popular__content">
                                        <div class="popular__card__header">
                                            <h4>Classic</h4>
                                            <h4>P1500</h4>
                                        </div>
                                        <p>Room 2</p>
                                        <a href="booking.php">
                                            <button style="width: 150px" type="submit" class="btn btn-success">
                                                Book Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular__card">
                                    <img src="../Images/Bed3.jpg" alt="popular hotel" />
                                    <div class="popular__content">
                                        <div class="popular__card__header">
                                            <h4>Standard</h4>
                                            <h4>P2000</h4>
                                        </div>
                                        <p>Room 3</p>
                                        <a href="booking.php">
                                            <button style="width: 150px" type="submit" class="btn btn-success">
                                                Book Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="about" id="About">
                            <div class="container" style="margin-top: 40px;">
                                <div class="col-md-4" style="width: 100%;">
                                    <div class="card">
                                        <div class="card-header" style="background-color: #e1dada;">Reservation History</div>
                                        <table id="reservationHistoryTable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Arrival</th>
                                                    <th>Departure</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Modify your SQL query to include a condition for 'check out' status
                                                // Check if there are any reservations for the logged-in user

                                                $sql = "SELECT * FROM reservation WHERE status = 'Check out' AND username = '$username'";
                                                $result = $conn->query($sql);

                                                // Check if there are any rows returned from the query
                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["room_type"] .  "</td>";
                                                        echo "<td>" . $row["room_num"] . "</td>";
                                                        echo "<td>" . $row["checkin"] . "</td>";
                                                        echo "<td>" . $row["checkout"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</tbody></table>";

                                                    // Echo out the DataTables initialization code here
                                                    echo "<script>
                            $(document).ready(function() {
                                $('#reservationHistoryTable').DataTable(); // Initialize DataTables for your table
                            });
                            </script>";
                                                }
                                                // Check for errors in the SQL query execution
                                                if (!$result) {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php
                                // Check if there are any reservations for the logged-in user with status 'checkout'
                                $sql = "SELECT * FROM reservation WHERE username = '$username' AND status = ' '";
                                $result = $conn->query($sql);

                                // Display reservations
                                ?>

                                <div class="col-md-8" style="width: 100%; margin-top: 20px;">
                                    <div class="card" style="margin-bottom:40px;">
                                        <div class="card-header" style="background-color: #e1dada;">Current Room Reservation</a></div>
                                        <table id="reservationTable" class="table table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Arrival</th>
                                                    <th>Departure</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Check if there are any rows returned from the query
                                                if ($result->num_rows > 0) {
                                                    // Output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["room_type"] .  "</td>";
                                                        echo "<td>" . $row["room_num"] . "</td>";
                                                        echo "<td>" . $row["checkin"] . "</td>";
                                                        echo "<td>" . $row["checkout"] . "</td>";
                                                        echo "<td>" . $row["price"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</tbody></table>";

                                                    // Echo out the DataTables initialization code here
                                                    echo "<script>
                            $(document).ready(function() {
                                $('#reservationTable').DataTable(); // Initialize DataTables for your table
                            });
                        </script>";
                                                } else {
                                                    // If no reservations with status 'checkout' found
                                                    echo "<tr><td colspan='5'>No current room reservations found.</td></tr>";
                                                    echo "</tbody></table>";
                                                }

                                                // Check for errors in the SQL query execution
                                                if (!$result) {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }

                                                // Close the database connection
                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap 4 JS -->

</body>

</html>