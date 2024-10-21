<style>
form {display: block}
form label, form input , form select , form textarea{width: 200px;float: left;}
input[type="submit"] {clear:both;margin-left: 200px; margin-bottom: 100px;}
form label {clear:left}
li {margin-bottom: 40px;}
</style>


<?php

$config = json_decode(file_get_contents('config.json'), true);

$server = $config['server'];
$username = $config['username'];
$password = $config['password'];
$schema = $config['schema'];

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if(isset($_GET['platformID'])){
    
    $gameList = $pdo->prepare('SELECT * FROM game WHERE platformID = :platformID');


    $gameList->execute(['platformID' => $_GET['platformID']]);
    echo 'GAMES: ' ;
    echo '<ul>';
    foreach($gameList as $game){
        echo '<li>';
        echo '<a href=viewgame.php?id='.htmlspecialchars($game['id']).'>';
        echo $game['name'];
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
}

$platformlist = $pdo->query('SELECT * FROM platform');

$platformlist -> execute();


echo 'PLATFORMS: ';
echo '<ul>';
foreach ($platformlist as $platform) {
  
    echo '<li>';
    echo '<a href=viewgame.php?platformID='.htmlspecialchars($platform['id']).'>';
    echo  $platform['name'];
    echo '</a>';
    echo '</li>';

}   
echo '</ul>';


if(isset($_GET['id'])){
   
    // $gameName = $pdo->query('SELECT * FROM game WHERE id = "'.$_GET['id'].'"')->fetch();

    $gameName = $pdo->prepare('SELECT * FROM game WHERE id = :id');
  
    
    
    
    if(isset($_POST['gsubmit'])) {
        
        
        $gameQuery = $pdo->prepare('UPDATE game SET name = :name,
                                                platformID =:platformID
        WHERE id = :id');
        // $pID = $pdo->query('SELECT * FROM platform WHERE  = "'.$gameName['platformID'].'"')->fetch();
        $pID = $pdo->prepare('SELECT * FROM platform WHERE  name = :name');

        $pID->execute(['name' => $_POST['platform']]);
        $pID = $pID->fetch();

       

        $gameQuery->execute([
            'name' => $_POST['game'],
            'platformID' => $pID["id"],
            'id' => $_GET['id']
        ]);
        
        
        $gameName ->execute(['id' => $_GET['id']]);
        $gameName = $gameName->fetch();
        
    }
    $assigned = $pdo -> query('SELECT * FROM platform WHERE id = "'.$gameName['platformID'].'"')->fetch();
        
    
?>

<form method="post" action="viewgame.php?id=<?php echo htmlspecialchars($_GET['id']); ?> ">
    <label for="game">Game: </label>
    <input type="text" name="game" id="game" value="<?php echo htmlspecialchars($gameName['name']);?>">
    <label for="platform-select">Platform: </label>
    <select name="platform" id="platform-select">
        <!-- Options can be added here -->
         <?php 
            $platforms = $pdo->query('SELECT * FROM platform');
           
            echo '<option >'.$assigned['name'].'</option>';
           
           
            foreach ($platforms as $platform) {
                if ($platform['name'] !== $assigned['name']) {
                    echo '<option value="' . htmlspecialchars($platform['name']) . '">';
                    echo htmlspecialchars($platform['name']);
                    echo '</option>';
                }
            }
         ?>;
    </select>
    
    <input type="submit" name="gsubmit" value="Submit">
</form>

<?php
}
?>