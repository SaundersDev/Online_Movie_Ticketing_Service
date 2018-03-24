<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["username"] = 'pgibs';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="review.css">
</head>
<body>
<a href ="homepage.php">
	<img src="images/home.png" alt="Home Page" style="width:50px;height:50px;"/>
</a>
<?php 
	$movie = $_GET["title"];
	$getMovie = "Select runningtime, rating, director, productioncompany, plotsynopsis from movie where title = '$movie'";
	$resultMovie = mysqli_query($conn, $getMovie);
	$row = mysqli_fetch_assoc($resultMovie);
	//get picture for corresponding movie
	$runningTime = $row["runningtime"];
	$rating = $row["rating"];
	$director = $row["director"];
	$productionCompany = $row["productioncompany"];
	$plotSynopsis = $row["plotsynopsis"];
?>
<h1>
	Write a Review
</h1>

<textarea maxlength="255" name="reviewBox" rows="4" cols="50" form="reviewForm"> 
</textarea>
<form action="processReview.php" id="reviewForm" method="post">
	<input type="hidden" name="movie" value="<?php echo $movie ?>">
	<input type="range" min="0" max="5" value="2.5" class="slider" step="0.1" id="movieRating" name="rating">
	<input type="submit" value="Submit Review">
</form>

<div id="slidecontainer">
  <p>Rating: <span id="num" name="rating"></span></p>
</div>
<div  id="movieDetails" >
	<br>
	<img src="images/<?php echo $movie;?>.jpg" alt="<?php echo $movie;?>" style="width:250px;height:350px;"/> 
	<p> <strong>Plot Synopsis:</strong><?php echo ' '.$plotSynopsis.' <br>';?> 
		<strong>Rating:</strong><?php echo ' '.$rating.' <br>';?>
		<strong>Director:</strong><?php echo ' '.$director.' <br>';?>
		<strong>Production Company:</strong><?php echo ' '.$productionCompany.' <br>';?>
		<strong>Running Time:</strong><?php echo ' '.$runningTime.' minutes <br>'?>
	</p>
</div>
<script>
var slider = document.getElementById("movieRating");
var output = document.getElementById("num");
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}

</script>


</body>
</html>