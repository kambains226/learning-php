

<form action ="form.php" method="GET" >
    <input type="Text" name="firstname">
    <input type="Text" name="lastname">

    <input type="submit" value="Submit" name="submit_name">
</form>

<?php
    if(isset($_GET['submit_name'])){
        echo "Hello " . $_GET['firstname'] . " " . $_GET['lastname'];
        // echo var_dump($_GET);
    }
?>

<form action ="form.php" method="GET" >
    <input type="number" name="num1">
    <input type="input" name = "operator">
    <input type="number" name="num2">
    
    <input type="submit" value="Submit" name="sub_num">
</form>
<?php
    if(isset($_GET['sub_num'])){
       if($_GET['operator'] == '+'){
           echo $_GET['num1'] + $_GET['num2'];
       }
        // echo var_dump($_GET);
        else if($_GET['operator'] == '-'){
            echo $_GET['num1'] - $_GET['num2'];
        }
        else if($_GET['operator'] == '*'){
            echo $_GET['num1'] * $_GET['num2'];
        }
        else if($_GET['operator'] == '/'){
            echo $_GET['num1'] / $_GET['num2'];
        
    }
}
?>

<form action ="form.php" method="GET" >
    <input type="input" name="input">
    
    <input type="submit" value="Submit" name="reverse">
</form>
<?php
    if(isset($_GET['reverse'])){
        echo strrev($_GET['input']);
        // for($i = strlen($_GET['input']) - 1; $i >= 0; $i--){
        //     echo $_GET['input'][$i];
        // }
    }
?>