<?php
    // Start a session and check if the user is logged in
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
?>