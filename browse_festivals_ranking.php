<!DOCTYPE html>
<html lang="en">

<?php
    include 'ChromePhp.php';
    include 'database/db.php';
    include 'quates.php';
    include_once('navigation.php');
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    
    $limit = 100;
    $festival_name_array = array();
    $festival_name_array_url = array();
    $year_array = array();
    $year_array_url = array();
    $hit_count_array = array();
    $image_path_array = array();
    $location_date_array =array();
    $query = "SELECT * FROM year ORDER BY hit_count DESC LIMIT $limit";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
         array_push($festival_name_array, $row_data['festival_name']);
         array_push($year_array, $row_data['year']);
         array_push($hit_count_array, $row_data['hit_count']);
         array_push($image_path_array, $row_data['image_path']);
         array_push($location_date_array, $row_data['year'] 
                 . " " . $row_data['month'] . " " . $row_data['date'] . " " . $row_data['location']);
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="scripts/moblie_menu.js"></script>
    <script src="scripts/mouseover_effects.js" type="text/javascript"></script>
    <script src="scripts/quates.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" background="img/main_back.jpg">
<div id="browse-festival-ranking-page">
    <h1>Top 100 Popular Festivals</h1>
<?php 
    for ($i = 0; $i < count($festival_name_array); $i++){
        $rank = $i + 1;
        $crown_img = "";
        switch ($i){
            case 0:
                $crown_img = "crown_gold.png";
                break;
            case 1:
                $crown_img = "crown_silver.png";
                break;
            case 2: 
                $crown_img = "crown_bronze.png";
                break;
            default:
                $crown_img = "crown.png";
        }
echo <<<HTML
        <table id="ranking-table" class="table table-striped table-bordered">
            <tr>
                <td><h2 id="rank">$rank</h2><img src="img/$crown_img" id="crown"><img class=" img-responsive" id="img-most-viewed-thumb" src="$image_path_array[$i]"></td></td>
                <td><h3>$festival_name_array[$i] $year_array[$i]</h3><h3>$location_date_array[$i]</h3></td>
                <td><h3>$hit_count_array[$i] views<br><br><a href="festival_detail.php?festival=$festival_name_array[$i]&year=$year_array[$i]?>" class="btn-festival-detail">Go to the Festival Page</a></h3></td>
            </tr>
            <div id="load-more"></div>
        </table>
HTML;
    }
?>
</div>
    <!-- Footer -->
    <?php include_once("footer.php");?>
</body>

</html>

