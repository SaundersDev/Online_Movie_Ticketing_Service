<?php
session_start(); 
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
  	<link rel="stylesheet" type="text/css" href="styling.css">
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
	<div class="header" style= "height: auto; width: 100%;">
		<li><?php echo '<a href ="AdminHomepage.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>AdminHomepage</a></li>
		<li><?php echo '<a href ="members.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">'?>Manage Members</a></li>
		<li><?php echo '<a href ="theaters.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Manage Theater Complexes</a></li>
		<li><?php echo '<a href ="movie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Manage Movies</a></li>		
		<li><?php echo '<a href ="login.php" id = "home">'?>Logout</a></li>
	</div>		

<br><br><br>

<h1>
	Hello <?php echo $_SESSION["fname"] ?> ! (admin)
	<br><br>
	Username is <?php echo $_SESSION["username"] ?> 
</h1>

</body>

</html>
