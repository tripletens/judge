<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    
    include('../controllers/logics.php');

    
    // if ( $_SESSION['email'] == "" && !isset($_SESSION['email'])) {
        
    //     header('Location: login.php');
    // }

?>
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
         <div class="container-fluid row">
        <h1 class="email col-md-4 col">
            <span class="glyphicon glyphicon-envelope"></span>
            Email : flashion@gmail.com

        </h1>
        <!-- <span class="social col-md-6 row"> 
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
        </span> -->
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
                  <a class="navbar-brand" href="./../index.php">Flashion </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-right">
                    <li role="presentation" class="active"><a href="index.php">Home</a></li>
                        <li role="presentation"><a href="login.php">Login</a></li>
                        <li role="presentation"><a href="signup.php">Sign up</a></li>
                        <li role="presentation"><a href="contact.php">Contact</a></li>
                  </ul>
                   <div class="container col-md-8" style="float: right;">

                    <form class="form-inline">
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
                        <a href="signup.php" style="float: right;color: #000;"> Not Registered?  | </a>
                        <a href="fpass.php" style="float: right;color: #000;"> Forgotten Password?  |</a> 
                      <!-- <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                      </div> -->
                    
                    </form>

                </div>
                </div>
              </div>
            
        <!-- </div> -->

    </div>
      <br>
        <div class="form-group w3-card-4 form-inline w3-center w3-margin" style="padding: 20px;">
            <input type="text" name="item" placeholder="Search For Items" class="form-control">
            <button class="btn btn-md w3-red" type="submit">Search</button>
                       
        </div>
        <br><br><br><br><br>
    <div class="container">
        <h1 class="w3-center">
          View Cart
        </h1>
        <div class="container row w3-card-4 w3-padding-16">
          <form method="POST" action="">
            <div class="col-md-6"> 
              <h2>Lists Of Items</h2>
              <br>
              <ul style=" list-style-type: square;">

                  <?php 
                    //select from db where name = "$_session['cart']"
                    $add_to_cart = new add_to_cart();
                    
                    if(count($_SESSION['cart']) == 0){
                      echo "<h1 class='w3-text-red'> NO ITEM SELECTED <p><a href='default.php'> Go to catalog</a></p></h1>";
                    }
                   else{
                      foreach ($_SESSION['cart'] as $name ) {

                         $add_to_cart_result = $add_to_cart ->get_items_from_session($name);

                          while ($row = mysqli_fetch_assoc($add_to_cart_result)) {
                            echo "<li style='text-decoration:none;'> Name : " . $row['name'] . "</li>" . " 
                                <button class='pull-right alert alert-danger btn btn-danger' name='delete'> X </button>
                                
                              <img src='../assets/img/" . $row['image_name'] . ".jpg' class='img-responsive img-thumbnail'><br>
                             <p> Description : " . $row['description'] . " <br> 
                             Price : " . $row['price']. "</p>
                             ";
                             if(isset($_POST['delete'])){
                                  foreach ($_SESSION['cart'] as $shit) {
                                    if($name == $row['name']){
                                      array_pop($_SESSION['cart']);
                                    }
                                  }
                              }
                              
                          }
                        
                      } 
                    }
                    //checking to see if the cart array is empty


                  ?>
              </ul>
            </div>
            <div class="col-md-6 pull-right"> 
              <h2>Details for Breakdown of Payment</h2>
              <br>
              <h3>Item and Price </h3>
              <h3>Vat %</h3>
              <!-- <h3>A button to check out to a payment system</h3> -->
              <input type="submit" name="Check Out" class="form-control button btn-default" value="Check Out">
            </div>
          </form>
        </div>
    </div>
    <br><br>
    <div class="w3-center bottom navbar-fixed-bottomleg container-fluid">
        <h3 class="btm"> All Rights Reserved <a href="index.php">flashion.com</a> &copy 2018 </h3>
    </div>
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
</body>

</html>
