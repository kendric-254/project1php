<?php
// Database connection parameters
$host = "localhost"; // The hostname of your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "signup form"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, terminate and display an error message
}

// SQL query to retrieve all users
$sql = "SELECT * FROM user_information"; // SQL query to select all records from the user_information table

// Execute the query
$result = $conn->query($sql); // Execute the SQL query and store the result

// Check if there are any users
if ($result->num_rows > 0) { // If there are rows returned from the query
    // Display user list in a table
    echo "<table border='1'>";
    echo "<tr><th>USER_ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) { // Loop through each row of the result
        echo "<tr>";
        echo "<td>". (isset($row["user_id"]) ? $row["user_id"] : "") . "</td>";
        echo "<td>". (isset($row["username"]) ? $row["username"] : "") . "</td>";
        echo "<td>". (isset($row["email"]) ? $row["email"] : "") . "</td>";
        echo "<td><form action='delete_user.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>
                    <input type='hidden' name='delete_user_id' value='". (isset($row["user_id"]) ? $row["user_id"] : "") . "'>
                    <button type='submit'>Delete</button>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results"; // If there are no users in the database
}

// Close connection
$conn->close(); // Close the database connection
?>