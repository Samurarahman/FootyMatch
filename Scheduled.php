<?php
    // Include the database connection file
    include('db.php');

    // Query to get all match information
    $query = "SELECT * FROM `match_info`";
    $result = mysqli_query($connection, $query);

    // Check if query succeeded
    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH</title>
    <link rel="stylesheet" href="Scheduled.css">
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

    <header>
        <h1>Football Match Schedule</h1>
    </header>

    <!-- Schedule Table -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teams</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display each row from the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    // Format the date and time
                    $date = date('F j, Y', strtotime($row['date']));
                    $time = date('g:i A', strtotime($row['time']));
                    ?>
                    <tr>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $time; ?></td>
                        <td class="team">
                            <!-- You can customize the flag images based on team names -->
                            <img src="img/<?php echo strtolower($row['team1']); ?>.png" alt="<?php echo $row['team1']; ?> Flag" class="team-flag">
                            <?php echo $row['team1']; ?>
                            <pre> </pre>
                            <span>vs</span>
                            <pre> </pre>
                            <img src="img/<?php echo strtolower($row['team2']); ?>.png" alt="<?php echo $row['team2']; ?> Flag" class="team-flag">
                            <?php echo $row['team2']; ?>
                        </td>
                        <td class="location"><?php echo $row['venue']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 FOOTYMATCH. All Rights Reserved.</p>
    </div>

</body>
</html>
