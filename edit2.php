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

if (isset($_GET['oldEmail'])) {
    $email = $_GET['oldEmail'];
    

    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("UPDATE person SET
            firstname = :firstname,
            surname = :surname,
            birthday = :birthday,
            email = :email
        WHERE email = :oldEmail");

        $stmt->execute([
            'firstname' => $_POST['firstname'],
            'surname' => $_POST['surname'],
            'birthday' => $_POST['birthday'],
            'email' => $_POST['email'],
            'oldEmail' => $email
        ]);
        
        $email = $_POST['email'];
        
        
    }
    if(isset($_POST['delete'])){
        // $stmt = $pdo->prepare("DELETE FROM person WHERE email = :email");
        // $stmt->execute(['email' => $_POST['delete']]);
        echo $_POST['delete'];
        $stmt = $pdo->prepare("DELETE FROM person WHERE email = :email");
        $stmt->execute(['email' => $_POST['delete']]);

        
    }   
    $stmt = $pdo->prepare("SELECT * FROM person WHERE email = :email");
    $stmt->execute(['email' => $email]);

    // foreach ($stmt->fetch() as $row) {
    //     echo $row['firstname'] . '<br>';
    // }
    
    $user = $stmt->fetch();

    $stmt = $pdo->prepare("SELECT * FROM person");
    $stmt->execute();
    $allUsers = $stmt->fetchAll();
    echo '<ul>';
    foreach ($allUsers as $row) {
        echo '<li>';
        echo '<a href="edit2.php?oldEmail=' . htmlspecialchars($row["email"]) . '">';
        echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['surname']) . ' ' . htmlspecialchars($row['email']) . ' ' . htmlspecialchars($row['birthday']);
        echo '</a>';
        echo '<form action="edit2.php?oldEmail=' . htmlspecialchars($email) . '" method="POST" style="display:inline;">';
        echo '<input type="hidden" name="email" value="' . htmlspecialchars($row['email']) . '">';
        echo '<button type="submit" name="delete" value="' . htmlspecialchars($row['email']) . '">DELETE</button>';
        echo '</form>';
        echo '</li>';
    }
    echo '</ul>';
    
    
} 
?>


<form action="edit2.php?oldEmail=<?php echo $user['email']?>"method='POST'>
    <label for="firstname">firstname:</label>
    <input type="text" id="search" name="firstname" value="<?php echo $user['firstname'] ?>">
    <label for="sort">surname:</label>
    <input type ="hidden" name="oldEmail"value="<?php echo $email; ?>">
    <input type="text" id="search" name="surname"value="<?php echo $user['surname'] ?>">
    <label for="sort">email:</label>
    <input type="text" id="search" name="email"value="<?php echo $user['email'] ?>">
    <label for="birthday">birthday:</label>
    <input type="date" id="search" name="birthday"value="<?php echo $user['birthday'] ?>">
  
   
    <input type="submit" value="Search" name="submit">
</form>




<?php ?>

