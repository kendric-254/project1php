<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = "localhost"; // Your database host
    $username = "root"; // Your database username
    $password = ""; // Your database password
    $database = "signup_form"; // Your database name

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); // If connection fails, terminate and display an error message
    }

    // Retrieve user ID from the form submission
    $user_id = $_POST['user_id']; // Assuming you have a hidden input field in the form to store the user's ID

    // Retrieve updated user information from the form submission
    $updated_username = $_POST['username'];
    $updated_email = $_POST['email'];
    // Add more fields as needed

    // Validate the updated data (e.g., check for empty fields, valid email format, etc.)
    if (empty($updated_username) || empty($updated_email)) {
        echo "Username and email are required."; // Display an error message if username or email is empty
    } elseif (!filter_var($updated_email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format."; // Display an error message if the email format is invalid
    } else {
        // SQL query to update user information in the database
        $sql = "UPDATE users SET username='$updated_username', email='$updated_email' WHERE id='$user_id'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "User information updated successfully."; // If the query is successful, display a success message
        } else {
            echo "Error updating user information: " . $conn->error; // If there's an error with the query, display an error message
        }
    }

    // Close connection
    $conn->close(); // Close the database connection
}
?>
