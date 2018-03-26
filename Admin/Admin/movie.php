<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
  <h1> List of all Movies in Database:
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
	$titl= $_POST["select"];
	if ($_POST["go"]){
		$sql = "SELECT MovieTitle, sum(NumTixReserved) FROM Reservations, theatercomplex_movie_showing 
		WHERE Reservations.ShowingID=theatercomplex_movie_showing.ShowingID GROUP BY MovieTitle 
		ORDER BY sum(NumTixReserved) DESC";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION["title"]= $row["MovieTitle"];
		echo '<form id="jump1" method="post" action="movieNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump1').submit(); </script>";
	}
	if ($_POST["add"]){
		$yo="2";
	}
	if ($_POST["add"]&&$_POST["title"]){
		$title= $_POST["title"];
		$rtime=$_POST["rtime"];
		$rating=$_POST["rating"];
		$drec=$_POST["drec"];
		$prod=$_POST["prod"];
		$sname=$_POST["sname"];
		$psos=$_POST["psos"];
		$sql = "INSERT INTO movie (Title, RunningTime, Rating, Director, ProductionCompany, SupplierName, PlotSynopsis) 
		VALUES ('$title', '$rtime', '$rating', '$drec','$prod','$sname', '$psos')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if ($titl){
		$_SESSION["title"]= $titl;
		   echo '<form id="movie" method="post" action="movieNext.php">';
		   //echo '<input type="hidden" name="name" value = "'.$sel.'" />';
		   echo '</form>';
			echo "<script type='text/javascript'> document.getElementById('movie').submit(); </script>";
	}
}
$sql = "SELECT Title, Rating, RunningTime, ProductionCompany FROM movie";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
	<style>
	table, td {
    border: 1px solid black;
	}
	</style>
	  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<table style="width:20%">
    <?php
	echo '<tr><th>';
	echo"Movie Title";
    echo'</th><th>';
    echo"Rating";
	echo'</th><th>';
	echo"Run Time";
    echo'</th><th>';
	echo"Production";
	echo'</th></tr>';
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
        echo '<td>'. $row["Title"].'</td><td>'. $row["Rating"]. '</td><td>'. $row["RunningTime"]. '</td><td>' . $row["[ProductionCompany"].'</td><td>';
		echo '<button type="submit" name="select" value="'.$row["Title"].'">Select</button>';
		echo '</td></tr>';
		echo '<br>';
    }
} else {
    echo "0 results";
}
echo '<input type="submit" name="go" value="Current Most Popular Movie!"><br>';
echo '<br><input type="submit" name="add" value="Add New Movie to DB">';
if ($yo=="2"){
		echo '-->Enter new fields below, then click "Add New Movie" again<br>';
		echo 'Title: <input type="text" name="title"><br>';
		echo 'Run Time: <input type="text" name="rtime"><br>';
		echo 'Rating: <input type="text" name="rating"><br>';
		echo 'Director: <input type="text" name="drec"><br>';
		echo 'Production Company: <input type="text" name="prod"><br>';
		echo 'Supplier: <input type="text" name="sname"><br>';
		//echo 'Plot Synopsis:';
		echo '<textarea name="psos" cols="40" rows="5">Plot Synopsis</textarea>';
	}
?>
</table>
<br>
<a href = "AdminHomepage.php">
	Back To Homepage
</a>
</body>
</html>