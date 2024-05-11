<?php
// Include your database connection code here

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
// Check if all required fields are present
if (isset($_POST['rev_id'], $_POST['contact_num'], $_POST['payment_method'], $_POST['checkin'], $_POST['checkin_time'], $_POST['checkout'], $_POST['checkout_time'])) {

    include '../config.php';

    $rev_id = $_POST['rev_id'];
    $contact_num = $_POST['contact_num'];
    $payment_method = $_POST['payment_method'];
    $checkin = $_POST['checkin'];
    $checkin_time = $_POST['checkin_time'];
    $checkout = $_POST['checkout'];
    $checkout_time = $_POST['checkout_time'];

    // Update user information in the database
    $sql = "UPDATE reservation SET contact_num='$contact_num', payment_method='$payment_method', checkin='$checkin', checkin_time='$checkin_time', checkout='$checkout', checkout_time='$checkout_time' WHERE rev_id='$rev_id'";
    if ($conn->query($sql) === TRUE) {
        echo "User information updated successfully";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
} else {
    echo "Missing required fields";
}
