<!DOCTYPE html>

<html>
<head>
    <title>Review Application Retrieval Form</title>
</head>

<body>
    <form action="reviewApplicationRetrievalForm.php" method="post">
        <strong>Email associated with the application:</strong>
            <input type="text" name="emailToRetrieve" required/>
        <br><br>
        <strong>Password associated with the application:</strong>
            <input type="password" name="passwordToRetrieve" required/>
        <br><br>
        <input type="submit" value="Submit" name="submitRetrieveButton">     
    </form>

    <br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    </form>
        
    <!--self referencing script for retrieval-->
    <?php
        require "globalVariables.php";
        session_start();
        
        if (isset($_POST["submitRetrieveButton"])) {
            $db_handle = connectToDB();
            $sqlQuery = sprintf("select * from %s", $dbTable);
            $result = mysqli_query($db_handle, $sqlQuery);
            $name = ""; //var for retrieval
            $email = "";
            $gpa = "";
            $year = "";
            $gender = "";
            
            if($result) {
                while ($retrievedDataArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if($_POST['emailToRetrieve'] == $retrievedDataArray['email'] && hash_equals($retrievedDataArray['password'], crypt($_POST['passwordToRetrieve'], $retrievedDataArray['password']))/*$_POST['passwordToRetrieve'] == $retrievedDataArray['password']*/) {
                        $name = $retrievedDataArray['name'];
                        $email = $retrievedDataArray['email'];
                        $gpa = $retrievedDataArray['gpa'];
                        $year = $retrievedDataArray['year'];
                        $gender = $retrievedDataArray['gender'];
                    }
                }
                if($name == "") {
                    echo "<h1>No entry exists in the database for the specified email and password</h1>";
                } else {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['gpa'] = $gpa;
                    $_SESSION['year'] = $year;
                    $_SESSION['gender'] = $gender;
                    header("Location: reviewApplicationProcess.php");
                }
                mysqli_close($db_handle);
            } else {
                echo "Retrieving records failed.". mysqli_error($db_handle);
                mysqli_close($db_handle);
            }
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
        
</body>
</html>