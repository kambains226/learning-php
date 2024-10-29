<?php
session_start();
if(isset($_SESSION['login'])&&$_SESSION['login'] == true){
    echo "Welcome ".$_SESSION['username'];
    echo "<br>";
    echo "click here to log out "."<a href='logout.php'>Logout</a>";
}
else if($_SESSION['login'] == false){
    echo "you have been logged out click here to log back in";
    echo "<a href='login.php'>Login</a>";
}
else {

    echo "Login denied click this link to login ";
    echo "<a href='login.php'>Login</a>";
}

?>