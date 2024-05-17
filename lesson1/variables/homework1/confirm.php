<?php
// Establish connection to your MySQL database
$host = "localhost";
$username = "root";
$password = "";
$database = "signup form";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form values
$username = $_POST['username'];
$password = $_POST['password'];

// SQL to check if the user exists and the password is correct
$sql = "SELECT * FROM user_information WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start session and set session variables
    session_start();
    $_SESSION['username'] = $username;
    header("Location: dashboard.php"); // Redirect to dashboard
    exit();
} else {
    echo "Invalid username or password";
}

// Close database connection
$conn->close();
?>
