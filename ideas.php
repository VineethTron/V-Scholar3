<?php
// Establish a connection to the MySQL server
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testdb";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM ideahub"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='font-size: 20px;
    font-family: sans-serif;' 
    border='1'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Email</th>
                <th>Idea ID</th>
                <th>Created At</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='padding: 10px'>
                <td style='padding: 10px; font-weight: bold'>" . $row["id"] . "</td>
                <td style='padding: 10px; font-weight: bold'>" . $row["title"] . "</td>
                <td style='padding: 10px'>" . $row["abstract"] . "</td>
                <td style='padding: 10px;'>" . $row["email"] . "</td>
                <td style='padding: 10px'>" . $row["regid"] . "</td>
                <td style='padding: 10px; font-weight: bold'>" . $row["created_at"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

mysqli_close($conn);
?>
