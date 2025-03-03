<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "lochnagar.abertay.ac.uk";
$dbusername = "sqlgroup24eh11";
$dbpassword = "makes-view-fleece-bool";
$dbname = "sqlgroup24eh11";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection Failure: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    
    $sql = "INSERT INTO user_database (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
