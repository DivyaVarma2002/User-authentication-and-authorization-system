<?php
// Helper function to validate registration
function validateRegistration($username, $email, $conn) {
    // Check if the username or email already exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If user already exists, return false
        echo "Username or email already exists.";
        return false;
    } else {
        // If username and email are unique, return true
        return true;
    }

    $stmt->close();
}
?>
