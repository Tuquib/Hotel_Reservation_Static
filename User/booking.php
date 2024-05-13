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
                            <h3>Online Booking</h3>
                        </div>
                        <div class="line" style="left: 250px; width: 1100px"></div>

                        <div class="text-start">
                            <p style="margin-top: 10px;font-size: x-large;position: absolute; width: 186px; height: 23px; left: 250px;top: 100px;">Rooms</p>
                        </div>

                        <div class="alert">
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

                        <div class="container" style="margin-top: 50px;">
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
                                        <img src="../Images/<?php echo $fetch['photo'] ?>" alt="popular hotel" />
                                        <div class="popular__content">
                                            <div class="popular__card__header">
                                                <h4 id="room_type"><?php echo $fetch['room_type'] ?></h4>
                                                <h4 id="price"> P<?php echo $fetch['price'] ?></h4>
                                            </div>
                                            <p id="room_num"><?php echo $fetch['room_num'] ?></p>
                                            <button style="width: 150px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $fetch['room_id']; ?>">
                                                Check Now
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Modal for each room -->
                                    <div class="modal fade" id="exampleModal_<?php echo $fetch['room_id']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Reservation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="add_booking.php" method="post">
                                                        <!-- Hidden inputs to pass room data -->
                                                        <input type="hidden" name="room_id" value="<?php echo $fetch['room_id']; ?>" required>
                                                        <input type="hidden" name="room_type" value="<?php echo $fetch['room_type']; ?>" required>
                                                        <input type="hidden" name="price" value="<?php echo $fetch['price']; ?>" required>
                                                        <input type="hidden" name="room_num" value="<?php echo $fetch['room_num']; ?>" required>

                                                        <!-- Additional input fields for reservation -->
                                                        <div class="mb-3">
                                                            <label for="contact" class="col-form-label">Contact Information:</label>
                                                            <input type="number" name="contact_num" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="contact" class="col-form-label">Payment Method:</label>
                                                            <select class="form-control" name="payment_method" required>
                                                                <option value="" selected="" disabled="">Select Payment</option>
                                                                <option value="G Cash">G Cash</option>
                                                                <option value="E-Wallet">E-Wallet</option>
                                                                <option value="Cash">Cash</option>
                                                                <option value="Credit/Debit Card">Credit/Debit Card</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date" class="col-form-label">Check In:</label>
                                                            <input type="date" name="checkin" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="time" class="col-form-label">Time</label>
                                                            <input type="time" name="checkin_time" class="form-control" required></input>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date" class="col-form-label">Check out</label>
                                                            <input type="date" name="checkout" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="time" class="col-form-label">Time</label>
                                                            <input type="time" name="checkout_time" class="form-control" required></input>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Book Now</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap 4 JS -->

</body>

</html>