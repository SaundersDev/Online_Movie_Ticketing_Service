<?php
session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
  <h1> List of all members:
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

$sql = "SELECT username, fname, lname FROM customer";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	?>
	<style>
	table, td {
    border: 1px solid black;
	}
	</style>
    <form action="next.php" method="post">
	<table style="width:30%">
    <?php
	echo '<tr><th>';
	echo"Select";
    echo'</th><th>';
    echo"Username";
    echo'</th><th>';
	echo"FName";
    echo'</th><th>';
	echo "Lname";
	echo'</th></tr>';
    while($row = mysqli_fetch_assoc($result)) {
	//example:
		echo '<tr><td>';
		echo '<input type="checkbox" name="selected[]" value="'.$row["username"].'"/>';
		echo '</td>';
        echo '<td>'. $row["username"].'</td><td>'. $row["fname"]. '</td><td>' . $row["lname"].'</td><br>';
		echo '</tr>';
    }
	?>
	</table>
    <input type="submit" name="action" value="View Customer Info">
	<input type="submit" name="action" value="Remove Customer Info">
    </form>
	<?php
} else {
    echo "0 results";
}

mysqli_free_result($result);
?>
<br>
<a href = "AdminHomepage.php">
	Back To Homepage
</a>
</body>
</html>