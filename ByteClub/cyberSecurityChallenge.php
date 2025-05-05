<!-- Coded by Harvey Williams -->

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Abertay Challenges</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="javascript/script.js"></script>
</head>
<body>
    <!-- the Navbar -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <!-- quiz title -->
    <div class="container text-center mt-4">
        <h1>Cyber Quiz</h1>
        <p class="lead">Please read the instructions carefully before starting.</p>
    </div>

    <!-- instructions -->
    <div class="bg-light py-5 px-4 w-100">
        <div class="container">
            <p>
                Once the quiz has started, it cannot be paused or stopped. Make sure you’re ready before continuing.
            </p>
            <h4>Instructions:</h4>
            <ul>
                <li>The quiz contains multiple choice questions.</li>
                <li>You must select an answer before proceeding.</li>
                <li>There is no time limit.</li>
            </ul>
        </div>
    </div>


            <!-- Start quiz button -->
            <div class="text-center mt-4">
                <a href="cyberQuiz.php" class="btn btn-success btn-lg">Start Quiz</a>
            </div>
        </div>
    </div>



    <!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</footer>
<div style="height: 100px;"></div>
</body>
</html>