<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'config.php';

    // Retrieve the email entered by the user
    $email = $_POST['email'];

    // Retrieve the new password entered by the user
    $new_password = $_POST['new_password'];

    // Retrieve the confirmed password entered by the user
    $confirm_password = $_POST['confirm_password'];


    // If validation passes, update the password in your database
    if ($new_password === $confirm_password) {
        // Hash the password before storing it in the database
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Example MySQL query:
        $sql = "UPDATE customer_and_admin SET password = '$hashed_new_password' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            // Optionally, you can display a success message to the user
            echo '<script>alert("Password updated successfully. You can now login with your new password.");</script>';
        } else {
            // Passwords don't match, display an error message to the user
            echo '<script>alert("Error of updating the password. Please try again.");</script>';
        }
    } else {
        // Passwords don't match, display an error message to the user
        echo '<script>alert("Passwords do not match. Please try again.");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="signup.html" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
    <title>Forgot Password</title>
</head>

<body style="
      background: #e0c5c5;
      background-image: radial-gradient(
          at 20% 20%,
          hsla(28, 100%, 74%, 1) 0%,
          hsla(28, 100%, 74%, 0) 50%
        ),
        radial-gradient(
          at 80% 20%,
          hsla(189, 100%, 56%, 1) 0%,
          hsla(189, 100%, 56%, 0) 50%
        ),
        radial-gradient(
          at 80% 20%,
          hsla(355, 85%, 93%, 1) 0%,
          hsla(355, 85%, 93%, 0) 50%
        ),
        radial-gradient(
          at 80% 80%,
          hsla(340, 100%, 76%, 1) 0%,
          hsla(340, 100%, 76%, 0) 50%
        );
    ">
    <form method="post">
        <div class="d-flex align-items-center justify-text-center" style="min-height: 100vh; margin: 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card text-center" style="width: 21rem">
                            <div class="card-body">
                                <h1 class="ft">Confirm Password</h1>
                                <div style="margin-bottom: 20px;">
                                    <img style="margin: auto; width: 50px; height: 50px;" src="Images/logo.png" alt="photo">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="floatingInputGroup1" placeholder="Email Address" required>
                                        <label for="floatingInputGroup1">Email Address</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="new_password" id="floatingInputGroup1" placeholder="Password" required>
                                        <label for="floatingInputGroup1">New Password</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="confirm_password" id="floatingInputGroup1" placeholder="Password" required>
                                        <label for="floatingInputGroup1">Confirm Password</label>
                                    </div>
                                </div>
                                <button style="width: 150px" type="submit" class="btn btn-primary">
                                    Confirm</button><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>