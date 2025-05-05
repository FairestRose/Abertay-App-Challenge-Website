<?php
session_start();
if (!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] !== true) {
    header("Location: login.php");
    exit();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Abertay Challenges - Admin profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <?php include_once "includes/adminLinks.php"; ?>
    <?php include_once "includes/connectionString.php"; ?>

    

    <div class="container mt-5">
        <h1 class="mb-4">Admin dashboard</h1>
        
        <div class="row">
            <!-- Admin Profile -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <?php
                        // Check database connection
                        if (!$conn) {
                            die("<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>");
                        }

                        // Default admin email in case no data is found
                        $admin_email = "admin@example.com";

                        // Fetch admin email from the database
                        $sql = "SELECT `admin_email` FROM `admin_database`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $admin = $result->fetch_assoc();
                            $admin_email = htmlspecialchars($admin['admin_email']);
                        }

                        $conn->close();
                        ?>

                        <p class="card-title"><strong>Admin Email:</strong></p>
                        <p class="text-muted"><?php echo $admin_email; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Newsletter Submission -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Newsletter sendout</h5>
                        <form action="uploadNewsletter.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="newsletterFile" class="form-label">Upload newsletter (PNG only)</label>
                                <input type="file" class="form-control" id="newsletterFile" name="newsletterFile" accept="image/png" required>
                            </div>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>

                <!-- Placeholder Section -->
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Placeholder</h5>
                        <p>Use this dashboard to stay updated with recent activity and manage the website efficiently.</p>
                        <img src="images/dashboard-placeholder.png" class="img-fluid" alt="Dashboard Placeholder">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <footer class="footer text-center">
        <p class="mb-0">© Created By EH11 ByteClub</p>
    </footer>
</body>
</html>
