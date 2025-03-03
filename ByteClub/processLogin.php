<?php
    $servername = "lochnagar.abertay.ac.uk";
    $dbusername = "sqlgroup24eh11";
    $dbpassword = "makes-view-fleece-bool";
    $dbname = "sqlgroup24eh11";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['userName'];
        $password = $_POST['password'];
    
        $sql = $conn->prepare("SELECT name, password FROM user_database WHERE name = ?");
        $sql->bind_param("s", $name);
        $sql->execute();
        $result = $sql->get_result();

        session_start();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            mysqli_close($conn);
            $_SESSION["userName"] = yes;
            header("Location: userProfile.php");
        } else {
            mysqli_close($conn);
            header("Location: login.php");
        }
    }
?>