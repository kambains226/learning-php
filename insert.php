
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
    $stmt = $pdo->prepare("INSERT INTO person(email,firstname,surname,birthday
     )                                         VALUES(:email,:firstname,:surname,:birthday)");
                           
    $birthday = $_POST['birthday'];
    $formatted_birthday = (new DateTime($birthday))->format('Y-m-d');
    


    $unset($_POST['submit']);
    $stmt->execute($_POST);
    

    

}






?>


<form method="post" action="insert.php">
    <label for="firstname">firstname:</label>
    <input type="text"  name="firstname" >
    <label for="surname">surname:</label>
    <input type="text"  name="surname" >
    <label for="birthday">birthday:</label>
    <!-- <select name="birthday"> </select>
    <select name="birthday"> </select>
    <select name="birthday"> </select> -->
    <input type="date"name='birthday'>
    <!-- <option value="year"></option>
    <option value="month"></option>
    <option value="day"></option> -->

   
    <label for="email">email:</label>
    <input type="text"  name="email" >

    
    <input type="submit" value="Submit" name="add">

</form>

<?php ?>