<?php
    include 'includes/dbConn.php';
    include 'includes/functions.php';
    if(isset($_POST['signupForm'])) {
        createUser();
    }
    
    if(isset($_POST['loginForm'])){
        loginUser();
    }
?>

<html>
    <head>
        <title>League of Legends</title>
        <link rel="stylesheet" href="includes/style.css" type="text/css" />
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
        function confirmForm() {
            if($("#firstName").val() == "") {
               $("#error").html("Not all fields are set!");
               return false; 
            }
            else if($("#lastName").val() == "") {
                $("#error").html("Not all fields are set!");
                return false;
            }
            if($("#userName").val() == "") {
                $("#error").html("Not all fields are set!");
                return false;
            }
            if($("#summonerName").val() == "") {
                $("#error").html("Not all fields are set!");
                return false;
            }
            if($("#email").val() == "") {
                $("#error").html("Not all fields are set!");
                return false;
            }
            if($("#password").val() == "") {
                $("#error").html("Not all fields are set!");
                return false;
            }
            
            return true;
        }
    </script>
    <body>
        <h1>CSUMB League of Legends Club</h1> <br>
        
        <form method="POST">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="loginForm" onclick='loginUser()'>LOGIN</button>
        </form> 

        <br><br><br>
        
        <form onsubmit="return confirmForm()" method="POST">
            <input type="text" name="first" id="firstName" placeholder="First Name"><br>
            <input type="text" name="last" id="lastName" placeholder="Last Name"><br>
            <input type="text" name="username" id="username" placeholder="Username"><br>
            <input type="text" name="summonername" id="summonerName" placeholder="Summoner Name"><br>
            <input type="text" name="email" id="email" placeholder="Email"><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <button type="submit" name="signupForm" >SIGN UP</button>
        </form>
        <strong id="error"></strong>
        

    </body>
</html>