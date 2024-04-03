<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    // Authenticate the user (you'll need to implement this logic)
    if ($email == "email" && $pw == "pw") {
        // Set session variables
        $_SESSION["userId"] = 123; // Example user ID
        $_SESSION["firstName"] = $firstName;

        // Redirect to the home page or another authenticated page
        header("Location: index.html");
        exit();
    } else {
        // Authentication failed, redirect back to sign-in page with error
        header("Location: sign-in.html?error=1");
        exit();
    }
}
?>
