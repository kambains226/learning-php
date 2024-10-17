

<?php 
    if (isset($_GET['num1']) && isset($_GET['num2'])){
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $sum = $num1 * $num2;
        echo "The double of the number is $sum";
    }
    else{
        echo "No number specified";
    }
?>