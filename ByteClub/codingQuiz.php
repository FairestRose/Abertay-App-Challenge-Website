<!doctype html>
<!-- Declare the document type as HTML5 -->

<html lang="en">
<!-- Begin HTML document with language set to English -->

<head>
    <meta charset="utf-8">
    <!-- Set the character encoding to UTF-8 for broad character support -->

    <title>Abertay Challenges</title>
    <!-- The title that appears in the browser tab -->

    <!-- Include Bootstrap CSS for responsive layout and pre-built components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous">

    <!-- Link to custom stylesheet for additional styles -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation bar is included from an external PHP file -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <!-- Main content container for the quiz app -->
    <div class="container">
        <h1>Coding Quiz</h1>

        <!-- Placeholder div where quiz questions will be injected via JavaScript -->
        <div id="quiz"></div>

        <!-- Area to display the result after quiz submission -->
        <div id="result" class="result"></div>

        <!-- Button to submit the quiz answers -->
        <button id="submit" class="button">Submit</button>

        <!-- Button to retry the quiz (initially hidden via the 'hide' class) -->
        <button id="retry" class="button hide">Retry</button>

        <!-- Button to show correct answers (also initially hidden) -->
        <button id="showAnswer" class="button hide">Show Answer</button>
    </div> 

    <!-- Link to external JavaScript that handles quiz logic and interactivity -->
    <script src="javascript/codingQuizScript.js"></script>

    <!-- Include jQuery library for DOM manipulation and AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
            crossorigin="anonymous"></script>

    <!-- Include Bootstrap JavaScript bundle for UI components like modals, alerts, etc. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

    <!-- Footer section -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
