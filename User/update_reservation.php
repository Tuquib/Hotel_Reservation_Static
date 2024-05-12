<?php
// Include your database connection code here
session_start();
// Check if all required fields are present
if (isset($_POST['room_id'], $_POST['contact_num'], $_POST['payment_method'], $_POST['checkin'], $_POST['checkin_time'], $_POST['checkout'], $_POST['checkout_time'])) {

    include '../config.php';

    $room_id = $_POST['room_id'];
    $contact_num = $_POST['contact_num'];
    $payment_method = $_POST['payment_method'];
    $checkin = $_POST['checkin'];
    $checkin_time = $_POST['checkin_time'];
    $checkout = $_POST['checkout'];
    $checkout_time = $_POST['checkout_time'];

    // Update user information in the database
    $sql = "UPDATE reservation SET contact_num='$contact_num', payment_method='$payment_method', checkin='$checkin', checkin_time='$checkin_time', checkout='$checkout', checkout_time='$checkout_time' WHERE room_id='$room_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Reservation updated successfully";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
} else {
    echo "Missing required fields";
}
