<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maindb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a new database if it doesn't exist
if (!mysqli_select_db($conn, $dbname)) {
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    mysqli_query($conn, $sql);
}

// Create a new table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users1 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";
mysqli_query($conn, $sql);
// Insert new user record into the table
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['add'])){
    // $username = $_POST["username"];
    // $password = $_POST["password"];
    $username = $_POST["username"];
    $password = $_POST["password"];

        $sql = "INSERT INTO users1(username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            $success_message = "User Added successfully.";
        } else {
            echo "<script>alert('Error:  . $sql . '<br>' . mysqli_error($conn)')</script>";
        }

        if (isset($success_message)){
            echo '<script type="text/javascript">';
            echo 'alert("'.$success_message.'");';
            echo 'window.location.href = "admin.html";';
            echo '</script>';
        }
      
    }
    else if(!empty($_POST['delete'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "DELETE FROM users1 WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        // Check if query was successful and if any rows were affected
        if ($result === true && $conn->affected_rows > 0) {
            $success_message = "User has been deleted successfully.";
        } else {
            $success_message = "wrong username or password.";
        }

        if (isset($success_message)){
            echo '<script type="text/javascript">';
            echo 'alert("'.$success_message.'");';
            echo 'window.location.href = "admin.html";';
            echo '</script>';
        }
    }
    else if(!empty($_POST['update'])){
        $oldUsername = $_POST['oldusername'];
        $newUsername = $_POST['newusername'];
        $oldPassword = $_POST['oldpassword'];
        $newPassword = $_POST['newpassword'];

        $sql = "UPDATE users1 SET username='$newUsername', password='$newPassword' WHERE username='$oldUsername' AND password='$oldPassword'";

        $result = $conn->query($sql);

        // Check if query was successful and if any rows were affected
        if ($result === true && $conn->affected_rows > 0) {
            $success_message = "User has been updated successfully.";
        } else {
            $success_message = "wrong username or password.";
        }

        if (isset($success_message)){
            echo '<script type="text/javascript">';
            echo 'alert("'.$success_message.'");';
            echo 'window.location.href = "admin.html";';
            echo '</script>';
        }
    }

mysqli_close($conn);
?>
