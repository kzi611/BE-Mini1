<html>
<head>
	<title>Add Data</title>
	<echo"Submited">;
</head>
<body>
    <?php
        include_once("config.php");

        if(isset($_POST['Submit'])) {    
            $name = $_POST['name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
                
            if(empty($name) || empty($age) || empty($email)) {
                if(empty($name)) {
                    echo "<span style=\"color: red;\">Name field is empty.</span><br/>";
                }
                if(empty($age)) {
                    echo "<span style=\"color: red;\">Age field is empty.</span><br/>";
                }
                if(empty($email)) {
                    echo "<span style=\"color: red;\">Email field is empty.</span><br/>";
                }
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            } else { 
                $sql = "INSERT INTO users(name, age, email) VALUES(:name, :age, :email)";
                $query = $dbConn->prepare($sql);
                $query->bindparam(':name', $name);
                $query->bindparam(':age', $age);
                $query->bindparam(':email', $email);
                $success = $query->execute();
                
                if($success) {
                    echo "<font color='green'>Data added successfully.</font>";
                    echo "<br/><a href='index.php'>View Result</a>";
                    echo "<p>Submitted</p>";
                } else {
                    echo "<font color='red'>Error adding data.</font>";
                }
            }
        }
    ?>
</body>
</html>