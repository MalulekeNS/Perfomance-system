<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "nlsa"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform SQL query to check user credentials
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // User authenticated successfully, redirect to dashboard or desired page
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Invalid email or password.";
    }
}

// Close connection
$conn->close();
?>
