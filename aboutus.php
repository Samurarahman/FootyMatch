<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH</title>
    <link rel="stylesheet" href="aboutus.css">
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
        <header>
            <h1>About Us</h1>
        </header>
    
        <div class="container">
            <!-- Company Overview -->
            <section class="section">
                <h2>Who We Are</h2>
                <p>FOOTYMATCH is your go-to platform for everything related to live football score, match schedules, and ticket purchasing. 
                   Founded in 2024, we aim to provide the most up-to-date information on upcoming football matches and ensure fans never miss a game.</p>
            </section>
    
            <!-- Mission and Vision -->
            <section class="section">
                <h2>Our Mission</h2>
                <p>We are committed to bringing football fans closer to the action by providing a seamless experience for purchasing tickets and tracking upcoming events. 
                   Our mission is to make football accessible and enjoyable for fans around the world.</p>
            </section>
    
            <section class="section">
                <h2>Our Vision</h2>
                <p>Our vision is to become the leading football event platform globally, offering unmatched service in match information, ticketing, and fan engagement. 
                   We believe in a future where football unites communities and brings joy to millions of fans.</p>
            </section>
    
            <!-- Team Members -->
            <section class="section">
                <h2>Meet Our Team</h2>
                <div class="team">
                    <!-- Team Member 1 -->
                    <div class="team-member">
                        <img src="img/4.jpg" alt="Team Member 1">
                        <h3>Md.Mohallil Islam Ohin</h3>
                        <p>Designer</p>
                    </div>
                    <!-- Team Member 2 -->
                    <div class="team-member">
                        <img src="img/2.jpg" >
                        <h3>Samura Rahman</h3>
                        <p>Project Menager</p>
                    </div>
                    <!-- Team Member 3 -->
                    <div class="team-member">
                        <img src="img/3.jpg" alt="Team Member 3">
                        <h3>Suraiya Islam Lia</h3>
                        <p>Developer</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 FOOTYMATCH. All Rights Reserved.</p>
    </div>

</body>
</html>