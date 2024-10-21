
<style>
form {display: block}
form label, form input , form select , form textarea{width: 200px;float: left;}
input[type="submit"] {clear:both;margin-left: 200px; margin-bottom: 100px;}
form label {clear:left}

</style>

<?php




$config = json_decode(file_get_contents('../config.json'), true);

$server = $config['server'];
$username = $config['username'];
$password = $config['password'];
$schema = $config['schema'];
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if (isset($_POST['insubmit'] )){
    
    $stmt = $pdo->prepare("INSERT INTO person (firstname, surname, email, birthday) VALUES (:firstname, :surname, :email, :birthday)");
    $stmt->execute([
        ':firstname' => $_POST['firstname'],
        ':surname' => $_POST['surname'],
        ':email' => $_POST['email'],
        ':birthday' => $_POST['birthday']]);



}

?>



<form action="add.php"method='post'>
    <label for="firstname">firstname:</label>
    <input type="text" id="search" name="firstname">
    <label for="sort">surname:</label>
    <input type="text" id="search" name="surname">
    <label for="sort">email:</label>
    <input type="text" id="search" name="email">
    <label for="birthday">birthday:</label>
    <input type="date" id="search" name="birthday">
  

    <input type="submit" value="Search" name="insubmit">
</form>

