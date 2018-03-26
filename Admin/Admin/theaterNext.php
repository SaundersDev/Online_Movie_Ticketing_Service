<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<?php 
$nameTC= $_SESSION["name"];

	echo '<h1> ~ '.$_SESSION["name"].' Theater Complex~';
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
	$temp = $_POST["update"];
	
	if ($_POST["delete"]){
		$yu=$_POST["delete"];
		$sql = "DELETE FROM theater WHERE ComplexName = '$nameTC' AND TheaterNumber = '$yu'";
		if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
		} else {
		echo "Error deleting record: " . $conn->error;
		}
	}
	if ($_POST["add"]){
		$yo="2";
	}
	if ($_POST["add"]&& $_POST["tnum"]){
		$tnum= $_POST["tnum"];
		$maxs= $_POST["maxs"];
		$ss= $_POST["ss"];
		$sql = "INSERT INTO theater (ComplexName, TheaterNumber, MaxSeats, ScreenSize) 
		VALUES ('$nameTC', '$tnum', '$maxs', '$ss')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	if ($temp==1&& $_POST["street"]){
		$do= $_POST["street"];
		$sql = "UPDATE theater_complex SET street='$do' WHERE name= '$nameTC'";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		echo '<form id="jump1" method="post" action="theaterNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump1').submit(); </script>";
	}
	if ($temp==2&& $_POST["city"]){
		$do= $_POST["city"];
		$sql = "UPDATE theater_complex SET city='$do' WHERE name= '$nameTC'";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		echo '<form id="jump2" method="post" action="theaterNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump2').submit(); </script>";
	}
	if ($temp==3&& $_POST["pcode"]){
		$do= $_POST["pcode"];
		$sql = "UPDATE theater_complex SET PostalCode='$do' WHERE name= '$nameTC'";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		echo '<form id="jump3" method="post" action="theaterNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump3').submit(); </script>";
	}
	if ($temp==4&& $_POST["pnum"]){
		$do= $_POST["pnum"];
		$sql = "UPDATE theater_complex SET PhoneNumber='$do' WHERE name= '$nameTC'";
		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		echo '<form id="jump4" method="post" action="theaterNext.php">';
		echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('jump4').submit(); </script>";
	}
}

$sql = "SELECT name, street, city, PostalCode, PhoneNumber FROM theater_complex WHERE name= '$nameTC'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
<?php  
echo '[This Establishment]:<br><br>';
echo '<button type="submit" name="update" value="1">update</button>';
echo "o Street: " .$row["street"];
if ($temp==1){ echo '-->new value: '; echo '<input type="text" name="street">';}
echo '<br><button type="submit" name="update" value="2">update</button>';
echo "o City: " .$row["city"];
if ($temp==2){ echo '-->new value: '; echo '<input type="text" name="city">'; }
echo '<br><button type="submit" name="update" value="3">update</button>';
echo "o Postal Code: " .$row["PostalCode"];
if ($temp==3){ echo '-->new value: '; echo '<input type="text" name="pcode">'; }
echo '<br><button type="submit" name="update" value="4">update</button>';
echo "o Phone Number: " .$row["PhoneNumber"];
if ($temp==4){ echo '-->new value: '; echo '<input type="text" name="pnum">'; }

echo '<br><br> [List of Facilities]: <br>';

$sql = "SELECT TheaterNumber, MaxSeats, ScreenSize FROM theater";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	?>
	<style>
	table, td {
    border: 1px solid black;
	}
	</style>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
	<table style="width:10%">
    <?php
	echo '<tr><th>';
	echo"Theater Number";
    echo'</th><th>';
    echo"Max Seats";
    echo'</th><th>';
	echo"Screen Size";
	 echo'</th><th>';
	echo".";
	echo'</th></tr>';
    while($row = mysqli_fetch_assoc($result)) {
	//example:
		echo '<tr>';
        echo '<td>'. $row["TheaterNumber"].'</td><td>'. $row["MaxSeats"]. '</td><td>' . $row["ScreenSize"].'</td><td>';
		echo '<button type="submit" name="delete" value="'.$row["TheaterNumber"].'">delete</button>';
		echo '</td></tr><br>';
    }
} else {
    echo "0 results";
}
echo '<input type="submit" name="add" value="Add New Showroom">';
	if ($yo=="2"){
		echo '-->Enter new fields below, then click "Add New Showroom" again<br>';
		echo 'Theater Number: <input type="text" name="tnum"><br>';
		echo 'Max Seats: <input type="text" name="maxs"><br>';
		echo 'Screen Size: <input type="text" name="ss">';
	}
?>
</table>
<br>
<a href = "theaters.php">
	Back To List of Theater Complexes
</a>
<br>
<a href = "AdminHomepage.php">
	Back To Homepage
</a>
</body>
</html>