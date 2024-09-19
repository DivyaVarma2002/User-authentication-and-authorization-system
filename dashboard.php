<?php
include 'session.php'; // Include your session management functions

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if (isAdmin()) {
    echo "<a href='admin.php'>Admin Panel</a>";
}

echo "<h1><center>Welcome to the Dashboard</center></h1>";
?>
<!-- Logout button -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="logout.php" method="POST">
    <center><button type="submit">Logout</button></center>
</form>
</body>
</html>