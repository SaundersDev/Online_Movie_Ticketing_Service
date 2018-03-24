<!DOCTYPE html>
<html>

<head>
	require_once('connectDatabase.php');
</head>

<body>

<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "MovieTix";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
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
/*		if(mysqli_num_rows($result) == 0){ 
			echo "<script type='text/javascript> alert("Username already exists. Please enter a new username")";
		}
		//username is unique 
		else{
			$sql =  "INSERT INTO customer (fname, lname, street, city, PostalCode, username, password, phonenumber, email, ccnum, ccexpirymonth, ccexpiryyear, admin) VALUES ('".$_POST["fname"]."', '".$_POST["lname"]."', '".$_POST["street"]."', '".$_POST["city"]."', '".$_POST["postal"]."', '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["number"]."', '".$_POST["email"]."', '".$_POST["ccnum"]."','".$_POST["month"]."','".$_POST["year"]."', '0')";
			echo '<form id="goodUser" method="post" action="Customer/homepage.php">';
	        echo '<input type="hidden" name="fname" value = '$_POST["fname"]' />';
	        echo '<input type="hidden" name="username" value = '.$_POST["username"].'/>';
	        echo '</form>';
	        echo "<script type='text/javascript'> document.getElementById('goodUser').submit(); </script>";
		}

	}*/
?>	


	<h1>Title</h1>
	<h3>Rating</h3>
	<h3>Run Time</h3>
	<h3>Director</h3>
	<h3>Production Company</h3>
	<h3>Plot Synopsis</h3>	
	<h3>Reviews</h3>
	<p></p>
</body>
</html>