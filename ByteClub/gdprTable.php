<?php session_start(); ?>
<!-- Starts a PHP session to track user data across pages -->

<!doctype html>
<!-- Declares the HTML document type -->

<html lang="en">
<!-- Sets the document language to English -->

<head>
    <meta charset="utf-8">
    <!-- Specifies character encoding for the document -->

    <title>GDPR Table</title>
    <!-- Page title for the GDPR Table page -->

    <!-- Link to custom CSS for page styling -->
    <link rel="stylesheet" href="css/style.css">

    <title>Abertay Challenges</title>
    

    <!-- Bootstrap CSS for responsive layout and styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- Link to external JavaScript file -->
    <script src="javascript/script.js"></script>

    <!-- PHP include for the navigation menu -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>
    
</head>

<body>

<!-- Main heading -->
<h3>Abertay Challenge's Privacy Policy</h3>
    <!-- Image at the top of the page -->
    <img src="images/privacyseal.png" alt="blank person image" class="center">

    <!-- Table containing GDPR/privacy-related information -->
    <table>
        <thead>
            <tr>
                <th class="reqCol">Requirement</th>
                <th class="infoCol">Info</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Specify Data Being Collected</td>
                <td>
                    If you want to sign up for any of the services on this website, we may keep personal information about you. <br>
                    This may include your name, date of birth, email address, home address and a phone/mobile number.
                </td>
            </tr>

            <tr>
                <td>Justification For Data Collection</td>
                <td>
                    The reason we are going to be collecting your data is to provide better services to you, and also to offer you better adverts from 3rd parties.
                    Opt in here
                </td>
            </tr>

            <tr>
                <td>How Data Will Be Processed</td>
                <td>
                    We will use your data to send information to the university about student engagement as well as to manage your account.<br>
                    If you agree, we will also share your data with our partners so they may offer you their products and services.
                    Opt in here.
                </td>
            </tr>

            <tr>
                <td>How Long Data Will Be Retained</td>
                <td>Your data will be removed if your account has been inactive for a year.</td>
            </tr>

            <tr>
                <td>Who Can Be Contacted to Have Data Removed or Produced</td>
                <td>
                    We will store your data safely and securely. If we do lose your data, we will be fined by the Information Commissioner.<br>
                    If you would like to exercise your data protection rights or want to withdraw your data from our services, please do not hesitate to contact us.
                </td>
            </tr>
        </tbody>
    </table>

    <!-- jQuery library for DOM manipulation and AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-..." crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <!-- Page footer -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
