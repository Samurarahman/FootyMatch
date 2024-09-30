<?php
    @include('db.php');
    session_start(); // Start session to check if the user is logged in

    // Check if user is logged in
    $logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH</title>
    <link rel="stylesheet" href="resources/style.css">
    <link rel="stylesheet" href="resources/nav.css">
    <link rel="stylesheet" href="resources/footer.css">
    <link rel="stylesheet" href="resources/icon.css">
</head>
<body>
    <?php
        $query = "SELECT * FROM `match_info`";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed");
        }
    ?>
    
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

    <!-- Match Display Section -->
    <div class="flex-container">
        <div class="flex-item-1">
            <div class="card">
                <div class="card-left">
                    <h3>International Friendly Match</h3>
                    <div class="match">
                        <p class="team">
                            <img src="img/Flag_of_Bangladesh.svg.png" alt="Bangladesh"> BAN 
                        </p>
                        <p class="score">2 - 1</p>
                        <p class="team">
                            <img src="img/Flag-India.png" alt="India"> IND
                        </p>
                    </div>
                    <div class="match">
                        <p class="team">
                            <img src="img/np.jpg" alt="India"> NEP 
                        </p>
                        <p class="score">0 - 3</p>
                        <p class="team">
                            <img src="img/Flag_of_Pakistan.svg.png" alt="Pakistan"> PAK
                        </p>
                    </div>
                    <div class="match">
                        <p class="team">
                            <img src="img/Flag-Argentina.png" alt="Argentina"> Argentina 
                        </p>
                        <p class="score">2 - 2</p>
                        <p class="team">
                            <img src="img/Flag-France.png" alt="France"> France
                        </p>
                    </div>
                    <div class="match">
                        <p class="team">
                            <img src="img/Flag_of_Brazil.svg.png" alt="Brazil"> Brazil 
                        </p>
                        <p class="score">1 - 7</p>
                        <p class="team">
                            <img src="img/Flag-Germany.png" alt="Germany"> Germany
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
            <div class="card-left">
                    <h3>La Liga</h3>
                    <div class="match">
                        <p class="team">
                            <img src="img/26.png" alt="Barcelona"> Barcelona 
                        </p>
                        <p class="score">5 - 1</p>
                        <p class="team">
                            <img src="img/21.png" alt="Real Madrid"> Real Madrid
                        </p>
                    </div>
                    <div class="match">
                        <p class="team">
                            <img src="img/31.png" alt="Atletico Madrid"> Atletico Madrid 
                        </p>
                        <p class="score">0 - 2</p>
                        <p class="team">
                            <img src="img/32.png" alt="Sevilla"> Sevilla
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-left">
                    <h3>English Premier League</h3>
                    <div class="match">
                        <p class="team">
                            <img src="img/23.png" alt="Man City"> Man City 
                        </p>
                        <p class="score">3 - 1</p>
                        <p class="team">
                            <img src="img/33.png" alt="Man United"> Chelsea 
                        </p>
                    </div>
                    <div class="match">
                        <p class="team">
                            <img src="img/27.png" alt="Chelsea"> Man United
                        </p>
                        <p class="score">2 - 0</p>
                        <p class="team">
                            <img src="img/22.png" alt="Arsenal"> Arsenal
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-item-2" id="matches-container">
        <?php
        while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card">
                <div class="card-left">
                    <h3><?php echo $row['team1'] . " vs " . $row['team2']; ?></h3>
                    <p><?php echo date('jS F, g:i A', strtotime($row['date'] . ' ' . $row['time'])); ?></p>
                    <p><?php echo $row['venue']; ?></p>
                    <p><?php echo $row['type']; ?></p>
                    <p>Seats Available: <?php echo $row['seat_available']; ?></p>
                </div>
                <div class="card-right">
                    <p>Ticket Price: ৳<?php echo $row['price']; ?></p>
                    <?php if ($logged_in): ?>
                        <a href="purchase.php?match=<?php echo urlencode($row['team1'] . ' vs ' . $row['team2']); ?>&date=<?php echo urlencode(date('jS F, g:i A', strtotime($row['date'] . ' ' . $row['time']))); ?>&venue=<?php echo urlencode($row['venue']); ?>&price=<?php echo urlencode($row['price']); ?>&match_id=<?php echo urlencode($row['id']); ?>">
                            <button class="ticket-btn">Get Ticket</button>
                        </a>
                    <?php else: ?>
                        <p><a href="login.php" class="login-link">Login to Get Ticket</a></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        }
        ?>

        </div>


        <div class="flex-item-3">
            <div class="card">
                <iframe 
                    src="videos/Wolves_1-2_Liverpool.mp4" 
                    title="Match Preview Video"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <p style="font-size: 100%; color: rgba(255, 255, 255, 0.747);">
                    <img src="img/28.png" alt="Germany Flag" class="team-flag">
                    <br> 1-2<br>
                    <img src="img/20.png" alt="France Flag" class="team-flag">
                </p>
            </div>
            <div class="card">
                <iframe 
                    src="videos/_Arsenal_vs_Leicester_City.mp4" 
                    title="Match Preview Video"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <p style="font-size: 100%; color: rgb(255, 255, 255);">
                    <img src="img/22.png" alt="Germany Flag" class="team-flag">
                    <br> 4-2<br>
                    <img src="img/29.png" alt="France Flag" class="team-flag">
                </p>
            </div>
            <div class="card">
                <iframe 
                    src="videos/Messi_Crazy_Goal_.mp4" 
                    title="Match Preview Video"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <p style="font-size: 80%; color: rgb(255, 255, 255);">
                    Messi <br> Score <br> Against <br>
                    <img src="img/30.png" class="team-flag">
                </p>
            </div>
        </div>

    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 FOOTYMATCH. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
