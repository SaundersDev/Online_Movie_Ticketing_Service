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

$reserve = "insert into reservations (numtixreserved, username, showingid) values ('<?php echo $number ?>', '<?php echo $username ?>', '<?php echo $showing ?>')" ;
mysqli_query($conn, $sql);
header('Location: homepage.php');

?>