<!DOCTYPE html>

<html>
<head>
    <title>Review Application Process</title>
</head>

<body>
    <?php
        session_start();
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $gpa = $_SESSION['gpa'];
        $year = $_SESSION['year'];
        $gender = $_SESSION['gender'];
        
        echo "<h3> Application found in the databse with the following values:</h3>";
        echo "<br>";
        echo "<strong>Name:</strong> $name";
        echo "<br>";
        echo "<strong>Email:</strong> $email";
        echo "<br>";
        echo "<strong>GPA:</strong> $gpa";
        echo "<br>";
        echo "<strong>Year:</strong> $year";
        echo "<br>";
        echo "<strong>Gender:</strong> $gender";
    ?>

    <br><br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    </form>
</body>
</html>