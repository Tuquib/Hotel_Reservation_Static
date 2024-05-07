<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Booking</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
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

      <div class="dropdown" style="left: 150px">
        <button class="btn rounded-circle btn-secondary">
          <i class="fa-solid fa-comment-dots"></i>
        </button>
        <div class="content">
          <a href="#">Inbox</a>
        </div>
      </div>

      <div class="dropdown" style="left: 50px">
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
          <a href="profile.php">Profile</a>
          <a href="firstpage.php">Logout</a>
        </div>
      </div>
    </div>
    </div>
  </nav>

  <div class="dasht">
    <h3>Payment Method</h3>
  </div>
  <div class="line"></div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card" style="top: 80px; right: 178px">
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
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>1</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>

              <tr>
                <td><i class="fa-solid fa-house"></i>Two Bed</td>
                <td>2</td>
                <td>Feb 14, 2024</td>
                <td>9:00am - 12:00pm</td>
                <td>February 15, 2024 9:00am - 10:00am</td>
                <td>500.00</td>
              </tr>
              <tr>
                <td><i class="fa-solid fa-money-bill"></i>Total</td>
                <td>P10,000.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="top: -303px; left: 430px">
          <div style="background-color: rgb(36, 36, 116); color: white;" class="card-header">User Information</div>
          <div style="margin-top: 10px"></div>
          <label class="form-label" for="name">Name:
            <input style="margin-left: 70px;" class="form-input" type="text" id="name" name="name" value="Ubald Jones L.Tuquib" disabled></input></label>
          <label class="form-label" for="username">Username:
            <input style="margin-left: 42px;" class="form-input" type="text" id="username" name="username" value="Ubald Jones" disabled></input></label>
          <label class="form-label" for="contact">Contact No:
            <input style="margin-left: 33px;" class="form-input" type="tel" id="contact" name="contact" value="+639631308925" disabled></input></label>
          <label class="form-label" for="address">Address:
            <input style="margin-left: 56px;" class="form-input" id="address" name="address" rows="4" value="Zone 3 Kisolon, Sumilao, Bukidnon" disabled></input></label>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 290px; left: 430px">
          <div style="background-color: rgb(36, 36, 116); color: white;" class="card-header">Pay With</div>
          <div style="margin-top: 10px"></div>
          <ul>
            <li>
              <input type="radio" id="gcash" name="payment_method" value="gcash">
              <label for="gcash">G-Cash</label>
            </li>
            <li>
              <input type="radio" id="credit_card" name="payment_method" value="credit_card">
              <label for="credit_card">Credit/Debit Card</label>
            </li>
            <li>
              <input type="radio" id="cash" name="payment_method" value="cash">
              <label for="cash">Cash</label>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="book" style="top: 600px;">
      <a href="dashboard.php">
        <button style="width: 100px" type="submit" class="btn btn-success">
          Ok
        </button>
    </div>
</body>

</html>