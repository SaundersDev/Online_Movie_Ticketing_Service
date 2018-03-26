<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Purchases</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
	<style>
		img{
			float: right;
		}
	</style>
</head>

<body>
	<?php require_once('connectDatabase.php'); ?>

	<div class="header">
		<li><?php echo '<a href ="customerDashboard.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Home</a></li>
		<li><?php echo '<a href ="customerHistory.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">'?>Viewing History</a></li>
		<li><?php echo '<a href ="customerProfile.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Profile</a></li>
		<li><?php echo '<a href ="login.php" id = "home">'?>Logout</a></li>
	</div>
	
	<h2>Current Purchases</h2>
	<?php
	$user = $_SESSION["username"];
	echo $user . "<br>";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	$showings = "SELECT MovieTitle, RunningTime, Rating, Director, ProductionCompany, StartTime, TheaterComplexName, ShowingID, NumTixReserved 
	FROM theatercomplex_movie_showing
	INNER JOIN( 
		SELECT Username, NumTixReserved, ShowingID AS SID 
		FROM reservations 
		WHERE Username = '$user' ) AS T 
	INNER JOIN( 
		SELECT StartTime, ID 
		FROM showing 
		WHERE StartTime > CURRENT_DATE ) AS Q 
	INNER JOIN( 
		Select * from movie ) as R 
	WHERE Q.ID = T.SID and Q.ID = theatercomplex_movie_showing.ShowingID and R.Title = theatercomplex_movie_showing.MovieTitle;";
	$result = mysqli_query($conn, $showings);
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()) {
			?>
			<div id="text" style= "height: auto;" "width: 100%;>
		
			<?php echo '<a href ="customerMovie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["MovieTitle"].'" id = "home">'
			?>	
			<img src="images/<?php echo "".$row["MovieTitle"]."";?>.jpg" style="width:150px;height:200px;"/>
			</a>
			
			<?php 
			echo "<br>" . $row["MovieTitle"]. 
			 "<br>" . $row["Rating"].
			 " <br>Run Time: " . $row["RunningTime"]. 
			 "<br>Director: " . $row["Director"] .
			 "<br>Production Company: ". $row["ProductionCompany"].
			 "<br>".$row["StartTime"].
			 "<br>".$row["NumTixReserved"]."<br>";		
			?>
			<?php
				echo '<a href ="processPurchases.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&showingID='.$row["ShowingID"].'" id = "home">'
			?>	
			Cancel Purchase
			</a>			
			</div>
			<?php
		}
	}
	else {
		echo "0 results";
	}
?>
</body>
</html>