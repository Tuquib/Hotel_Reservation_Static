<!-- admin-checkin.php -->
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

// Perform SQL query to fetch reservation data
$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

// Check if the rev_id parameter is present in the URL
if (isset($_GET['rev_id'])) {
    // Get the reservation ID from the URL
    $rev_id = $_GET['rev_id'];

    // Update the status of the reservation to "Check In" in the database
    $update_sql = "UPDATE reservation SET status = 'Check In' WHERE rev_id = $rev_id";
    if ($conn->query($update_sql) === TRUE) {
        // Redirect to the same page to prevent multiple updates on page refresh
        header("Location: admin-checkin.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
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
                    <a href="../User/firstpage.php">Logout</a>
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
                            <button class="btn btn-block text-center"><i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-active" href="admin-profile.php">
                            <button class="btn btn-block text-left"><i class="fa-solid fa-user"></i>
                                Profile
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-active" href="admin_booking_manage.php">
                            <button class="btn btn-block text-center"><i class="fa-sharp fa-solid fa-bed"></i>
                                Add Room
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
                        <div class="line" style="left: 250px; width: 1100px;"></div>

                        <?php
                        // Check if there are any reservations
                        if ($result->num_rows > 0) { //line 150 Warning: Undefined variable $result
                        ?>
                            <div class="container" style="margin-top:60px">
                                <div class="col-md-w-100">
                                    <div class="card">
                                        <div class="card-header"><a href="Manage.php" style="text-decoration: none; color: black;">Current Room Reservation</a></div>
                                        <div class="panel-body">
                                            <a class="btn btn-success" href="admin-dashboard.php"><span class="badge"></span> Pendings</a>
                                            <a class="btn btn-info disabled" href="admin-checkin.php"><span class="badge"></span> Check In</a>
                                            <a class="btn btn-warning" href="admin-checkout.php"><i class="glyphicon glyphicon-eye-open"></i> Check Out</a>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Arrival</th>
                                                    <th>Departure</th>
                                                    <th>Days</th> <!-- New column for Days -->
                                                    <th>Status</th>
                                                    <th>Payment</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch and display each reservation
                                                while ($row = $result->fetch_assoc()) {
                                                    // Calculate the number of days between check-in and check-out dates
                                                    $arrival = strtotime($row['checkin']);
                                                    $departure = strtotime($row['checkout']);
                                                    $days = floor(($departure - $arrival) / (60 * 60 * 24));
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['user_id']; ?></td>
                                                        <td><a style="text-decoration: none; color:black;" href="user-management.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a></td>
                                                        <td><?php echo $row['room_type']; ?></td>
                                                        <td><?php echo $row['room_num']; ?></td>
                                                        <td><?php echo $row['checkin']; ?></td>
                                                        <td><?php echo $row['checkout']; ?></td>
                                                        <td><?php echo $days; ?></td> <!-- Display the calculated days -->
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == '') {
                                                                echo '<span class="text-success">Pending</span>';
                                                            } else {
                                                                echo '<span class="' . (($row['status'] == 'Check In') ? 'text-primary' : 'text-danger') . '">' . $row['status'] . '</span>';
                                                            }
                                                            ?>

                                                        </td>


                                                        <td><?php echo $row['price']; ?></td>

                                                        <!-- Inside the while loop where reservations are displayed -->
                                                        <td>
                                                            <!-- Check-out button -->
                                                            <a class="btn btn-warning" href="admin-checkout.php?rev_id=<?php echo $row['rev_id']; ?>">Check Out</a>

                                                        </td>


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
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>