<?php
    session_start();
    $db = DB::getInstance();
    $mysqli = $db->connect();
    
    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($mysqli, "SELECT username from admin WHERE username = '$user_check'");
    
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    
    $login_session = $row["username"];
    
    if(!isset($_SESSION["login_user"])){

        //header("location:index.php");
    }
?>
    
    

