<?php
session_start(); // Start the session at the beginning

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection.php";
    

    // Get data from the form submission
    $userName = $_POST['userName'];
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $Price = $_POST['Price'];
    $photoUrl = isset($_POST['photoUrl']) ? $_POST['photoUrl'] : ''; // Check if set, otherwise assign an empty string

    // Insert data into the 'cart' table
    $insertSql = "INSERT INTO cart (userName, productId, productName, quantity, Price, photoUrl) VALUES ( ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sisdds", $userName, $productId, $productName, $quantity, $Price, $photoUrl);

    if ($insertStmt->execute()) {
        // If insertion is successful, redirect the user
        echo "<script>alert('Product added to cart successfully.'); window.location.href = 'product-details.php?productId= $productId ';</script>";
        
        exit(); // Ensure that the script stops execution after the redirect
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the prepared statement
    $insertStmt->close();

    // Close the database connection
    $conn->close();
}
?>
