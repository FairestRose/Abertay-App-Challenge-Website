<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Abertay Challenges</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="javascript/script.js"></script>
    
</head>
<body>
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <h3>Feedback Form</h3>


    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-banner" style="position: fixed; top: 90px; left: 50%; transform: translateX(-50%); width: auto; z-index: 1050;">
            Feedback response submitted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            // Set a timeout to hide the banner after 3 seconds
            setTimeout(function() {
                const banner = document.getElementById('success-banner');
                if (banner) {
                    banner.classList.remove('show');  // Hide the banner
                }
            }, 3000); // 3000 ms = 3 seconds
        </script>

    <?php endif; ?>




    <div class="container">
        <form action="processFeedback.php" method="post">
            <label for="fname">Name</label>
            <input type="text" id="fname" name="fname" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="feedbackR">Feedback Reason</label>
            <select id="feedbackR" name="feedbackR">
                <option value="Issue with website">Issue with website</option>
                <option value="General comment">General Comment</option>
                <option value="Other feedback">Other Feedback</option>
            </select>

            <label for="feedback">Feedback</label>
            <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:200px"></textarea>
            

            <input type="submit" value="Submit">

         </form>
    </div> 



    <!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>

</body>
</html>