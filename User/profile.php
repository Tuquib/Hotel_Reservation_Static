<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
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
                    <a href="../login.php">Logout</a>
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
                        <div class="profile-card" style="left: 170px;">
                            <div class="image">
                                <img src="../Images/userid.webp" alt="" class="profile-img" />
                                <a href="#" class="edit-icon"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="text-data">
                                <span class="name">
                                    <?php
                                    // Check if the user is logged in
                                    if (isset($_SESSION['username'])) {
                                        // Fetch the username from the session or database
                                        $username = $_SESSION['username']; // Assuming the username is stored in a session variable
                                        echo "$username";
                                    } else {
                                        echo "Welcome";
                                    }
                                    ?>
                                </span>
                                <span class="job">
                                    <?php

                                    // Check if the user is logged in
                                    if (isset($_SESSION['username'])) {
                                        // Fetch the username from the session or database
                                        $username = $_SESSION['username']; // Assuming the username is stored in a session variable
                                        echo "$username";
                                    } else {
                                        echo "Log in First";
                                    }
                                    ?>
                                </span>
                                <span class="job">
                                    <?php

                                    // Check if the user is logged in
                                    if (isset($_SESSION['user_id']) && isset($_SESSION['age']) && isset($_SESSION['gender'])) {
                                        // Fetch the id, age, and gender from the session or database
                                        $id = $_SESSION['user_id'];
                                        $age = $_SESSION['age'];
                                        $gender = $_SESSION['gender'];

                                        echo "User ID: $id, Age: $age, Gender: $gender";
                                    } else {
                                        echo "Welcome";
                                    }
                                    ?>
                                </span>
                                <span class="job">09631308925</span>
                                <span class="job">
                                    <?php

                                    // Check if the user is logged in
                                    if (isset($_SESSION['email'])) {
                                        // Fetch the username from the session or database
                                        $email = $_SESSION['email']; // Assuming the username is stored in a session variable
                                        echo "$email";
                                    } else {
                                        echo "Log in First";
                                    }
                                    ?>
                                </span>
                                <span class="job">
                                    <?php

                                    // Check if the user is logged in
                                    if (isset($_SESSION['address'])) {
                                        // Fetch the username from the session or database
                                        $address = $_SESSION['address']; // Assuming the username is stored in a session variable
                                        echo "$address";
                                    } else {
                                        echo "Log in First";
                                    }
                                    ?>
                                </span>

                            </div>
                            <div class="media-buttons">
                                <a href="#" style="background: #4267b2" class="link">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a href="#" style="background: #1da1f2" class="link">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                                <a href="#" style="background: #e1306c" class="link">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                                <a href="#" style="background: #ff0000" class="link">
                                    <i class="bx bxl-youtube"></i>
                                </a>
                            </div>
                            <div class="buttons">
                                <button class="button">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>

</html>