<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

$user = $_SESSION["username"];
$showing = $_GET["showingID"];
$delete = "DELETE from reservations where showingid = '$showing' and username = '$user'";
mysqli_query($conn, $sql);
header('Location: customerDashboard.php');

?>