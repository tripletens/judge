
<?php
    session_start();
    require('../controllers/logics.php');

    $register = new register;
    $alert ="";
    // $fname,$lname,$email,$username,$password,$cpassword
    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $clean_array = array($fname,$lname,$email,$username,$password,$cpassword);
        foreach($clean_array as $value){
            $value = mysqli_escape_string($register->clean($value));
        }
        if($register->password_length($password,$cpassword)){
            if($register->password_match($password,$cpassword)){
                if($register->insert_user(md5($fname),md5($lname),md5($email),md5($username),md5($password),md5($cpassword))){
                    $alert = "<span class='w3-text-green'>Successfully Registered";
                //    echo "<script type='text/javascript'>
				// 	                      function redirectform() {
				// 	                          window.location = 'login.php';
				// 	                      }
				// 	                   redirectform();
				// 	                 </script>";
                }else{
                    $alert = "<span class='w3-text-red'>Email Already Exists </span>";
                }
            }else {
                $alert = "<span class='w3-text-red'>Passwords doesn't match</span>";
            }
        }else{
            $alert = "<span class='w3-text-red'>Password must be 8 digits or more</span>";
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


     <link href="../assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
     <!-- <link rel="stylesheet" href="../assets/css/custom.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/w3.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
</head>
<body class="">
    <div class="container-fluid row emaildiv">
        <h1 class="email col-md-4 col">
            <span class="glyphicon glyphicon-envelope"></span>
            Email : flashion@gmail.com

        </h1>
       <!--  <span class="social col-md-6 row"> 
            <a href="#" class="col-md-3">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHcAAAB3CAMAAAAO5y+4AAAAY1BMVEX///9HWZM8UI41S4wySYvKztyXn727wNSFj7M/Uo8sRIhFV5Lw8fVTY5mdpMDDyNlgbZ7R1OKlrMarscpMXZX4+fvq6/FkcqJue6fb3uji5OyLlLe0us95hKwbOYNaaZwNMYBYZ6TuAAACJElEQVRoge3Za5eCIBAG4ARTCUXLS2lW+/9/5XrKTmAYYoztZd6PW+xzSIHRWa0wGAwGg8FgMH8+Zb2en2auGosLo/7cUL5vyzls6lHOvfnh3M9qezb330F7mq5t2XDztnqFLWdcMRdsB2d21zgiblzPb62m60jtJry3cVPqzOU261g4cz26tXADV5e3c9MPuSGky6Us5nJCeHHJ+iTq0gdzuZ/ktbw7nBQYyqXZ8IYNlcUA5G7yp8GtMhjG1a3OBVzt4oR3SaAbDO7yRHvIgbv0+Z5axC0q7eAQ2GUn/WABvG8MfuYyzcWuy1E9Q927G6VmE2dKrhlUZu5dIl/edqz+BLivZDcbq7aduzyJHwNKf+xrsG48Wuaji+6vcL3F3f7lA5fc6os+XjAAuUWe3iKd+mWY3hOqW5czl5j+UQVTxxof8NQ9czm3+dB81x9ygeo6o7sDck0P8BFMXWd8B7eHWb9GF2i/MrpqyeNuv9q9HlsDuR4/ilvkui7o/yaCYvDzuHNZX6BLdWx8JkRbtgOc+3L9XC547qOLLrS7ZB2L7jJu8b+ej9D9Ua5v4wqH87VpAYcT+nTTXM5sOsANMze7J7oXqwbwwdx3nuZSYcOutqPv/exc7sXjiC6BEZ7k+jbd0GsiEzzF1XS1Jsz49c1ldgmzau7fsz0wSthoiHIenYefEupF+r6HOU0oovEcpRUSn4YfinSuisFgMBgMBoP5RfkGKucv5c+ZzbUAAAAASUVORK5CYII=">
            </a>
            <a href="#" class="col-md-3">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHUAAAB1CAMAAABH2l6OAAAATlBMVEX///8tquEAo98Spd8hp+Dn9PsAod7t9/yBxeqX0O76/f7P6fe43vNbuOau2vE3ruKg0+/a7vmKyuxuv+i/4vSn1/F2w+lDsuRjvOfH5fZvjqd0AAADJ0lEQVRoge2Z25arIAyGS4IHVDygVvv+L7rVzm7HGVp+0N2Lvfjuuqr5TUhCxMslEolEIpFIJBL5nyi6qq7rqis+J5m1momYmVLWY/YZzSuxeMKU73WrGTTkEyeVSrFHUvu0VDfpDTRkYM1sYvEb0vfn7oxkqUFLDY2gaCJ+Ovrl7pQlNyN4+ZdLzFRFgmvw+eyiYn0Y3v4jNG79eksFXFjoV6JP9RnMkazZUhHwVtnW9Gek7zadtrq7LXaubef0lPUql9W92+GBvm4xjmt7p6opim7sBXVO0cv4N240vw1M4hKVs+onYgnlSPtYLSneFTiwqlsakwJEn746ouxO4C8TiOil2nXV5lWRJ5AmXK8l7W5L+8R+mTPA291QeC1OSDK2rKoRVSiR7vxaMMnmt78toDoBJfPGHnP/c30BVbCb37HmieRG7Z58BFTRrWvD2A2ynMztEerhbNXXXUeS0PlYJlnhbk2+qm+jJyWzaCatnaJ+67rQQ8XoggY/1WLC2p1DFRxetvCuqWqfwnxVPco1T3W9ZOr1uLfsMeGqZUekZlbTYdUGF11HRLGm6mFRdBLecI9DqCq636wUx0N7h/AN54KMJhip19vdWSH2SaaF6ynOytxPFWjsAOzZD7HpxAV5nxacEGOJvqI/Ad7WXHgHeJWdj3or/UUXDLktvxPFTxl2lM0Rd9k+uwNUE4UKyz5UdCGrgPHI6qrHhv6NbsqNyefmw65OLGXwJivDXH0eFITAni34u7PhqiL8BLMLLhzf6XtHGxjjgA78nTzQ2+AGcUDWb1yyodi7dg7k74PS981D6lOO/kdBXv6edex/u4oU3QbCtxoLWTlAHTkN7YR2EuiF1ufVEUBBDSNwe3tBBU0VsjlRtBg0lEn3c+9zSNoJ22SdJ+coRTdqgVUMi0NtsMs2km5Q/cRoP+QXp7ko5SyaBUmEd2BuDvf7dRz16oAs1SkruhQK7idbj6yDuGmo70oS7anfeBMlHcKSqQe/rPrQqSkle7FKTkU+/Ktv6NlgZsFE8gGvv3Ren7mh2aXLulUmXzFqrMt/LhiJRCKRSCQSiXyKP2+PIyIzuTfzAAAAAElFTkSuQmCC">
            </a>
            <a href="#" class="col-md-3">
                <img src="data:image/jpeg;base64,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">
            </a>
            <a href="#" class="col-md-3">
                <img src="data:image/png;base64,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">
            </a>
        </span> -->
    </div>
    <div class="container">
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
                        <li role="presentation"><a href="login.php">Login</a></li>
                        <li role="presentation" class="active"><a href="signup.php">Sign up</a></li>
                        <li role="presentation"><a href="contact.php">Contact</a></li>
                    
                  </ul>
                </div>
              </div>
        </div>
        <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top ">
          <a class="navbar-brand" href="index.php">Flashion</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
       
           <!--  <div class="navbar-collapse collapse " id="collapsibleNavbar" role="navigation">
                    <div class="menu  navbar-right">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" ><a href="index.php">Home</a></li>
                            <li role="presentation" ><a href="login.php">Login</a></li>
                            <li role="presentation" class="active"><a href="signup.php">Sign up</a></li>
                            <li role="presentation"><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
     
        </nav> -->
    </div>
    <div class="container signup">
        <!--  <h2 class="text-center h2-responsive">WELCOME TO FLASHION</h2> -->
        <section class="form-simple form">
            <div class="card w3-grey">
                <div class="header pt-3 grey lighten-2">
                    <div class="">
                        <h3 class="deep-grey-text text-center w3-center"> CREATE AN ACCOUNT</h3>
                    </div>
                </div>
                <div class="register-form w3-white">
                    <form method="post" id="create" action="">
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="form0" class="form-control" name="fname" value="<?php ?>">
                            <label for="form1">First Name</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="form1" class="form-control" name="lname" value="<?php ?>">
                            <label for="form1">Last Name</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" id="form2" class="form-control" name="email" value="<?php ?>">
                            <label for="form2">Email</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" id="form3" class="form-control" name="username" value="<?php ?>">
                            <label for="form3">Username</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="password" id="form4" class="form-control" name="password" value="<?php ?>">
                            <label for="form4">Password</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-tag prefix grey-text"></i>
                            <input type="password" id="form5" class="form-control" name="cpassword" value="<?php ?>">
                            <label for="form5">Confirm Password</label>
                        </div>
                    
                        <div class="text-center">
                            <button type="submit" name="register" class="btn btn-danger" value="submit">Create <i class="fa fa-paper-plane-o ml-1"></i></button>
                            <?php if(isset($alert)){
                                    echo $alert ;
                                }
                            ?>
                            <p class="mt-3">
                                Already have an Account ? <a href="login.php">Sign in</a>
                            </p>
                        </div>
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
