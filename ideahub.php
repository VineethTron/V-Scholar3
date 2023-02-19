<?php
// Step 1: Create a database if not exists with name "testdb"
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testdb";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "CREATE DATABASE IF NOT EXISTS testdb";
$result1 = mysqli_query($conn, $sql1);
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully<br>";
// } else {
//     echo "Error creating database: " . mysqli_error($conn) . "<br>";
// }

// Step 2: Create a table if not exists with name "ideahub" in above database
$sql2 = "CREATE TABLE IF NOT EXISTS ideahub (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        abstract VARCHAR(500) NOT NULL,
        email VARCHAR(20) NOT NULL,
        regid VARCHAR(10) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
$result2 = mysqli_query($conn, $sql2);
// if (mysqli_query($conn, $sql)) {
//     echo "Table ideahub created successfully<br>";
// } else {
//     echo "Error creating table: " . mysqli_error($conn) . "<br>";
// }

// Step 4: Insert data into the ideahub table using prepared statements to prevent SQL injection attacks
if(isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $abstract = mysqli_real_escape_string($conn, $_POST['abstract']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $stmt = mysqli_prepare($conn, "INSERT INTO ideahub (title, abstract, email, regid) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $title, $abstract, $email, $id);
    if (mysqli_stmt_execute($stmt)) {
            echo '<script type="text/javascript">';
            echo 'alert("Data inserted Successfully");';
            echo 'window.location.href = "ideahub.html";';
            echo '</script>';
        // header("Location: ideahub.html");
    } else {
        echo "<script>alert('Data insertion failed');</script>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
