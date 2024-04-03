<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "root"; // If you have set a password for your MySQL server, provide it here
$database = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
