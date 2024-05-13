<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="Images/Favicon2.png" />
    <title>Sign Up</title>
</head>

<body style="
      background: #e0c5c5;
      background-size:cover;
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
    <form action="signup_check.php" method="post">
        <div class="d-flex align-items-center justify-text-center" style="min-height: 100vh; margin: 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card text-center" style="width: 21rem;">
                            <div class="card-body">
                                <div class="alert">
                                    <?php if (isset($_SESSION['success_message'])) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= $_SESSION['success_message'] ?>
                                        </div>
                                        <?php unset($_SESSION['success_message']); ?>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['error_message'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['error_message'] ?>
                                        </div>
                                        <?php unset($_SESSION['error_message']); ?>
                                    <?php endif; ?>

                                </div>
                                <h1 style="padding-left: 10px;">Sign Up</h1>
                                <div style="margin-bottom: 20px;">
                                    <img style="margin: auto; width: 50px; height: 50px;" src="Images/logo.png" alt="photo">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="username" id="floatingInputGroup1" placeholder="Username" required>
                                        <label for="floatingInputGroup1">Username</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-envelope"></i></span>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="floatingInputGroup1" placeholder="Email Address" required>
                                        <label for="floatingInputGroup1">Email Address</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-arrow-down-1-9"></i></span>
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="age" id="floatingInputGroup1" placeholder="Age" required>
                                        <label for="floatingInputGroup1">Age</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="address" id="floatingInputGroup1" placeholder="Address" required>
                                        <label for="floatingInputGroup1">Address</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="gender" id="floatingInputGroup1" placeholder="Gender" required>
                                        <label for="floatingInputGroup1">Gender</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-key"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="floatingInputGroup1" placeholder="Password" required>
                                        <label for="floatingInputGroup1">Password</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-key"></i></span>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="confirm_password" id="floatingInputGroup1" placeholder="Confirm Password" required>
                                        <label for="floatingInputGroup1">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <select class="form-control" name="role" required>
                                        <option value="" selected="" disabled="">Select Role</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <br>
                                <button style="width: 300px;" type="submit" class="btn btn-primary">Sign Up</button><br>
                                <p>Already have an Account? <a href="login.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>