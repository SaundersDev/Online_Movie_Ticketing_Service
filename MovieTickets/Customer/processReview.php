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
$name = $_SESSION["username"];

$sql = "INSERT into reviews (text, score, ReviewerMovieTitle, ReviewerName) VALUES ('$review', '$rating', '$movie', '$name')";
mysqli_query($conn, $sql);
header('Location: homepage.php');


?>
