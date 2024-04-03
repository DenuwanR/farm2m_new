<?php
    require_once "connection.php";

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $email = $_POST["email"];
    $password = $_POST["pw"];

    // Prepare SQL statement to retrieve user information based on email and password
    $sql = "SELECT firstName, lastName FROM signup WHERE email = ? AND pw = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with the provided credentials exists
    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($firstName, $lastName) ;
        $stmt->fetch();

        // Start session and store user information in session variables
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        // Redirect to the home page or any other page you want
        header("Location: index.php");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        // Redirect back to the sign-in page with an error message
        header("Location: sign-in.php?error=1");
        exit;
    }

    }
?>