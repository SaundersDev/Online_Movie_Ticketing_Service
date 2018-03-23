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
<?php $user = $_POST["fname"];
	if($user)
		$_SESSION["fname"] = $user;
		$_SESSION["username"] = $_POST["username"] ?>
<a href ="homepage.php" id = "home">
	<img src="images/home.png" alt="Home Page" style="width:150px;height:150px;"/>
</a>
<a href = "pastmovies.php" id = "pastMovies">
	<img src="images/pastmovies.jpg" alt = "Past Movies" style = "width:150px;height:150px;" />
</a>
<h1>
	Hello <?php echo $_SESSION["user"] ?> !
</h1>

</body>