<!-- admin_booking_manage.php -->
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



$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Room Management</title>
    <link rel="stylesheet" href="../style.css" />
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
            </nav>
            <main role="main" class="col-md-5 ml-sm-auto col-lg-10 px-4">
                <div class="row">
                    <div class="container-fluid">
                        <div class="dasht" style="left: 250px;">
                            <h3>Room Management</h3>
                        </div>
                        <div class="line" style="left: 250px; width: 1100px;">
                        </div>

                        <div class="container">

                            <div class="alert" style="margin-top: 30px;">
                                <?php if (isset($_SESSION['success_message'])) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $_SESSION['success_message'] ?>
                                    </div>
                                    <?php unset($_SESSION['success_message']); ?>
                                    <script>
                                        document.querySelector('.alert-success').classList.add('temporary-message');
                                    </script>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['error_message'])) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_SESSION['error_message'] ?>
                                    </div>
                                    <?php unset($_SESSION['error_message']); ?>
                                    <script>
                                        document.querySelector('.alert-danger').classList.add('temporary-message');
                                    </script>
                                <?php endif; ?>
                            </div>

                            <!-- manage rooms -->

                            <br />
                            <div class="container-fluid" style="margin-top: 10px;">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="alert alert-info">Transaction / Room</div>
                                        <button style="width: 150px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add Room
                                        </button>


                                        <br />
                                        <br />
                                        <table id=" table" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Room Type</th>
                                                    <th>Payment</th>
                                                    <th>Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['room_type'] . "</td>";
                                                    echo "<td>" . $row['price'] . "</td>";
                                                    echo "<td><img src='../Images/" . $row['photo'] . "' alt='Room Image' width='50' height='50'/></td>";
                                                    echo "<td>";
                                                    echo "<a class='btn btn-danger' href='delete_room.php?room_id=" . $row['room_id'] . "'>Delete</a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- end manage rooms -->
                        </div>
                    </div>
            </main>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_room_process.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="roomType">Room Type:</label>
                            <select class="form-control" id="roomType" name="room_type" required>
                                <option value="Standard">Standard</option>
                                <option value="Superior">Superior</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="roomNum">Room Number:</label>
                            <input type="text" class="form-control" id="roomNum" name="room_num" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price per Night:</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap 4 JS -->

</body>

</html>