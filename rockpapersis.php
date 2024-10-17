<?php
    if(isset($_GET['choice'])){
        $choices = ['rock', 'paper', 'scissors'];
        $computerChoice = $choices[rand(0,2)];
        $userChoice = $_GET['choice'];
        echo "Computer chose: $computerChoice <br>";
        echo "You chose: $userChoice <br>";
        if($computerChoice == $userChoice){
            echo "It's a draw";
        }
        else if($computerChoice == 'rock' && $userChoice == 'scissors'){
            echo "Computer wins";
        }
        else if($computerChoice == 'rock' && $userChoice == 'paper'){
            echo "You win";
        }
        else if($computerChoice == 'paper' && $userChoice == 'rock'){
            echo "Computer wins";
        }
        else if($computerChoice == 'paper' && $userChoice == 'scissors'){
            echo "You win";
        }
        else if($computerChoice == 'scissors' && $userChoice == 'rock'){
            echo "You win";
        }
        else if($computerChoice == 'scissors' && $userChoice == 'paper'){
            echo "Computer wins";
        }
    }
?>


<a href="rockpapersis.php?choice=rock">Rock</a>
<a href="rockpapersis.php?choice=paper">Paper</a>
<a href="rockpapersis.php?choice=scissors">Scissors</a>




<!-- <form>

    <input type="radiobox" name="" id="">

</form> -->