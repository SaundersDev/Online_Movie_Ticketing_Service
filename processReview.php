<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

$review = $_POST["reviewBox"];
$movie = $_POST["movie"];
$rating = $_POST["rating"];
$name = 'jboi';

$sql = "INSERT into reviews (text, score, ReviewerMovieTitle, ReviewerName) VALUES ('$review', '$rating', '$movie', '$name')";
$sql2 = "UPDATE reviews SET text='$review', score='$rating' where ReviewerMovieTitle = '$movie' and ReviewerName='$name'";
$look = "select ReviewerName, ReviewerMovieTitle from reviews where ReviewerName = '$name' and ReviewerMovieTitle='$movie'";
if($look->num_rows > 0){
	mysqli_query($conn, $sql2);
}
else{
	mysqli_query($conn, $sql);
}

header('Location: customerDashboard.php');
?>