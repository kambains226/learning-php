<?php

    if(isset($_GET['start'] ) && isset($_GET['end'])){
        echo'<ul>';
        for($i = $_GET['start']; $i < $_GET['end']; $i++){
            echo '<li>' . $i . '</li>';
        }
        echo '</ul>';
    }
    else{
        echo " no";
    }
?>