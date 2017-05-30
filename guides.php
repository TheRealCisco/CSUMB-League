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

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Guides</h1>
                <p>input info here</p>
            </div>
        </div>
 <!-- Guides -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Guides for League</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
            <a href="https://docs.google.com/presentation/d/1zz_kpKGuuPXUcilMY_Brsaxkrm8YaXdrBV10KNJV1Q8/edit?usp=sharing">
                <img class="img-circle img-responsive img-center" src="images/lux.png" alt="">
            </a>
                <h3>
                    Lux Guide
                </h3>
            </div>
	<div class="col-lg-4 col-sm-6 text-center">
            <a href="https://docs.google.com/a/csumb.edu/presentation/d/14tEhYSKEgrXEWRjaIL7sGvm8JzceLQsgCPyxFTMQSQ8/edit?usp=sharing" > 
                <img class="img-circle img-responsive img-center" src="images/gnar.png" alt="">
            </a>
                <h3>
                    Guide 2
                </h3>
                
            </div>
	<div class="col-lg-4 col-sm-6 text-center">
            <a href="" >
                <img class="img-circle img-responsive img-center" src="http://placehold.it/400x400" alt="">
            </a>
                <h3>
                    Guide 3
                </h3>
                
            </div>
	<div class="col-lg-4 col-sm-6 text-center">
            <a href="" > 
                <img class="img-circle img-responsive img-center" src="http://placehold.it/400x400" alt="">
            </a>
                <h3>
                    Guide 4
                </h3>
                
            </div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href=""  >
                <img class="img-circle img-responsive img-center" src="http://placehold.it/400x400" alt="">
            </a>
                <h3>
                    Guide 5
                </h3>
                
            </div>
	<div class="col-lg-4 col-sm-6 text-center">
            <a href=""> 
                <img class="img-circle img-responsive img-center" src="http://placehold.it/400x400" alt="">
            </a>
                <h3>
                    Guide 6
                </h3>
                
            </div>

        <hr>

    </div>
</body>

</html>