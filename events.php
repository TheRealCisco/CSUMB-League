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
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Events
                </h1>
            </div>
        </div>
        <!-- Event One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="images/pic.png" alt="">
                </a>
            </div>
                <div class="col-md-5">
                <h3>Event 1</h3>
                <h4>Subject</h4>
                <p>Info</p>
            </div>
        </div>
        <hr>
        <!-- Event Two -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
                <div class="col-md-5">
                <h3>Event 2</h3>
                <h4>Subject</h4>
                <p>Info</p>
            </div>
        </div>
        <hr>
        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
                <div class="col-md-5">
                <h3>Event 3</h3>
                <h4>Subject</h4>
                <p>Info</p>
            </div>
        </div>
        <hr>
        <!-- Event Four -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
             <div class="col-md-5">
                <h3>Event 4</h3>
                <h4>Subject</h4>
                <p>Info</p>
            </div>
        </div>
        <hr>
        <!-- Event Five -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Event 5</h3>
                <h4>Subject</h4>
                <p>Info</p>
            </div>
        </div>
    </div>


</body>

</html>