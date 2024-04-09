<?php
$conn = mysqli_connect("localhost", "root", "", "users");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO credentials (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        // New username and password created successfully, display alert message
        echo "<script>alert('New username and password created successfully');</script>";
        // Redirect to the login page
        header("refresh:0; url=login.html");
    } else {
        // Failed to create new username and password, display alert message
        echo "<script>alert('Error: Unable to create new username and password');</script>";
        // Redirect back to the signup page
        header("refresh:0; url=signup.html");
    }
}
?>
