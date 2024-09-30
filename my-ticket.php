<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Database connection details
$servername = "localhost"; // Typically "localhost"
$username = "root"; // Default username for XAMPP
$password = ""; // Default password is empty
$dbname = "footymatch"; // Your database name

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user tickets
$userTickets = [];
$sql = "SELECT match_id FROM user_ticket WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $userTickets[] = $row['match_id'];
}

// Fetch match details for each match ID
$matchDetails = [];
foreach ($userTickets as $match_id) {
    $sql = "SELECT * FROM match_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $match_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $matchDetails[] = $row; // Store match details
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="stylesheet" href="resources/style.css">
    <link rel="stylesheet" href="resources/nav.css">
    <style>
        

        .main-content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #004aad;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #004aad;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        
    </style>
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

    <div class="main-content">
        <h1>My Tickets</h1>

        <?php if (empty($matchDetails)): ?>
            <p>No tickets found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Match</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matchDetails as $match): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($match['team1']) . ' vs ' . htmlspecialchars($match['team2']); ?></td>
                            <td><?php echo htmlspecialchars($match['venue']); ?></td>
                            <td><?php echo htmlspecialchars($match['date']); ?></td>
                            <td><?php echo htmlspecialchars($match['time']); ?></td>
                            <td><?php echo htmlspecialchars($match['price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>&copy; 2024 FOOTYMATCH. All Rights Reserved.</p>
    </div>
</body>
</html>
