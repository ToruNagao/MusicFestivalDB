<?php
    include realpath(__DIR__ . '/..') . '/database/db.php';
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    $festival_name = $_POST['festival_name'];
    $year = $_POST['year'];
    $username = $_POST['username'];
    $new_comment = $_POST['new_comment'];
    
    $query = "INSERT INTO comment (festival_name, year, username, comment)" .
            "VALUE ('$festival_name', '$year', '$username', '$new_comment')";
    
    $result = $mysqli->query($query);
    
    $response = "";
    if($result){
        $response = "inserted";
    } else {
        $response = "Not inserted";
    }
    echo $response;
?>