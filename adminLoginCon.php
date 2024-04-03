<?php
require_once "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    // Prepare SQL statement to retrieve admin information based on email and password
    $sql = "SELECT * FROM admintbl WHERE email = ? AND pw = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $pw);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching admin record is found
    if ($result->num_rows == 1) {
        // Redirect to the admin page if login is successful
        header("Location: admin.php");
        exit();
    } else {
        // Redirect back to the sign-in page with an error message
        header("Location: sign-in.php?error=1");
        exit();
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
