<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "users";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form submission
    
    
    $userName = $_POST['userName'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Insert data into the 'orders' table
    $insertSql = "INSERT INTO orders (userName,productId, quantity) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ssi", $userName, $productId, $quantity);

    // Update quantity in the 'products' table
    $updateSql = "UPDATE products SET quantity = quantity - ? WHERE productId = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ii", $quantity, $productId);

    // Perform the operations within a transaction to ensure consistency
    $conn->begin_transaction();

    try {
        // Insert into 'cart'
        $insertStmt->execute();

        // Update 'products'
        $updateStmt->execute();

        // Commit the transaction
        $conn->commit();

        echo "<script>alert('Product added to cart successfully.'); window.location.href = 'product-details.php?productId= $productId ';</script>";
            exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }



    // Close the prepared statement
    $insertStmt->close();
    $updateStmt->close();
    // Close database connection
    $conn->close();
}
?>
