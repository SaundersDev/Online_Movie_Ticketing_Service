<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
  <h1> List of all Theater Complexes:
  <br>
  </h1>
</head>
<body>
<?php 
$name = $password = $error = "";
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$sel = $_POST["select"];
	//$del = $_POST["delete"];
	if ($_POST["go"]){
		$sql = "SELECT TheaterComplexName, sum(NumTixReserved) FROM Reservations, theatercomplex_movie_showing 
		WHERE Reservations.ShowingID=theatercomplex_movie_showing.ShowingID GROUP BY TheaterComplexName 
		ORDER BY sum(NumTixReserved) DESC";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION["name"]= $row["TheaterComplexName"];
		echo '<form id="jump11" method="post" action="theaterNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump11').submit(); </script>";
	}
	if($sel) {
			$_SESSION["name"]= $sel;
		   echo '<form id="theater" method="post" action="theaterNext.php">';
		   echo '<input type="hidden" name="name" value = "'.$sel.'" />';
		   echo '</form>';
			echo "<script type='text/javascript'> document.getElementById('theater').submit(); </script>";
	}
}

$sql = "SELECT name, street, city, PostalCode, PhoneNumber FROM theater_complex";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
	<style>
	table, td {
    border: 1px solid black;
	}
	</style>
	  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<table style="width:30%">
    <?php
	echo '<br><input type="submit" name="go" value="Current Most Popular Theater">';
	echo '<tr><th>';
	echo"Complex Name";
    echo'</th><th>';
    echo"Location (street, City)";
	echo'</th><th>';
	echo"Postal Code";
    echo'</th><th>';
	echo"Phone Number";
	echo'</th><th>';
	echo"Options";
	echo'</th></tr>';
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
        echo '<td>'. $row["name"].'</td><td>'. $row["street"]. ", ". $row["city"]. '</td><td>' . $row["PostalCode"].'</td><td>' . $row["PhoneNumber"].'</td><td>';
		echo '<button type="submit" name="select" value="'.$row["name"].'">Select</button>';
		echo '</td></tr>';
		echo '<br>';
    }
} else {
    echo "0 results";
}
?>
</table>
<br>
<a href = "AdminHomepage.php">
	Back To Homepage
</a>
</body>
</html>