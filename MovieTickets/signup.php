<!DOCTYPE HTML>  
<html>
<head>
</head>
<body> 

<form method = "post" action = '<?php echo $_SERVER["PHP_SELF"];?>'>
	First Name: <input type = "text" name = "fname" class="signup">
	<br><br>
	Last Name: <input type="text" name="lname" class="signup">
	<br><br>
	Username: <input type="text" name="username" class="signup">
	<br><br>
	Password: <input type="Password" name="password" class="signup"> 
	<br><br>
	Street Address: <input type="text" name="street" class="signup">
	<br><br>
	City: <input type="text" name="city" class="signup">
	<br><br>
	Postal Code: <input type="text" name="postal" class="signup">
	<br><br>
	Phone Number: <input type="text" name="number" class="signup">
	<br><br>
	Email: <input type="email" name="email" class="signup">
	<br><br>
	<strong> Credit Card </strong><br>
	&emsp; Number: <input type="text" name="ccnum" class="signup"><br>
	&emsp; Expiry Month: <input type="number" name="month" min="1" max="12" class="signup"><br>
	&emsp; Expiry Year: <input type="number" name="year" class="signup"><br><br>

	<input type="submit" name="submit" value="Sign Up">  
</form>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "MovieTix";
	$conn =  mysqli_connect($servername, $username, $password, $dbname);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$getUser = "SELECT username from customer where username = '$username'";
		$result = mysqli_query($conn, $getUser);
		//username already exists
		if(mysqli_num_rows($result) > 0){ 
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

	}
?>
</body>
</html>