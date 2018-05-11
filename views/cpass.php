<?php
    include('connect.php');
    //enter email
    //update the passcode with a new one 
    //send passcode to email address with a url 
    // the url will lead to a form for passcode and new password 
    //enter passcode with new password
    //then u have changed ur password 
    //then u can now login

    //-----------------
    //enter email
    //enter passcode 
    //check if passcode equals the one in db 
    //enter newpassword
    //check newpassword length 
    //update password in db 
    //send success /error messages 
    include('logics.php');

    $alert="";
    $passcode_alert ="";
    $link = "http://localhost/nonso/fpass.php";
    $pass = new change_password();
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $passcode = $_POST['passcode'];
        $newpassword = $_POST['newpassword'];
        
        //check if user exists 
        if($pass->user_exists($email)){
            //if passcode u have is still valid as in it is still in our db 
            if($pass->pass_code_exists($email,$passcode)){
                //check new password length 
                if($pass->new_password_length($newpassword)){
                    if($pass->update_password_db($email,$newpassword)){
                        $alert = "<span class='w3-text-green'> Password Successfully changed you may  <a href='login.php'>Login</a></span>";
                    }else{
                        $alert = "<span class='w3-text-red'> Error Changing Password </span>";
                    }
                }else{
                    $alert = "<span class='w3-text-red'> Password Must be at least 8 digits </span>";
                }
            }else{
                $alert = "<span class='w3-text-red'>Passcode has expired/incorrect, <a href='fpass.php'> Get passcode </a>
                        </span>";
            }
        }else{
             $alert = "<span class='w3-text-red'>Email not Registered</span>";
        }
        
    } 
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=!no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login to FLashion</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
</head>

<body class="w3-grey">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
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
    </nav>
    <div class="container">
        <section class="form-simple form w3-white">
            <div class="card">
                <div class="header pt-3 grey lighten-2">
                    <div class="row">
                        <h3 class="deep-grey-text text-center w3-padding">RESET PASSWORD </h3>
                    </div>
                </div>
                <div class="login-form">
                    <form method="post" id="create" action="">
                        <div class="md-form">
                            <input type="email" id="Form-email4" class="form-control" name="email" value="<?php ?>">
                            <label for="Form-email4">Your Email</label>
                        </div> 
                        <div class="md-form">
                            <input type="password" id="Form-email4" class="form-control" name="passcode" value="<?php ?>">
                            <label for="Form-email4">Your Passcode</label>
                        </div> 
                        <div class="md-form">
                            <input type="password" id="Form-email4" class="form-control" name="newpassword" value="<?php ?>">
                            <label for="Form-email4">Your New Password</label>
                        </div> 
                        <div class="text-center mb-4">
                            <button type="submit" name="submit" class="btn btn-danger btn-block z-depth-2">Change Password</button>
                        </div>
                        <?php 
                            if(isset($alert)){
                                echo $alert;
                            }
                        ?>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/mdb.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</body>

</html>
