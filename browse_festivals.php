<!DOCTYPE html>
<html lang="en">

<?php
    error_reporting(0);
    include 'ChromePhp.php';
    include 'database/db.php';
    include 'quates.php';
    include_once('navigation.php');
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    
    $festival_name_array = array();
    $year_array = array();
    $festival_name_begin_with = $_GET['begin_with'];
    $query = "SELECT * FROM year WHERE festival_name LIKE '$festival_name_begin_with%'";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
        array_push($festival_name_array, $row_data['festival_name']);
        array_push($year_array, $row_data['year']);
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
<div id="browse-festival-page">
    <div id="caption">Browse festivals begin with "<?php echo $festival_name_begin_with?>"</div><br>
<?php
    for($i = 0; $i < count($festival_name_array) ; $i++){
        $festival_name_url = urlencode($festival_name_array[$i]);
        echo "<a href='festival_detail.php?festival=$festival_name_url&year=$year_array[$i]'>" . $festival_name_array[$i] . " " . $year_array[$i] . "</a><br>";
    }
?>
</div>
    <!-- Footer -->
    <?php include_once("footer.php");?>
</body>

</html>


