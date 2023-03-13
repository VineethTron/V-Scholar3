<!DOCTYPE html>
<html>
    <head>
        <title>Profile Strength | V-Scholar</title>
        <link rel="stylesheet" type="text/css" href="profile.css">
    </head>

    <body>
       <div class="main-container">

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

            $class10 = "";
            $intermediate = "";
            $bachelors = "";
            $internship = "";
            $publication = "";
            $codingprofile1 = "";
            $codingprofile2 = "";
            $skill1 = "";
            $skill2 = "";
            $prog_language = "";
            $voluntary_activities = "";
            $responsibilities = "";
            $language ="";
            $accomplishment = "";
            $certification = "";
            $portfolio = "";
            $linkedin = "";
            $project1 = "";
            $project2 = "";
            $hobby = "";
            $ps = "";

            $username = "";
            $password = "";
                

            if (!empty($_POST['submit'])) {
                $sql1 = "CREATE TABLE IF NOT EXISTS maindb.profile (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(255) NOT NULL,
                    class10_score VARCHAR(255) DEFAULT NULL,
                    intermediate_score VARCHAR(255) DEFAULT NULL,
                    current_cgpa VARCHAR(255) DEFAULT NULL,
                    internship VARCHAR(255) DEFAULT NULL,
                    publication_name VARCHAR(255)DEFAULT NULL,
                    coding_profile1 VARCHAR(255) DEFAULT NULL,
                    coding_profile2 VARCHAR(255) DEFAULT NULL,
                    skill1 VARCHAR(255) DEFAULT NULL,
                    skill2 VARCHAR(255) DEFAULT NULL,
                    programming_language1 VARCHAR(255) DEFAULT NULL,
                    voluntary_activities VARCHAR(255) DEFAULT NULL,
                    responsibilities VARCHAR(255) DEFAULT NULL,
                    speaking_language VARCHAR(255) DEFAULT NULL,
                    accomplishment_name VARCHAR(255) DEFAULT NULL,
                    certification VARCHAR(255) DEFAULT NULL,
                    portfolio_link VARCHAR(255) DEFAULT NULL,
                    linkedin_link VARCHAR(255) DEFAULT NULL,
                    project_name1 VARCHAR(255) DEFAULT NULL,
                    project_name2 VARCHAR(255) DEFAULT NULL,
                    hobby VARCHAR(255) DEFAULT NULL,
                    profile_strength VARCHAR(255) DEFAULT NULL
                )";
                $result1 = mysqli_query($conn, $sql1);

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
                $ps = $_POST['ps'];


                $username = $_POST['username'];
                $password = $_POST['password'];
                $ps = $_POST['ps'];

                $sql6 = "SELECT * FROM maindb.profile WHERE username = '$username'";
                $result6 = mysqli_query($conn, $sql6);

                if (mysqli_num_rows($result6) > 0) {
                } else {
                // Username doesn't exist, insert it
                if(strlen($username) == 10){
                    $sql7 = "INSERT INTO maindb.profile (username) VALUES ('$username')";
                    mysqli_query($conn, $sql7);
                    }
                }

                $sql2 = "SELECT * FROM maindb.users1 WHERE username='$username' AND password='$password'";
                $result2 = mysqli_query($conn, $sql2);


                if (mysqli_num_rows($result2) > 0) {
                    $sql3 = "UPDATE maindb.profile SET 
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
                    hobby='$hobby',
                    profile_strength='$ps' WHERE username='$username'";

                    $result3 = mysqli_query($conn, $sql3);
                }

               

                if ($conn->affected_rows > 0) {
                    echo "<script>alert('Data updated successfully.')</script>";
                  } else {

                    // $sql4 = "INSERT INTO maindb.profile (username) VALUES ('$username')";
                    // mysqli_query($conn, $sql4);
                    echo "<script>alert('Data Updation Failed')</script>";
                  }

                $sql9 = "SELECT COUNT(*) FROM maindb.profile WHERE username = '$username' AND
                        class10_score IS NULL 
                        OR intermediate_score IS NULL 
                        OR current_cgpa IS NULL 
                        OR internship IS NULL 
                        OR publication_name IS NULL 
                        OR coding_profile1 IS NULL 
                        OR coding_profile2 IS NULL 
                        OR skill1 IS NULL 
                        OR skill2 IS NULL 
                        OR programming_language1 IS NULL 
                        OR voluntary_activities IS NULL 
                        OR responsibilities IS NULL 
                        OR speaking_language IS NULL 
                        OR accomplishment_name IS NULL 
                        OR certification IS NULL 
                        OR portfolio_link IS NULL 
                        OR linkedin_link IS NULL 
                        OR project_name1 IS NULL 
                        OR project_name2 IS NULL 
                        OR hobby IS NULL";

                $result9 = mysqli_query($conn, $sql9);
                $count = $result9->fetch_row()[0];
                  
                $query = "SELECT * FROM maindb.profile WHERE username='$username'";
                    $result12 = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result12);

                    // Count the number of empty fields in the row
                    $count = 0;
                    foreach ($row as $field) {
                    if (is_string($field) && trim($field) === "") {
                        $count++;
                    }
                    }
                    $total_fields = 20;
                    $ps = ((20-$count)*100)/$total_fields;
                    $sql10 = "UPDATE maindb.profile SET profile_strength='$ps' WHERE username='$username'";
                    mysqli_query($conn, $sql10);
                }
            ?>
        <h2 class="form-heading">Want to know Profile Strength ..?</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="container">
                    <div class="column">
                        <input type="text" class="field field1 class10" placeholder="Class - 10 Score" name="class10" id="class10" value="<?php echo $class10 != "" ? $class10 : ""; ?>">
                        <input type="text" class="field field2 intermediate" placeholder="Intermediate Score" name="intermediate" id="intermediate" value="<?php echo $intermediate != "" ? $intermediate : ""; ?>">
                        <input type="text" class="field field3 bachelors" placeholder="Bachelors Score" name="bachelors" id="bachelors" value="<?php echo $bachelors != "" ? $bachelors : ""; ?>">
                        <input type="text" class="field field4 internship" placeholder="internship" name="internship" id="internship" value="<?php echo $internship != "" ? $internship : ""; ?>">
                        <input type="text" class="field field5 publication" placeholder="publication name" name="publication" id="publication" value="<?php echo $publication != "" ? $publication : ""; ?>">
                        <input type="text" class="field field6 codingprofile1" placeholder="Coding Profile - 1" name="codingprofile1" id="codingprofile1" value="<?php echo $codingprofile1 != "" ? $codingprofile1 : ""; ?>">
                        <input type="text" class="field field7 codingprofile2" placeholder="Coding Profile - 2" name="codingprofile2" id="codingprofile2" value="<?php echo $codingprofile2 != "" ? $codingprofile2 : ""; ?>">
                        <input type="text" class="field field8 skill1" placeholder="Skill-1" name="skill1" id="skill1" value="<?php echo $skill1 != "" ? $skill1 : ""; ?>">
                        <input type="text" class="field field9 skill2" placeholder="Skill-2" name="skill2" id="skill2" value="<?php echo $skill2 != "" ? $skill2 : ""; ?>">
                        <input type="text" class="field field10 prog_language" placeholder="Programming Language" name="prog_language" id="prog_language" value="<?php echo $prog_language != "" ? $prog_language : ""; ?>">
                    </div>
                    <div class="column">
                        <input type="text" class="field field1 voluntary_activities" placeholder="Voluntary Activities" name="voluntary_activities" id="voluntary_activities" value="<?php echo $voluntary_activities != "" ? $voluntary_activities : ""; ?>">
                        <input type="text" class="field field2 responsibilities" placeholder="Responsibilities" name="responsibilities" id="responsibilities" value="<?php echo $responsibilities != "" ? $responsibilities : ""; ?>">
                        <input type="text" class="field field3 language" placeholder="Speaking Language" name="language" id="language" value="<?php echo $language != "" ? $language : ""; ?>">
                        <input type="text" class="field field4 accomplishment" placeholder="Accomplishment" name="accomplishment" id="accomplishment" value="<?php echo $accomplishment != "" ? $accomplishment : ""; ?>">
                        <input type="text" class="field field5 certification" placeholder="Certification" name="certification" id="certification" value="<?php echo $certification != "" ? $certification : ""; ?>">
                        <input type="text" class="field field6 portfolio_link" placeholder="Portfolio link" name="portfolio" id="portfolio" value="<?php echo $portfolio != "" ? $portfolio : ""; ?>">
                        <input type="text" class="field field7 linkedin_profile" placeholder="Linkedin profile link" name="linkedin" id="linkedin" value="<?php echo $linkedin != "" ? $linkedin : ""; ?>">
                        <input type="text" class="field field8 project-name1" placeholder="Project name 1" name="project1" id="project1" value="<?php echo $project1 != "" ? $project1 : ""; ?>">
                        <input type="text" class="field field9 project-name2" placeholder="Project name 2" name="project2" id="project2" value="<?php echo $project2 != "" ? $project2 : ""; ?>">
                        <input type="text" class="field field10 hobby" placeholder="Hobby (Ex. Writing Blogs)" name="hobby" id="hobby" value="<?php echo $hobby != "" ? $hobby : ""; ?>">
                    </div>
                </div>

                <div class="bottom">
                    <input type="text" class="field username" placeholder="username" name="username" id="username" value="<?php echo $username != "" ? $username : "Ex: 19881A05AB"; ?>" required>
                    <input type="password" class="field password" placeholder="password" name="password" id="password" required>
                    <input type="submit" class="submit-btn" name="submit" value="submit">
                    <label for="ps" class="ps-label">Profile Strength : </label>
                    <input type="text" class="field profile_strength" name="ps" id="ps" placeholder="0%" value="<?php echo $ps != "" ? $ps."%" : "0%"; ?>">
                </div>
            </form>

       </div>
    </body>
   
</html>