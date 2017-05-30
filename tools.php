<?php
    session_start();
    ob_start();
    include 'includes/header.php';
    include 'includes/dbConn.php';
    include 'includes/functions.php';
    include 'login.php';
    if(isset($_POST['signupForm'])){
        createUser();
    }
?>

     <div class="container">

        <!-- Header -->
        <header class="hero-spacer">
            <h1>Helpful Tools</h1>
            <p>Here are a some helpful tools that we use to enhance our league experience</p>
        </header>

        <hr>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <a href="https://obsproject.com/" >
                    <img src="images/obs-logo.png" alt="">
                </a>    
                    <div class="caption">
                        <h3>OBS</h3>
                        <p>Recording and Streaming Software</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <a href=" https://gyazo.com/en">
                    <img src="images/gyazo.png" alt="">
                </a>
                    <div class="caption">
                        <h3>Gyazo</h3>
                        <p>Makes easily shareable Gif's and Images </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <a href="https://discord.gg/AAq5UuW ">    
                    <img src="images/discord.jpg" alt="">
                </a>
                    <div class="caption">
                        <h3>Discord</h3>
                        <p>Voice communication app for gamers</p>
                    </div>
                </div>
            </div>
              <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <a href="http://plays.tv/download ">
                    <img src="images/plays.png" alt="">
                </a>    
                    <div class="caption">
                        <h3>Plays.TV</h3>
                        <p>Video game highlights</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
</body>

</html>