<?php  
    error_reporting(0);
    include "session.php";
    
    if(isset($_SESSION['login_user'])){
        $login_status = "Log Out";
        $login_status_link = "logout.php";
        $welcome_message = "Welcome ". $login_session . " !";
        
    } else {
        $login_status = "Log In";
        $login_status_link = "login.php";
        $welcome_message = "";
    }
?>


<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <div id="bland_title">
                <a class="navbar-brand page-scroll" href="index.php">Love Music - Music Festival Database</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php#quate">Quate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#most-popular-festivals">Popular Festivals</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#modified">Recently Updated Artists</a>
                    </li>
                    

                    <li>
                        <a class="page-scroll" href="index.php#footer">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $login_status_link ?>"><?php echo $login_status ?></a>
                    </li>
                    <li>
                        <a id="welcome-message" style="font-weight: bold; color:red;" ><?php echo $welcome_message?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>