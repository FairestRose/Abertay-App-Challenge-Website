<?php
include_once "includes/connectionString.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    try {
        $studentNumber = sanitizeStudentNumber($_POST['studentNumber']);
        $email = validateEmail($_POST['email']);
        $password = validatePassword($_POST['password']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Corrected function

      
        insertUser($conn, $studentNumber, $email, $hashedPassword);
        header("Location: login.php");
        exit();


    } catch (Exception $e) {
        header("Location: register.php?error=" . urlencode($e->getMessage()));
        exit();
    } finally {
        $conn->close();
    }
}

//-----------------
function sanitizeStudentNumber($studentNumber)
 {
    $studentNumber = filter_var($studentNumber, FILTER_SANITIZE_NUMBER_INT);
    if (empty($studentNumber) || !preg_match('/^\d+$/', $studentNumber)) {
        throw new Exception("Invalid student number.");
    }
    return $studentNumber;
}

//-------------------------------
function validateEmail($email) 
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address.");
    }
    return $email;
}

//----------------
function validatePassword($password) 
{
    if (strlen($password) < 8 ||
        !preg_match('/[A-Za-z]/', $password) ||
        !preg_match('/\d/', $password)) {
        throw new Exception("Password must be at least 8 characters long and contain both letters and numbers.");
    }
    return $password;
}

//---------------------
function insertUser($conn, $studentNumber, $email, $hashedPassword) {
    $sql = "INSERT INTO user_database (studentNumber, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Database error: " . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
    }
    $stmt->bind_param("sss", $studentNumber, $email, $hashedPassword);
    if (!$stmt->execute()) {
        throw new Exception("Registration failed: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8'));
    }
    $stmt->close();
}
?>