document.addEventListener("DOMContentLoaded", function() {
    var slider = document.getElementById("budgetLevel");
    var breakfastCheckbox = document.getElementById("breakfast");
    var lunchCheckbox = document.getElementById("lunch");
    var dinnerCheckbox = document.getElementById("dinner");
    var breakfastPrice = document.getElementById("breakfastPrice");
    var lunchPrice = document.getElementById("lunchPrice");
    var dinnerPrice = document.getElementById("dinnerPrice");

    function updatePricesAndCheckboxes() {
        var budgetLevel = slider.value;
        var cheapPrices = { breakfast: 10, lunch: 20, dinner: 30 };
        var midPrices = { breakfast: 30, lunch: 60, dinner: 50 };
        var highPrices = { breakfast: 40, lunch: 80, dinner: 70 };

        if (budgetLevel == 1) {
            enableCheckboxes();
            updatePrices(cheapPrices);
        } else if (budgetLevel == 2) {
            enableCheckboxes();
            updatePrices(midPrices);
        } else {
            enableCheckboxes();
            updatePrices(highPrices);
        }
    }

    function updatePrices(prices) {
        breakfastPrice.textContent = "$" + prices.breakfast * 6;
        lunchPrice.textContent = "$" + prices.lunch * 5;
        dinnerPrice.textContent = "$" + prices.dinner * 8;
    }

    function enableCheckboxes() {
        breakfastCheckbox.disabled = false;
        lunchCheckbox.disabled = false;
        dinnerCheckbox.disabled = false;
    }

    slider.addEventListener("input", updatePricesAndCheckboxes);
    updatePricesAndCheckboxes(); // Initialize prices and checkboxes on page load

       // Function to handle button click event to go to the next page
    function goToStayPage() {
        // Redirect to stay.html
       window.location.href = 'stay1.html';
    }

    // Get the button element
    const selectLodgingBtn = document.getElementById('selectLodgingBtn');

    // Add event listener to the button
    selectLodgingBtn.addEventListener('click', goToStayPage);
    

    $(document).ready(function() {
        $('#mealPreferencesForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission
    
            // Collect form data
            const budgetLevel = $('#budgetLevel').val(); // Get the value of the budget level slider
            const meals = []; // Array to store selected meals
            $('.meal-option input[type="checkbox"]:checked').each(function() {
                const mealName = $(this).attr('id'); // Get the meal name from the checkbox id
                const price = parseFloat($(this).siblings('.meal-price').text().replace('$', '')); // Get and parse the price from the adjacent span element
                const mealData = { name: mealName, price: price }; // Create an object with meal name and price
                meals.push(mealData); // Push the object into the meals array
            });
    
            // Prepare data to be sent in the AJAX request
            const formData = {
                budgetLevel: budgetLevel,
                meals: meals
            };
    
            // Send form data to PHP script
            $.ajax({
                type: 'POST',
                url: 'meal_preferences.php', // Path to your PHP script
                data: formData,
                success: function(response) {
                    alert(response); // Display response from server
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log error message
                    alert('Failed to save meal preferences. Please try again.');
                }
            });
        });
    });
    
    

});