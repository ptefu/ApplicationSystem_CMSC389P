<!DOCTYPE html>

<html>
<head>
    <title>Administrative Process</title>
</head>
<body>
    <?php
        require "globalVariables.php";
        
        $fieldsToDisplay = $_POST['fieldsToDisplay'];
        $sortField = $_POST['sortField'];
        $filterCondition = trim($_POST['filterCondition']);
        $selectString = "";
        
        /* set up the table along with setting up the select string */
        echo "<table id=\"table\" border=\"1\">";
        echo "<tr>";
        foreach($fieldsToDisplay as $field) { //string for fields to display, ex: emails,gpa,year
            $upCaseField = ucfirst($field);
            echo "<td align=\"center\"><strong>$upCaseField</strong></td>";
            $selectString .= $field.",";
        }
        echo "</tr>";
        $selectString = trim($selectString, ","); //trim comma
        if($filterCondition != "") {
            $filterCondition = "where " . $filterCondition; // add where if filter condition exists
        }
        
        $db_handle = connectToDB();
        $sqlQuery = sprintf("select %s from %s %s order by %s", $selectString, $dbTable, $filterCondition, $sortField);
        $result = mysqli_query($db_handle, $sqlQuery);
        if ($result) {
            while ($retrievedDataArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr>";
                foreach($fieldsToDisplay as $field) { // print out table
                    $val = $retrievedDataArray[$field];
                    echo "<td>$val</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }  else {
            mysqli_free_result($result);
            echo "Retrieving records failed.".mysqli_error($db_handle);
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
    <form action="mainSelection.php" method="post">
        <br>
        <input type="submit" value="Return To Main Menu" name="returnButton">
    <form>
</body>
</html>