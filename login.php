<?php
session_start(); // Start the session

// Include database and functions
include 'db.php';
include 'functions.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit(); // Ensure that no further code is executed after redirection
    } else {
        echo "Invalid credentials.";
    }

    // Close statement
    $stmt->close();
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><center>Login Form</center></h1>
<form action="login.php" method="POST">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
</body>
</html>

