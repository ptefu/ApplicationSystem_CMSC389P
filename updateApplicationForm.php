<!DOCTYPE html>

<html>
<head>
    <title>Update Application Form</title>
</head>

<body>
    <?php
        session_start();
        $name = $_SESSION['name']; 
        $email = $_SESSION['email'];
        $gpa = $_SESSION['gpa'];
        $year = $_SESSION['year'];
        $gender = $_SESSION['gender'];
        $password = $_SESSION['password'];
    ?>
    <form action="updateApplicationProcess.php" method="post">
        <strong>Name:</strong><input type="text" name="name" value="<?php echo $name;?>" required/>
        <br><br>
        <strong>Email:</strong><input type="email" name="email" value="<?php echo $email;?>" required/>
        <br><br>
        <strong>GPA:</strong><input type="number" name="gpa" step="0.1" max="4.0" min="0.0" value="<?php echo $gpa;?>" required/>
        <br><br>
        <strong>Year:</strong>
            <input type='radio' name="yearRadio" value='10' <?php if($year == 10){ echo "checked = \"checked\""; }?>>10</td>
            <input type='radio' name="yearRadio" value='11' <?php if($year == 11){ echo "checked = \"checked\""; }?>>11</td>
            <input type='radio' name="yearRadio" value='12' <?php if($year == 12){ echo "checked = \"checked\""; }?>>12</td>
        <br><br>
        <strong>Gender:</strong>
            <input type='radio' name="genderRadio" value='M' <?php if($gender == 'M'){ echo "checked = \"checked\""; }?>>M</td>
            <input type='radio' name="genderRadio" value='F' <?php if($gender == 'F'){ echo "checked = \"checked\""; }?>>F</td>
        <br><br>
        <strong>Password:</strong> <input type='password' name="password"  value="<?php echo $password;?>" required>
        <br><br>
        <strong>Verify Password:</strong> <input type='password' name="verifyPassword"  value="<?php echo $password;?>" required>
                
        <br><br>
        <input type="submit" value="Submit Data" name="submitDataButton">     
    </form>
    
    <br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    <form>

</body>
</html>