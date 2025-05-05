<?php

// Destroys the current user session reseting all current session variables
// Then Sends the user to the index page and closes this one.

session_start();

$_SESSION = array();

session_destroy();

header("Location: index.php");

exit();
?>