<?php
    function getConnection($dbname) {
        $host = "localhost";
        $username = "web_user";
        $password = "12345";
        
        try {
            //Creating database connection
            $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
            //Setting Errorhandling to Exception
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "There was a problem connecting to the database. Error: " . $e;
            exit();
        }
        
        return $dbConn;
    }
    
   /* function getDatabaseConnection(){
        $servername = getenv('IP');
        $dbPort = 3306;
        $database = "login";
        $username = getenv('C9_USER');
        $password = "";
        $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
    }
    
    function getDataBySQL($sql){
        $connect = getDatabaseConnection();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    } */ 
    
    ?>