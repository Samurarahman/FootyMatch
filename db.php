<?php

    define("Hostname", "localhost");
    define("Username", "root");
    define("Password", "");
    define("Database", "footymatch");

    $connection = mysqli_connect(Hostname, Username, Password, Database);
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "";
    }

?>
