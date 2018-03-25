<?php
session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Movie</title>
	<link rel="stylesheet" type="text/css" href="movieTixCustomer.css">
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
	</div>
	
	<h2>Movie</h2>
	<?php
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	
	$movieTitle = strval($_GET['title']);
	$result = mysqli_query($conn, "Select * from movie where Title = '$movieTitle'");
		
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()) {
		?>
		<div id="container">
			<a><?php
			echo '<a href ="customerMovie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["Title"].'" id = "home">'
			?>
			<img src="images/<?php echo "".$row["Title"]."";?>.jpg" style="width:150px;height:200px;"/>
			</a>
			<?php 
			echo "" . $row["Title"]. 
			 "<br>" . $row["Rating"].
			 " <br>Run Time: " . $row["RunningTime"]. 
			 "<br>Director: " . $row["Director"] .
			 "<br>Production Company: ". $row["ProductionCompany"].
			  "<br>";
			?>
		</div>
		<?php
		}
		?>
		
		<div>
		<?php
		$showings = "SELECT StartTime, T.TheaterComplexName, ShowingID FROM showing INNER JOIN( select ShowingID, TheaterComplexName, MovieTitle from theatercomplex_movie_showing WHERE MovieTitle = '$movieTitle' ) AS T WHERE showing.ID = T.ShowingID and StartTime > CURRENT_DATE";
		
		$result2 = mysqli_query($conn, $showings);
		while($row2 = $result2->fetch_assoc()) {
			echo '<a href = customerBuying.php?username='.$_SESSION["username"].'&showing='.$row2["ShowingID"].'" id = "home">'
			. $row2["StartTime"]." at ".$row2["TheaterComplexName"]."<br>";?>
			</a><?php
		}
		
	}
	else {
		echo "0 results";
	}
?>
</body>
</html>