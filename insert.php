<?php
// Include the database connection file
require_once "connection.php";

// Define a variable to hold the message
$message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["pw"];

    // Prepare SQL statement
    $sql = "INSERT INTO signup (firstName, lastName, email, pw) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    // Execute statement
    if ($stmt->execute()) {
        // Set the message
        //$message = "New record created successfully";
        //echo "New record created successfully";
        // echo "<script>alert('$message');</script>";
        // Display alert message using JavaScript
        echo "<script>alert('Signup successful');</script>";
        header("Location: sign-in.html");
        exit();

    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}
// Close connection (optional)
$conn->close();
?>