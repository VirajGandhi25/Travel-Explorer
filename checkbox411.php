<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "users");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve selected locations from AJAX request
$selectedLocations = $_POST['locations'];

// Prepare and bind SQL statement to check for existing locations
$stmtCheck = $conn->prepare("SELECT COUNT(*) as count FROM locations_visit WHERE name = ?");
$stmtCheck->bind_param("s", $name);

// Prepare and bind SQL statement to insert locations
$stmtInsert = $conn->prepare("INSERT INTO locations_visit (category, name) VALUES (?, ?)");

// Array to store duplicate locations
$duplicates = [];

// Check for duplicates and insert each selected location into the database
foreach ($selectedLocations as $location) {
    $category = $location['category'];
    $name = $location['name'];
    

    // Check if the location already exists in the database
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    $row = $result->fetch_assoc();
    if ($row['count'] > 0) {
        // If duplicate, add to duplicates array
        $duplicates[] = $name;
    } else {
        // If not duplicate, insert into the database
        $stmtInsert->bind_param("ss", $category, $name);
        $stmtInsert->execute();
    }
}

// Close statements
$stmtCheck->close();
$stmtInsert->close();
$conn->close();

// Send response
if (!empty($duplicates)) {
    // If duplicates found, send alert message
    echo "Duplicates found: " . implode(', ', $duplicates) ;
    echo " All data added successfully";
} else {
    // If no duplicates found, send success message
    echo "Selected locations saved successfully.";
}

?>
