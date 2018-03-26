<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<?php
	require_once('connectDatabase.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$_SESSION["Title"] = $_POST["movieTitle"];
		$_SESSION["fname"] = $_POST["fname"];
		$_SESSION["username"] = $_POST["username"];
	}
?>
<html>
<head>
<h1> Hello <?php echo $_SESSION["username"]; ?> ! </h1>
<link rel="stylesheet" type="text/css" href="styling.css">
<style>img{}
div{
	min-width: 400px;
	max-width: 500px;	
	background-color: #efefef;
	clear: left;
	border: 1px solid red;
	padding: 15px;
	margin: 15px;
}</style>
</head>

<body>

<div class="header" style= "height: auto; width: 100%">
	<li><?php echo '<a href ="customerDashboard.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Home</a></li>
	<li><?php echo '<a href ="customerHistory.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">'?>Viewing History</a></li>
	<li><?php echo '<a href ="customerPurchases.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">'?>Current Purchases</a></li>
	<li><?php echo '<a href ="customerProfile.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Profile</a></li>
	<li><?php echo '<a href ="login.php" id = "home">'?>Logout</a></li>
</div>

<h2 style=>Now Playing</h2>

<?php
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	
	$movieTitle = "select MovieTitle from theatercomplex_movie_showing where startdate <= Current_Date and EndDate > CURRENT_DATE;";
	$result = mysqli_query($conn, $movieTitle);
	while($row = $result->fetch_assoc()) {
		if (new DateTime() < new DateTime()) {
		?>
		
		<div id="text" style= "height: auto;" "width: 31.3%;">
		<h2><?php echo "" . $row["MovieTitle"]."";?></h2>
		
		<?php
			echo '<a href ="customerMovie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["MovieTitle"].'" id = "home">'
		?>
			<img src="images/<?php echo "".$row["MovieTitle"]."";?>.jpg" style= text-align: center;/>
			</a>
		</div>
		<?php
		}
		else {
			echo "0 results";
		}
	}
	
?>
</body>