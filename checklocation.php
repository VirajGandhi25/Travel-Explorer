<?php
// Assuming you're using MySQL as the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve locations
$sql = "SELECT location FROM locations";
$result = $conn->query($sql);

// Fetch locations and store them in an array
$locations = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $locations[] = $row["location"];
    }
}

// Convert locations array to JSON and output
echo json_encode($locations);

// Close connection
$conn->close();
?>
