<?php    
    include realpath(__DIR__ . '/..') . '/database/db.php';
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    $username = $_POST['username'];
    $query = "SELECT id FROM admin WHERE username='$username'";
    $result = $mysqli->query($query);
    
    if($row_data = @$result->fetch_assoc() !== NULL || $username == '') {
        $response = "already taken. Please pick a different username";
    } else {
        $response = "avalable.";
    }
    
    echo $response;
    
?>

