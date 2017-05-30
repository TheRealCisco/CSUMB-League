<?php
    if (isset($_POST['loginForm'])) { //checks whether user submitted the form 
            $dbConn = getConnection("login");
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
          
            $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
          
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;
  
            
            $statement = $dbConn->prepare($sql);
            $statement->execute($namedParameters);    
            $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
            if (empty($result)) { //wrong username or password 
                echo "Wrong username or password";
            }
            
            // If the record is empty it will go back to the index page and update that they did not make a mistake
            else {
                $_SESSION['username'] = $result['username'];
                $_SESSION['userId'] = $result['id'];
                header("Refresh:0");
            }
    }//END isset
?>

