<!-- Starts or continues a sessison across the site -->
<?php session_start();?>

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
    
    <!-- Main Heading of Page -->
    <h3>Login</h3>

    <!-- Container form using a custom CSS class -->
    <div class="container">
    <!-- Uses a HTML form for users to input their login details -->    
    <!-- Using the post method the user can input and submit their email and password to "processLogin.php" -->
        <form action="processLogin.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Submit"><br>
        </form>
    </div>

    <!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <!-- Page footer with attribution -->
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</body>
</html>