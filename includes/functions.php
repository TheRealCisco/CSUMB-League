<?php
    function createUser() {
        if (isset($_POST['signupForm'])) {
  
            $dbConn = getConnection("login");
            $sql = "INSERT INTO user (first, last, username, summonername, email, password) 
                    VALUES (:first, :last, :username, :summonername, :email, :password)";

            $namedParameters = array();
            $namedParameters[':first'] =  $_POST['first'];
            $namedParameters[':last'] = $_POST['last'];
            $namedParameters[':username'] = $_POST['username'];
            $namedParameters[':summonername'] = $_POST['summonername'];
            $namedParameters[':email'] = $_POST['email'];
            $namedParameters[':password'] = $_POST['password'];
        
            $statement = $dbConn->prepare($sql);
            $statement->execute($namedParameters);    
            header("Location: index.php");
        }
    }
    
    function loginUser(){
        if (isset($_POST['loginForm'])) { //checks whether user submitted the form 
            $dbConn = getConnection("login");
            $username = $_POST['username'];
            $password = $_POST['password'];
          
            $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
          
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;
  
            
            $statement = $dbConn->prepare($sql);
            $statement->execute($namedParameters);    
            $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
            if (empty($result)) { //wrong username or password 
                echo "Wrong username or password";
                echo "<br>";
                echo $username;
                echo "<br>";
                echo $password;
            }
            
            // If the record is empty it will go back to the index page and update that they did not make a mistake
            else {
                $_SESSION['username'] = $result['username']; 
                header("Location: includes/apiConnect.php"); 
                echo "Welcome";
            }
        }//END isset   
    }//END Function
?>