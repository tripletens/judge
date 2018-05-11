<?php
    session_start();
    // include('connect.php');

    include('../controllers/logics.php');
    
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=!no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login to FLashion</title>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


     <link href="../assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
     <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/w3.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
</head>

<body class="w3-white">
     <div class="container">
        <div class="container-fluid row">
            <h1 class="email col-md-4 col">
                <span class="glyphicon glyphicon-envelope"></span>
                Email : flashion@gmail.com

            </h1>
       </div>
    <!-- <div class="container "> -->
            <div class="navbar navbar-default w3-card-8 top ">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                  <a class="navbar-brand" href="index.php">Flashion </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                 <!--  <ul class="nav navbar-nav">
                    <li class="active"><a href="#"></a></li>
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li> 
                    <li><a href="#">Page 3</a></li> 
                  </ul> -->
                  <ul class="nav navbar-nav navbar-right">
                    <li role="presentation" ><a href="index.php">Home</a></li>
                        <li role="presentation" class="active"><a href="login.php">Login</a></li>
                        <li role="presentation"><a href="signup.php">Sign up</a></li>
                        <li role="presentation"><a href="contact.php">Contact</a></li>
                
                  </ul>
                </div>
              </div>
        </div>
        <br>
    </div>
    
    <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span>FLASHION</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="index.html">Home</a></li>
                        <li role="presentation"><a href="signup.php">Sign Up</a></li>
                        <li role="presentation"><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> -->
    <div class="container login">
        <section class="form-simple form w3-white">
            <div class="card">
                <div class="header pt-3 grey lighten-2">
                    <div class="">
                        <h3 class="deep-grey-text text-center w3-padding  w3-center ctext" > LOGIN </h3>
                    </div>
                </div>
                <div class="login-form">
                    <form method="post" id="create" action="">
                        <div class="md-form">
                            <input type="email" id="Form-email4" class="form-control" name="email" value="<?php ?>">
                            <label for="Form-email4">Your email</label>
                        </div>
                        <div class="md-form pb-3">
                            <input type="password" id="Form-pass4" class="form-control" name="password" value="<?php ?>">
                            <label for="Form-pass4">Your password</label>
                            <p class="font-small grey-text text-right">Forgot <a href="fpass.php" class="dark-grey-text font-bold ml-1"> Password?</a></p>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" name="submit" class="btn btn-danger btn-block z-depth-2">Log in</button>
                        </div>
                        <?php
                            if(isset($alert)){
                                echo $alert;
                            }
                        ?>
                        <p class="font-small grey-text text-center pt-5">Don't have an account? <a href="signup.php" class="dark-grey-text font-bold ml-1"> Sign up</a></p>
                       
                        
                        <!--<p class="font-small red-text text-center pt-5 "><a href="fpass.php"> Forgotten password ?</a></p>-->
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
</body>

</html>
