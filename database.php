
<style>
form {display: block}
form label, form input , form select , form textarea{width: 200px;float: left;}
input[type="submit"] {clear:both;margin-left: 200px;}
form label {clear:left}
</style>

<?php

$valid = false;
if (isset($_POST['data'] )){
    $option = $_POST['field'];
    echo $option;
    $valid = true;
    $config = json_decode(file_get_contents('../config.json'), true);

    $server = $config['server'];
    $username = $config['username'];
    $password = $config['password'];
    $schema = $config['schema'];
    
    
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
    $stmt = $pdo->prepare("SELECT * FROM person WHERE $option = :option");
    


    $stmt->execute([
        ':option' => $_POST['data']
    ]);
    if($valid == true){
        foreach($stmt->fetchAll() as $row){
            echo '<p>'.$row['firstname'].' '.$row['surname']. 'was born on '.$row['birthday'].'and whos email is '.$row['email'].'</p>';
        }
}
    

}






?>


<form method="post" action="database.php">
    <label for="type">Data:</label>
    <input type="text" id="data" name="data" >
    <label for ='field'>Field: </label>
    <select id='field' name='field'>
        <option value='firstname'>Firstname</option>
        <option value='surname'>Surname</option>
        <option value='birthday'>Birthday</option>
        <option value='email'>Email</option>
        <!-- <option value='...'>Add more fields here</option> -->
    </select>
    <br>
    <input type="submit" value="Submit" name="search">

</form>

<?php ?>