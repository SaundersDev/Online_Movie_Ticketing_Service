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
		echo '<button type="submit" name="select" value="'.$row["name"].'">Select</button>';
		echo '</td></tr>';
		echo '<br>';
    }
} else {
    echo "0 results";
}

?>
</body>
</html>