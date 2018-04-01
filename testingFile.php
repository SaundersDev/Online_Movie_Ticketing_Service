<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$_SESSION["Title"] = $_GET["movieTitle"];
		$_SESSION["fname"] = $_GET["fname"];
		$_SESSION["username"] = $_GET["username"];
	}
?>


<?php echo '<a href ="homepage.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>
	<img src="images/home.png" alt="Home Page" style="width:150px;height:150px;"/>
</a>
<?php echo '<a href ="pastMovies.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'" id = "home">' ?>
	<img src="images/pastmovies.jpg" alt = "Past Movies" style = "width:150px;height:150px;" />
</a>
<h1>
	Hello <?php echo $_SESSION["fname"]; ?> !
</h1>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "MovieTix";
	$conn =  mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$movies = mysqli_query($conn, "Show columns from movie");
	$movieTitle = "SELECT Title from movie";
	$result = mysqli_query($conn, $movieTitle);
	echo "$result";
	echo "$movies";
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()) {
			echo "<br>" . $row["Title"]. "<br>";
			
			echo '<a href ="movie.php?username='.$_SESSION["username"].'&fname='.$_SESSION["fname"].'&title='.$row["Title"].'" id = "home">'
			?>
				<img src="images/home.png" alt="Home Page" style="width:150px;height:150px;"/>
			</a><?php
		//	echo '<img src="images/findingNemo.png" alt="Finding Nemo" style="width:25%;"/>';
		//	echo " " . $row["Title"]. " - " . $row["Rating"]. " - Run Time: " . $row["RunningTime"]. "<br>";
		}
	}
	else {
		echo "0 results";
	}
	
?>

</body>