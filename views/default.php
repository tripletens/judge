
<?php
  session_start();
  include('../controllers/logics.php');

  $login = new register();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($login->check_email_password($email,md5($password))){
            echo "<script type='text/javascript'>
                              function redirectform() {
                                            alert('Successfully authenticated');
                                    window.location = 'welcome.php';
                                }
                             redirectform();
                           </script>";
            session_start();
        }else{
            $alert = "<span class='w3-text-red'> Invalid Email/Password combination </span>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to FLashion</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> -->


     <link href="../assets/css/custom.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../assets/css/addcustom.css">
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Gamja+Flower" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
     <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/jquery.bxslider.css">
    
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- <link rel="stylesheet" href="css/demo.css" /> -->
    <!-- <link rel="stylesheet" href="css/set1.css" /> -->
    <link href="../assets/css/overwrite.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container">
         <!-- <div class="container-fluid row">
        <h1 class="email col-md-4 col">
            <span class="glyphicon glyphicon-envelope"></span>
            Email : flashion@gmail.com

        </h1>
        <span class="social col-md-6 row"> 

            <a href="#" class="col-md-3">
                <img src="">
            </a>
            <a href="#" class="col-md-3">
                <img src="">
            </a>
            <a href="#" class="col-md-3">
                <img src="">
            </a>
            <a href="#" class="col-md-3">
                <img src="">
            </a>
        </span>
    </div> -->
    <!-- <div class="container "> -->
            <div class="navbar navbar-default w3-card-8 top ">

              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                  <img src="../assets/img/favicon.jpg" style="height: 50px;width: 50px;">
                  <a class="navbar-brand" href="./../index.php">Flashion </a>

                  <br>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                 <!--  <ul class="nav navbar-nav">
                    <li class="active"><a href="#"></a></li>
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li> 
                    <li><a href="#">Page 3</a></li> 
                  </ul> -->
                  <ul class="nav navbar-nav navbar-right">
                    <li role="presentation" class="active"><a href="index.php">Home</a></li>
                        <!-- <li role="presentation"><a href="login.php">Login</a></li> -->
                        <li role="presentation"><a href="signup.php">Sign up</a></li>
                        <li role="presentation"><a href="howtouse.php">How to Use</a></li>
                  </ul>

                   <div class="container col-md-8" style="float: right;">
                    
                    <form class="form-inline" method="POST" action="">
                      <!-- <div class="form-group">
                        <h2>Login Here </h2>
                      </div> -->
                      <div class="form-group" style="float: right;margin: 10px;">
                        <h3 style="color: #000;">Login Here </h3>
                        <div class="form-group" style="margin: 5px;">

                          <!-- <label for="email">Email address:</label> -->
                          <input type="email" class="form-control" name="email" placeholder="Enter Email" id="email">
                        </div>
                        <div class="form-group" >
          <!--                 <label for="pwd">Password:</label>
           -->                <input type="password" class="form-control" placeholder="Enter Password"  name="password" id="pwd">
                        </div>
                          <button type="submit" class="btn btn-default w3-red" name="submit" style="float: right;margin: 10px;">Submit</button>

                      </div>
                      
                        <a href="signup.php" style="float: right;color: #000;"> Not Registered?   </a>
                        <a href="fpass.php" style="float: right;color: #000;"> Forgotten Password?  |</a> 
                        <span class="pull-right">
                            <?php
                              if(isset($alert)){
                                  echo $alert;
                              }
                          ?>
                        </span>
                      <!-- <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                      </div> -->
                    
                    </form>

                </div>

                </div>
              </div>
            
        </div>

        

    </div>
        <br>
        <div class="form-group w3-card-4 form-inline w3-center " style="padding: 20px;">
            <input type="text" name="item" placeholder="Search For Items" class="form-control" style="width: 80%;padding:20px;">
            <button class="btn btn-md w3-red" type="submit">Search</button>      
        </div>
        <div class="container-fluid row">
          <div class="w3-bar w3-light-grey " style="width: auto;float: left;">
            <button class="w3-button w3-left">Categories -></button>
            <div class="w3-dropdown-hover">
              <button class="w3-button">Men</button>
              <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <div class="w3-left">
                  <a href="#" class="w3-bar-item w3-button">Jeans</a>
                  <a href="#" class="w3-bar-item w3-button">Suits</a>
                  <a href="#" class="w3-bar-item w3-button">Tie</a>
                  <a href="#" class="w3-bar-item w3-button">Shirts</a>
                  <a href="#" class="w3-bar-item w3-button">Polo</a>
                </div>

                <div class="w3-right">
                  <a href="#" class="w3-bar-item w3-button">Trousers</a>
                  <a href="#" class="w3-bar-item w3-button">Ankara</a>
                  <a href="#" class="w3-bar-item w3-button">Senators</a>
                  <a href="#" class="w3-bar-item w3-button">Footwear</a>
                  <a href="#" class="w3-bar-item w3-button">Accessories</a>
                </div>
              </div>
            </div>
            <!-- second -->
            <div class="w3-dropdown-hover">
              <button class="w3-button">Women</button>
              <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <div class="w3-left">
                  <a href="#" class="w3-bar-item w3-button">Jeans</a>
                  <a href="#" class="w3-bar-item w3-button">Suits</a>
                  <a href="#" class="w3-bar-item w3-button">Skirts</a>
                  <a href="#" class="w3-bar-item w3-button">Shirts</a>
                  <a href="#" class="w3-bar-item w3-button">Polo</a>
                </div>

                <div class="w3-right">
                  <a href="#" class="w3-bar-item w3-button">Trousers</a>
                  <a href="#" class="w3-bar-item w3-button">Ankara</a>
                  <a href="#" class="w3-bar-item w3-button">Gowns</a>
                  <a href="#" class="w3-bar-item w3-button">Footwear</a>
                  <a href="#" class="w3-bar-item w3-button">Accessories</a>
                </div>
              </div>
            </div>
             <!-- third -->
            <div class="w3-dropdown-hover">
              <button class="w3-button">Children</button>
              <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <div class="w3-left">
                  <a href="#" class="w3-bar-item w3-button">Jeans</a>
                  <a href="#" class="w3-bar-item w3-button">Suits</a>
                  <a href="#" class="w3-bar-item w3-button">Skirts</a>
                  <a href="#" class="w3-bar-item w3-button">Shirts</a>
                  <a href="#" class="w3-bar-item w3-button">Polo</a>
                </div>

                <div class="w3-right">
                  <a href="#" class="w3-bar-item w3-button">Trousers</a>
                  <a href="#" class="w3-bar-item w3-button">Ankara</a>
                  <a href="#" class="w3-bar-item w3-button">Footwear</a>
                  <a href="#" class="w3-bar-item w3-button">Accessories</a>
                </div>
              </div>
            </div>
          </div>
           <div class="col-md-6 w3-right">
            <form method="POST" action="">
              <input type="text" placeholder="Flash Dictionary" name="flashdict" class="form-control" style="width:70%;float: left;">
              <input type="submit" value="Search" class="btn btn-danger" name="flashdict_btn" style="width:auto; height: 40px;margin-left: 10px;">
            </form>
              
          </div>
        </div>
        <br>
        <!-- clothings -->
        <div class="container-fluid row" style="height: auto;width: auto;">
            <div class="col-md-2 " style="height:auto;padding: 20px;">
                <div class="w3-green w3-text-center" style="height:auto;padding: 20px;">
                  <h1> CLOTHING </h1>
                </div>
            </div>
            <div class="col-md-8  container-fluid " style="height:auto;">
                      <form method='POST' action=''>
                    <?php
                      $catalog = new catalog();
                        $catalog_result = $catalog ->get_all();
                        while($row_result = mysqli_fetch_assoc($catalog_result)) {
                          echo "<div class='w3-container w3-col l4 m4 s12'>
                              <div class='w3-display-container'>
                               <img src='../assets/img/". $row_result['image_name'].".jpg' style='width:100%'>
                                
                                
                             <span class='w3-tag w3-display-topleft'>" .$row_result['status']."</span>
                                <div class='w3-display-middle w3-display-hover'>
                                  <button class='w3-button buy' ><a href='viewcart.php'>Buy now <i class='fa fa-shopping-cart'></i></a></button>
                                  
                                </div>
                              </div>
                              <p>"."
                              ". $row_result['description'] ." <input type='checkbox' name='addcart[]' value='".
                                $row_result['name'] ."'><br>". $row_result['price']."
                                
                                </b>
                              </p>
                              <hr>
                            </div>
                           
                            ";
                                        }  

                              //adding the item to cart with checkbox
                         //this is what i want to do 
                          //i want to get the selected items 
                          //then add them to db 
                          // in  the view cart form i just want to retrieve already added item 

                              // by the user if logged in and if not logged in 
                              // i want to  

                                // av finally gotten the values , 
                                // now i will create an array and 
                                //push the values into the array singly
                            //define a new array
                                  $cart_array = array();
                                  //assigning a global variable to the array 
                                  $_SESSION['cart'] = $cart_array;

                     if(isset($_POST['cart'])){
                        if(!empty($_POST['addcart'])){
                            foreach($_POST['addcart'] as $key ) {
                              array_push($cart_array, $key);
                              // var_dump($cart_array);
                              $_SESSION['cart'] = $cart_array;
                              // var_dump($_SESSION['cart']);
                              
                          }


                        }else{
                          echo "Nothing selected ";
                        }
                      }
                    ?><input type='submit' class='btn btn-xs' name='cart' value ='Add to Cart' >
                   
                   </form>
                      
            </div>
            <br>
            <div class="col-md-2 " style="height:300px;">
                <div class="w3-green w3-text-center" style="height:auto;padding: 20px;">
                  <h1> News Feeds </h1>
                </div>
            </div>
    
          </div>
       
        <!--  <h2 class="text-center h2-responsive">WELCOME TO FLASHION</h2> -->
    <div class="navbar w3-left w3-red w3-text-white" style="height: 100px; width: 100px;padding: 30px;float: right;margin-bottom: 100px" >
          <a href="viewcart.php" target="_blank" >
            go to  cart 
           <!--  <form  method="POST" action="">
              
            </form> -->
          </a>
      </div>
    <div class="w3-center navbar-fixed-bottom bottom leg container-fluid">

        <h3 class="btm"> All Rights Reserved <a href="index.php">flashion.com</a> &copy 2018 </h3>
    </div>
    
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
</body>

</html>
