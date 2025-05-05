<?php
// Enable full error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include_once ('includes/connectionString.php');

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // Start the session to access user email

    // Get user email from session
    $email = $_SESSION["email"];

    // Sanitize input values
    $feedback_reason = $conn->real_escape_string($_POST['feedbackR']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    // Default admin response for new feedback
    $admin_response = "Pending admin response";

    // Check if feedback is empty or just whitespace
    if (trim($feedback) === '') {
        header('Location: feedback.php?status=empty'); // Redirect with error
        exit();
    }

    // Check if feedback exceeds character limit
    if (strlen($feedback) > 225) {
        echo "Feedback exceeds the 225 character limit.";
        exit();
    }

    // SQL to insert feedback into the database
    $sql = "INSERT INTO feedback_table (email, feedback_reason, user_feedback, admin_response) 
            VALUES ('$email', '$feedback_reason', '$feedback', '$admin_response')";

    // Execute query and handle result
    if (mysqli_query($conn, $sql)) {
        header('Location: feedback.php?status=success'); // Redirect on success
        exit();
    } else {
        // Output SQL error if query fails
        echo "ERROR: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
