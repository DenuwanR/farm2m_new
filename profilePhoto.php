<?php
session_start();

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

// Check if the user is logged in
if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    // Redirect to the login page if not logged in
    header("Location: sign-in.html");
    exit();
}

// Retrieve the first name and last name from session variables
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

// Fetch the profile photo path from the database
$sql = "SELECT profile_photo FROM signup WHERE firstName = ? AND lastName = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $firstName, $lastName);
$stmt->execute();
$stmt->bind_result($profile_photo);
$stmt->fetch();
$stmt->close();

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_photo"])) {
    $file_name = $_FILES["profile_photo"]["name"];
    $file_tmp = $_FILES["profile_photo"]["tmp_name"];
    $file_type = $_FILES["profile_photo"]["type"];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed_extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $allowed_extensions)) {
        // Directory where uploaded files will be saved
        $upload_directory = "uploads/";

        // Path to save in the database
        $file_path = $upload_directory . $file_name;

        // Move uploaded file to the specified directory
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Insert file path into the database
            $sql = "UPDATE signup SET profile_photo = ? WHERE firstName = ? AND lastName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $file_path, $firstName, $lastName);

            if ($stmt->execute()) {
                // Update the $profile_photo variable
                $profile_photo = $file_path;

                // File path inserted successfully
                header("Location: accountSettingPage.php"); // Redirect to profile page or wherever you want
                exit();
            } else {
                // Error inserting file path into the database
                echo "Error: " . $conn->error;
            }
        } else {
            // Error moving uploaded file
            echo "Error uploading file.";
        }
    } else {
        // Invalid file type
        echo "Invalid file type. Only JPEG, JPG, and PNG files are allowed.";
    }
}

// Close the database connection
$conn->close();
?>