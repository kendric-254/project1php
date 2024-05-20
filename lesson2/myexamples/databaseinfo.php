<?php
// Database connection parameters
$host = "localhost"; // The hostname of your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "signup_form"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails, print an error message
}

// SQL query to retrieve all users
$sql = "SELECT * FROM user_information"; // SQL query to select all records from the user_information table

// Execute the query
$result = $conn->query($sql); // Execute the SQL query and store the result
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <form action="delete_user.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            // Check if there are any users
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo '<td><button type="submit" name="delete_user_id" value="' . $row["id"] . '">Delete</button></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </table>
    </form>
    <?php $conn->close(); // Close the database connection ?>
</body>
</html>
