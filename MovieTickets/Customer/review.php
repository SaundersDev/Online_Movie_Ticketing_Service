<?php
session_start(); 
error_reporting(0);
$movie = $_POST["movie"];
require_once('connectDatabase.php');
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
<h2>
	Write a Review
</h2>
<textarea maxlength="255" id="reviewBox" rows="4" cols="50" > 
	
</textarea>
<div id="slidecontainer">
  <input type="range" min="0" max="5" value="2.5" class="slider" step="0.1" id="movieRating">
  <p>Rating: <span id="num"></span></p>
  <button type="button" onclick="submitReview()">Submit Review</button> 
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

function submitReview(){

	var mysql = require('mysql');
	var con = mysql.createConnection({
	  host: "localhost",
	  user: "root",
	  password: "",
	  database: "MovieTix"
	});

	con.connect(function(err) {
	  if (err) throw err;
	  console.log("Connected!");
	  var sql = "INSERT INTO reviews (text, score, reviewermovietitle, reviewername) VALUES ('hello', '5', 'Black Panther', 'pgibs')";
	  con.query(sql, function (err, result) {
	    if (err) throw err;
	    console.log("1 record inserted");
	  });
	});
}

</script>


</body>
</html>