<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dashboad.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
    
        <div class="sidebar">
            <h2 class="theheading">IST</h2>
            <a href="#">Home</a>
            <a href="#">Grades</a>
            <a href="#">Schedule</a>
            <a href="#">Notifications</a>
            <a href="#">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
        <div>  
          <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        
        </div>
    <div class="main-content">
            <div class="cards">
                <div class="card">
                    <h2>Grades</h2>
                    <p>View your recent grades and overall performance.</p>
                </div>
                <div class="card">
                    <h2>Schedule</h2>
                    <p>Check your upcoming classes and events.</p>
                </div>
                <div class="card">
                    <h2>Notifications</h2>
                    <p>Stay updated with the latest announcements.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2024 IST. All rights reserved.</p>
    </div>
</body>
</html>
