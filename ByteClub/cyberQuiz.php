<!doctype html>
<!-- Declare HTML5 document type -->

<html lang="en">
<!-- Set the language of the document to English -->

<head>
    <meta charset="utf-8">
    <!-- Set character encoding to UTF-8 -->

    <title>Abertay Challenges</title>
    <!-- Page title shown in the browser tab -->

    <!-- Bootstrap CSS for responsive layout and UI components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-..." 
          crossorigin="anonymous">

    <!-- Custom CSS styles for additional styling -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation bar (imported from a PHP include file) -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <!-- Main content container -->
    <div class="container">
        <h1>Cyber Quiz</h1>
        <!-- Container where quiz questions will be dynamically inserted -->
        <div id="quiz"></div>

        <!-- Container to show quiz results -->
        <div id="result" class="result"></div>

        <!-- Button to submit answers -->
        <button id="submit" class="button">Submit</button>

        <!-- Button to retry the quiz (initially hidden via 'hide' class) -->
        <button id="retry" class="button hide">Retry</button>

        <!-- Button to show correct answers (initially hidden) -->
        <button id="showAnswer" class="button hide">Show Answer</button>
    </div> 

    <!-- Custom JavaScript file to control quiz logic -->
    <script src="javascript/cyberQuizScript.js"></script>

    <!-- jQuery library for DOM manipulation and event handling -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
            integrity="sha256-..." 
            crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle for interactivity and components like modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-..." 
            crossorigin="anonymous"></script>

    <!-- Footer with centered text -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
