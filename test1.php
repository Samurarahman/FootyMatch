<?php
    @include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <?php
        $query = "SELECT * FROM `match_info`";

        $result = mysqli_query($connection, $query);
        if(!$result)
        {
            echo die("Query Failed");
        }
        else
        {
            print_r($result);
        }

    ?>
    <h2>Match Information</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Time</th>
                <th>Type</th>
                <th>Seats Available</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the results and display them in table rows
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['team1'] . "</td>";
                echo "<td>" . $row['team2'] . "</td>";
                echo "<td>" . $row['venue'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['seat-available'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
        
    


    <h2>Enter Match Information</h2>
    <!-- <form action="db.php" method="POST">
        <label for="team1">Team 1:</label>
        <input type="text" id="team1" name="team1" required><br><br>

        <label for="team2">Team 2:</label>
        <input type="text" id="team2" name="team2" required><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br><br>

        <label for="stadium">Stadium:</label>
        <input type="text" id="stadium" name="stadium" required><br><br>

        <label for="match-type">Match Type:</label>
        <input type="text" id="match-type" name="match_type" required><br><br>

        <label for="seat">Seat:</label>
        <input type="number" id="seat" name="seat" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <input type="submit" value="Submit">
    </form> -->
</body>
</html>
