<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a user ID is provided for deletion
    if (isset($_POST['id'])) {
        // Database connection parameters
        $host = "localhost"; // Your database host
        $username = "root"; // Your database username
        $password = ""; // Your database password
        $database = "signup form"; // Your database name

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); // If connection fails, terminate and display an error message
        }

        // Retrieve user ID from the form submission
        $user_id = $_POST['delete_user_id'];

        // Prepare the SQL query to delete user from the database
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);

        // Execute the query
        if ($stmt->execute()) {
            echo "User deleted successfully."; // If the query is successful, display a success message
        } else {
            echo "Error deleting user: " . $stmt->error; // If there's an error with the query, display an error message
        }

        // Close the prepared statement and the database connection
        $stmt->close();
        $conn->close();
    }
}
?>