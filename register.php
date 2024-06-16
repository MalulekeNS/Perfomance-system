<?php
// Check if the form is submitted
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fname'];
    $email = $_POST['email'];
    $telNumber = $_POST['telnumber'];
    $mobileNumber = $_POST['fnumber'];
    $employeeNumber = $_POST['idNumber'];
    $password = $_POST['psd'];

    // You can perform validation, sanitization, and other checks here

    // Connect to your database (replace these with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nlsa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database (example)
    $sql = "INSERT INTO users (full_name, email, tel_number, mobile_number, employee_number, password)
            VALUES ('$fullName', '$email', '$telNumber', '$mobileNumber', '$employeeNumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
