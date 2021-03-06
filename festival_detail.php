<!DOCTYPE html>
<html lang="en">

    <?php    
    date_default_timezone_set("America/Los_Angeles");
    
    error_reporting(0);
    include 'ChromePhp.php'; // Including for debugging
     
    include 'database/db.php';
    
    // Retrieve URL variables and setup DB connection
    $festival_name = urldecode($_GET['festival']);
    $year = urldecode($_GET['year']);
    $title = $festival_name . " " . $year;
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    
    // Retrieve basic festival info from DB
    $query = "SELECT * FROM festival WHERE festival_name = " . "'$festival_name'";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
        $country = $row_data['country'];
        $city = $row_data['city'];
        $season = $row_data['season'];
        $since = $row_data['since'];
        $about = $row_data['about'];
        $official = $row_data['official'];
        $facebook = $row_data['facebook'];
        $wiki = $row_data['wiki'];
    }

    // Retrueve detailed festival info from DB
    $query = "SELECT * FROM `year` WHERE `festival_name` = '$festival_name' AND `year` = '$year' ORDER BY `festival_name` DESC";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
        $year = $row_data['year'];
        $month = $row_data['month'];
        $date = $row_data['date'];
        $location = $row_data['location'];
        $num_artists = $row_data['num_artists'];
        $num_stages = $row_data['num_stages'];
        $price_full = $row_data['price_full'];
        $price_single = $row_data['price_single'];
        $main_stage = $row_data['main_stage'];
        $sub_stages = $row_data['sub_stages'];
        $headliners = $row_data['headliners'];
        $special_note = $row_data['special_note'];
        $image_path = $row_data['image_path'];
        $hit_count = $row_data['hit_count'];
    }    
    
    // Increment the hit counter 
    ChromePhp::log($hit_count);
    var_dump($hit_count);
    $query = "UPDATE year SET hit_count = $hit_count + 1 WHERE festival_name = '$festival_name' AND year = '$year'";
    $result = $mysqli->query($query);
    ChromePhp::log($result);

    // Encode the background festival image
    $background_image = str_replace(" ", "_", strtolower($festival_name));
    
    // Retrieve the lineup and put them into an array
    $query = "SELECT * FROM `lineup` WHERE `festival_name` = '$festival_name' AND `year` = '$year' ORDER BY `festival_name` DESC";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
        $num_days = $row_data['num_days'];
        $lineup = $row_data['lineup'];
    }   
    $full_lineup = array();
    foreach (explode(";", $lineup) as $day) {
        $full_lineup[] = explode(",", $day);    
    }
   
    $username_array = array();
    $comment_array = array();
    $comment_date_array = array();
    $query = "SELECT * FROM `comment` WHERE `festival_name` = '$festival_name' AND `year` = '$year'";
    $result = $mysqli->query($query);
    while(($row_data = @$result->fetch_assoc()) !== NULL) {
        array_push($username_array, $row_data['username']);
        array_push($comment_array,$row_data['comment']);
        array_push($comment_date_array, $row_data['date']);
    }   
  
    ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Festival Detail - <?php echo $title?></title>

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


