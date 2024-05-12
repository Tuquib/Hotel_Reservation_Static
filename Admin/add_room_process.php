<!-- add_room_process.php -->
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code
    require_once '../config.php';

    // Escape user inputs for security
    $room_type = $conn->real_escape_string($_POST['room_type']);
    $room_num = $conn->real_escape_string($_POST['room_num']);
    $price = $conn->real_escape_string($_POST['price']);

    // File upload handling
    $target_dir = "../Images/"; // Adjust the path as needed
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['error_message'] = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['error_message'] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Prepare an insert statement
            $sql = "INSERT INTO rooms (room_type, room_num, price, photo) VALUES (?, ?, ?, ?)";


            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssis", $room_type, $room_num, $price, $target_file);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Room added successfully.";
                    header("location: admin_booking_manage.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close statement
                $stmt->close();
            } else {
                $_SESSION['error_message'] = "Error preparing statement: " . $conn->error;
            }
        } else {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
        }
    }

    // Close connection
    $conn->close();
} else {
    $_SESSION['error_message'] = "Sorry, your form submission method is not POST.";
}

// Redirect back to the form page
header("location: add_room.php");
exit();
?>