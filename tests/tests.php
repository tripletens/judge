<form method="POST" action="">
    <input type='checkbox' name='addcart[]' value="hello">
    <input type='checkbox' name='addcart[]' value="hello1">
    <input type='checkbox' name='addcart[]' value="hello2">
    <input type="submit" name="cart">
</form>
<form method="POST" action="">
</form>
  <!-- <div class="col-md-6">
            <form method="POST" action="">
              <input type="text" placeholder="Flash Dictionary" name="flashdict" class="form-control" style="width:70%;float: left;">
              <input type="submit" value="Search" class="button btn-danger" name="flashdict_btn" style="width:20%; height: 40px;margin-left: 10px;">
            </form>
              
          </div> -->
<!-- 
          <div class="container-fluid">
                  <div class="w3-row w3-grayscale">
                    <form method='POST' action=''>
                    <?php
                      $catalog = new catalog();
                        $catalog_result = $catalog ->get_all();
                        while($row_result = mysqli_fetch_assoc($catalog_result)) {
                          echo "<div class='w3-container w3-col l4 m4 s12'>
                              <div class='w3-display-container'>
                                <div class='w3-dropdown-hover'>
                                  <img src='../assets/img/". $row_result['image_name'].".jpg' style='width:100%'>
                                  <div class='w3-dropdown-content' style='width:300px'>
                                    <img src='../assets/img/". $row_result['image_name'].".jpg' style='width:200%'>
                                  </div>
                                </div>
                                
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
                <!--   <?php
                    //if button is clicked
                    //then if check box is empty
                    //then if show selected item 
                      
                        

                  ?> -->
                </div>

            </div> -->
<?php

    class parentClass{
        public $greetings;
        function __construct(){
           echo $this->greetings = "This is parent Class </br>";
           echo md5('nonny');
        }

    }
    class childClass extends parentClass{
        function __construct(){
            if(isset($_POST['cart'])){
                      if(!empty($_POST['addcart'])){
                          foreach($_POST['addcart'] as $key ) {
                            echo $key;
                        }
                      }else{
                        echo "Nothing selected ";
                      }
                    }
            }
    }
    echo rand(6,100000);
    $parentClass = new parentClass();
    $childClass = new childClass();
?>