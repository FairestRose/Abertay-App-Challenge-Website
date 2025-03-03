<!--<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="challengeChoosing.php">Challenge's Home</a></li>
    <li><a href="contactUs.php">Contact Us</a></li>
    <li><a href="feedback.php">Feedback</a></li> -->

    <!--only show if user is not signed in-->
   <!-- <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li> -->

    <!--only show if authenticated user is signed in-->
    <!--<li><a href="userProfile.php">User Profile</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>--> 




<nav class = "navbar navbar-expand-sm navbar-dark justify-content-center">
    <div class = "container-fluid">
    <a class="navbar-brand" href="index.php"><img src="/~group24eh11/ByteClub/images/AbertayLogo.png" height="50px" width="200px" alt="logo"></a>
    
    <!-- the correct format for using pictures on filezilla-->
    <!--<a class="navbar-brand" href="index.php"><img src="/~group24eh11/ByteClub/images/AbertayLogo.png" height="50px" width="200px" alt="logo"></a>-->
        <ul class = "navbar-nav mx-auto">
            <button class = "navbar-toggler" type = "btn" data-bs-toggle="collapse" data-bs-target = "toggleNavbar">
                <span class = "navbar-toggler-icon"></span>
            </button>
            <div class = "collapse navbar-collapse" id = "toggleNavbar">
            
                
            <li class = "nav-item"><a class = "nav-link" href="index.php">Home</a></li>
            <li class = "nav-item"><a class = "nav-link" href="challengeChoosing.php">Challenge's Home</a></li>
            <li class = "nav-item"><a class = "nav-link" href="contactUs.php">Contact Us</a></li>
            <li class = "nav-item"><a class = "nav-link" href="feedback.php">Feedback Form</a></li>


                
                
            <?php session_start(); ?>


                <!-- only needed for after logging in -->
                <?php
                    if(isset($_SESSION["userName"])){
                        // <!--only show if authenticated user is signed in-->
                       echo "<li class = 'nav-item'><a class = 'nav-link' href='userProfile.php'>User Profile</a></li>";
                        echo "<li class = 'nav-item'><a class = 'nav-link' href='logout.php'>Logout</a></li>";
                        
                    }
                    else{
                        //<!--only show if user is not signed in-->
                        echo "<li class = 'nav-item'><a class = 'nav-link' href='register.php'>Register</a></li>";
                        echo "<li class = 'nav-item'><a class = 'nav-link' href='login.php'>Login</a></li>";
                    }

                ?>




            </div>
        </ul>
        
                <!-- search bar right align -->
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder="Search"     
                            name="search">
                    </form>
                </div>
    </div>
</nav>

