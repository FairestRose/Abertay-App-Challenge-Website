<!doctype html>
<!-- Declares the document type and HTML version -->

<html lang="en">
<!-- Specifies the language of the document -->

<head>
    <meta charset="utf-8">
    <!-- Sets the character encoding to UTF-8 -->

    <title>Abertay Challenges</title>
    <!-- Title of the web page displayed in the browser tab -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- Font Awesome for social media icons and other icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Link to external JavaScript file -->
    <script src="javascript/script.js"></script>
</head>

<body>
    <!-- Navigation bar -->
    <nav>
        <?php include_once "includes/links.php" ?>
        <!-- Includes navigation links using PHP -->
    </nav>

    <!-- Page heading -->
    <h3>Contact Us</h3>

    <!-- Profile image had to point it directly to the mayar folder , if viewing locally need to change the file location -->
    <img src="/~group24eh11/ByteClub/images/emptyprofile.jpg" alt="male profile pic" class="center" style="width:300px;height:300px;">

    <!-- Contact information -->
    <p class="text-center">Please contact Xander Purvis via the following details :</p>
    <p class="text-center">x.purvis@abertay.ac.uk</p>
    <p class="text-center">Company : Abertay University</p>
    <p class="text-center">Department: Faculty of Design, Informatics and Business</p>
    <p class="text-center">Foundation Lecturer</p>

    

    <!-- Social media heading -->
    <p class ="text-center">Social Media Links for Abertay University:</p>

    <!-- Social Media Links with Font Awesome icons -->
    <div class="social-media-links">
        <a href="https://www.facebook.com/AbertayUni/" target="_blank">
            <i class="fab fa-facebook"></i> Facebook
        </a>
        <a href="https://x.com/AbertayUni" target="_blank">
            <i class="fab fa-X"></i> Twitter
        </a>
        <a href="https://www.instagram.com/abertayuni/" target="_blank">
            <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="https://www.linkedin.com/school/abertay-university/" target="_blank">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="https://www.twitch.tv/abertay" target="_blank">
            <i class="fab fa-twitch"></i> Twitch
        </a>
    </div>

    <!-- jQuery library for DOM manipulation and AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-..." crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript bundle for UI components like modals, carousels, etc. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <!-- Page footer -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
