<?php
session_start();

if(isset($_SESSION['login'])){

    
    unset($_SESSION['login']);
    $_SESSION['login'] = false;
    header("Location: logincheck.php");
}


?>