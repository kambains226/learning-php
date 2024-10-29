<?php
session_start();

$config = json_decode(file_get_contents('../config.json'), true);

$server = $config['server'];
$username = $config['username'];
$password = $config['password'];
$schema = 'csy2089';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
if(isset($_POST['signin'])){
   
    //plain text
//    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
//    $stmt->execute([$_POST['username'], $_POST['password']]);
//    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
//    $stmt->execute(["username"=>$_POST['username'], "password" =>$_POST['password']]);

   //hashed with sha1
//    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
//    $stmt->execute([$_POST['username'],sha1($_POST['password'])]);


   //hashed with sha1 and salted
//    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
//    $stmt->execute([$_POST['username'],sha1($_POST['USERNAME'].$_POST['password'])]);
   
   //Passwords using the password_hash() function

   $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
   $stmt->execute([$_POST['username'],password_hash($_POST['password'], PASSWORD_DEFAULT)]);


}

?>

<form method="post" action="signin.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type = "submit" value = "Submit" name="signin">
</form>