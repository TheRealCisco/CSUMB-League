<?php
    function createUser() {
        if (isset($_POST['signupForm'])) {
            $dbConn = getConnection("login");
            
            $sql = "SELECT username FROM user WHERE username = :username";
    
            $statement = $dbConn->prepare($sql);
            $np = array();
            $np[":username"] = $_GET['username'];
            $statement->execute( $np );
            $record = $statement->fetch(PDO::FETCH_ASSOC);
            
            if($record.username != ""){
                echo "<script> 
                        $('#available').html(' Unavailable');
                        $('#available').css('color', 'red');
                      </script>";
                return false;
            }
            
            $sql = "INSERT INTO user (first, last, username, email, password) 
                    VALUES (:first, :last, :username, :email, :password)";

            $namedParameters = array();
            $namedParameters[':first'] =  $_POST['firstName'];
            $namedParameters[':last'] = $_POST['lastName'];
            $namedParameters[':username'] = $_POST['username'];
            $namedParameters[':email'] = $_POST['email'];
            $namedParameters[':password'] = sha1($_POST['password']);
        
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
                echo "Welcome";
            }
        }//END isset   
    }//END Function
    
?>