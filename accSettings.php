<?php
    session_start();
    ob_start();
    include 'includes/header.php';
    include 'includes/dbConn.php';
    
    //Checks if the current session ID is equal to the URL Parameter. Disallows access the another user's account.
    if($_SESSION['userId'] != $_GET['id'] || !isset($_SESSION['userId'])) {
        header("Location: index.php");
        exit();
    }

    $dbConn = getConnection("login");
    $sql = "SELECT * FROM user WHERE id = " . $_SESSION['userId'];

    $statement = $dbConn->prepare($sql);
    $statement->execute();    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
<script>
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
                    if(data && data.username != <?=$_SESSION['username']?>) {
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
</script>

<form method="POST">
        <legend>Update Account: <?=$_SESSION['username'];?></legend>
        <fieldset style="text-align: left; padding-left: 45%;">
            <input type="text" name="firstName" id="firstName" placeholder="First Name" value="<?=$user['first']?>"><br>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?=$user['last']?>"><br><br>
            <input type="text" name="username" id="username" placeholder="Desired Username" onchange="checkUsername()" value="<?=$user['username']?>"><span id="available"></span><br>
            <input type="email" name="email" id="email" placeholder="Email" value="<?=$user['email']?>"><br>
            
            <input type="password" name="password" id="currentPass" placeholder="Current Password"><br>
            
            <input type="password" name="password" id="password" onchange="passwordMatch()" placeholder="New Password"><br>
            <input type="password" name="confirmPass" id="confirmPass" onchange="passwordMatch()" placeholder="Confirm New Password"><span id="pwMatchError"></span><br>
            <button type="submit" name="signupForm">Update</button><br>
            <span id="incomplete"></span>
        </fieldset>
</form>

</body>
</html>