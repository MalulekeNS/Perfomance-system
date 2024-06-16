<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "nlsa";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch all users from the database
function getAllUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

// Function to add a new user to the database
function addUser($email, $password) {
    global $conn;
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to reset password for a user
function resetPassword($userId, $newPassword) {
    global $conn;
    $sql = "UPDATE users SET password = '$newPassword' WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Close connection
$conn->close();
?>
