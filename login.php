<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID and password from the form
$user = $_POST['userid'];
$pass = $_POST['password'];

if ($user == "19881A0550" && $pass == "#ABCD"){
    // Set a session variable to indicate that the user has admin rights
    $_SESSION["admin"] = true;
    
    // Redirect to the specific PHP form
    header("Location: addData.php");
    exit;
} else {

    // Create SQL query to check if the entered user ID and password match a record in the database
    $sql = "SELECT * FROM login WHERE userid='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // The user ID and password match a record in the database
        header("Location: Scholar.html");
    } else {
        // The user ID and password do not match a record in the database
        echo "<center><h1 style='display: flex; align-items: center; justify-content: center; height: 100vh; color: red;'>Invalid UserID or Password</h1></center>";
    }
}

mysqli_close($conn);

?>
