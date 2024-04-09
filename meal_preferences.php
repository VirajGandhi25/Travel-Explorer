<?php
// Create connection to MySQL database
$conn = new mysqli("localhost", "root", "", "users");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve budget level and meal preferences from POST data
$budgetLevel = $_POST['budgetLevel'];
$meals = $_POST['meals'];

// Prepare and bind SQL statement to insert meal preferences into the database
$stmt = $conn->prepare("INSERT INTO meals (budget_level, meal, price) VALUES (?, ?, ?)");

// Insert each meal preference into the database
foreach ($meals as $meal) {
    $mealName = $meal['name'];
    $price = $meal['price'];
    // Bind parameters and execute statement
    $stmt->bind_param("isd", $budgetLevel, $mealName, $price);
    $stmt->execute();
}

// Close statement and connection
$stmt->close();
$conn->close();

// Send response
echo "Meal preferences saved successfully.";
?>
