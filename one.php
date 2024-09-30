<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTYMATCH - Welcome</title>
    <link rel="stylesheet" href="resources/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/wallpaperflare.com_wallpaper.jpg'); /* Add your background image */
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
        }

        .landing-container {
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background for contrast */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .auth-buttons {
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between buttons */
        }

        .btn {
            background-color: #ff6347; /* Button color */
            color: #fff; /* Text color */
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        }

        .btn:hover {
            background-color: #ff4500; /* Darker shade on hover */
            transform: scale(1.05); /* Slight grow effect on hover */
        }
    </style>
</head>
<body>
    
    <div class="landing-container">
        <h1>Welcome to FOOTYMATCH</h1>
        <p>Your one-stop destination for all your football match needs!</p>
        <div class="auth-buttons">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
        </div>
    </div>

</body>
</html>
