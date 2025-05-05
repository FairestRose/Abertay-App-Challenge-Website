<!doctype html>
<html lang="en">
<head>
    <!-- Meta and title -->
    <meta charset="utf-8">
    <title>Abertay Challenges</title>

    <!-- Bootstrap CSS and custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom JavaScript -->
    <script src="javascript/script.js"></script>
</head>
<body>

    <!-- Navigation bar -->
    <nav>
        <?php include_once "includes/links.php" ?>
    </nav>

    <h3>Feedback Form</h3>

    <!-- Success alert -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-banner" style="position: fixed; top: 90px; left: 50%; transform: translateX(-50%); width: auto; z-index: 1050;">
            Feedback response submitted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            // Hide success banner after 3 seconds
            setTimeout(function() {
                const banner = document.getElementById('success-banner');
                if (banner) {
                    banner.classList.remove('show');
                }
            }, 3000);
        </script>

    <!-- Empty feedback error alert -->
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'empty'): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-banner" style="position: fixed; top: 90px; left: 50%; transform: translateX(-50%); width: auto; z-index: 1050;">
            Feedback cannot be empty.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            // Hide error banner after 3 seconds
            setTimeout(function() {
                const banner = document.getElementById('error-banner');
                if (banner) {
                    banner.classList.remove('show');
                }
            }, 3000);
        </script>
    <?php endif; ?>

    <!-- Feedback form -->
    <div class="container">
        <form action="processFeedback.php" method="post">
            <!-- Dropdown for feedback reason -->
            <label for="feedbackR">Feedback Reason</label>
            <select id="feedbackR" name="feedbackR">
                <option value="Issue with website">Issue with website</option>
                <option value="General comment">General Comment</option>
                <option value="Other feedback">Other Feedback</option>
            </select>

            <!-- Textarea for feedback message -->
            <label for="feedback">Feedback</label>
            <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:200px" maxlength="225" required></textarea>
            <small id="charCount">0 / 225 characters</small>

            <!-- Submit button -->
            <input type="submit" value="Submit">
        </form>
    </div> 

    <script>
        // Live character counter
        const feedback = document.getElementById('feedback');
        const charCount = document.getElementById('charCount');
        const maxLength = feedback.getAttribute('maxlength');

        feedback.addEventListener('input', () => {
            const length = feedback.value.length;
            charCount.textContent = `${length} / ${maxLength} characters`;
        });
    </script>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Footer -->
    <footer class="footer text-center">
        <p class="mb-0">©Created By EH11 ByteClub</p>
    </footer>
</body>
</html>