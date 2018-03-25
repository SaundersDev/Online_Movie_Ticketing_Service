<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
$user = $_SESSION["username"];
$sql = "Select * from customer where username = '$user'";
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

<a href ="customerDashboard.php">
	<img src="images/home.png" alt="Home Page" style="width:50px;height:50px;"/>
</a> 
<h1>
	Hello <?php echo $_SESSION["fname"] ?>, this is your profile. 
	<br><br>
</h1>
<form method="post" action="processProfile.php">
	<label>First Name: <input type="text" name="fname" value="<?php echo $fname ?>" > <br><br>
	<label>Last Name: <input type="text" name="lname" value="<?php echo $lname ?>" ><br><br>
	<label>Address: <input type="text" name="street" value="<?php echo $street ?>" ><br><br>
	<label>City: <input type="text" name="city" value="<?php echo $city ?>" ><br><br>
	<label>Postal Code: <input type="text" name="postal" value="<?php echo $postal ?>" ><br><br>
	<label>Password: <input type="password" name="password" value="<?php echo $password ?>" ><br><br>
	<label>Phone Number: <input type="text" name="number" value="<?php echo $number ?>" ><br><br>
	<label>Email: <input type="text" name="email" value="<?php echo $email ?>" ><br><br>
	<strong> <credit>Credit Card </strong> 
	&emsp; <label>CC Num: <input type="text" name="ccnum" value="<?php echo $ccnum ?>" ><br>
	&emsp; <label>CC Expiry Month: <input type="text" name="month" value="<?php echo $month ?>" ><br>
	&emsp; <label>CC Expiry Year: <input type="text" name="year" value="<?php echo $year ?>" ><br><br><br>
	<input type="submit" name="submit" value="Update Profile">

</form>
</body>

<style>
credit{
	display: inline-block;
    float: left;
    clear: left;
    width: 390px;
    text-align: right;
}
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 500px;
    text-align: right;
}
  input{
    display: inline-block;
    float: right;
  }
</style>

</html>