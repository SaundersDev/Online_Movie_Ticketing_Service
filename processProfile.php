
<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$street = $_POST["street"];
$city = $_POST["city"];
$postal = $_POST["postal"];
$password = $_POST["password"];
$number = $_POST["number"];
$email = $_POST["email"];
$ccnum = $_POST["ccnum"];
$month = $_POST["month"];
$year = $_POST["year"];
$username = $_SESSION["username"];

$sql = "update customer set fname='$fname', lname='$lname', street='$street', city='$city', postalcode='$postal', password='$password' 
		, phonenumber='$number', email='$email', ccnum='$ccnum', ccexpirymonth='$month', ccexpiryyear='$year' where username='$username'";
mysqli_query($conn, $sql);
header('Location: homepage.php');
?>
