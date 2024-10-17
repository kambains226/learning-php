
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
if(isset($_POST['submit'])){
    
    $sort = $_POST['sort'];
    $stmt = $pdo->prepare("SELECT * FROM person WHERE $sort = :field");
    $stmt->execute(['field' => $_POST['search']]);
    
    echo "<ul>";

    foreach ($stmt->fetchAll() as $row){
        echo "<li>";
        echo $row['firstname'] . ' ' . $row['surname'] . ' ' . $row['birthday'] . ' ' . $row['email'] . '<br>';
        echo "</li>";
    }
    echo "</ul>";
    
}




?>
<form action="list.php"method='post'>
    <label for="search">search:</label>
    <input type="text" id="search" name="search">
    <label for="sort">Search by:</label>
    <select name="sort" id="sort">
        <option value="firstname" name="firstname">Firstname</option>
        <option value="surname" name="surname">Surname</option>
        <option value="birthday"name ="birthday">Birthday</option>
        <option value="email" name="email">Email</option>
    </select>

    <input type="submit" value="Search" name="submit">
</form>






<?php ?>

<script >
    document.getElementById('sort').addEventListener('change', function(){
        let search= document.getElementById('search');
        console.log(this.value);
        if(this.value === 'birthday'){
            search.type = 'date';
        }
        else{
            search.type = 'text';
        }
    });
</script>