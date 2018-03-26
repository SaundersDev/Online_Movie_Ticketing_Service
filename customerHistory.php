<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Past Reservations</title>
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
		<li><?php echo '<a href ="customerPurchases.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">'?>Current Purchases</a></li>
		<li><?php echo '<a href ="customerProfile.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>Profile</a></li>
	</div>
	
	<h2>Past Reservations</h2>
	<?php
	$user = $_SESSION["username"];
	//echo $user . "<br>";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	$showings = "SELECT MovieTitle, RunningTime, Rating, Director, ProductionCompany, StartTime, TheaterComplexName, ShowingID 
	FROM theatercomplex_movie_showing
	INNER JOIN( 
		SELECT Username, ShowingID AS SID 
		FROM reservations 
		WHERE Username = '$user' ) AS T 
	INNER JOIN( 
		SELECT StartTime, ID 
		FROM showing 
		WHERE StartTime < CURRENT_DATE ) AS Q 
	INNER JOIN( 
		Select * from movie ) as R 
	WHERE Q.ID = T.SID and Q.ID = theatercomplex_movie_showing.ShowingID and R.Title = theatercomplex_movie_showing.MovieTitle;";
	$result = mysqli_query($conn, $showings);
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()) {
			?>
			<div id="text" style= "height: 250px;" "width: 100%;>
		
			<?php echo '<a href ="customerMovie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["MovieTitle"].'" id = "home">'
			?>	
			<img src="images/<?php echo "".$row["MovieTitle"]."";?>.jpg" style="width:150px;height:200px;"/>
			</a>
			
			<?php 
			echo "" . $row["MovieTitle"]. 
			 "<br>" . $row["Rating"].
			 " <br>Run Time: " . $row["RunningTime"]. 
			 "<br>Director: " . $row["Director"] .
			 "<br>Production Company: ". $row["ProductionCompany"].
			 "<br>".$row["StartTime"].
			  "<br>";		
			?>
			
			
			<?php
			$review = "SELECT Text, Score, ReviewerMovieTitle, ReviewerName FROM reviews WHERE ReviewerName = 'jboi' and ReviewerMovieTitle = '$title';";
			$result2 = mysqli_query($conn, $review);
			
			if($result2->num_rows > 0){
				while($row = $result2->fetch_assoc()){
					echo "<br>" . $row["Score"]. "&emsp;&emsp;&emsp;&emsp;" . $row["Text"]."<br>";
				}
				echo '<a href ="review.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["MovieTitle"].'" id = "home">'
				?>Edit Your Review</a><?php
			}
			else{
				echo '<a href ="review.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["MovieTitle"].'" id = "home">'
				?>Write A Review</a><?php
			}
			
			?>
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