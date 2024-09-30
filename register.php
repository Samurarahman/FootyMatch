

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH - Register</title>
    <link rel="stylesheet" href="resources/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/wallpaperflare.com_wallpaper.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            width: 300px;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .btn {
            background-color: #ff6347;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>
    
    <div class="form-container">
        <h1>Register</h1>
        <form action="register-process.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="login.php" style="color: #ff6347;">Login here</a></p>
    </div>

</body>
</html>
