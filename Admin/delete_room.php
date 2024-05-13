<?php
session_start();

// Check if room_id is set and not empty
if (isset($_GET['room_id']) && !empty($_GET['room_id'])) {
    // Include your database connection code
    require_once '../config.php';

    // Escape the room_id for security
    $room_id = $conn->real_escape_string($_GET['room_id']);

    // Prepare a delete statement
    $sql = "DELETE FROM rooms WHERE room_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind room_id parameter to the prepared statement
        $stmt->bind_param("i", $room_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Room deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Error deleting room: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error preparing delete statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    $_SESSION['error_message'] = "Room ID is not provided.";
}

// Redirect back to the admin_booking_manage.php page
header("location: admin_booking_manage.php");
exit();
