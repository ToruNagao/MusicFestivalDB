<?php
    include realpath(__DIR__ ) . '/database/db.php';
    
    $db = DB::getInstance();
    $mysqli = $db->connect();
    $mysqli->set_charset('utf-8');
    $error = "";
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        $query = "SELECT id FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $mysqli->query($query);
        
        if(mysqli_num_rows($result) ==  1){
            $_SESSION['login_user'] = $username;
            
            header("location: index.php");
        } else {
            $error = "Password didn't match";
        }
    }
    ?>
    
    <html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
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
   
       <?php include_once("navigation.php"); ?>
       <body>
           <div id="sign-up-page">
           <div id="body-container">
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign Up</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box" id="username"/><br />
                  <a onclick="validate_username()">Check UserName: </a><div id="check-result-username"></div><br />
                  
                  <label>Password  :</label><input type = "password" name = "password" class = "box" id="password"/><br/><br />
                  <label>Re-enter Password  :</label><input type = "password" name = "password" class = "box" id="re-password" /><br/>
                  
                  <a onclick="validate_password()" class="btn btn-default">Sign Up</a><br />
               </form>
                
               <div id="check-result-pw"></div>
					
            </div>
				
         </div>
			
      </div>
           </div>
               </div>
<!-- Footer -->
    <?php include_once("footer.php");?>
   </body>
</html>

<script type="text/javascript">
    function validate_username(){
        var username = document.getElementById("username").value;
        
        $.ajax({
            url: "scripts/validate.php",
            type: "POST",
            dataType: "Text",
            data:{ "username": username  },
            success:function(response) {
                console.log("success");
                document.getElementById("check-result-username").innerHTML = username + " is " + response;
                return true;
           },
           error:function() {
               console.log("eroor");
           }

      });
      return false;
    }
    
function validate_password(){
   
    var pw1 = document.getElementById("password").value;
    var pw2 = document.getElementById("re-password").value;
    if(pw1 == pw2){ 
        if(validate_username()){
        var username = document.getElementById("username").value;
        $.ajax({
            url: "scripts/create_user.php",
            type: "POST",
            data: {"username" : username, "password": pw1},
            dataType: "Text",
            success: function(response){
                console.log("data has been sent");
                //console.log(response)
                location.href = "login.php";
            },
            error: function(){
                console.log("data has NOT been sent");
                
            }
        });}
    } else {
        document.getElementById("check-result-pw").innerHTML = "Your Passwords didn't match";
    }
}
</script>