
<?php
    $valid=false;
    if(isset($_GET['submit_name']))
    {
        
            if(!empty($_GET['firstname']) && !empty($_GET['lastname']) && filter_var($_GET['address'], FILTER_VALIDATE_EMAIL) && !empty($_GET['colour'] &&!empty($_GET['terms']))){
                $valid=true;
                
                echo $_GET['title'] . "<br>" ;
                echo $_GET['firstname'] . " " . $_GET['lastname'] . "<br>";
                echo $_GET['address'] . "<br>";
                echo $_GET['colour'] . "<br>";
    
            
                echo "Terms and conditions accepted";
                
                
            }
            else{
                $valid=false;
                if(empty($_GET['firstname'])){
                    
                    echo "First name is empty <br>";
                }
                if(empty($_GET['lastname'])){
                    echo "Last name is empty <br>";
                }
                // if(empty($_GET['address']) ){
                //     echo "Address is empty <br>";
                // }
                if(!filter_var($_GET['address'], FILTER_VALIDATE_EMAIL)){
                    echo "Address is not valid <br>";
                }
                if(empty($_GET['colour'])){
                    
                    echo "Colour is empty <br>";
                   
                }
                if(empty($_GET['terms'])){
                    echo "Terms and conditions not accepted<br>";
            }
        
    }
        
        
        
    }
    if ($valid== false){
        
?>  



<form action="form2.php" method="GET">
    <label for="firstname">First Name:</label>
    <input type="input" name="firstname" value="<?= htmlspecialchars($_GET['firstname'] ??'')
    ?>">
    <label for="lastname">Last Name:</label>
    <input type="input" name="lastname" value="<?= htmlspecialchars($_GET['lastname'] ?? '')
    ?>">
    <textarea name="address" ?><?= htmlspecialchars($_GET['address']?? '') ?></textarea>
    <input type="input" name="colour" value="<?= htmlspecialchars($_GET['colour'] ?? '')?>">
    <select name="title" >
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Miss">Miss</option>
        <option value="Ms">Ms</option>
    </select>
    <label for = "terms" >terms</label>
    <input type="checkbox" name="terms" id="terms">
    <input type="submit" value="Submit" name="submit_name">

</form>
<?php
    }?>
