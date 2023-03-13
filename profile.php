<?php

$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "CREATE DATABASE IF NOT EXISTS maindb";
$result_db = mysqli_query($conn, $sql1);
$dbname = "maindb";

$class10 = $_POST['class10'];
$intermediate = $_POST['intermediate'];
$bachelors = $_POST['bachelors'];
$internship = $_POST['internship'];
$publication = $_POST['publication'];
$codingprofile1 = $_POST['codingprofile1'];
$codingprofile2 = $_POST['codingprofile2'];
$skill1 = $_POST['skill1'];
$skill2 = $_POST['skill2'];
$prog_language = $_POST['prog_language'];
$voluntary_activities = $_POST['voluntary_activities'];
$responsibilities = $_POST['responsibilities'];
$language = $_POST['language'];
$accomplishment = $_POST['accomplishment'];
$certification = $_POST['certification'];
$portfolio = $_POST['portfolio'];
$linkedin = $_POST['linkedin'];
$project1 = $_POST['project1'];
$project2 = $_POST['project2'];
$hobby = $_POST['hobby'];


$username = $_POST['username'];
$password = $_POST['password'];
$ps = $_POST['ps'];

if (!empty($_POST['submit'])) {
    $sql1 = "CREATE TABLE IF NOT EXISTS maindb.profile (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        class10_score VARCHAR(255),
        intermediate_score VARCHAR(255),
        current_cgpa VARCHAR(255),
        internship VARCHAR(255),
        publication_name VARCHAR(255),
        coding_profile1 VARCHAR(255),
        coding_profile2 VARCHAR(255),
        skill1 VARCHAR(255),
        skill2 VARCHAR(255),
        programming_language1 VARCHAR(255),
        voluntary_activities VARCHAR(255),
        responsibilities VARCHAR(255),
        speaking_language VARCHAR(255),
        accomplishment_name VARCHAR(255),
        certification VARCHAR(255),
        portfolio_link VARCHAR(255),
        linkedin_link VARCHAR(255),
        project_name1 VARCHAR(255),
        project_name2 VARCHAR(255),
        hobby VARCHAR(255),
        profile_strength VARCHAR(255)
    )";
    mysqli_query($conn, $sql1);
   
    $sql2 = "SELECT * FROM maindb.users1 WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql2);


    if (mysqli_num_rows($result) > 0) {
        $sql3 = "UPDATE profile SET 
        class10_score='$class10', 
        intermediate_score='$intermediate', 
        current_cgpa='$bachelors', 
        internship='$internship', 
        publication_name='$publication', 
        coding_profile1='$codingprofile1', 
        coding_profile2='$codingprofile2', 
        skill1='$skill1', 
        skill2='$skill2', 
        programming_language1='$prog_language', 
        voluntary_activities='$voluntary_activities', 
        responsibilities='$responsibilities', 
        speaking_language='$language', 
        accomplishment_name='$accomplishment', 
        certification='$certification', 
        portfolio_link='$portfolio', 
        linkedin_link='$linkedin', 
        project_name1='$project1', 
        project_name2='$project2', 
        hobby='$hobby' WHERE username=$username";
    }

    $sql = "SELECT COUNT(*) FROM profile WHERE username=$username 
            AND class10_score IS NOT NULL 
            AND intermediate_score IS NOT NULL 
            AND current_cgpa IS NOT NULL 
            AND internship IS NOT NULL 
            AND publication_name IS NOT NULL 
            AND coding_profile1 IS NOT NULL 
            AND coding_profile2 IS NOT NULL 
            AND skill1 IS NOT NULL 
            AND skill2 IS NOT NULL 
            AND programming_language1 IS NOT NULL 
            AND voluntary_activities IS NOT NULL 
            AND responsibilities IS NOT NULL 
            AND speaking_language IS NOT NULL 
            AND accomplishment_name IS NOT NULL 
            AND certification IS NOT NULL 
            AND portfolio_link IS NOT NULL 
            AND linkedin_link IS NOT NULL 
            AND project_name1 IS NOT NULL 
            AND project_name2 IS NOT NULL 
            AND hobby IS NOT NULL";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_row($result)[0];

    // calculate the percentage of fields filled
    $total_fields = 20; // total number of fields in the profile table
    $profile_strength = ($count / $total_fields) * 100;

    // update the profile_strength field in the profile table
    $sql = "UPDATE maindb.profile SET profile_strength=$profile_strength WHERE username=$username";

}
?>

