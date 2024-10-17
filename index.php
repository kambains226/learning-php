<?php
	require_once "variables.php";
    if (isset($_GET['page'])){
        require_once $_GET['page'] . ".php";

    
    }
    else{
        require_once 'home.php';
    }

?>

<!doctype html>
<html>
	<head>
		<title><?php echo "$CODE" ?></title>
		<link rel="stylesheet" href="uon.css" />
	</head>

	<body>
		<header>
			<img src="logo.jpg" alt="logo" />
			<?php
			echo "$navigation";
			?>
		</header>
		<section></section>
		<main>
            <?php
            echo "<h1>$title</h1>";
            echo "<p>$content</p>";
             ?>

        </main>
<aside>
<ul>
<?php
			// echo "$navigation";
			if (empty($_GET['year'])){
				echo "$navigation";
			}
			else if($_GET['year'] == 1){
				echo "<li>Year 1</li>";
				echo "<ul>";
				echo "<li><a href='index.php?page=csy1014&year=1'>CSY1014 Computer Systems</a></li>";
				echo "<li><a href='index.php?page=csy1017&year=1'>CSY1017 Computer Communications</a></li>";
				echo "<li><a href='index.php?page=csy1018&year=1'>CSY1018 Internet Technology</a></li>";
				echo "<li><a href='index.php?page=csy1019&year=1'>CSY1019 Software Engineering 1</a></li>";
				echo "<li><a href='index.php?page=csy1026&year=1'>CSY1026 Databases 1</a></li>";
				echo "</ul>";
			}

			else if ($_GET['year'] == 2){
				echo "<li>Year 2</li>";
				echo "<ul>";
				echo "<li><a href='index.php?page=csy2001&year=2'>CSY2001 Computer Networks</a></li>";
				echo "<li><a href='index.php?page=csy2002&year=2'>CSY2002 Operating Systems</a></li>";
				echo "<li><a href='index.php?page=csy2006&year=2'>CSY2006 Software Engineering 2</a></li>";
				echo "<li><a href='index.php?page=csy2027&year=2'>CSY2027 Group Project</a></li>";
				echo "<li><a href='index.php?page=csy2089&year=2'>CSY2089 Web Programming</a></li>";
				echo "</ul>";
			}

			else if ($_GET['year'] == 3 ){
				echo "<li>Year 3</li>";
				echo "<ul>";
				echo "<li><a href='index.php?page=csy3010&year=3'>CSY3010 Media Technology</a></li>";
				echo "<li><a href='index.php?page=csy3013&year=3'>CSY3013 Software Engineering 3</a></li>";
				echo "<li><a href='index.php?page=csy3015&year=3'>CSY3015 Real Time and and Embedded Systems</a></li>";
				echo "<li><a href='index.php?page=csy4010&year=3'>CSY4010 Computing dissertation</a></li>";
				echo "</ul>";
			}
			
		
			?>

</aside>

<footer>
&copy; Small text at the bottom just because it seems necessary
</footer>

</body>

</html>
