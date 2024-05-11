<?php
// Start session
session_start();


// Start output buffering
ob_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if the rev_id parameter is set
if (isset($_POST['rev_id'])) {
    // Include config file if necessary
    include '../config.php';

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape rev_id to prevent SQL injection
    $rev_id = $conn->real_escape_string($_POST['rev_id']);

    // Prepare delete statement
    $sql = "DELETE FROM reservation WHERE rev_id = '$rev_id'";

    if ($conn->query($sql) === TRUE) {
        // Return success message
        echo "Data deleted successfully";
    } else {
        // Return error message
        echo "Error deleting data: " . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // Return error message if rev_id parameter is not set
    echo "Error: No rev_id parameter provided";
}

// End output buffering and flush output
ob_end_flush();
