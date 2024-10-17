<?php 

    if (isset($_GET['num'])){
        $num = $_GET['num'];
        $num = $num * 2;
        echo "The double of the number is $num";
    }
    else{
        echo "No number specified";
    }
  
?>