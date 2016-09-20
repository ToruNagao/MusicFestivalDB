<!DOCTYPE html>
<html lang="en">

<?php 
    error_reporting(1);
    // Connect to DB
    include 'database/db.php';
    include 'scripts/add_artist.php';
    session_start();
    $artist_name = urldecode($_GET['artist_name']);
    $artist_image_path = str_replace(" ", "_", $artist_name);
    $artist_image_path = strtolower($artist_image_path);
    $db = DB::getInstance();
    $mysqli = $db->connect();
    
    if(isset($_SESSION["login_user"])) {
        $edit_message ="Edit";
        $edit_btn_function = "edit()";
    } else {
        $edit_message = "Login to Edit";
        $edit_btn_function = "login()";
    }
    
    // Retrieve information from DB for the artist
    $query = "SELECT * FROM artist where artist_name = '$artist_name'";
    $result = $mysqli->query($query);
    if(mysqli_num_rows($result) > 0){
        while(($row_data = $result->fetch_assoc()) !== NULL){
            $about = $row_data['about'];
            $current_members = $row_data['current_members'];
            $signature_song = $row_data['signature_song'];
            $about_signature_song = $row_data['about_signature_song'];
            $genre = $row_data['genre'];
        } 
    } else {
        $query = "INSERT INTO artist (artist_name) VALUE ('$artist_name')";
        $result = $mysqli->query($query);
    }
    
    $current_members = explode(';', $current_members);
   
    // Retrieve infomatinon about attented festival for the artist
    $query = "SELECT festival_name, year FROM lineup where lineup LIKE '%$artist_name%'";
    $result = $mysqli->query($query);
    $attended_festival = array();
    $attended_year = array();
    while(($row_data = $result->fetch_assoc()) !== NULL){
        array_push($attended_festival, $row_data['festival_name']);
        array_push($attended_year, $row_data['year']);
    }
    
    $query = "SELECT artist_name FROM artis"
    //
?>
    
    <script type="text/javascript">
        var artist_name = '<?php echo $artist_name; ?>';
    </script>
    
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $artist_name ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="img/heart.ico">
    
    <script src="scripts/edit.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts/moblie_menu.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" background="img/artists/<?php echo $artist_image_path;?>.jpg">
    <?php    //include_once('navigation.php'); ?>
    <div id='artist-detail-page'>
    <div id="body-container">
        
        <div id='artist-detail'>
        <img id="artist-logo" src="img/artists/<?php echo $artist_image_path;?>_logo.jpg">
        <div id="artist-about">
           <h2>About <?php echo $artist_name; ?></h2>
            <p>
                <?php echo $genre. "<br>" ?>
                <?php echo $about ?>
                <button class='pull-right btn btn-info' onclick="<?php echo $edit_btn_function ?>"><?php echo $edit_message?></button>
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
            <h2>Signature Song<br><br>
            
                <?php 
                    echo $signature_song;
                ?>
            </h2>
            <p>
                <?php
                    echo $about_signature_song;
                ?>
                <button class='pull-right btn btn-info' onclick="edit()"><?php echo $edit_message?></button>
            </p>
        </div>
        <hr>
        <h2>Played at</h2>
            <p>
            <?php
                for($i = 0; $i < count($attended_festival); $i++){
                    $festival = urlencode($attended_festival[$i]);
                    $year = urlencode($attended_year[$i]);
                    echo "<a href='festival_detail.php?festival=$festival&year=$year'>$attended_festival[$i]" . " " . $attended_year[$i] . "</a>";
                }
             ?>
                <!-- <button class='pull-right btn btn-info' onclick="edit()">Add logo and background image</button> -->
            </p>
            
        </div>
        
        
    </div>
    </div>
    
    <!-- Footer -->
    <?php include_once("footer.php");?>
    
</body>

</html>
