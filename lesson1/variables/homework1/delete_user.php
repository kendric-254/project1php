<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a user ID is provided for deletion
    if (isset($_POST['delete_user_id'])) {
        // Database connection parameters
        $host = "localhost"; // Your database host
        $username = "root"; // Your database username
        $password = ""; // Your database password
        $database = "signup_form"; // Your database name

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            // If connection fails, terminate and display an error message
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve user ID from the form submission
        $user_id = $_POST['delete_user_id'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM user_information WHERE id = ?");
        if ($stmt === false) {
            // If the preparation of the statement fails, display an error message and terminate
            die("Prepare failed: " . $conn->error);
        }
        
        // Bind the user ID parameter to the SQL statement
        $stmt->bind_param("i", $user_id);

        // Execute the query
        if ($stmt->execute()) {
            // If the query is successful, display a success message
            echo "User deleted successfully.";
        } else {
            // If there's an error with the query execution, display an error message
            echo "Error deleting user: " . $stmt->error;
        }

        // Close statement and connection to free resources
        $stmt->close();
        $conn->close();
    } else {
        // If no user ID is provided for deletion, display an error message
        echo "No user ID provided for deletion.";
    }
} else {
    // If the request method is not POST, display an error message
    echo "Invalid request method.";
}
?>
