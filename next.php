<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<?php 
$submit= $_POST['action'];
if ($submit== "View Customer Info"){
	echo '<h1> ~Advanced Customer View~';
    echo '<br></h1>';
}
else {	
	echo '<h1> ~The Following Customers Have Been Removed From the Database~';
    echo '<br></h1>';
}
?>
</head>
<body>
	<style>
	table, td {
    border: 1px solid black;
	}
	</style>
    <form action="next.php" method="post">
	<table style="width:80%">
<?php 
$name = $password = $error = "";
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);


$selected= $_POST['selected'];
$size = count($selected);

echo '<tr><th>';
	echo"FName";
    echo'</th><th>';
    echo"Lname";
    echo'</th><th>';
	echo"Street";
    echo'</th><th>';
	echo "City";
	echo'</th><th>';
	echo"PostalCode";
	echo'</th><th>';
	echo"Username";
	echo'</th><th>';
	echo"Password";
	echo'</th><th>';
	echo"PhoneNumber";
	echo'</th><th>';
	echo"Email";
	echo'</th><th>';
	echo"CCnum";
	echo'</th><th>';
	echo"CCexpiryMonth";
	echo'</th><th>';
	echo"CCexpiryYear";
	echo'</th><th>';
	echo"admin";
	echo'</th></tr>';
	for ($x=0; $x< $size; $x++){
		$temp= $selected[$x];
		$sql = "SELECT fname, lname, street, city, PostalCode, username, password, PhoneNumber,
		email, CCnum, CCexpiryMonth, CCexpiryYear, admin FROM customer WHERE username = '$temp'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) {
	
	echo '<tr><td>'. $row["fname"].'</td><td>'. $row["lname"].'</td><td>'. $row["street"].'</td><td>'
	. $row["city"].'</td><td>'. $row["PostalCode"].'</td><td>'. $row["username"].'</td><td>'
	. $row["password"].'</td><td>'. $row["PhoneNumber"].'</td><td>'. $row["email"].'</td><td>'
	. $row["CCnum"].'</td><td>'. $row["CCexpiryMonth"].'</td><td>'. $row["CCexpiryYear"].'</td><td>'
	. $row["admin"].'</td></tr>';
	}
	}
	echo '</table><br>';

if ($submit== "Remove Customer Info"){

	for ($y=0; $y< $size; $y++){
		$temp= $selected[$y];
		$sql = "DELETE FROM Customer WHERE username = '$temp'";
		if ($conn->query($sql) === TRUE) {
		echo "Records deleted successfully";
		} else {
		echo "Error deleting record: " . $conn->error;
		}
	}	
}
?> 
<br>
<a href = "members.php">
	Back To Members List
</a>

</body>
</html>