<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

$showing =  $_POST["showing"];
$number = $_POST["number"];

//$username = $_SESSION["username"];
$username = 'pgibs';

$reserve = "insert into reservations (numtixreserved, username, showingid) values ('$number', '$username', '$showing')" ;
$changeSeats = "UPDATE showing SET NumSeatsAvailable= NumSeatsAvailable - $number WHERE ID = '1' ";
mysqli_query($conn, $reserve);
mysqli_query($conn, $changeSeats);
header('Location: homepage.php');

?>