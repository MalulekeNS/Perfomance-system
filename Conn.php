<?php
// Database connection settings
$host = "localhost"; // Change this if your database server is running on a different host
$username = "root"; // Default username for XAMPP MySQL
$password = ""; // Default password for XAMPP MySQL is empty
$database = "nlsa"; // Change this to your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Close connection
$conn->close();
?>
