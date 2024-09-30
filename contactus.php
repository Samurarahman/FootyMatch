<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FOOTYMATCH</title>
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="resources/nav.css">

</head>
<body>

<div class="navbar">
        <div class="img">
            <img src="resources/img/1.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="Scheduled.php">Scheduled</a></li>
            <li><a href="my-ticket.php">My Ticket</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
        
        <div class="user-icon">
            <img src="img/icon1.png" alt="User Icon">
            <div class="dropdown">
                <?php if ($logged_in): ?>
                    <!-- Show logout option if logged in -->
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <!-- Show login and register options if not logged in -->
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="contact-container">
            <h1>Contact Us</h1>
            <form action="#" method="POST" class="contact-form">
                <input type="text" name="fullname" placeholder="Enter Your Name" required>
                <input type="email" name="email" placeholder="Enter Your Email" required>
                <input type="text" name="subject" placeholder="Enter Subject" required>
                <textarea name="message" cols="30" rows="10" placeholder="Type Your Message" required></textarea>
                <div class="button">
                    <button class="btn-55" type="submit"><span>Submit</span></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 FOOTYMATCH. All Rights Reserved.</p>
    </div>

</body>
</html>
