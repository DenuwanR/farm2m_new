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


// Start session (if not already started)
session_start();


// Set session variables
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;

// Redirect to index.html
header("Location: index.html");
exit; // Ensure no further code execution after redirection
?>
