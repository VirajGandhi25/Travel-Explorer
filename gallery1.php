<?php
// Establish connection to the first database
$dbHost = 'localhost';
$dbUsername = "root"; 
$dbPassword = '';
$dbName = 'users';

$connection1 = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$connection1) {
    die("Connection to first database failed: " . mysqli_connect_error());
}

// Execute query to fetch data from the first database
$query1 = "SELECT * FROM credentials";
$result1 = mysqli_query($connection1, $query1);

// Execute query to fetch data from the second database
$query2 = "SELECT * FROM location";
$result2 = mysqli_query($connection1, $query2);

$query3 = "SELECT * FROM locations_visit";
$result3 = mysqli_query($connection1, $query3);

// Execute query to fetch data from the second database
$query4 = "SELECT * FROM travel_preferences";
$result4 = mysqli_query($connection1, $query4);

// Execute query to fetch data from the second database
$query5 = "SELECT * FROM accomodations";
$result5 = mysqli_query($connection1, $query5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link rel="stylesheet" href="style_gallery.css">
</head>
<body>

    <div class="card-container">
        <!-- Display data from the first database -->
        <?php while ($row1 = mysqli_fetch_assoc($result1)): ?>
            <div class="card">
                <h2>Username: <?php echo $row1['username'] ?></h2>

                <br><br>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="card-container">
        <!-- Display data from the second database -->
        <?php while ($row2 = mysqli_fetch_assoc($result2)): ?>
            <div class="card">
                <h2>Location:<br> <?php echo $row2['location'] ?></h2>
                <!-- Display other fields as needed -->
                <br><br>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="card-container">
    <!-- Display data from the second database -->
    <?php 
    // Initialize an array to store locations grouped by category
    $groupedLocations = array();

    // Loop through the result set and group locations by category
    while ($row2 = mysqli_fetch_assoc($result3)) {
        $category = $row2['category'];
        $name = $row2['name'];
        // Store the location in the corresponding category array
        $groupedLocations[$category][] = $name;
    }

    // Loop through the grouped locations
    foreach ($groupedLocations as $category => $locations) {
    ?>
        <div class="card">
            <h1>Category: <?php echo $category ?></h1><br>
            <!-- Loop through locations of the current category and display them -->
            <?php foreach ($locations as $location): ?>
                <?php echo $location ?>
                <!-- Display other fields as needed -->
                <br><br>
            <?php endforeach; ?>
        </div>
    <?php
    }
    ?>
</div>


    <div class="card-container">
        <!-- Display data from the second database -->
        <?php while ($row2 = mysqli_fetch_assoc($result4)): ?>
            <div class="card">
                <p><h2>Start date</h2> <?php echo $row2['start_date'] ?></p><br>
                <p><h2>End date</h2><?php echo $row2['end_date'] ?></p><br>
                <p><h2>Travel Companion </h2><?php echo $row2['travel_buddy'] ?></p><br>
                <p><h2>Number of days</h2> <?php echo $row2['number_of_days'] ?></p><br>
                <p><h2>Transport mode</h2> <?php echo $row2['transportMode'] ?></p><br>
                <!-- Display other fields as needed -->
                <br><br>
            </div>
        <?php endwhile; ?>
    </div>


    <div class="card-container">
    <div class="card">
        <h2>Accommodations</h2>
        <!-- Display other fields as needed -->
        <br><br>
        <!-- Display data from the second database -->
        <?php while ($row2 = mysqli_fetch_assoc($result5)): ?>
            <?php echo $row2['name']; ?>
            <br><br>
        <?php endwhile; ?>
    </div>
</div>


</body>
</html>

<?php
// Close connections to both databases
mysqli_close($connection1);

?>
