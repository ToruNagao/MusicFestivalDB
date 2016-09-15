<?php
    include realpath(__DIR__ . '/..') . '/database/db.php';
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = "";
    
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    $result = $mysqli->query($query);
    
    if($result){
        $response = "inserted";
    } else {
        $response = "Not inserted";
    }

    echo $response;
?>