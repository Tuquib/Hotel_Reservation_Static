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

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    // Fetch room details based on room_id
    $sql = "SELECT * FROM rooms WHERE room_id = $room_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $room_type = $row['room_type'];
        $price = $row['price'];
        $photo = $row['photo'];
    } else {
        // Room not found, handle error
        $_SESSION['error_message'] = "Room not found.";
        header("Location: admin_booking_manage.php");
        exit();
    }
} else {
    // No room_id provided, handle error
    $_SESSION['error_message'] = "Room ID not provided.";
    header("Location: admin_booking_manage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating room details
    // Retrieve updated values from the form
    $updated_room_type = $_POST['room_type'];
    $updated_price = $_POST['price'];

    // Check if a new photo is uploaded
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        $photo_path = "../Images/" . $photo_name;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($photo_tmp_name, $photo_path)) {
            // Update room details in the database
            $update_sql = "UPDATE rooms SET room_type='$updated_room_type', price='$updated_price', photo='$photo_name' WHERE room_id=$room_id";
            if ($conn->query($update_sql) === TRUE) {
                $_SESSION['success_message'] = "Room updated successfully.";
                header("Location: admin_booking_manage.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error updating room: " . $conn->error;
                header("Location: admin_booking_manage.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Error uploading photo.";
            header("Location: admin_booking_manage.php");
            exit();
        }
    } else {
        // No new photo uploaded, update room details without changing the photo
        $update_sql = "UPDATE rooms SET room_type='$updated_room_type', price='$updated_price' WHERE room_id=$room_id";
        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['success_message'] = "Room updated successfully.";
            header("Location: admin_booking_manage.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error updating room: " . $conn->error;
            header("Location: admin_booking_manage.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Room</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
    <!-- Add your CSS links here -->
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
                        <div class="d-flex align-items-center justify-text-center" style="min-height: 100vh; margin: 0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 mx-auto">
                                        <div class="card text-center" style="width: 21rem">
                                            <div class="card-body">
                                                <h1 class="ft">Edit Room</h1>
                                                <form method="post" enctype="multipart/form-data">
                                                    <label for="roomType">Room Type:</label>
                                                    <input class="form-control" type="text" id="roomType" name="room_type" value="<?php echo $room_type; ?>" required><br>

                                                    <label for="price">Price:</label>
                                                    <input class="form-control" type="number" id="price" name="price" value="<?php echo $price; ?>" required><br>

                                                    <label for="photo">Update Photo:</label>
                                                    <input class="form-control" type="file" id="photo" name="photo"><br>

                                                    Display the current photo
                                                    <label>Current Photo:</label><br>
                                                    <img src="../Images/<?php echo $photo; ?>" alt="Current Room Photo" width="200"><br><br>

                                                    <button style="width: 150px" type="submit" value="Update" class="btn btn-primary">
                                                        Update</button><br />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>