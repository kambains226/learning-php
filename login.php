<?php
session_start();
$config = json_decode(file_get_contents('../config.json'), true);

$server = $config['server'];
$username = $config['username'];
$password = $config['password'];
$schema = 'csy2089';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if(isset($_POST['login'])){

    
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");

        $stmt->execute([$_POST['username']]);


        $user = $stmt->fetch();
        if($stmt->rowCount() > 0){
            if(password_verify($_POST['password'],$user['password'])){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                header("Location: logincheck.php");
            }
    }
    else{
        echo "Invalid username or password.";
    }

    
   
    
}
?>

<form action="login.php" method="post">
<label for="username">Username</label>
<input type="text" id="username" name="username" required>
<label for="password">Password</label>
<input type="password" id="password" name="password" required>
<input type="submit" value="Login"name='login'>
</form>

<?php


?>