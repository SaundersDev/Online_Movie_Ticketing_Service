<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<?php 
$title= $_SESSION["title"];

	echo '<h1> ~'.$_SESSION["title"].': (featured film information page)~';
    echo '<br></h1>';

?>
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
	if ($_POST["edit"]){
		$chek=1;
		$_SESSION["showing"]= $_POST["edit"];
	}
	if ($_POST["add"]){
		$show= $_SESSION["showing"];
		if ($_POST["st"]){
			$temp=$_POST["st"];
			$sql = "UPDATE showing SET StartTime='$temp' WHERE ID= '$show'";
			if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			} else {
			echo "Error updating record: " . $conn->error;
			}
		}
		if ($_POST["pa"]){
			$temp=$_POST["pa"];
			$sql = "UPDATE showing SET ComplexName='$temp' WHERE ID= '$show'";
			if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			} else {
			echo "Error updating record: " . $conn->error;
			}
		}
		if ($_POST["tn"]){
			$temp=$_POST["tn"];
			$sql = "UPDATE showing SET TheaterNumber='$temp' WHERE ID= '$show'";
			if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			} else {
			echo "Error updating record: " . $conn->error;
			}
		}
	}
}

$sql = "SELECT Title, RunningTime, Rating, Director, ProductionCompany, SupplierName, PlotSynopsis FROM movie WHERE Title= '$title'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "<br>o Title: " .$row["Title"].'<br>';
echo "o Run Time: " .$row["RunningTime"].'<br>';
echo "o Rating: " .$row["Rating"].'<br>';
echo "o Director: " .$row["Director"].'<br>';
echo "o Production: " .$row["ProductionCompany"].'<br>';
echo "o Supplier: " .$row["SupplierName"].'<br>';
echo "o Plot Synopsis: " .$row["PlotSynopsis"].'<br>';

echo '<h2>Movie Showings<br></h2>';
$sql = "SELECT MovieTitle, StartTime, ComplexName, TheaterNumber, NumSeatsAvailable, ID
FROM showing, theatercomplex_movie_showing
WHERE showing.ID=theatercomplex_movie_showing.ShowingID AND current_date<EndDate";
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
	echo '<tr><th>';
	echo"Title";
    echo'</th><th>';
    echo"Show Time";
	echo'</th><th>';
	echo"Playing At";
    echo'</th><th>';
	echo"Theater Number";
	echo'</th><th>';
	echo"Seats Remaining";
	echo'</th></tr>';
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
        echo '<td>'. $row["MovieTitle"].'</td><td>'. $row["StartTime"]. '</td><td>'. $row["ComplexName"]. '</td><td>' 
		. $row["TheaterNumber"].'</td><td>'. $row["NumSeatsAvailable"]. '</td><td>';
		echo '<button type="submit" name="edit" value="'.$row["ID"].'">edit</button>';
		echo '</td></tr>';
		echo '<br>';
    }
} else {
    echo "0 results";
}
if ($chek==1){
	echo '-->Enter new startTime and/or Location, then click "submit"<br>';
	echo 'Show Time: <input type="text" name="st"><br>';
	echo 'Playing At: <input type="text" name="pa">';
	echo 'Theater Number: <input type="text" name="tn">';
	echo '<input type="submit" name="add" value="submit">';
}
/*
<br>
<a href = "movie.php">
	Back To Movie Listings
</a>
<br>
<a href = "AdminHomepage.php">
	Back To Homepage
</a>*/
?>
</form>

</body>

</html>