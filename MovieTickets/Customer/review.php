<?php
session_start(); 
error_reporting(0);
$movie = $_POST["movie"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
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

<h2>
	Write a Review
</h2>
<form id="userReview" action='<?php echo $_SERVER["PHP_SELF"];?>' method = "post">
	<input type= "textarea" width = "400" height = "250" maxlength="255">
	<br><br>
	<input type="submit" name="submit" value="Submit Review">
</form>
<div class="slidecontainer">
  <input type="range" min="0" max="5" value="2.5" class="slider" step="0.1" id="movieRating">
  <p>Rating: <span id="num"></span></p>
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