<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="homepage.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../Images/Favicon2.png" />
    <title>First Page</title>
</head>

<body>
    <div class="banner">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center">
                    <img src="../Images/logo.png" class="logo" />
                    <ul>
                        <li><a href="#room">Room</a></li>
                        <li><a href="#About">About Us</a></li>
                        <li><a href="#gallery">Our Gallery</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li>
                            <a href="../login.php">
                                <button type="submit" class="btn btn-light">Log In</button>
                            </a>
                        </li>
                        <li>
                            <a href="../signup.php">
                                <button type="submit" class="btn btn-light">Sign Up</button>
                            </a>
                        </li>
                    </ul>
                </a>
            </div>
        </nav>
        <div class="welcome">
            <p>Your Home Away From Home</p>
        </div>
        <div class="button">
            <a href="../signup.php">
                <button type="submit" class="btn btn-outline-light">Book Now</button>
            </a>
        </div>
    </div>

    <section class="section__container popular__container" id="room">
        <div class="text-center">
            <h2>Rooms</h2>
        </div>
        <div class="popular__grid">
            <?php
            require_once '../config.php';

            // Fetch data from the rooms table
            $query = $conn->query("SELECT * FROM `rooms` ORDER BY `price` ASC") or die(mysqli_error($conn));

            // Loop through each fetched row
            while ($fetch = $query->fetch_assoc()) {
                // Output the fetched data
            ?>
                <div class="popular__card">
                    <img src="../Images/<?php echo $fetch['photo'] ?>" alt="popular hotel" />
                    <div class="popular__content">
                        <div class="popular__card__header">
                            <h4 id="room_type"><?php echo $fetch['room_type'] ?></h4>
                            <h4 id="price"> P<?php echo $fetch['price'] ?></h4>
                        </div>
                        <p id="room_num"><?php echo $fetch['room_num'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <section class="about" id="About">
        <div class="section__container about__container">
            <div class="text-center">
                <h2>About Us</h2>
            </div>
            <div class="about__grid">
                <div class="about__card">
                    <img src="../Images/About1.jpg" alt="picture" />
                    <p>
                        Malaybalay Air Bnb Traveller’s Inn is one of the best hotels and
                        event venues in Malaybalay City. It is located at D’JM Arcade
                        Purok 5 Casisang, Malaybalay, Philippines, 8700 Bukidnon.
                    </p>
                </div>
                <div class="about__card">
                    <img src="../Images/table1.jpg" alt="client" />
                    <p>
                        It caters accommodation like room reservations, Events like
                        wedding receptions, birthdays, and meetings, and Caterings.
                    </p>
                </div>
                <div class="about__card">
                    <img src="../Images/background.jpg" alt="client" />
                    <p>
                        Mission is to provide a comfortable home away form home for
                        travelers and adventurers exploring the beauty of Malaybalay City,
                        Bukidnon. We are committed to offering genuine Filipino
                        hospitality, ensuring our guest feel welcome and at ease
                        throughout their stay. With thoughtfully curated amenities and
                        exceptional services, we aim to create a worry-free and enjoyable
                        experience, allowing our guest to immerse themselves in the local
                        charm and hospitality.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container" id="gallery">
        <div class="text-center">
            <h2>Our Gallery</h2>
        </div>
        <div class="about__card">
            <div class="image-grid">
                <img src="../Images/Back2.jpg" alt="photo" />
                <img src="../Images/Bed1.jpg" alt="photo" />
                <img src="../Images/Bed3.jpg" alt="photo" />
                <img src="../Images/Bed4.jpg" alt="photo" />
                <img src="../Images/background.jpg" alt="photo" />
                <img src="../Images/About1.jpg" alt="photo" />
                <img src="../Images/Garage.jpg" alt="photo" />
                <img src="../Images/lobby1.jpg" alt="photo" />
                <img src="../Images/table1.jpg" alt="photo" />
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="section__container footer__container">
            <div class="footer__col">
                <h3>Malaybalay Air BnB Travellers Inn</h3>
                <p>
                    With a user-friendly interface and a vast selection of hotels,
                    Malaybalay Air BnB Travellers Inn aims to provide a stress-free
                    experience for travelers seeking the perfect stay.
                </p>
                <p>
                    You can contact us in our Social Media , Phone Number +639631308925
                </p>
            </div>
            <div class="footer__col">
                <h4>Hotel</h4>
                <p>About Us</p>
                <p>Contact Us</p>
            </div>
            <div class="footer__col">
                <h4>Legal</h4>
                <p>FAQs</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
            </div>
            <div class="footer__col">
                <h4>Resources</h4>
                <p>Social Media</p>
                <p>Help Center</p>
                <p>Partnerships</p>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024 Ubald Jones L. Tuquib. All rights reserved.
        </div>
    </footer>
</body>

</html>