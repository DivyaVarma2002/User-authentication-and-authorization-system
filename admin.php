<?php
session_start();

// Check if the user is logged in and has an admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authorized
    exit();
}

// Admin page content
echo "<center><h1>Welcome to the admin page.</h1><center>";
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