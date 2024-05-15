<?php
// Establish connection to your MySQL database
$host="localhost";
$username = "root";
$password = "";
$database = "signup form";

// Create connection
$conn = new mysqli($host,$username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form values
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// SQL to insert data into database
$sql = "INSERT INTO user_information (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>