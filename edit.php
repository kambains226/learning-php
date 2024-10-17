
<style>
form {display: block}
form label, form input , form select , form textarea{width: 200px;float: left;}
input[type="submit"] {clear:both;margin-left: 200px;}
form label {clear:left}
</style>

<?php

$valid = false;
if (isset($_POST['add'] )){
   
    $config = json_decode(file_get_contents('config.json'), true);

    $server = $config['server'];
    $username = $config['username'];
    $password = $config['password'];
    $schema = $config['schema'];
        
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
    $stmt = $pdo->prepare("UPDATE person SET");
                           
    $birthday = $_POST['birthday'];
    $formatted_birthday = (new DateTime($birthday))->format('Y-m-d');
    


    $unset($_POST['submit']);
    $stmt->execute($_POST);


    echo '<ul';
    foreach($stmt as $row){
        echo $row['firstname'] . ' ' . $row['surname'] . ' ' . $row['birthday'] . ' ' . $row['email'] . '<br>';
    }
    
    
    

}






?>


<form method="GET" action="edit.php">
    <label for="firstname">firstname:</label>
    <input type="text"  name="firstname" >
    <label for="surname">surname:</label>
    <input type="text"  name="surname" >
    <label for="birthday">birthday:</label>
    
    <input type="date"name='birthday'>
    

   
    <label for="email">email:</label>
    <input type="text"  name="email" value="">

    
    <input type="submit" value="Submit" name="add">

</form>

<?php ?>