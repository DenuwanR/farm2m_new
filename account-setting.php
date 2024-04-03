<?php
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "root"; // If you have set a password for your MySQL server, provide it here
    $database = "users";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    // Insert address and Mobile to signup

        // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract form data
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];

        // Prepare SQL statement
        $sql = "UPDATE signup SET address = ?, mobile = ? WHERE firstName = ? AND lastName = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssss", $address, $mobile, $firstName, $lastName);
        
        // Execute statement
        if ($stmt->execute()) {
            echo "<script>alert('Update successful');</script>";
            header("Location: index.php");
            exit();
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    // Close the database connection
    $conn->close();
?>