<body id="page-top" background="img/festivals/main/<?php echo $background_image;?>.jpg">

    <?php include_once('navigation.php');    ?>
    <div id='festival-detail-page'>
    <div id="body-container">
        <a href="index.php">Home</a> >> <?php echo "<a href=javascript:history.back()>" . $festival_name . "</a> >> " . $year ; ?> 
        <div id="detail-table-container">
        <table id="detail-table" data-role="table" class="ui-responsive">
            <tr>
                <td rowspan="4"><a href="<?php echo $image_path ?>" target="=blank"><img id="img-lineup" src="<?php echo $image_path ?>"/></a></td>
                <td>
                    Festival Name</br>
                    <?php echo $festival_name . " " . $year ?><hr>
                </td>
            </tr>
            <tr>
                <td>
                    Headliners<br>
                    <?php echo $headliners ?><hr>
                </td>
            </tr>
            <tr>
                <td>
                    About<br>
                    <?php echo $festival_name . " was held at " . $location . " on " . $month . " " . $date . " " . $year?><hr>
                </td>
            </tr>
            <tr>
                <td>Links<br>
                    <a href='<?php echo $official; ?>' target="blank" class='col-md-3 pull-left'>Official  </a>
                    <a href='<?php echo $facebook; ?>' target="blank" class='col-md-3'>Facebook  </a>
                    <a href='<?php echo $wiki; ?>' target="blank" class='col-md-3'>Wiki</a>
                </td>
            </tr>
        </table>
        </div>
        <div id="full-lineup">
        Lineup by Day
        </div>
        <div id='list-lineup'>
        <table class='table' data-role="table" class="ui-responsive" id="lineup-table">
            <thead class="thead-inverse">
        <?php 
        // Print the lineup by date
            echo "</tr>";
                for($j = 1; $j < $num_days+1; $j++){
                    echo "<th>Day " . $j . "</th>";
                }
            echo "</tr>";
            
            //returns the largest number of colomn from 2d array
            function largest_column($array){
                $array_size = count($array);
                $max = 0;
                for($i = 0; $i < count($array); $i++)
                {
                    $counter = 0;
                    if($max < count($array[$i])) $max = count($array[$i]);  
                }
                return $max;
            }

            // Draw the lineup            
            for($i = 0; $i < largest_column($full_lineup); $i++){
                echo "<tr>";
                for($k = 0; $k < $num_days; $k++){
                    $artist_name = $full_lineup[$k][$i];
                    $artist_name_url = urlencode($artist_name);
                    echo "<td><a href='artist_detail.php?artist_name=$artist_name_url'>". $artist_name . "</a></td>";                
                }
                echo "</tr>";
            }
        ?>
                
                </thead>
        </table>
        </div>
        <div id="special-note">
        What's Special About This Year? Leave us a comment!
        </div>

        <div id="comment-log">
            <table class="table table-striped" data-role="table" class="ui-responsive">
                <th>Comment</th><th>Name</th><th>Date</th>
                <?php 
                for($i = 0; $i < count($comment_array) ; $i++){
                    
                
echo <<<HTML
                <tr>
                    <td>$comment_array[$i]</td><td>$username_array[$i]</td><td>$comment_date_array[$i]</td>
                </tr>
HTML;
                }
                ?>
                <tr>
                <td><div id="new-comment-td"></td><td><div id="new-username-td"></td><td><div id="new-date-td"></td>
                </tr>
            </table>
            
        </div>
        <div id="comment">
            <textarea cols="150" rows="3" id="new-comment"></textarea>
            <button class='btn btn-info' onclick="insert_comment()">Comment</button>
        </div>
        </div> <!-- body-container -->
        
        </div>
        </div>
        
        </div>
    </div>
        <hr>
        
    <!-- Footer -->
    <?php include_once("footer.php");?>
</body>
</html>

<script type="text/javascript">
 
function insert_comment(){ 
    var new_comment = document.getElementById("new-comment").value;
    var festival_name = "<?= $festival_name ?>";
    var year = <?= $year ?>;
    if("<?= $login_session ?>" != "") {
        var username = "<?= $login_session ?>";
    } else {
        username = "anonymous";
    }
    
    var new_username = username;
    $.ajax({
        url: "scripts/insert_comment.php",
        type: "POST",
        dataType: "Text",
        data: {"festival_name": festival_name, "year": year, "username": username, 
            "new_comment": new_comment,},
        success: function(response){
            console.log(response);
            document.getElementById("new-comment-td").innerHTML = document.getElementById("new-comment").value;
            document.getElementById("new-username-td").innerHTML = "You";
            document.getElementById("new-date-td").innerHTML = "Just Now";
            
        },
        error: function(){
            
        }
    }); 
    
}

</script>