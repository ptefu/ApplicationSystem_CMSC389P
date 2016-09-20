<!DOCTYPE html>

<html>
<head>
    <title>Submit Application Form</title>
</head>

<body>
    <form action="submitApplicationProcess.php" method="post">
        <strong>Name:</strong><input type="text" name="name" required/>
        <br><br>
        <strong>Email:</strong><input type="email" name="email" required/>
        <br><br>
        <strong>GPA:</strong><input type="number" name="gpa" step="0.1" max="4.0" min="0.0" required/>
        <br><br>
        <strong>Year:</strong>
            <input type='radio' name="yearRadio" value='10'>10</td>
            <input type='radio' name="yearRadio" value='11'>11</td>
            <input type='radio' name="yearRadio" value='12'>12</td>
        <br><br>
        <strong>Gender:</strong>
            <input type='radio' name="genderRadio" value='M'>M</td>
            <input type='radio' name="genderRadio" value='F'>F</td>
        <br><br>
        <strong>Password:</strong> <input type='password' name="password" required>
        <br><br>
        <strong>Verify Password:</strong> <input type='password' name="verifyPassword" required>
                
        <br><br>
        <input type="submit" value="Submit Data" name="submitDataButton">     
    </form>
    
    <br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    <form>

</body>
</html>