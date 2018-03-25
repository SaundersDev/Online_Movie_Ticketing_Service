<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

$user = $_SESSION["username"];
$showing = $_GET["showingID"];
$delete = "DELETE from reservations where ShowingID = '$showing' and Username = '$user'";
mysqli_query($conn, $delete);
header('Location: customerPurchases.php');
//echo $showing
?>