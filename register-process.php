<?php
@include('db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    // Check if passwords match
    if ($password === $confirm_password) {
        // Hash the password for security
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $query = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        
        if (mysqli_query($connection, $query)) {
            // Redirect to one.php with success message
            header("Location: one.php?message=Registration Successful");
            exit(); // Stop further script execution
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        echo "Passwords do not match!";
    }
}

// Close the database connection
mysqli_close($connection);
?>
