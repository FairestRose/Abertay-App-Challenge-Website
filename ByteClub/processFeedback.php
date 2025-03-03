<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ('includes/connectionString.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $email = $conn->real_escape_string($_POST['email']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $feedback_reason = $conn->real_escape_string($_POST['feedbackR']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    $sql = "INSERT INTO feedback_table (email, name, feedback_reason, user_feedback) VALUES ('$email', '$fname', '$feedback_reason', '$feedback')";

    if (mysqli_query($conn, $sql)) 
    {
        header('Location: feedback.php?status=success');
        exit();

    } else{
        echo "ERROR:" . $sql . "<br>" . mysqli_error($conn);

    }


}

mysqli_close($conn);
?>