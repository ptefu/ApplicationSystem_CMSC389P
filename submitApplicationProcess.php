<!DOCTYPE html>
<html>
<head>
    <title>Submit Application Process</title>
</head>

<body>
    <div>
    <?php
        require 'globalVariables.php';
        
        class Submission {
            private $name;
            private $email;
            private $gpa;
            private $year;
            private $gender;
            private $password;
            
            public function __construct($nameIn, $emailIn, $gpaIn, $yearIn, $genderIn, $passwordIn) {
                $this->name = $nameIn;
                $this->email = $emailIn;
                $this->gpa = $gpaIn;
                $this->year = $yearIn;
                $this->gender = $genderIn;
                $this->password = crypt($passwordIn,''); //crypt
            }
            
            public function getName() { return $this->name; }
            public function getEmail() { return $this->email; }
            public function getGpa() { return $this->gpa; }
            public function getYear() { return $this->year; }
            public function getGender() { return $this->gender; }
            public function getPassword() { return $this->password; }
            
            public function outputPage() {
                echo "<h3> The following entry has been added to the database:</h3>";
                echo "<br>";
                echo "<strong>Name:</strong> $this->name";
                echo "<br>";
                echo "<strong>Email:</strong> $this->email";
                echo "<br>";
                echo "<strong>GPA:</strong> $this->gpa";
                echo "<br>";
                echo "<strong>Year:</strong> $this->year";
                echo "<br>";
                echo "<strong>Gender:</strong> $this->gender";
            }
        }
        
        //driver
        $passwordInput = trim($_POST["password"]);
        $verifyPasswordInput = trim($_POST["verifyPassword"]);
            
        if ($passwordInput != $verifyPasswordInput) {
            header("Location: badPasswordVerification.php");
        } else {
            //get var from form post
            $submission = new Submission(trim($_POST['name']), trim($_POST['email']), trim($_POST['gpa']), trim($_POST['yearRadio']), trim($_POST['genderRadio']), trim($_POST["password"]));
            
            //set up connection to sql and insert to db
            $db_handle = connectToDB();
            $sqlQuery = sprintf("insert into $dbTable(name,email,gpa,year,gender,password) values ('%s', '%s', %s, %s, '%s', '%s')", 
				$submission->getName(), $submission->getEmail(), $submission->getGpa(), $submission->getYear(), $submission->getGender(), $submission->getPassword());
            $result = mysqli_query($db_handle, $sqlQuery);
            if ($result) {
                $submission->outputPage();
            } else { 				   
                echo "Inserting records failed.".mysqli_error($db_handle);
            }
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
    </div>
    <br>
    <form action="mainSelection.php" method="post">
        <input type="submit" value="Return To Main Menu" name="returnButton">
    </form>
</body>
</html>