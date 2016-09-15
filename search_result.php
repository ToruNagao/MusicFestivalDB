<!DOCTYPE html>
<html lang="en">
<?php    
    include 'database/db.php';
    include_once('navigation.php');
    $search_term = $_POST['search-term'];
    $num_result = 0;
    $festival_name = array();
    $year = array();
    $date = array();
    $location = array();
    var_dump($_POST);
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $query = "SELECT festival_name, year, month, date, location FROM year WHERE festival_name LIKE '%$search_term%' OR year = '$search_term'";
    $result = $mysqli->query($query);
    
    if(mysqli_num_rows($result) > 0){
        while(($row_data = @$result->fetch_assoc()) !== NULL) {
            $num_result++;
            array_push($festival_name, $row_data['festival_name']);
            array_push($year, $row_data['year']);
            array_push($date, $row_data['month'] . " " . $row_data['date']);
            array_push($location, $row_data['location']);
        }
    } else {
        $query = "SELECT festival_name, year, month, date, location FROM lineup WHERE lineup LIKE '%$search_term%'";
        $result = $mysqli->query($query);
        while(($row_data = @$result->fetch_assoc()) !== NULL) {
            $num_result++;
            array_push($festival_name, $row_data['festival_name']);
            array_push($year, $row_data['year']);
            array_push($date, $row_data['month'] . " " . $row_data['date']);
            array_push($location, $row_data['location']);
            echo test;
        }
    }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $search_term ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="img/heart.ico">
    <script src="scripts/moblie_menu.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body id="page-top" background="img/main_back.jpg">
    


    <div id="body-container">
        <a href="index.php">Home</a> >> <?php echo $search_term; ?>
    <div id="search-result-table">
    <?php 
    
    if($num_result === 0 ) {
        echo "No results were found!";
        echo "<h2>Please change the search term to see another festival!</h2>";
    } else
    for ($i = 0; $i < $num_result; $i++){
        $festival_name_url = urlencode($festival_name[$i]);
echo <<<HTML
    <table id="result-table" data-role="table" class="ui-responsive"> 
    <tr> 
      <td id='table-date' rowspan='2'>{$date[$i]}<br>{$year[$i]}</td> 
      <td id='table-festival'><a href="festival_detail.php?festival={$festival_name_url}&year={$year[$i]}">{$festival_name[$i]} {$year[$i]}</a></td>
    </tr> 
    <tr>
      <td id="table-location">{$location[$i]}</td>
    </tr>
    </table>
HTML;
    echo "<hr>";

//        echo "<h2><div id='date-container'>" . $date[$i] . "</div><a href='festival_detail.php?festival=" . urlencode($festival_name[$i]) . 
//                "&year=" . $year[$i] . "'>" . $festival_name[$i]. " " . $year[$i] . "<h2></a><br>";
//        echo "<hr>";
    }

    ?>
    </div>
    </div>>
    <!-- Footer -->
    <?php include_once("footer.php");?>
</body>
    
</html>
    