<?php
// Start the session
session_start();

// Check if the form is submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file here
    include_once "config.php"; // Adjust the path according to your file structure

    // Check if email and password are set and not empty
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // Prepare a select statement
        $sql = "SELECT user_id, email, username, password, role, age, gender, address FROM customer_and_admin WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $_POST['email'];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $email, $username, $hashed_password, $role, $age, $gender, $address);
                    if ($stmt->fetch()) {
                        if (password_verify($_POST['password'], $hashed_password)) {
                            // Password is correct, so start a new session

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["role"] = $role;
                            $_SESSION["username"] = $username;
                            $_SESSION["age"] = $age;
                            $_SESSION["gender"] = $gender;
                            $_SESSION["address"] = $address;

                            // Redirect user based on role
                            switch ($role) {
                                case 'Customer':
                                    header("Location: User/dashboard.php");
                                    break;
                                case 'Admin':
                                    header("Location: Admin/admin-dashboard.php");
                                    break;
                                default:
                                    header("Location: index.php");
                                    break;
                            }
                        } else {
                            // Password is not valid, display a generic error message
                            $_SESSION['alert'] = "Invalid email or password.";
                        }
                    }
                } else {
                    // Email doesn't exist, display a generic error message
                    $_SESSION['alert'] = "Invalid email or password.";
                }
            } else {
                // Display an error message if execution failed
                $_SESSION['alert'] = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    } else {
        // If email or password is empty, display a generic error message
        $_SESSION['alert'] = "Please enter both email and password.";
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="signup.php" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="Images/Favicon2.png" />
    <title>Login</title>
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
      background-size: 100% 100%, 100% 100%, 100% 100%, 100% 100%; /* Specify background size for each gradient */
      animation: gradientAnimation 5s linear infinite;
    ">
    <form method="post">
        <div class="d-flex align-items-center justify-text-center" style="min-height: 100vh; margin: 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card text-center" style="width: 21rem">
                            <div class="card-body">
                                <!-- Error message display -->
                                <?php
                                if (isset($_SESSION['alert'])) {
                                    echo '<div class="alert alert-dismissible fade show alert-danger" role="alert">' . $_SESSION['alert'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                    unset($_SESSION['alert']);
                                }
                                ?>
                                <h1 class="ft">LOGIN</h1>
                                <div style="margin-bottom: 20px;">
                                    <img style="margin: auto; width: 50px; height: 50px;" src="Images/logo.png" alt="photo">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-envelope"></i></span>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="floatingInputGroup1" placeholder="Email Address" required>
                                        <label for="floatingInputGroup1">Email Address</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-key"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="floatingInputGroup1" placeholder="Password" required>
                                        <label for="floatingInputGroup1">Password</label>
                                    </div>
                                </div>

                                <p class="fw-bold">
                                    Forgot Password?<a href="forgot-password.php">Click Here</a>
                                </p>
                                <button style="width: 150px" type="submit" class="btn btn-primary">
                                    LOGIN</button><br />
                                <p class="fw-bold">
                                    Do You have no Account?<a href="signup.php">SignUp</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>