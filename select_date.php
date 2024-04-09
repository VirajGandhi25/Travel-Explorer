<?php
// Enable error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Establish connection to the database
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form data is submitted
// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $start_date = $_POST['startDate'];
    $end_date = $_POST['endDate'];
    $travel_buddy = $_POST['travelBuddy'];
    $number_of_days = $_POST['numberOfDays'];
    $transportMode = $_POST['transportMode'];

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO travel_preferences (start_date, end_date, travel_buddy, number_of_days, transportMode)
            VALUES ('$start_date', '$end_date', '$travel_buddy', '$number_of_days','$transportMode')";

    // Log the SQL query
echo "SQL Query: " . $sql;

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "success"; // Send success response to JavaScript
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Send detailed error response to JavaScript
    }
}
 else {
    echo "No data received"; // Send response if no data is received
}


// Close the database connection
mysqli_close($conn);
?>
