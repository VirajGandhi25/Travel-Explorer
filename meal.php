<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Preferences</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
}

.budget-level {
    margin-bottom: 20px;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 10px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.budget-labels {
    display: flex;
    justify-content: space-between;
    margin-top: 5px;
}

.meals-to-include {
    border-top: 2px solid #000;
    padding-top: 20px;
}

.meal-option {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.meal-option label {
    margin-left: 10px;
}

.meal-price {
    margin-left: auto;
    font-weight: bold;
}

    </style>
</head>
<body>
    <h1>Meals Preferences</h1>
    <p>
        Select the meals you would like to include in your trip, your budget for it and the type of food you prefer.<br><br>
        
        Budget level<br><br>
        Depending on the budget level, we will select least or more expensive restaurants.</p>
           
        <form id="mealPreferencesForm">
    <div class="budget-level">
        <!-- <p>Budget level</p> -->
        <input type="range" min="1" max="3" value="2" class="slider" id="budgetLevel">
        <div class="budget-labels">
            <span>Cheap</span>
            <span>Mid</span>
            <span>High</span>
        </div>
    </div>

    <div class="meals-to-include">
        <p>Meals to include</p>
        <p>Prices are an estimate of each meal for 
            <?php
            // PHP code to fetch data from the database
            $servername = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $dbname = "users"; // Replace with your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch data from preferences table
            $sql = "SELECT number_of_days, travel_buddy FROM travel_preferences";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["number_of_days"] . " days with " . $row["travel_buddy"];
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </p>

        <div class="meal-option">
            <input type="checkbox" id="breakfast" value="64" disabled>
            <label for="breakfast">Breakfast</label>
            <span class="meal-price" id="breakfastPrice">$64</span>
        </div>
        <div class="meal-option">
            <input type="checkbox" id="lunch" value="100" disabled>
            <label for="lunch">Lunch</label>
            <span class="meal-price" id="lunchPrice">$100</span>
        </div>
        <div class="meal-option">
            <input type="checkbox" id="dinner" value="88" disabled>
            <label for="dinner">Dinner</label>
            <span class="meal-price" id="dinnerPrice">$88</span>
        </div>
    </div>
    <div class="stay-selection">
        <button id="selectLodgingBtn">Set your lodging </button>
    </div>
    </form>
     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Your meal.js script -->
    <script src="meal.js"></script>
<!-- <script src="meal.js"> -->
    </script>
</body>
</html>
