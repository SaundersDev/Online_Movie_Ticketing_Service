<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
$_SESSION["fname"] = "Patrick";
$_SESSION["name"] = "pgibs";
$user = $_SESSION["name"];
$sql = "Select * from customer where username = 'pgibs'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$fname = $row["Fname"];
$lname = $row["Lname"];
$street = $row["Street"];
$city = $row["City"];
$postal = $row["PostalCode"];
$password = $row["Password"];
$number = $row["PhoneNumber"];
$email = $row["Email"];
$ccnum = $row["CCnum"];
$month = $row["CCexpiryMonth"];
$year = $row["CCexpiryYear"];

?>

<!DOCTYPE html>
<html>
<body>

<a href ="homepage.php">
	<img src="images/home.png" alt="Home Page" style="width:50px;height:50px;"/>
</a> 
<h1>
	Hello <?php echo $_SESSION["fname"] ?>, this is your profile. 
	<br><br>
</h1>
<form method="post" action="processProfile.php">
	First Name: <input type="text" name="fname" value="<?php echo $fname ?>" > <br><br>
	Last Name: <input type="text" name="lname" value="<?php echo $lname ?>" ><br><br>
	Address: <input type="text" name="street" value="<?php echo $street ?>" ><br><br>
	City: <input type="text" name="city" value="<?php echo $city ?>" ><br><br>
	Postal Code: <input type="text" name="postal" value="<?php echo $postal ?>" ><br><br>
	Password: <input type="password" name="password" value="<?php echo $password ?>" ><br><br>
	Phone Number: <input type="text" name="number" value="<?php echo $number ?>" ><br><br>
	Email: <input type="text" name="email" value="<?php echo $email ?>" ><br><br>
	<strong> Credit Card </strong> <br>
	&emsp; CC Num: <input type="text" name="ccnum" value="<?php echo $ccnum ?>" ><br>
	&emsp; CC Expiry Month: <input type="text" name="month" value="<?php echo $month ?>" ><br>
	&emsp; CC Expiry Year: <input type="text" name="year" value="<?php echo $year ?>" ><br><br><br>
	<input type="submit" name="submit" value="Update Profile">

</form>
</body>

</html>