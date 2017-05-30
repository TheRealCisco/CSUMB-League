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
    
    if($_SESSION['username'] != "") {
        header("Location: index.php");   
    }
?>
    <script>
        $("#signupLink").addClass("active");
        
        function checkUsername() {
            if( $("#username").val() == "") {
                $("#available").html("");
                return;
            }
            $.ajax({
                type: "get",
                url: "https://league-website-cisco52096.c9users.io/checkUsername.php",
                dataType: "json",
                data: { "username": $("#username").val() },
                success: function(data,status) {
                    //alert("??");
                    if(data) {
                       //alert("username unavailable!");
                       $("#available").html(" Unavailable");
                       $("#available").css("color", "red");
                       //return false;
                    }
                    else {
                        //alert("username available");
                        $("#available").html(" Available");
                        $("#available").css("color", "green");
                    }
                  },
                  complete: function(data,status) { //optional, used for debugging purposes
                      //alert(status);
                  }
            });
        }
        
        function passwordMatch() {
            var match = $("#confirmPass").val();
            if(match == "") {
                $("#pwMatchError").html("");
                return false;
            }
            $("#pwMatchError").html("");
            if(match != $("#password").val()) {
                $("#pwMatchError").html("Password does not match");
                $("#pwMatchError").css("color", "red");
                return false;
            }
            return true;
        }
        
        function validateForm(){
            checkUsername();
            if ($("#available").html() == "" || $("#available").html() == " Unavailable"){
                $("#incomplete").html("Form is incomplete");
                $("#incomplete").css("color", "red"); 
                return false;
            }
            else if($("#firstName").val() == "") { 
                $("#incomplete").html("Form is incomplete");
                $("#incomplete").css("color", "red"); 
                return false;
            }
            else if($("#lastName").val() == "") {
                $("#incomplete").html("Form is incomplete");
                $("#incomplete").css("color", "red"); 
                return false;
            }
            else if($("#email").val() == "") {
                $("#incomplete").html("Form is incomplete");
                $("#incomplete").css("color", "red"); 
                return false;
            }
            else if(!passwordMatch()) {
                $("#incomplete").html("Form is incomplete");
                $("#incomplete").css("color", "red"); 
                return false;
            }
            else {
                return true;
            }
        }
    </script>
    
    <form method="POST" onsubmit="return validateForm()">
        <legend>Sign Up</legend>
        <fieldset style="text-align: left; padding-left: 45%;">
            <input type="text" name="firstName" id="firstName" placeholder="First Name"><br>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name"><br><br>
            <input type="text" name="username" id="username" placeholder="Desired Username" onchange="checkUsername()"><span id="available"></span><br>
            <input type="email" name="email" id="email" placeholder="Email"><br>
            <input type="password" name="password" id="password" onchange="passwordMatch()" placeholder="Password"><br>
            <input type="password" name="confirmPass" id="confirmPass" onchange="passwordMatch()" placeholder="Confirm Password"><span id="pwMatchError"></span><br>
            <button type="submit" name="signupForm">Sign Up</button><br>
            <span id="incomplete"></span>
        </fieldset>
    </form>
    
    <?php
        if(isset($_POST['signupForm'])){
            createUser();
        }
    ?>
</html>