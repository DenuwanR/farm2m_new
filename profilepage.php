<?php
// Include your database connection file (con.php)
//include('con.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


if ($conn) {

   

    $login_stid = $_POST['stid'];
    $login_password = $_POST['password'];

    // Query to check if the entered credentials exist in the database
    $login_query = "SELECT * FROM register WHERE stid = ? AND password = ?";
    $login_stmt = $conn->prepare($login_query);
    $login_stmt->bind_param('ss', $login_stid, $login_password);
    $login_stmt->execute();
    $login_result = $login_stmt->get_result();

    if ($login_result->num_rows > 0) {
        
        session_start();
        $_SESSION['stid'] = $login_stid; // Store user ID in session
        header("Location: profilepage.php");
 

        exit();

        $login_stmt-> close();
        $conn-> close();

    }
    else{

        echo "invalid user or pass";
    }


} else {
    echo 'Database connection failed.';
}
?>