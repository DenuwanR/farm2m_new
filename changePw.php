<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "root"; // If you have set a password for your MySQL server, provide it here
$database = "users"; // Update to your actual database name

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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validate the input fields
    // You can add your validation logic here

    // Check if the current password matches the one stored in the database
    $sql = "SELECT pw FROM signup WHERE firstName = ? AND lastName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($storedPassword);
        $stmt->fetch();

        // Verify the current password
        if ($currentPassword === $storedPassword) {
            // Check if the new password matches the confirm password
            if ($newPassword === $confirmPassword) {
                // Update the password in the database
                $updateSql = "UPDATE signup SET pw = ? WHERE firstName = ? AND lastName = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("sss", $newPassword, $firstName, $lastName);
                if ($updateStmt->execute()) {
                    // Password updated successfully
                    echo "<script>alert('Password updated successfully');</script>";
                    header("Location: index.html");
                } else {
                    // Error updating password
                    echo "<script>alert('Error updating password');</script>";
                }
            } else {
                // New password and confirm password do not match
                echo "<script>alert('New password and confirm password do not match');</script>";
            }
        } else {
            // Current password is incorrect
            echo "<script>alert('Current password is incorrect');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found');</script>";
    }

    // Close prepared statements
    $stmt->close();
    if (isset($updateStmt)) {
        $updateStmt->close();
    }
}

// Close the database connection
$conn->close();
?>
