<?php

    //starts a session or continues the current one
    session_start();

    // includes the links to the database with the login details.
    include_once "includes/connectionString.php";

    // The if statement goes through if details have been posted from "login.php"
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // variables are set to be the labeled "email" and "password" that the user entered 
        $email = $_POST['email'];
        $password = $_POST['password'];

        // The code searches for a values from the "user_database" where the stored email is equal to the email entered by the user
        // The variable for email is binded to avoid SQL injection
        $sql = $conn->prepare("SELECT email, password FROM user_database WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql->bind_result($userEmail, $userPassword);
        $sql->fetch();
        $sql->close();

        // if the given password matches the hash stored in the database then the connection to the database is closed
        // session variables then set the user to "loggedIn" and the email is stored
        // the site then sends the user to "userProfile.php"
        if (password_verify($password, $userPassword)) 
        {
            mysqli_close($conn);
            $_SESSION["loggedIn"] = 'yes';
            $_SESSION["email"] = $email;
            header("Location: userProfile.php");
            exit();
        }
        // if the email the user entered doesn't match a value in the "user_database" then it's existence is checked in "admin_database"
        else
        {
            // The code searches for a values from the "admin_database" where the stored email is equal to the email entered by the user
            // The variable for email is binded to avoid SQL injection 
            $sql1 = $conn->prepare("SELECT admin_email, admin_password FROM admin_database WHERE admin_email = ?");
            $sql1->bind_param("s", $email);
            $sql1->execute();
            $sql1->bind_result($adminEmail, $adminPassword);
            $sql1->fetch();
            $sql1->close();

            // if there is the existence of an admin password
            if ($adminPassword) 
            {
                // Case 1: Password is already hashed
                if (password_verify($password, $adminPassword)) 
                {
                // if the given password matches the hash stored in the database then the connection to the database is closed
                // session variables then set the user to "isAdmin" and the email is stored
                // the site then sends the user to "adminDashboard.php"
                    mysqli_close($conn);
                    $_SESSION["email"] = $email;
                    $_SESSION["isAdmin"] = true;
                    header("Location: adminDashboard.php");
                    exit();
                }

                // Case 2: Password is stored in plaintext and matches the entered user password
                else if ($password === $adminPassword) 
                {
                    // Hash the plaintext password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Update the database with the new hashed password
                    $update = $conn->prepare("UPDATE admin_database SET admin_password = ? WHERE admin_email = ?");
                    $update->bind_param("ss", $hashedPassword, $email);
                    $update->execute();
                    $update->close();

                    // connection to the database is closed
                    // session variables then set the user to "isAdmin" and the email is stored
                    // the site then sends the user to "adminDashboard.php"
                    mysqli_close($conn);
                    $_SESSION["email"] = $email;
                    $_SESSION["isAdmin"] = true;
                    header("Location: adminDashboard.php");
                    exit();
                }
            }

            // If entered email and password don't match any entries in either the user or admin database
            // The connection to the database is closed and a prompt appears on the screen informing the user
            mysqli_close($conn);
            echo '<script>alert("Apologies, email and password were not found.");
            window.location.href="login.php";</script>';
        }
    }
?>
