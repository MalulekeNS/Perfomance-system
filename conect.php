<?php
// Database connection details
$servername = "localhost";
$username = "admin";
$password = "";
$database = "nlsa";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch data from the database
function fetchData() {
    global $conn;
    $result = $conn->query("SELECT * FROM employee");
    
    // Check if there is data in the table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row['name'] . " - Email: " . $row['email'] . "</p>";
        }
    } else {
        echo "No data found";
    }
}

// Function to insert data into the database
function insertData($name, $email) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO employee (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Sample data
    $name = "John Doe";
    $email = "john@example.com";

    if ($stmt->execute() === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<!-- ... (head and other HTML content) ... -->

<body>

<!-- ... (header, sections, etc.) ... -->

<main id="main">

    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-6">
                    <h2>VISION</h2>
                    <h3>A world-class African national library and information hub.</h3>
                    <?php fetchData(); // Display data from the database ?>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        <h2>MISSION</h2>
                        <h3>We build, record, preserve, conserve and make available a complete South African documentary
                            heritage fostering a reading nation towards an informed citizenry.</h3>
                    </p>
                    <?php insertData("John Doe", "john@example.com"); // Insert sample data into the database ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ... (unchanged content) ... -->

</main>

<!-- ... (footer and other HTML content) ... -->

</body>

</html>
