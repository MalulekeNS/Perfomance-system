<?php
// Database connection details
$servername = "localhost";
$username = "coordinator";
$password = "";
$database = "nlsa";

// Create connection
$conn = mysql_Connect($servername, $username, $password, $database)

// Check connection
if ($conn) {
    
    echo "<h1>We are connected to database</h1>";
}


     else {
        echo "<h1>No data found</h1>";
    }
    ?>