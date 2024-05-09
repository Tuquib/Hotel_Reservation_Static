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
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
                <img class="logo" src="../Images/logo.png" alt="logo" /><span class="sdash">
                    <?php
                    // Assuming you have started the session
                    session_start();

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
                        <div class="line">
                            <div class="text-center">
                                <p style="margin-top: 10px">Best Rooms</p>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 80px;">
                            <div class="popular__grid">
                                <div class="popular__card">
                                    <img src="../Images/Bed1.jpg" alt="popular hotel" />
                                    <div class="popular__content">
                                        <div class="popular__card__header">
                                            <h4>Two Beds with Cr</h4>
                                            <h4>P499</h4>
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
                                            <h4>Two Beds with Cr</h4>
                                            <h4>P499</h4>
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
                                    <img src="../Images/Bed3.jpg" alt="popular hotel" />
                                    <div class="popular__content">
                                        <div class="popular__card__header">
                                            <h4>Two Beds with Cr</h4>
                                            <h4>P499</h4>
                                        </div>
                                        <p>Room 1</p>
                                        <a href="booking.php">
                                            <button style="width: 150px" type="submit" class="btn btn-success">
                                                Book Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container" style="margin-top: 80px;">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Reservation History</div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Number</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Two Bed</td>
                                                <td>1</td>
                                                <td>Feb 14, 2024</td>
                                                <td>500.00</td>
                                            </tr>

                                            <tr>
                                                <td>Two Bed</td>
                                                <td>2</td>
                                                <td>Feb 14, 2024</td>
                                                <td>500.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 20px">
                            <div class="col-md-8">
                                <div class="card" style="left: 380px; top: -200px;">
                                    <div class="card-header"><a href="Manage.php" style="text-decoration: none; color: black;">Current Room Reservation</a></div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Number</th>
                                                <th>Date</th>
                                                <th>Arrival</th>
                                                <th>Departure</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Two Bed</td>
                                                <td>1</td>
                                                <td>Feb 14, 2024</td>
                                                <td>9:00am - 12:00pm</td>
                                                <td>February 15, 2024 9:00am - 10:00am</td>
                                                <td>500.00</td>
                                            </tr>

                                            <tr>
                                                <td>Two Bed</td>
                                                <td>2</td>
                                                <td>Feb 14, 2024</td>
                                                <td>9:00am - 12:00pm</td>
                                                <td>February 15, 2024 9:00am - 10:00am</td>
                                                <td>500.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <div class="book">
        <a href="booking.php">
            <button style="width: 100px" type="submit" class="btn btn-success">
                Book Now
            </button>
        </a>
    </div>
    <footer class="footer" id="contact">
        <div class="section__container footer__container">
            <div class="footer__col">
                <h3>Malaybalay Air BnB Travellers Inn</h3>
                <p>
                    With a user-friendly interface and a vast selection of hotels,
                    Malaybalay Air BnB Travellers Inn aims to provide a stress-free
                    experience for travelers seeking the perfect stay.
                </p>
                <p>
                    You can contact us in our Social Media , Phone Number +639631308925
                </p>
            </div>
            <div class="footer__col">
                <h4>Hotel</h4>
                <p>About Us</p>
                <p>Contact Us</p>
            </div>
            <div class="footer__col">
                <h4>Legal</h4>
                <p>FAQs</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
            </div>
            <div class="footer__col">
                <h4>Resources</h4>
                <p>Social Media</p>
                <p>Help Center</p>
                <p>Partnerships</p>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024 Ubald Jones L. Tuquib. All rights reserved.
        </div>
    </footer>
</body>

</html>