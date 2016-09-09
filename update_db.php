<!DOCTYPE html>
<html lang="en">

<?php

    include 'ChromePhp.php';
    include 'database/db.php';
    $artist_name = $_POST['artist-name'];
    $genres =  ', '. $_POST['update-genres'];
    $about = ' ' . $_POST['update-about'];
    $signature_song = $_POST['update-signature-song'];
    $about_signature_song = ' ' . $_POST['update_about_signature_song'];
    $db = DB::getInstance();
    $mysqli = $db->connect();
    // Retrieve information from DB for the artist
    if($genres !== ', ') {
        $query = "UPDATE artist SET genre = CONCAT(genre, '$genres') WHERE artist_name = '$artist_name'";
        $result = $mysqli->query($query);
    }
    
    if($about !== ' ') {
        $query = "UPDATE artist SET about = CONCAT(about, '$about') WHERE artist_name = '$artist_name'";
        $result = $mysqli->query($query);
    }
    
//    if($signature_song !== null) {
//        $query = "UPDATE artist SET genre = CONCAT(signature_song, '$signature_song') WHERE artist_name = '$artist_name'";
//        $result = $mysqli->query($query);
//    }
    
    if($about_signature_song !== ' ') {
        $query = "UPDATE artist SET about_signature_song = CONCAT(about_signature_song, '$about_signature_song') WHERE artist_name = '$artist_name'";
        $result = $mysqli->query($query);
    }
    
    
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Love Music - Music Festival Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    
    <link rel="shortcut icon" href="img/heart.ico">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="scripts/edit.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="scripts/moblie_menu.js"></script>
    <script src="scripts/mouseover_effects.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>   
    <?php include_once("footer.php");?>
    
</body>

</html>
