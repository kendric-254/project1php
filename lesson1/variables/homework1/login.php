<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="confirm.php" method="post">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="form-input">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
