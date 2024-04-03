<?php
// Start the session
session_start();

// Set session variables
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'example_user';

// Retrieve session data
$userID = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Print session data for verification
echo "User ID: $userID, Username: $username";

// Check session status
$status = session_status();
if ($status == PHP_SESSION_ACTIVE) {
    echo "Sessions are active.";
} else {
    echo "Sessions are not active.";
}
?>
