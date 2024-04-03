<?php
echo "Script Executed" ;
require_once "connection.php";

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

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['HighestBid'])) {
    // Retrieve the bid value from the form
    $HighestBid = floatval($_POST['HighestBid']);

    // Check if productId is provided in the URL
    if (isset($_GET['productId'])) {
        // Retrieve the productId from the URL
        $productId = $_GET['productId'];

        // Prepare and execute SQL query to get the current highest bid value for the specified product
        $stmt = $conn->prepare("SELECT HighestBid FROM products WHERE productId = ?");
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }
        $stmt->bind_param("i", $productId); // Assuming productId is an integer
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $currentHighestBid = $row['HighestBid'];
        $stmt->close();

        // Check if the new bid value is higher than the current highest bid value
        if ($HighestBid > $currentHighestBid) {
            // Update the database with the new bid value and bidder name
            $bidderName = $firstName . ' ' . $lastName;
            $stmt = $conn->prepare("UPDATE products SET BidderName = ?, HighestBid = ? WHERE productId = ?");
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit();
            }
            $stmt->bind_param("sdi", $bidderName, $HighestBid, $productId);        
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                // Redirect to a success page if the bid was successful
                // echo '<script>alert("Bid was successful!");</script>';
             //   echo '<script>window.setTimeout(function(){ window.location.href = "AuctionProductDetails.php?productId=' . $productId . '"; }, 1000);</script>';
                echo "<script>alert('Bid Placed successfully.'); window.location.href = 'AuctionProductDetails.php?productId= $productId ';</script>";
                exit();
            } else {
                // Redirect to a page indicating that the bid value is not higher
                echo "<script>alert('Please Enter Value More than Current Higher Bid!!'); window.location.href = 'AuctionProductDetails.php?productId= $productId ';</script>";
                exit();
            }
        } else {
            // Redirect to a page indicating that the bid value is not higher
            echo "<script>alert('Please Enter Value More than Current Higher Bid!!'); window.location.href = 'AuctionProductDetails.php?productId= $productId ';</script>";
            exit();
        }
    } else {
        // Handle the case where productId is not provided in the URL
        echo "Product ID not provided.";
        exit();
    }
}
?>
