<?php
    if(session_start()){
        session_destroy();
        session_unset();
    }
    echo "<script type='text/javascript'>
                      function redirectform() {
                          window.location ='../views/default.php';
                          alert('Thanks For Using flashion.com');
                      };
                      redirectform();
                 </script>";
?>