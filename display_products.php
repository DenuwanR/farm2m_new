<?php
// Include your database connection file here
// Example: include 'db_connection.php';

// Function to fetch data from the products table
function fetchProductData() {
    // Establish database connection
    $conn = new mysqli("localhost", "root", "root", "users");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the products table
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>Product ID</th><th>Seller Name</th><th>Product Name</th><th>Category</th><th>Description</th><th>Quantity</th><th>Sell Category</th><th>Price</th><th>Photo URL</th><th>Product Time</th><th>Bidder Name</th><th>Highest Bid</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["productId"] . "</td>";
            echo "<td>" . $row["sellerName"] . "</td>";
            echo "<td>" . $row["productName"] . "</td>";
            echo "<td>" . $row["category"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["sellCategory"] . "</td>";
            echo "<td>" . $row["Price"] . "</td>";
            echo "<td>" . $row["photoUrl"] . "</td>";
            echo "<td>" . $row["ProductTime"] . "</td>";
            echo "<td>" . $row["BidderName"] . "</td>";
            echo "<td>" . $row["HighestBid"] . "</td>";
            echo "<td><a href='delete_product.php?id=" . $row["productId"] . "'>Remove</a></td>"; // Link to delete_product.php with product ID as parameter
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
}

// Call the function to fetch and display product data
fetchProductData();
?>
