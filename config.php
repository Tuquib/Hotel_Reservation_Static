<?php

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

 // $rev_id = $_POST['rev_id'];
    // $id = $_POST['user_id'];
    // $username = $_POST['username'];
    // $contact = $_POST['contact_num'];
    // $room_type = $_POST['room_type'];
    // $room_num = $_POST['room_num'];
    // $bill = $_POST['bill'];
