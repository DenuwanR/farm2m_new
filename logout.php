<?php
session_start();
require_once "connection.php";

// Check if the user is logged in
if (isset($_SESSION['userId'])) {
    // Retrieve the user's ID from the session
    $userId = $_SESSION['userId'];

    // Save cart data to cartBackup table
    $backupInsertSql = "INSERT INTO cartBackup (userId, productName, quantity, price, photoUrl) SELECT userId, productName, quantity, price, photoUrl FROM cart WHERE userId = $userId";

    if ($conn->query($backupInsertSql) === TRUE) {
        // Delete cart data from cart table
        $deleteSql = "DELETE FROM cart WHERE userId = $userId";

        if ($conn->query($deleteSql) === TRUE) {
            // Clear session data
            session_unset();
            session_destroy();
            header("Location: sign-in.html"); // Redirect to the login page after logout
            exit();
        } else {
            echo "Error deleting cart data: " . $conn->error;
        }
    } else {
        echo "Error backing up cart data: " . $conn->error;
    }
} else {
    // Redirect the user to the login page if not logged in
    header("Location: sign-in.html");
    exit();
}

// Close the database connection
$conn->close();
?>
