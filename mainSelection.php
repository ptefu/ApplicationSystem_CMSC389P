<!DOCTYPE html>

<html>
<head>
    <title>Application System Main Page</title>
</head>

<body>
    <img src="umdLogo.gif" alt="Umd Logo" style="width:200px;height:40px;">
    <hr style="height:2px; border:none;color:#333;background-color:grey;">
    <img src="testudo.jpg" alt="Testudo" style="width:100px;height:150px;float:left;">
    <h1>&nbsp&nbsp Welcome to the UMCP</h1>
    <h1>&nbsp&nbsp Application System</h1>
    
    <br><br>
    <form action="submitApplicationForm.php" method="post" style="float:left;">
        <input type="submit" value="Submit Application" name="submitApplicationButton">
    </form>
    
    <form action="reviewApplicationRetrievalForm.php" method="post" style="float:left;">
        &nbsp;
        <input type="submit" value="Review Application" name="reviewApplicationButton">
    </form>
    
    <form action="updateApplicationRetrievalForm.php" method="post" style="float:left;">
        &nbsp;
        <input type="submit" value="Update Application" name="updateApplicationButton">
    </form>
    
    <form action="mainSelection.php" method="post" style="float:left;">
        &nbsp;
        <input type="submit" value="Administrative" name="administrativeButton">
    </form>
    
    <br><br>
    <hr style="height:2px; border:none;color:#333;background-color:grey;">
    <p>If you have any question about our program, please contact the system administrator at <a href="mailto:joseph_wu15@yahoo.com">joseph_wu15@yahoo.com</a></p>
    
    <!--self referencing script for administrative login-->
    <?php
        $user = crypt('main','');
        $password = crypt("terps",'');
        
        if (isset($_POST["administrativeButton"])) {
            if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
                hash_equals($user, crypt($_SERVER['PHP_AUTH_USER'], $user)) && hash_equals($password, crypt($_SERVER['PHP_AUTH_PW'], $password))){
                header("Location: administrativeForm.php");
            } else {
                header("WWW-Authenticate: Basic realm=\"Example System\"");
                header("HTTP/1.0 401 Unauthorized");
                exit;
            }
        }
    ?>
</body>
</html>
