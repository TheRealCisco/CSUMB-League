<?php
header('Access-Control-Allow-Origin: *');
include 'includes/dbConn.php';
$dbConn = getConnection("login");

    $sql = "SELECT username FROM user WHERE username = :username";
    
    $statement = $dbConn->prepare($sql);
    $np = array();
    $np[":username"] = $_GET['username'];
    $statement->execute( $np );
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record); //jsonp -> "json with padding"
?>