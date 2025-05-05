<?php 


ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "includes/connectionString.php";
include_once "includes/links.php"; 

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];

// Fetch user data
$userQuery = "SELECT studentNumber, email FROM user_database WHERE email = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Fetch leaderboard data
$leaderboardQuery = "SELECT email, score, quiz_name, date_attempted FROM user_scores ORDER BY score DESC LIMIT 10";
$stmt = $conn->prepare($leaderboardQuery);
$stmt->execute();
$leaderboard = $stmt->get_result();
$stmt->close();

// Fetch User Quiz Results
$resultsQuery = "SELECT score, quiz_name, date_attempted FROM user_scores WHERE email = ?";
$stmt = $conn->prepare($resultsQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultsScores = $stmt->get_result();
$stmt->close();


// Fetch feedback data
$feedbackQuery = "SELECT user_feedback, feedback_reason, admin_response FROM feedback_table  WHERE email = ?
ORDER BY feedback_reason DESC LIMIT 10";
$stmt = $conn->prepare($feedbackQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$feedback = $stmt->get_result();
$stmt->close();

//Fetch the users total score
$userScoreQuery = "SELECT SUM(score) AS user_total_score FROM user_scores WHERE email = ?";
$stmt = $conn->prepare($userScoreQuery);
$stmt->bind_param("s", $email); 
$stmt->execute();
$userResult = $stmt->get_result();
$userScore = $userResult->fetch_assoc()['user_total_score'] ?? 0;
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Profile Abertay Challenges</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<!-- Navigation Bar -->
<?php include_once "includes/links.php" ?>

    <h2>Great to see you again!! <?= htmlspecialchars($_SESSION['email'] ?? 'Guest') ?>!</h2>
    
    <div class="row">
        <div class="col-md-6">

            <div class="card mt-3 p-3 bg-light">
                <h4>Your Info</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Student Number:</strong> <?= htmlspecialchars($user['studentNumber'] ?? 'N/A') ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? 'N/A') ?></li>
                </ul>
            </div>

            <!-- Total score for all challenges --> 
            <div class="card mt-3 p-3 bg-light">
                <h5 class="mb-1">Total Questions Answered Correctly</h5>
                <p class="mb-0"><strong><?= $userScore ?></strong> points</p>
            </div>
            <!-- Total score for all challenges -->
            <div class="card mt-3 p-3 bg-light">
            <h5 class="mb-1">Your Quiz History</h5>

                <div class="border p-3 bg-light" style="min-height: 150px; max-height: 300px; overflow-y: auto;">
                <ol class="list-group">
                    <?php if ($resultsScores && $resultsScores->num_rows > 0): ?>
                        <?php while ($row = $resultsScores->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Quiz:</strong> <?= htmlspecialchars($row['quiz_name']) ?><br>
                                    <strong>Date:</strong> <?= htmlspecialchars($row['date_attempted']) ?>
                                    <strong>Score:</strong> <strong><?= htmlspecialchars($row['score']) ?></strong><strong>/10</strong><br>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>            
                        <!-- No quiz results available -->
                        <li class="list-group-item">No leaderboard data available.</li>
                    <?php endif; ?>
                </ol>
                </div>
                
            </div>
 <!-- Feedback Section -->
            <div class="card mt-3 p-3 bg-light">
            <h5 class="mb-1">Thank you for the feedback, an admin will reply soon.</h5>
                <div class="border p-3 bg-light" style="min-height: 150px; max-height: 300px; overflow-y: auto;">
                    <?php if ($feedback && $feedback->num_rows > 0): ?>
                        <?php while ($row = $feedback->fetch_assoc()): ?>
                            <p><strong>You:</strong> <?= htmlspecialchars($row['user_feedback']) ?> <br>
                            <strong>Reason:</strong> <?= htmlspecialchars($row['feedback_reason']) ?></p>
                            <p><strong>Admin:</strong> <?= htmlspecialchars($row['admin_response'] ?? "<em>No response yet</em>") ?></p>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <!-- No feedback available section-->
                        <p>No feedback available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<!-- Leaderboard Section -->
        <div class="col-md-6">
        <div class="card mt-3 p-3 bg-light">
            <h4>Leaderboard (Top 10)</h4>
            <ol class="list-group list-group-numbered">
                <?php if ($leaderboard && $leaderboard->num_rows > 0): ?>
                    <?php while ($row = $leaderboard->fetch_assoc()): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Email:</strong> <?= htmlspecialchars($row['email']) ?><br>
                                <strong>Quiz:</strong> <?= htmlspecialchars($row['quiz_name']) ?><br>
                                <small><strong>Date:</strong> <?= htmlspecialchars($row['date_attempted']) ?></small>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= $row['score'] ?></span>
                        </li>
                    <?php endwhile; ?>
                <?php else: ?>
                    <!-- No leaderboard data available -->
                    <li class="list-group-item">No leaderboard data available.</li>
                <?php endif; ?>
            </ol>
        </div>
        </div>

    </div>
</div>
<br></br>


    <footer class="footer text-center mt-4">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>
</html>