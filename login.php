<?php
session_start(); // Start a session
@include('db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];

    // Query to get the user by email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        
        // Check if the user exists and verify the password
        if ($user && $user['password']=$password) {
            // Start a session and save user info
            $_SESSION['user_id'] = $user['id']; // Save user ID in session
            $_SESSION['fullname'] = $user['fullname']; // Save fullname in session
            
            // Redirect to index.php or one.php
            header("Location: index.php");
            exit(); // Stop further script execution
        } else {
            echo $password;
            echo $email;
            echo $user['password'];
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Query failed: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH - Login</title>
    <link rel="stylesheet" href="resources/style.css">
    
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Enter Your Email" required>
            <input type="password" name="password" placeholder="Enter Your Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
