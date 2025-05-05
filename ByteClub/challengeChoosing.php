<!-- Coded by Harvey Williams -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Abertay Challenges</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <!-- Heading for the page -->
    <div class="container mt-4">
        <h1>Choosing Your Challenge</h1>
        <p>On this page you can pick between different games to improve your cyber awareness.</p>

        <!-- the announcements box -->
        <div class="row">
            <div class="col-md-4">
                <div class="announcement-box">
                    <h3>Announcements</h3>
                    <p>Stay updated with the latest news!</p>
                </div>
            </div>

            <!-- cyber quiz box -->
            <div class="col-md-8">
                <div class="game-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- link to the quiz page -->
                            <a href="cyberSecurityChallenge.php" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Cyber Quiz</h5>
                                    </div>
                                    <!-- image -->
                                    <img class="games img-fluid" src="/~group24eh11/ByteClub/images/cyber-savvy.jpg" alt="Game Image">
                                    <div class="addi-info p-2 text-center">
                                        <h6>Click to play</h6>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <!-- coding quiz box -->
                        <div class="col-sm-6">
                            <!-- link to the quiz page -->
                            <a href="codingChallenge.php" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Coding Quiz</h5>
                                    </div>
                                    <!-- image -->
                                    <img class="games img-fluid" src="/~group24eh11/ByteClub/images/coding quiz.jpg" alt="Game2 Image">
                                    <div class="addi-info p-2 text-center">
                                        <h6>Click to play</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 p-3 bg-light">
        <p>&copy; 2024 Abertay Challenges. All rights reserved.</p>
    </footer>

    <!-- jQuery & Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</footer>
</body>
</html>
