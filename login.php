<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "users");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM credentials WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("location: location2.html");
    } else {
        // Invalid username or password, display alert message
        echo "<script>alert('Invalid username or password');</script>";
        // Redirect back to the login page
        header("refresh:0; url=login.html");
    }
}
?>
