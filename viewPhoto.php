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

session_start();

// Check if the user is logged in
if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    // Redirect to the login page if not logged in
    header("Location: sign-in.html");
    exit();
}

// Retrieve the first name and last name from session variables
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

// Fetch the profile photo path from the database
$sql = "SELECT profile_photo FROM signup WHERE firstName = ? AND lastName = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $firstName, $lastName);
$stmt->execute();
$stmt->bind_result($profile_photo);
$stmt->fetch();
$stmt->close();

// Close the database connection
$conn->close();
?>

