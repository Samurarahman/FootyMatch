<?php
@include('db.php');
session_start(); 

// Check if user is logged in
$logged_in = isset($_SESSION['user_id']);

// Database connection details
$servername = "localhost"; // Update with your server name
$username = "your_username"; // Update with your database username
$password = "your_password"; // Update with your database password
$dbname = "footymatch"; // Update with your database name

// Get the form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$stand = $_POST['stand'] ?? '';
$seat = $_POST['seat'] ?? '';

// Get the match information from hidden fields
$match = $_POST['match'] ?? '';
$venue = $_POST['venue'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$price = $_POST['price'] ?? '';

// Get current date and time for ticket issuance
$issueDate = date('jS F Y, g:i A');

$user_id = $_SESSION['user_id'];
$match_id = isset($_POST['match_id']) ? $_POST['match_id'] : '';


// Prepare and bind the SQL statement to prevent SQL injection
$stmt = $connection->prepare("INSERT INTO user_ticket (user_id, match_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $match_id); // Assuming both are integers

// Execute the statement
if ($stmt->execute()) {
    // Ticket purchase was successful, you can include any additional logic here
} else {
    echo "Error: " . $stmt->error;
}

// Prepare ticket details for display
$ticketDetails = [
    'Name' => $name,
    'Email' => $email,
    'Phone' => $phone,
    'Match' => $match,
    'Stand' => $stand,
    'Seat' => $seat,
    'Issued On' => $issueDate
];

// Close the statement and connection
$stmt->close();
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ticket</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            text-align: center;
        }
        .ticket-container {
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .ticket-header {
            background-color: #004aad;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .ticket-header h2 {
            margin: 0;
        }
        .ticket-body {
            padding: 20px;
        }
        .ticket-details p {
            font-size: 18px;
            margin: 8px 0;
        }
        .ticket-footer {
            margin-top: 20px;
        }
        .download-btn, .back-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #004aad;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .download-btn:hover, .back-btn:hover {
            background-color: #003088;
        }
        .qr-code {
            margin-top: 20px;
        }
        .qr-code img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="ticket-container" id="ticket">
        <div class="ticket-header">
            <h2>Match Ticket</h2>
        </div>
        <div class="ticket-body">
            <div class="ticket-details">
                <?php foreach ($ticketDetails as $key => $value): ?>
                    <p><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></p>
                <?php endforeach; ?>
            </div>
            <div class="qr-code">
                <p>Scan this QR Code for entry</p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($name . ' - ' . $match); ?>&size=100x100" alt="QR Code">
            </div>
        </div>
        <div class="ticket-footer">
            <a href="javascript:window.print()" class="download-btn">Download Ticket</a>
            <a href="index.php" class="back-btn">Go Back to Home</a>
        </div>
    </div>
</body>
</html>
