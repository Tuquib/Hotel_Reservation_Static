<?php
// Include your database connection code here
session_start();

// Check if rev_id parameter is present
if (isset($_POST['rev_id'])) {
    // Assuming rev_id is an integer, you may need to sanitize or validate the input
    $rev_id = $_POST['rev_id'];

    // Include your database connection
    include '../config.php';

    // Prepare SQL statement to select reservation information
    $sql = "SELECT * FROM reservation WHERE rev_id = ?";

    // Prepare and bind parameters to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rev_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the reservation exists
    if ($result->num_rows > 0) {
        // Fetch reservation data as an associative array
        $row = $result->fetch_assoc();

        // Convert reservation data to JSON format and output it
        echo json_encode($row);
    } else {
        // If no reservation with the given rev_id is found, return an error message
        echo json_encode(array('error' => 'Reservation not found'));
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If rev_id parameter is not provided, return an error message
    echo json_encode(array('error' => 'Missing rev_id parameter'));
}
