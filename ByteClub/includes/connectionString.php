<?php

/*
	connection to group database for eh11 - Byte Club project 
	
*/

//connection details
$servername = "lochnagar.abertay.ac.uk";
$dbusername = "sqlgroup24eh11";
$dbpassword = "makes-view-fleece-bool";
$dbname = "sqlgroup24eh11";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
	die("Connection Failure: " . $conn->connect_error);
}

//mysqli_close($conn);

?>