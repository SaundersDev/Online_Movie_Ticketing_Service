<!DOCTYPE html>
<html>

<head>
</head>

<body>
<?php require_once('connectDatabase.php'); ?>

<?php 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected Successfully<br>";
	$movieTitle = strval($_GET['title']);
	//echo $movieTitle."<br>";
	$result = mysqli_query($conn, "Select * from movie where Title = '$movieTitle'");
	//echo $result."<br>";	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "" . $row["Title"]. 
			 "<br>" . $row["Rating"].
			 " <br>Run Time: " . $row["RunningTime"]. 
			 "<br>Director: " . $row["Director"] .
			 "<br>Production Company: ". $row["ProductionCompany"].
			  "<br>";
		}
	}
	else {
		echo "0 results";
	}
?>	
</body>
</html>