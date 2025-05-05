<!doctype html>
<!-- Declares the document type as HTML5 -->

<html lang="en">
<!-- Sets the language of the document to English -->

<head>
    <meta charset="utf-8">
    <!-- Sets character encoding for proper handling of special characters -->

    <title>Abertay Challenges</title>
    <!-- The title of the web page (displayed in the browser tab) -->

    <!-- Link to Bootstrap CSS for responsive layout and pre-built styling components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-..." 
          crossorigin="anonymous">

    <!-- Link to tylesheet for additional styles -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Link to JavaScript functionality -->
    <script src="javascript/script.js"></script>
</head>

<body>
    <!-- Navigation bar, dynamically included using PHP -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <!-- Main heading of the page -->
    <h3>Abertay Challenge's</h3>

    <!-- Image container using a custom CSS class (e.g., for layout or positioning) -->
    <div class="container1">
        <img src="/~group24eh11/ByteClub/images/abertaypic3.jpg" 
             alt="abertay university" 
             class="center" 
             style="width:500px;height:300px;">
    </div>

    <!-- Paragraph describing Abertay University -->
    <p class="text-center">
        Abertay University is a modern university located in the heart of Dundee, Scotland. 
        It is known for its focus on teaching and preparing graduates for the professional world. <br>
        Abertay has a long history, dating back to 1888, and has evolved to meet the needs of various industries 
        by providing talented graduates across a range of sectors. 
        The University is recognized as one of the UK's leading tech universities and is known for its expertise in 
        video games education, with its degrees in this field having been ranked number one in Europe 
        for the last seven consecutive years.
    </p>

    <!-- Paragraph describing the Abertay Challenges initiative -->
    <p class="text-center">
        Abertay Challenges will have a series of challenges that will be updated daily, 
        including coding challenges and cybersecurity questions. The goal is to increase your confidence 
        and engagement with your learning. You will be able to see where you stand on the leaderboard 
        each day and have the possibility of winning badges as you climb the ranks.
    </p>

    <!-- jQuery library for DOM manipulation and AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
            integrity="sha256-..." 
            crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript for interactive components like modals, dropdowns, etc. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-..." 
            crossorigin="anonymous"></script>

    <!-- Page footer with attribution -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
