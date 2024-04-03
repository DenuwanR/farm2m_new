<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
    $sellerName = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
} else {
    $sellerName = "Unknown Seller";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $sellCategory = $_POST['sellCategory'];
    $Price = $_POST['Price'];
    
    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];
        
        // Upload directory
        $uploadDirectory = 'uploads/';
        
        // Move the uploaded file to the upload directory
        $destPath = $uploadDirectory . $fileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // File uploaded successfully
            $photoUrl = $destPath;
        } else {
            // Error in uploading file
            $photoUrl = "";
        }
    } else {
        // No file uploaded or error occurred
        $photoUrl = "";
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "users";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query
    $sql = "INSERT INTO products (sellerName, productName, category, description, quantity, sellCategory, Price, photoUrl)
            VALUES ('$sellerName', '$productName', '$category', '$description', '$quantity','$sellCategory', '$Price', '$photoUrl')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>