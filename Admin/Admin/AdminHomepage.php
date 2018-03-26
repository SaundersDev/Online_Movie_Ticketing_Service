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
	if($_POST["fname"]){
		$user = $_POST["fname"];
		$uname = $_POST["username"];
		$_SESSION["fname"] = $user; 
	// had to comment this^ out for some reason to keep the session username after a refresh?....
	$_SESSION["username"] = $uname; }
		?>
<a href ="AdminHomepage.php" id = "home">
	<img src="images/home.png" alt="Home Page" style="width:150px;height:150px;"/>
</a>
<br><br>
<a href = "members.php">
	Manage Members
</a>
<br><br>
<a href = "theaters.php">
	Manage Theater Complexes
</a>
<br><br>
<a href = "movie.php" >
	Manage Movies
</a>
<br><br><br>

<h1>
	Hello <?php echo $_SESSION["fname"] ?> ! (admin)
	<br><br>
	USERNAME IS <?php echo $_SESSION["username"] ?> 
</h1>
<br><br>
<a href = "login.php" >
	-Log Out-
</a>

</body>

</html>
