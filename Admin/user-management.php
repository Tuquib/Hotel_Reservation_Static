<?php
session_start();

if (isset($_GET['user_id'])) {
    include '../config.php';
    $user_id = $_GET['user_id'];

    $user_query = "SELECT * FROM customer_and_admin WHERE user_id = $user_id";
    $user_result = $conn->query($user_query);

    if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();
?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Manage User - <?php echo $user_row['username']; ?></title>
            <link rel="stylesheet" href="../style.css" />
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
                    <main role="main" class="col-md-5 ml-sm-auto col-lg-10 px-4">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="dasht" style="left: 250px;">
                                    <h3>Reservation Management</h3>
                                </div>
                                <div class="line" style="left: 250px; width: 1100px"></div>

                                <div class="container" style="margin-top: 60px;">
                                    <div class="col-md-4">
                                        <div class="card" style="left: 350px;">
                                            <div class="card-header">User Profile</div>
                                            <div class="text-center">
                                                <img style="width: 100px; height: 100px;" src="../Images/userid.webp" alt="" />
                                                <p><?php echo $user_row['username']; ?></p>
                                                <p>User ID: <?php echo $user_row['user_id']; ?></p>
                                                <p>Email: <?php echo $user_row['email']; ?></p>
                                                <p>Address: <?php echo $user_row['address']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container" style="margin-top: 40px">
                                    <div class="card w-100">
                                        <div class="card-header" style="background-color: #e1dada;"><?php echo $user_row['username']; ?> Room Reservation</a></div>
                                        <table id="reservationTable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Arrival</th>
                                                    <th>In Time</th>
                                                    <th>Departure</th>
                                                    <th>Out Time</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch reservations for the user
                                                $reservation_query = "SELECT * FROM reservation WHERE user_id = $user_id AND status = ' '";
                                                $reservation_result = $conn->query($reservation_query);

                                                if ($reservation_result->num_rows > 0) {
                                                    while ($row = $reservation_result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["rev_id"] .  "</td>";
                                                        echo "<td>" . $row["room_type"] .  "</td>";
                                                        echo "<td>" . $row["room_num"] . "</td>";
                                                        echo "<td>" . $row["checkin"] . "</td>";
                                                        echo "<td>" . $row["checkin_time"] . "</td>";
                                                        echo "<td>" . $row["checkout"] . "</td>";
                                                        echo "<td>" . $row["checkout_time"] . "</td>";
                                                        echo "<td>" . $row["price"] . "</td>";
                                                        echo "<td>" . $row["payment_method"] . "</td>";
                                                        echo "<td>";
                                                        echo "<button class='btn btn-info edit-btn' type='button' value='Edit' style='margin-right: 4px;' onclick='openUpdateModal(" . $row["room_id"] . ")'><i class='fa fa-pencil' ></i></button>";
                                                        echo "<button class='btn btn-danger delete-btn' type='button' value='Delete' onclick='deleteUser(" . $row["rev_id"] . ")'><i class='fa fa-trash'></i></button>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>No reservations found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        <?php
                    } else {
                        echo "User not found.";
                    }
                } else {
                    echo "User ID not provided.";
                }
                        ?>

                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reservation Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Reservation form will be loaded dynamically here -->
                                        <form action="formUpdate">
                                            <input type="hidden" name="room_id" id="update_room_id" value="<?php echo $fetch['room_id']; ?>">
                                            <input type="hidden" name="room_type" value="<?php echo $fetch['room_type']; ?>">
                                            <input type="hidden" name="price" value="<?php echo $fetch['price']; ?>">
                                            <input type="hidden" name="room_num" value="<?php echo $fetch['room_num']; ?>">
                                            <!-- Additional input fields for reservation -->
                                            <div class="mb-3">
                                                <label for="contact" class="col-form-label">Contact Information:</label>
                                                <input type="number" name="contact_num" id="update_contact_num" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="col-form-label">Payment Method:</label>
                                                <select class="form-control" name="payment_method" id="update_payment_method" required>
                                                    <option value="" selected="" disabled="">Select Payment</option>
                                                    <option value="G Cash">G Cash</option>
                                                    <option value="E-Wallet">E-Wallet</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Credit/Debit Card">Credit/Debit Card</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="col-form-label">Check In:</label>
                                                <input type="date" name="checkin" id="update_checkin" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="col-form-label">Time</label>
                                                <input type="time" name="checkin_time" id="update_checkin_time" class="form-control" required></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="col-form-label">Check out</label>
                                                <input type="date" name="checkout" id="update_checkout" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="col-form-label">Time</label>
                                                <input type="time" name="checkout_time" id="update_checkout_time" class="form-control" required></input>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="updateButton" onclick="updateReservation()">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap 4 JS -->

            <script>
                $(document).ready(function() {
                    $('#reservationTable').DataTable();
                });

                function deleteUser(rev_id) {
                    var confirmation = confirm("Are you sure you want to delete this data?");
                    if (confirmation) {
                        // Make AJAX request to delete_reservation.php
                        $.ajax({
                            url: '../User/delete_reservation.php',
                            method: 'POST',
                            data: {
                                rev_id: rev_id
                            },
                            success: function(response) {
                                // Reload the page

                                $("#liveAlertPlaceholder").html(`<div class="alert alert-success" role="alert" style="margin-top: 20px;">${response}</div>`);
                                // Display success message after a short delay
                                setTimeout(function() {
                                    location.reload();
                                }, 1000); // Adjust the delay time as needed
                            },
                            error: function(xhr, status, error) {
                                // Display error message
                                $("#liveAlertPlaceholder").html(`<div class="alert alert-danger" role="alert">Error: ${xhr.responseText}</div>`);
                            }
                        });
                    }
                }

                function openUpdateModal(room_id) {
                    $.ajax({
                        url: '../User/get_reservation.php', // Assuming this PHP file retrieves reservation data
                        method: 'POST',
                        data: {
                            room_id: room_id
                        },
                        success: function(response) {
                            let reservation = JSON.parse(response);
                            $("#update_room_id").val(reservation.room_id);
                            $("#update_contact_num").val(reservation.contact_num);
                            $("#update_payment_method").val(reservation.payment_method);
                            $("#update_checkin").val(reservation.checkin);
                            $("#update_checkin_time").val(reservation.checkin_time);
                            $("#update_checkout").val(reservation.checkout);
                            $("#update_checkout_time").val(reservation.checkout_time);
                            $("#updateModal").modal('show');
                        },
                        error: function(xhr, status, error) {
                            // Display error message
                            console.error(xhr.responseText);
                            alert("Failed to retrieve reservation data. Please try again.");
                        }
                    });
                }

                function updateReservation() {
                    // Get updated reservation data from the form
                    let roomId = $("#update_room_id").val();
                    let contactNum = $("#update_contact_num").val();
                    let paymentMethod = $("#update_payment_method").val();
                    let checkin = $("#update_checkin").val();
                    let checkinTime = $("#update_checkin_time").val();
                    let checkout = $("#update_checkout").val();
                    let checkoutTime = $("#update_checkout_time").val(); // Corrected variable name

                    if (roomId === "" || checkin === "" || checkout === "") {
                        $("#liveAlertPlaceholder").html(`<div class="alert alert-danger" role="alert">Please fill in all required fields.</div>`);
                        return; // Prevent further execution if validation fails
                    }

                    // Make AJAX request to update_reservation.php
                    $.ajax({
                        url: '../User/update_reservation.php',
                        method: 'POST',
                        data: {
                            room_id: roomId,
                            contact_num: contactNum,
                            payment_method: paymentMethod,
                            checkin: checkin,
                            checkin_time: checkinTime,
                            checkout: checkout,
                            checkout_time: checkoutTime
                        },
                        success: function(response) {
                            $("#liveAlertPlaceholder").html(`<div class="alert alert-success" role="alert">${response}</div>`);
                            $("#updateModal").modal('hide');

                            setTimeout(function() {
                                location.reload();
                            }, 2000);

                        },
                        error: function(xhr, status, error) {
                            $("#liveAlertPlaceholder").html(`<div class="alert alert-danger" role="alert">Error: ${xhr.responseText}</div>`);
                        }
                    });
                }
            </script>

        </body>

        </html>