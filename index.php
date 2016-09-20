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
    
    $festival_name_array = array();
    $festival_name_array_url = array();
    $year_array = array();
    $year_array_url = array();
    $hit_count_array = array();
    $image_path_array = array();
    $location_date_array =array();
    $limit = 9;
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
    
    $artist_name_array = array();
    $modified_date_array = array();
    $about_array = array();
    $query = "SELECT * FROM artist ORDER BY modified DESC LIMIT $limit";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
         array_push($artist_name_array, $row_data['artist_name']);
         array_push($modified_date_array, $row_data['modified']);
         array_push($about_array, $row_data['about']);
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

<body id="page-top">
    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Everyone Loves Music!</h1>
            <h3>Search your favorite music festivals from all around the world</h3>
            <br>
            <form action="search_result.php" method="post">
            <div id="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control" name="search-term" placeholder="Festival,  Year,  Artist...">
                    <span class="input-group-btn">
                        <a href="search_result.php"><button class="btn btn-default" type="submit">Search</button></a>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            </form>
        </div>
    </header>

    <!-- About -->
    <section id="quate" class="quate">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Random Quate about Music, Love, Life...</h4>
                    <p class="lead" id="random_quate"><script  type="text/javascript">printQuate();</script></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
<!-- Portfolio -->
    <div id='most-popular-festivals'>
        <div class="container grid-block-container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h1>Most Popular Festivals</h1>
                    <div class="row">
<?php 
    for ($i = 0; $i < $limit; $i++){
echo <<<HTML
    <div class="col-sm-6 col-md-4">
        <div class="grid-block grid-fade">
            <div class="caption">
                <h4>$hit_count_array[$i] views</h4>
                <h3>$festival_name_array[$i] $year_array[$i]</h3>
                <h3>$location_date_array[$i]</h3><br>
                <a href="festival_detail.php?festival=$festival_name_array[$i]&year=$year_array[$i]?>" class="btn-festival-detail" alt="">Go to the Festival Page</a>
            </div>
        <img class=" img-responsive img-most-viewed" src="$image_path_array[$i]">
        </div>
    </div>
HTML;
    }
?>
                    </div>
                    <a href="browse_festivals_ranking.php" class="btn btn-default">See more popular festivals</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <!-- Modified -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="modified">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Recently Updated Artists</h2>
                    <div class="row">
<?php 

    for ($i = 0; $i < $limit-1; $i++){
        $artist_image_path = strtolower($artist_name_array[$i]);
        $artist_image_path = str_replace(' ', '_', $artist_image_path);
        $artist_image_path = "img/artists/" . $artist_image_path . ".jpg";
        if(!file_exists($artist_image_path)) $artist_image_path = "img/music_note.jpg";
        
echo <<<HTML
                        
                        <div class="col-md-3 col-sm-6">
                            <div class="modified-artist-container">
                                <a href="artist_detail.php?artist_name=$artist_name_array[$i]"><img src="$artist_image_path">
                                <h4>
                                    <strong>$artist_name_array[$i]</strong></a>
                                </h4>
                            </div>
                        </div>
HTML;
    }
?>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Footer -->
    <?php include_once("footer.php");?>
</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
	$('.grid-fade').hover(
		function(){
			$(this).find('.caption').fadeIn(250);
		},
		function(){
			$(this).find('.caption').fadeOut(250);
		}
	);
});

</script>

