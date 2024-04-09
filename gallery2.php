<?php

$dbHost = 'localhost';
$dbUsername = "root"; 
$dbPassword = '';
$dbName = 'users';

$connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch trip details from the database
$query = "SELECT * FROM travel_preferences";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

// Fetch all locations from the database
$queryLocations = "SELECT * FROM locations_visit WHERE category != 'restaurant'";
$resultLocations = mysqli_query($connection, $queryLocations);
$locations = mysqli_fetch_all($resultLocations, MYSQLI_ASSOC);

// Fetch restaurants from the database
$queryRestaurants = "SELECT * FROM locations_visit WHERE category = 'restaurant'";
$resultRestaurants = mysqli_query($connection, $queryRestaurants);
$restaurants = mysqli_fetch_all($resultRestaurants, MYSQLI_ASSOC);

// Fetch accommodations from the database
$queryAccommodations = "SELECT * FROM accomodations";
$resultAccommodations = mysqli_query($connection, $queryAccommodations);
$accommodations = mysqli_fetch_all($resultAccommodations, MYSQLI_ASSOC);

// Calculate the duration of the trip in days
$startDate = $row['start_date'];
$endDate = $row['end_date'];
$tripDuration = ceil((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24));

// Initialize an array to store per day itinerary
$perDayItinerary = array();

// Distribute locations among the days
$locationsPerDay = floor(count($locations) / $tripDuration);
$remainingLocations = count($locations) % $tripDuration;

// Loop through each day of the trip
for ($day = 1; $day <= $tripDuration; $day++) {
    // Assign locations to the current day
    $perDayLocations = array_slice($locations, ($day - 1) * $locationsPerDay, $locationsPerDay);

    // If there are remaining locations, distribute them evenly among the days
    if ($remainingLocations > 0) {
        $perDayLocations[] = array_pop($locations);
        $remainingLocations--;
    }

    // Select two random restaurants for lunch and dinner
    $perDayRestaurants = array_rand($restaurants, 2);

    // Store per day itinerary in the main array
    $perDayItinerary[$day] = array(
        'locations' => $perDayLocations,
        'restaurants' => array($restaurants[$perDayRestaurants[0]], $restaurants[$perDayRestaurants[1]]),
        'accommodations' => array($accommodations[array_rand($accommodations)])
    );
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Per Day Itinerary</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Per Day Itinerary</h1>
    <?php foreach ($perDayItinerary as $day => $itinerary): ?>
    <div class="day">
        <h2>Day <?php echo $day; ?></h2>
        <h3>Locations:</h3>
        <ul>
            <?php foreach ($itinerary['locations'] as $location): ?>
            <li><?php echo $location['name'] . ' - ' . $location['category']; ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>Restaurants (Lunch and Dinner):</h3>
        <ul>
            <?php foreach ($itinerary['restaurants'] as $restaurant): ?>
            <li><?php echo $restaurant['name']; ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>Accommodations:</h3>
        <ul>
            <?php foreach ($itinerary['accommodations'] as $accommodation): ?>
            <li><?php echo $accommodation['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endforeach; ?>
</body>
</html>
