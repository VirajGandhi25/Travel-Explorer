<?php
// Establish connection to the database
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the location data is received
if (isset($_POST['location'])) {
    // Retrieve the location data
    $location = $_POST['location'];

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO location (location) VALUES ('$location')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Location saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
