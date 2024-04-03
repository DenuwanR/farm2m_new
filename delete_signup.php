<?php
// Include your database connection file here
include 'connection.php';

// Check if the user ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the user ID from the URL parameter
    $userId = $_GET['id'];

    // Establish database connection
    $conn = new mysqli("localhost", "root", "root", "users");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to delete a record based on user ID
    $sql = "DELETE FROM signup WHERE userId = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "User ID not specified";
}
?>