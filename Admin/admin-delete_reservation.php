<!-- admin-delete_reservation.php -->
<?php
// Start session
session_start();

// Include config file if necessary
// include '../config.php';

// Start output buffering
ob_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files and start session
// include '../config.php';
// session_start();

// Check if the rev_id parameter is set
if (isset($_GET['rev_id'])) {
    // Include config file if necessary
    include '../config.php';

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape rev_id to prevent SQL injection
    $rev_id = $conn->real_escape_string($_GET['rev_id']);

    // Prepare delete statement
    $sql = "DELETE FROM reservation WHERE rev_id = '$rev_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to reservation page
        header("Location: admin-dashboard.php");
        exit(); // Stop further execution
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
