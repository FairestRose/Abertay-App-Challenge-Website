<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Abertay Challenges - Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <nav>
        <?php include_once "includes/links.php"; ?>
    </nav>

    <div class="container mt-4">
        <h3>Registration Page</h3>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>

        <form action="processRegistration.php" method="post" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="studentNumber" class="form-label">Student Number:</label>
                <input type="number" step="1" id="studentNumber" name="studentNumber" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
            </div>
            <br>By creating an account you agree to our terms and Privacy</br>
            <p>Click here to see our <a href="gdprTable.php">Privacy and GDPR Policy</p>
            <button type="submit" class="btn btn-primary">Register</button>
           

        </form>
    </div>

<!--  ----------------------------------------------------------------------------------------------------------------------->


    <script>
        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            //password policy and making sure they match
            if (password.length < 8 || !/[A-Za-z]/.test(password) || !/\d/.test(password)) {
                alert("Password must be at least 8 characters long and contain both letters and numbers.");
                return false;
            }
           
           
            if (password !== confirmPassword) {
                alert("Passwords do not match. Please re-enter.");
                return false;
            }

            return true;
        }
    </script>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <footer class="footer text-center">
    <p class="mb-0">©Created By EH11 ByteClub</p>
</body>
</html>
