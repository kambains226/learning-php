<style>
form {display: block}
form label, form input , form select , form textarea{width: 200px;float: left;}
input[type="submit"] {clear:both;margin-left: 200px; margin-bottom: 100px;}
form label {clear:left}
</style>


<?php
$config = json_decode(file_get_contents('config.json'), true);

$server = $config['server'];
$username = $config['username'];
$password = $config['password'];
$schema = $config['schema'];
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
if (isset($_POST['psubmit'])) {
    
    


    $platformQuery = $pdo->prepare("INSERT INTO platform (name) VALUES (:name)");

    
    $platformQuery -> execute([
        'name' => $_POST['platform']
    ]);



}
if (isset($_POST['gsubmit'])) {
    $gameQuery = $pdo->prepare('INSERT INTO game (name,platformID) 
                                        VALUES (:name, :platformID)');

    $platformID = $pdo->query('SELECT id FROM platform WHERE name = "'.$_POST['platform'].'"')->fetch()['id'];

    
    $gameQuery->execute([
        'name' => $_POST['game'],
        'platformID' => $platformID
    ]);
}
?>



<form method="post" action="game.php">
    <label for="platfrom">Platform: </label>
    <input type="text" name="platform" id="">
    <input type="submit" name="psubmit" value="Submit">




</form>






<form method="post" action="game.php">
    <label for="game">Game: </label>
    <input type="text" name="game" id="game">
    <label for="platform-select">Platform: </label>
    <select name="platform" id="platform-select">
        <!-- Options can be added here -->
         <?php 
            $platforms = $pdo->query('SELECT * FROM platform');
            foreach ($platforms as $platform) {
                echo '<option >'.$platform['name'].'</option>';
            }
         ?>;
    </select>
    <option value=""></option>
    <input type="submit" name="gsubmit" value="Submit">
</form>