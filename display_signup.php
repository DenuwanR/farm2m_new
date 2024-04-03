<?php
// Include your database connection file here
// Example: include 'db_connection.php';

// Function to fetch data from the signup table
function fetchSignupData()
{
    // Establish database connection
    $conn = new mysqli("localhost", "root", "root", "users");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the signup table
    $sql = "SELECT * FROM signup";
    $result = $conn->query($sql);

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>";
        echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th><th>Address</th><th>Mobile</th><th>Profile Photo</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["userId"] . "</td>";
            echo "<td>" . $row["firstName"] . "</td>";
            echo "<td>" . $row["lastName"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["pw"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["profile_photo"] . "</td>";
            echo "<td><a href='delete_signup.php?id=" . $row["userId"] . "'>Remove</a></td>"; // Link to delete_signup.php with user ID as parameter
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
}

// Call the function to fetch and display signup data
fetchSignupData();
?>