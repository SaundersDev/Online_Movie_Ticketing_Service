<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="homepage.css">
</head>
<body>
<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$_SESSION["fname"] = $_POST["fname"];
		$_SESSION["username"] = $_POST["username"];
	}
	else{
		$_SESSION["fname"] = $_GET["fname"];
		$_SESSION["username"] = $_GET["username"];
	}?>

<?php echo '<a href ="homepage.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>
	<img src="images/home.png" alt="Home Page" style="width:150px;height:150px;"/>
</a>
<a href = "pastmovies.php" id = "pastMovies">
	<img src="images/pastmovies.jpg" alt = "Past Movies" style = "width:150px;height:150px;" />
</a>
<h1>
	Hello <?php echo $_SESSION["fname"]; ?> !
</h1>

</body>