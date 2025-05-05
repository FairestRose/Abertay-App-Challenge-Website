<?php 
session_start();
include_once('includes/connectionString.php');

// Check if the email is set in the session
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];  // Retrieve the email from session
    $score = $_POST['score'];  // Assume the score is passed via POST
    $quiz_name = $_POST["pleaseWork"];  // Retrieve quiz_name from POST data
    $date_attempted = date('Y-m-d H:i:s');  // Get the current date and time for when the quiz was attempted
    $quiz_name = "Coding Quiz";

    // Debugging - check what data is coming in
    echo "<pre>";
    print_r($_POST);  // Print the POST data for debugging
    echo "</pre>";

    if (empty($quiz_name)) {
        echo "Quiz name is missing or empty in POST data.";
    } else {
        echo "Quiz Name: " . $quiz_name;
    }

    // Prepare SQL query to insert the score into the user_scores table
    $sql = "INSERT INTO user_scores (email, score, quiz_name, date_attempted) VALUES (?, ?, ?, ?)";

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL statement
        $stmt->bind_param("siss", $email, $score, $quiz_name, $date_attempted);  // "s" for string (email, quiz_name), "i" for integer (score), "s" for string (date_attempted)

        // Execute the query
        if ($stmt->execute()) {
            echo "Score saved successfully!";
        } else {
            echo "Error: Could not execute query.";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: Could not prepare statement.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: No email found in session.";
}

?>