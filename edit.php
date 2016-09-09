<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(0);
    include 'ChromePhp.php';
    include 'database/db.php';
    include 'quates.php';
    include_once('navigation.html');
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    
    $artist_name = $_GET['artist_name'];
    
    $query = "SELECT * FROM artist WHERE artist_name = '$artist_name'";
    $result = $mysqli->query($query);

        while(($row_data = $result->fetch_assoc()) !== NULL){
        $about = $row_data['about'];
        $genre = $row_data['genre'];
        $signature_song = $row_data['signature_song'];
        $about_signature_song = $row_data['about_signature_song'];
        $official = $row_data['official'];
        $wiki = $row_data['wiki'];
    
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
    <script type="text/javascript">
        var artist_name = '<?php echo $artist_name; ?>';
    </script>
<body>
    <?php    include_once('navigation.html'); ?>
    <div id='artist-edit-page'>
    <div id="body-container">
        
        <div id='artist-detail'>
        <div id="artist-about">
           <h2>About <?php echo $artist_name; ?></h2>
            <p> 
                    <?php 
                        if($genre === null){
                            echo 'N/A';
                        } else{
                            echo $genre;
                        }
                    ?>
                <br><br>
                Add genres:<br> <textarea id="textarea-genre" name="textarea-genre"  rows="1"></textarea><br>
                <hr>
            <p>
                    <?php 
                        if($about === null){
                            echo 'N/A';
                        } else{
                            echo $about;
                        }
                    ?>
                <br><br>
                Add about the band:<br> <textarea id="textarea-about" name="textarea-about" rows="5"></textarea><br>
            </p>
            
        </div>
        
        <hr>
        <!--
        <div id="artist-members">
            <h2>Current Members</h2>
            <p>
                //<?php 
//                    foreach($current_members as $member){
//                        echo $member . "<br>";
//                    }
//                ?>
            </p>
        </div>
        <hr>
        -->
        
        <div id="artist-signature-song">
            <h2>Signature Song</h2><br><br>
            <p>
                <?php 
                    if($signature_song !== null){
                        echo $signature_song;
                        echo "<span style='display:none;'><textarea id='textarea-signature-song' rows='0' cols='0'></textarea></span>";
                        
                    } else{
                        echo "Please copy and paste the embded code of the song from Youtube<br>";
                        echo "Example: <br><a href='img/embed_example.png' target='blank'><img src='img/embed_example.png'></a>";
                        echo "<br><textarea id='textarea-signature-song' rows='4'></textarea><br>";
                    }
                ?>
                <br><br>
                <?php 
                    if($about_signature_song === null){
                        echo "N/A";
                    } else{
                        echo $about_signature_song;
                    }
                ?>
                <br><br>
                Add more about the song:<br> <textarea id="textarea-about-signature-song" name="textarea-genre" rows="5"></textarea><br>
            </p>
            <button class="btn btn-danger btn-lg center-block" id="btn-submit" onclick="submit()">Submit the change</button>
        </div>
        </div>
        
        
    </div>
    </div>
    
    <!-- Footer -->
    <?php include_once("footer.php");?>
    
</body>

</html>

