<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="Images/Favicon2.png" />
</head>

<body>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
        <img class="logo" src="../Images/logo.png" alt="logo" /><span class="sdash">
          <?php
          // Assuming you have started the session
          session_start();

          // Check if the user is logged in
          if (isset($_SESSION['username'])) {
            // Fetch the username from the session or database
            $username = $_SESSION['username']; // Assuming the username is stored in a session variable
            echo "Welcome, $username";
          } else {
            echo "Welcome";
          }
          ?>
        </span>
      </a>
      <form class="d-flex" role="search">
        <div class="input-group">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
        </div>
      </form>

      <div class="dropdown" style="left: 190px">
        <button class="btn rounded-circle btn-secondary">
          <i class="fa-solid fa-comment-dots"></i>
        </button>
        <div class="content">
          <a href="#">Inbox</a>
        </div>
      </div>

      <div class="dropdown" style="left: 70px">
        <button class="btn rounded-circle btn-secondary">
          <i class="fa-solid fa-bell"></i>
        </button>
        <div class="content">
          <a href="#">Notification</a>
          <a href="#">Announcement</a>
        </div>
      </div>

      <div class="dropdown" style="right: 50px">
        <button class="btn rounded-circle btn-secondary" id="iconButton">
          <i class="fa-solid fa-user"></i>
        </button>
        <div class="content">
          <a href="admin-profile.php">Profile</a>
          <a href="../firstpage.php">Logout</a>
        </div>
      </div>
    </div>
    </div>
  </nav>

  <div class="dasht">
    <h3>User Management</h3>
  </div>
  <div class="line"></div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="top: 90px; left: -405px">
          <div style="background-color: rgb(36, 36, 116); color: white;" class="card-header">User Information</div>
          <div style="margin-top: 10px"></div>
          <img src="../Images/userid.webp" alt="user" style=" width: 60px; height: 60px; margin-left: 150px;">
          <div class="text-center">
            <label class="form-label" for="name">Ubald Jones L. Tuquib</label><br>
            <label class="form-label" for="username">Ubald Jones</label><br>
            <label class="form-label" for="contact">09631308925</label><br>
            <label class="form-label" for="address">tuquibubald@gmail.com</label><br>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="top: 110px; left: -405px">
          <div style="background-color: rgb(36, 36, 116); color: white;" class="card-header">Pay With</div>
          <div style="margin-top: 10px"></div>
          <ul>
            <li>
              <input type="radio" id="gcash" name="payment_method" value="gcash" disabled>
              <label for="gcash">G-Cash</label>
            </li>
            <li>
              <input type="radio" id="credit_card" name="payment_method" value="credit_card" disabled>
              <label for="credit_card">Credit/Debit Card</label>
            </li>
            <li>
              <input type="radio" id="cash" name="payment_method" value="cash" checked>
              <label for="cash">Cash</label>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="card" style="top: -290px; left: 190px">
            <div style="background-color: rgb(36, 36, 116); color: white;" class="card-header">Current Room Reservation</div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Number</th>
                  <th>Date</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th>Amount</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>1</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td><i class="fa-solid fa-house"></i>Two Bed</td>
                  <td>2</td>
                  <td>Feb 14, 2024</td>
                  <td>9:00am - 12:00pm</td>
                  <td>February 15, 2024</td>
                  <td>500.00</td>
                  <td>
                    <button class="btn btn-sm btn-primary" title="Edit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><i class="fa-solid fa-money-bill"></i>Total</td>
                  <td>P10,000.00</td>
                </tr>
              </tbody>
            </table>
            <div class="bu" style="margin-bottom: 10px;">
              <a href="user-management.php">
                <button style="width: 150px;" type="submit" class="btn btn-success">
                  Save Update
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="book" style="top: 690px;">
      <a href="admin-dashboard.php">
        <button style="width: 100px" type="submit" class="btn btn-success">
          Ok
        </button>
    </div>
</body>

</html>