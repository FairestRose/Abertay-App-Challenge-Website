<?php
session_start();
if (!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] !== true) {
    header("Location: login.php");
    exit();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Feedback response</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <?php include_once "includes/adminLinks.php"; ?>

    <div class="d-flex justify-content-start align-items-start p-4">
        <div class="table-responsive">
            <h1 class="mb-4">Feedback response</h1>
            <?php
            include_once "includes/connectionString.php";

            // Handle admin response submission
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['feedback_reason'], $_POST['admin_response'])) {
                $email = $_POST['email'];
                $feedback_reason = $_POST['feedback_reason'];
                $admin_response = trim($_POST['admin_response']);

                $stmt = $conn->prepare("UPDATE `feedback_table` SET `admin_response` = ? WHERE `email` = ? AND `feedback_reason` = ?");
                $stmt->bind_param("sss", $admin_response, $email, $feedback_reason);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Response added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error adding response.</div>";
                }

                $stmt->close();
            }

            // Show feedback data with admin response form
            $sql = "SELECT `email`, `feedback_reason`, `user_feedback`, `admin_response` FROM `feedback_table`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered'>";
                echo "<tr><th>Email</th><th>Feedback Reason</th><th>User Feedback</th><th>Admin Response</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['feedback_reason']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['user_feedback']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['admin_response'] ?? 'No response yet') . "</td>";
                    echo "<td>
                            <form method='post'>
                                <input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>
                                <input type='hidden' name='feedback_reason' value='" . htmlspecialchars($row['feedback_reason']) . "'>
                                <textarea name='admin_response' class='form-control' required>" . htmlspecialchars($row['admin_response']) . "</textarea>
                                <button type='submit' class='btn btn-primary btn-sm mt-2'>Respond</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No feedback available.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</footer>
</body>
</html>
