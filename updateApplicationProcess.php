<html>
<head>
    <title>Update Application Process</title>
</head>

<body>
    <?php
        session_start();
        
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $gpa = $_POST['gpa'];
        $year = $_POST['yearRadio'];
        $gender = trim($_POST['genderRadio']);
        $password = trim($_POST['password']);
        $verifyPassword = trim($_POST['verifyPassword']);
        
        if ($password != $verifyPassword) {
            header("Location: badPasswordVerification.php");
            exit();
        } 
        require "globalVariables.php";
        $db_handle = connectToDB();
        $sqlQuery = sprintf("update $dbTable set name='%s', email='%s', gpa=%s, year=%s, gender='%s', password='%s' where email='%s'", $name, $email, $gpa, $year, $gender, crypt($password, ''), $_SESSION['email']);
        $result = mysqli_query($db_handle, $sqlQuery);
        if ($result) {
            echo "<h3>The entry has been updated in the database and the new values are:</h3>";
            echo "<strong>Name:</strong> $name";
            echo "<br>";
            echo "<strong>Email:</strong> $email";
            echo "<br>";
            echo "<strong>GPA:</strong> $gpa";
            echo "<br>";
            echo "<strong>Year:</strong> $year";
            echo "<br>";
            echo "<strong>Gender:</strong> $gender";
            mysqli_close($db_handle);
        } else {
            echo "Inserting records failed.".mysqli_error($db_handle);
            mysqli_close($db_handle);
        }
        
        function connectToDB() {
            require 'globalVariables.php';
            $db_handle = mysqli_connect($host, $dbUser, $dbPassword, $dbName);
            if (mysqli_connect_errno()) {
                echo "Connect failed.\n".mysqli_connect_error();
                exit();
            }
            return $db_handle;
        }
    ?>
    <br><br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    <form>
</body>
</html>