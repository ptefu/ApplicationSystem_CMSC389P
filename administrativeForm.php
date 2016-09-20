<!DOCTYPE html>

<html>
<head>
    <title>Administrative Form</title>
</head>
<body>
    <h1>Applications</h1>
    <form action="administrativeProcess.php" method="post">
        <strong>Select fields to display:</strong><br>
        <select name="fieldsToDisplay[]" multiple required>
            <option value="name">name</option>
            <option value="email">email</option>
            <option value="gpa">gpa</option>
            <option value="year">year</option>
            <option value="gender">gender</option>
        </select>
        
        <br><br>
        <strong>Select field to sort applications:</strong>
        <select name="sortField">
            <option value="name">name</option>
            <option value="email">email</option>
            <option value="gpa">gpa</option>
            <option value="year">year</option>
            <option value="gender">gender</option>
        </select>
        
        <br><br>
        <strong>Filter Condition:</strong>
        <input type="text" name="filterCondition">
        
        <br><br>
        <input type="submit" value="Display Applications" name="displayApplicationsButton">
    </form>
    
    <br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    <form>
</body>
</html>