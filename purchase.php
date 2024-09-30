<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header('Location: login.php'); // Change this to your actual login page
    exit();
}

// Retrieve match information from URL
$match = isset($_GET['match']) ? $_GET['match'] : '';
$venue = isset($_GET['venue']) ? $_GET['venue'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$time = isset($_GET['time']) ? $_GET['time'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$match_id = isset($_GET['match_id']) ? $_GET['match_id'] : ''; // Add this line to get the match ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH</title>
    <link rel="stylesheet" href="purchase.css">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="img">
            <img src="img/1.png">
        </div>
        <ul>
            <li><a href="index.html" style="font-size: 20px;">Home</a></li>
            <li><a href="Scheduled.html" style="font-size: 20px;">Scheduled</a></li>
            <li><a href="myticket.html" style="font-size: 20px;">My Ticket</a></li>
            <li><a href="aboutus.html" style="font-size: 20px;">About Us</a></li>
            <li><a href="contactus.html" style="font-size: 20px;">Contact Us</a></li>
            <li><a href="adminpage.html" style="font-size: 20px;">Admin Panel</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <div class="card">
            <!-- Left side (Image) -->
            <div class="left-side">
                <img src="img/6.jpg" alt="Stadium Image">
            </div>

            <!-- Right side (Form) -->
            <div class="right-side">
                <!-- Form directly submits to purchase_ticket.php -->
                <form action="purchase_ticket.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>

                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

                    <label for="stand">Stand:</label>
                    <select id="stand" name="stand" required>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A5">A5</option>
                        <option value="A13">A13</option>
                        <option value="A27">A27</option>
                        <option value="A26">A26</option>
                        <option value="A28">A28</option>
                        <option value="B2">B2</option>
                        <option value="B3">B3</option>
                        <option value="B4">B4</option>
                        <option value="B8">B8</option>
                        <option value="B15">B15</option>
                        <option value="B17">B17</option>
                        <option value="B21">B21</option>
                        <option value="B27">B27</option>
                        <option value="B28">B28</option>
                        <option value="B32">B32</option>
                    </select>

                    <label for="seat">Seat Number:</label>
                    <input type="number" id="seat" name="seat" placeholder="Enter your seat number" required>

                    <!-- Hidden fields for match info -->
                    <input type="hidden" name="match_id" value="<?php echo htmlspecialchars($match_id); ?>">
                    <input type="hidden" name="match" value="<?php echo htmlspecialchars($match); ?>">
                    <input type="hidden" name="venue" value="<?php echo htmlspecialchars($venue); ?>">
                    <input type="hidden" name="date" value="<?php echo htmlspecialchars($date); ?>">
                    <input type="hidden" name="time" value="<?php echo htmlspecialchars($time); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">

                    <input type="submit" value="Purchase Ticket">
                </form>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2024 FOOTYMATCH. All Rights Reserved.</p>
    </div>
    
</body>
</html>
