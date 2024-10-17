<?php

function combi ($start,$end){

    for($i=$start; $i<=$end; $i++){
        for($j=$start; $j<=$end; $j++){
            echo $i . $j . "<br>";
        }
    }

}
if(isset($_GET['input'])){
    $input = $_GET['input'];
    echo count($input);
    $length=0;
    foreach($input as $value){
        echo $value . "<br>";
        $length++;

    }

}
?>

<form method="GET" action="array.php">
    <input type="text" name="input[]" value="<?=
    htmlspecialchars($_GET['input'][0]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][1]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][2]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][3]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][4]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][5]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][6]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][7]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][8]?? '')?>">
    <input type="text" name="input[]"value="<?=
    htmlspecialchars($_GET['input'][9]?? '')?>">
    <input type="submit" value="Submit" name="combination">
</form>
