<?php
// 1. Establish a database connection
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "CREATE DATABASE IF NOT EXISTS maindb";
$dbname = "maindb";
$result_db1 = mysqli_query($conn, $sql1);

$sql2 = "USE maindb";
$result_db2 =  mysqli_query($conn, $sql2);

// $sql2 = "SELECT title,abstract,regid from ideahub ORDER BY ID DESC"; 
// $result = mysqli_query($conn, $sql2);

// 2. Retrieve data from the database
$sql = "SELECT title,abstract,regid,created_at FROM ideahub ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

// 3. Display each row as a new post in card layout
?>
<!DOCTYPE html>
<html>
<head>
	<title>Card Layout Example</title>
	<!-- Bootstrap CSS link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
    <style>
        .head-section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        :root{
        --font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .card{
            box-shadow: rgba(255, 255, 255, 0.1) 0px 22px 70px 4px;
        }
    </style>
</head>
<!--  -->
<body style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
margin-top: 35px; margin-left: none;font-family: var(--font-family)">
    <div class="head-section">
    <h1 style="font-weight:bold; font-size: 50px; text-align: center; 
    padding-top:0px; padding-bottom:20px; color: white"> 
    Innovative Ideas from <span style="color: black; background: yellow">Vardhamanians.</span></h1>
    <a href="Scholar.html" class="features-button" style="margin-top: 5px;
                                                        margin-bottom: 35px;
                                                        margin-left: 30px;
                                                        font-size: 25px;
                                                        text-decoration: none;
                                                        color: white;
                                                        font-weight: 600;
                                                        text-align: center;
                                                        width: 170px;
                                                        border-radius: 0px;
                                                        background-color:orange;
                                                        padding: 10px 10px 10px;
                                                        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                                                        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"
                                                        >Home Page </a>
    </div>
	<div class="container">
		<div class="row">
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<div class="col-sm-12 col-md-12">
					<div class="card" style="margin-bottom: 30px;">
						<div class="card-header" style="font-weight:bold; font-size: 30px; background-color: #50DBB4"><?php echo $row["title"]; ?></div>
						<div class="card-body">
							<p class="card-text" style="font-size: 20px"><?php echo $row["abstract"]; ?></p>
						</div>
						<div class="card-footer" style="font-weight:bold">
							<small class="text-muted">Submitted by: <?php echo $row["regid"]; ?></small><br>
                            <small class="text-muted">Date Submitted: <?php echo $row["created_at"]; ?></small>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- Bootstrap JavaScript links -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
<?php
// 4. Close the database connection
mysqli_close($conn);
?>
