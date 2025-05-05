<?php
session_start();
if (!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] !== true) {
    header("Location: login.php");
    exit();
}
?>



<?php
include_once('includes/connectionString.php');
$cyberTestQuery = "SELECT email, score, date_attempted FROM user_scores WHERE quiz_name = 'Cyber Quiz' ORDER BY date_attempted ASC";
$codingQuizQuery = "SELECT email, score, date_attempted FROM user_scores WHERE quiz_name = 'Coding Quiz' ORDER BY date_attempted ASC";


$cyberTestResult = $conn->query($cyberTestQuery);
$codingQuizResult = $conn->query($codingQuizQuery);


$cyberTestScores = array();
$codingQuizScores = array();

while ($row = $cyberTestResult->fetch_assoc()) {
    $cyberTestScores[] = $row;
}

while ($row = $codingQuizResult->fetch_assoc()) {
    $codingQuizScores[] = $row;
}

$conn->close();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['quizScript'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["quizScript"]["name"]);
    $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
    $allowedFileNames = ['codingQuizScript.js', 'cyberQuizScript.js'];



    if (in_array($_FILES["quizScript"]["name"], $allowedFileNames) && $fileType == 'js') {
        if (move_uploaded_file($_FILES["quizScript"]["tmp_name"], $targetFile)) {
            echo "<p class='alert alert-success'>File uploaded successfully: " . htmlspecialchars($_FILES["quizScript"]["name"]) . "</p>";
        } else {
            echo "<p class='alert alert-danger'>Error uploading file.</p>";
        }
    } else {
        echo "<p class='alert alert-danger'>Invalid file type or name. Please upload 'codingQuizScript.js' or 'cyberQuizScript.js' only.</p>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quiz Score Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
    <!-- Chart.js library REMEMBER TO REFERENCE -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once "includes/adminLinks.php"; ?> 

    <div class="container p-4">
        <h1 class="mb-4">Quiz Score Management</h1>
        <div class="d-flex justify-content-between gap-4">
            
            <!-- Cyber Test Graph -->
            <div class="graph-container">
                <h2 class="mb-3">Cyber Test Scores</h2>
                <canvas id="cyberTestChart"></canvas>
            </div>

            <!-- Coding Quiz Graph -->
            <div class="graph-container">
                <h2 class="mb-3">Coding Quiz Scores</h2>
                <canvas id="codingQuizChart"></canvas>
            </div>

        </div>

        <!-- File Upload Section -->
        <div class="mt-4">
            <h3>Upload Quiz Script</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="quizScript" class="form-label">Choose JavaScript file</label>
                    <input type="file" class="form-control" id="quizScript" name="quizScript" accept=".js">
                </div>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>

    </div>

    <script>
        const cyberTestData = <?php echo json_encode($cyberTestScores); ?>;
        const codingQuizData = <?php echo json_encode($codingQuizScores); ?>;

        const cyberTestLabels = cyberTestData.map(item => item.email + ' (' + item.date_attempted + ')');
        const cyberTestScores = cyberTestData.map(item => item.score);

        const codingQuizLabels = codingQuizData.map(item => item.email + ' (' + item.date_attempted + ')');
        const codingQuizScores = codingQuizData.map(item => item.score);

        const ctxCyberTest = document.getElementById('cyberTestChart').getContext('2d');
        new Chart(ctxCyberTest, {
            type: 'bar',
            data: {
                labels: cyberTestLabels,
                datasets: [{
                    label: 'Cyber Test Scores',
                    data: cyberTestScores,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10
                    }
                }
            }
        });

        const ctxCodingQuiz = document.getElementById('codingQuizChart').getContext('2d');
        new Chart(ctxCodingQuiz, {
            type: 'bar',
            data: {
                labels: codingQuizLabels,
                datasets: [{
                    label: 'Coding Quiz Scores',
                    data: codingQuizScores,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10
                    }
                }
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</footer>
</body>
</html>
