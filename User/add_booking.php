<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database configuration file
    include '../config.php';


    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
        // Fetch the username from the session or database
        $id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
    } else {
        // Redirect to login page if user is not logged in
        $_SESSION['error_message'] = "Please login first.";
        header("Location: ../login.php");
        exit();
    }

    // Retrieve form data
    $room_id = $_POST['room_id'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $room_num = $_POST['room_num'];
    $payment_method = $_POST['payment_method'];
    $contact_num = $_POST['contact_num'];
    $checkin = $_POST['checkin'];
    $checkin_time = $_POST['checkin_time'];
    $checkout = $_POST['checkout'];
    $checkout_time = $_POST['checkout_time'];

    // Check if the reservation for this date range already exists
    $sql = "SELECT * FROM reservation WHERE checkin = '$checkin' AND checkout = '$checkout'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // Date range already exists, set error message and redirect
        $_SESSION['error_message'] = "Reservation for this date range already exists.";
        header("Location: booking.php");
        exit();
    } else {
        // Insert new reservation into the database
        $sql = "INSERT INTO reservation (user_id, username, room_id, room_type, room_num, price, payment_method, contact_num, checkin, checkin_time, checkout, checkout_time)
                VALUES ('$id', '$username', '$room_id', '$room_type', '$room_num', '$price', '$payment_method', '$contact_num', '$checkin', '$checkin_time', '$checkout', '$checkout_time')";

        if ($conn->query($sql) === TRUE) {
            // New record created successfully, set success message and redirect
            $_SESSION['success_message'] = 'Reservation has been added successfully.';
            header("Location: booking.php");
            exit();
        } else {
            // Error occurred during insertion, set error message and redirect
            $_SESSION['error_message'] = 'There was an error adding the reservation.';
            header("Location: booking.php");
            exit();
        }
    }

    $conn->close();
} else {
    // Redirect to booking page if accessed directly without submitting the form
    header("Location: booking.php");
    exit();
}
