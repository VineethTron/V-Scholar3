<?php

$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "CREATE DATABASE IF NOT EXISTS maindb";
$result_db = mysqli_query($conn, $sql1);
$dbname = "maindb";


// Get the user ID and password from the form
if (!empty($_POST['submit'])) {
    $user = $_POST['userid'];
    $pass = $_POST['password'];

    if ($user != "" && $pass != "") {
        if ($_POST['c'] === "on") {
            setcookie("usercookie", $user);
            setcookie("passwordcookie", $pass);
            if ($user == "19881A0550" && $pass == "#ABCD") {
                // Set a session variable to indicate that the user has admin rights
                $_SESSION["admin"] = true;

                // Redirect to the specific PHP form
                header("Location: admin.html");
                exit;
            } else {

                // Create SQL query to check if the entered user ID and password match a record in the database
                $sql = "SELECT * FROM maindb.users1 WHERE username='$user' AND password='$pass'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // The user ID and password match a record in the database
                    header("Location: Scholar.html");
                } else {
                    // The user ID and password do not match a record in the database
                    echo "<center><h1 style='display: flex; align-items: center; justify-content: center; height: 100vh; color: red;'>Invalid UserID or Password</h1></center>";
                }
            }
        }else{
            if ($user == "19881A0550" && $pass == "#ABCD") {
                // Set a session variable to indicate that the user has admin rights
                $_SESSION["admin"] = true;

                // Redirect to the specific PHP form
                header("Location: admin.html");
                exit;
            } else {

                // Create SQL query to check if the entered user ID and password match a record in the database
                $sql = "SELECT * FROM maindb.users1 WHERE username='$user' AND password='$pass'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // The user ID and password match a record in the database
                    header("Location: Scholar.html");
                } else {
                    // The user ID and password do not match a record in the database
                    echo "<center><h1 style='display: flex; align-items: center; justify-content: center; height: 100vh; color: red;'>Invalid UserID or Password</h1></center>";
                }
            }
        }
    }
    else{
        echo "<script>alert('Login details incorrect')</script>";
    }
}
else{
    echo "<script>alert('Please Fill Login details ')</script>";
}

mysqli_close($conn);

?>
