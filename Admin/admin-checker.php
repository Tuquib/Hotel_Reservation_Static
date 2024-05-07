<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Room Availability Checker</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
</head>

<body>
  <style>
    .card {
      transition: all 0.5s;
    }

    .card:hover {
      transform: scale(1.15);

      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="dashboard.html">
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
          ?></span>
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
          <a href="admin-profile.html">Profile</a>
          <a href="../firstpage.html">Logout</a>
        </div>
      </div>
    </div>
    </div>
  </nav>

  <div class="dasht">
    <h3>Room Availability</h3>
  </div>
  <div class="line">
    <div class="text-start">
      <p style="margin-top: 10px; font-size: x-large">Rooms</p>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="top: 80px; right: 405px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 225px; left: 5px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 530px; right: -420px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-start">
      <p style="
          margin-top: 10px;
          font-size: x-large;
          position: absolute;
          width: 186px;
          height: 23px;
          left: 48px;
          top: 560px;
        ">
        Facilities
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 370px; right: 405px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 675px; left: 5px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="bottom: 980px; right: -420px">
          <img src="../Images/Back2.jpg" class="card-img-top" alt="logo" />
          <div class="card-body">
            <p class="card-text">
              Two Bed with Cr and Aircon<br />
              Room 1<br />
              P500.00
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="reserve">
      <a href="room-management.html">
        <button style="width: 150px" type="submit" class="btn btn-success">
          Manage Room
        </button>
      </a>
    </div>
  </div>
</body>

</html>