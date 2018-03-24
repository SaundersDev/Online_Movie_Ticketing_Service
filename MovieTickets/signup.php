<!DOCTYPE HTML>  
<html>
<head>
</head>
<body> 

<form method = "post" action = '<?php echo $_SERVER["PHP_SELF"];?>'>
	First Name: <input type = "text" name = "fname" class="signup" id="fname">
	<br><br>
	Last Name: <input type="text" name="lname" class="signup" id="lname">
	<br><br>
	Username: <input type="text" name="username" class="signup" id="username">
	<br><br>
	Password: <input type="Password" name="password" class="signup" id = "password"> 
	<br><br>
	Street Address: <input type="text" name="street" class="signup" id="street">
	<br><br>
	City: <input type="text" name="city" class="signup" id="city">
	<br><br>
	Postal Code: <input type="text" name="postal" class="signup" id="postal"> 
	<br><br>
	Phone Number: <input type="text" name="number" class="signup" id="number">
	<br><br>
	Email: <input type="email" name="email" class="signup" id="email">
	<br><br>
	<strong> Credit Card </strong><br>
	&emsp; Number: <input type="text" name="ccnum" class="signup" id="ccnum"><br>
	&emsp; Expiry Month: <input type="number" name="month" min="1" max="12" class="signup" id="month"><br>
	&emsp; Expiry Year: <input type="number" name="year" class="signup" id="year"><br><br>

	<input type="submit" name="submit" value="Sign Up">  
</form>
<?php
	require_once('connectDatabase.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$getUser = "SELECT username from customer where username = '$username'";
		$result = mysqli_query($conn, $getUser);
		//username already exists
		if(mysqli_num_rows($result) > 0){ 
			?> <script type='text/javascript'> 
				alert("Username already exists. Please enter a new username"); 
			</script> <?php			
		}
		//username is unique 
		else{
			$sql =  "INSERT INTO customer (fname, lname, street, city, PostalCode, username, password, phonenumber, email, ccnum, ccexpirymonth, ccexpiryyear, admin) VALUES ('".$_POST["fname"]."', '".$_POST["lname"]."', '".$_POST["street"]."', '".$_POST["city"]."', '".$_POST["postal"]."', '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["number"]."', '".$_POST["email"]."', '".$_POST["ccnum"]."','".$_POST["month"]."','".$_POST["year"]."', '0')";
			mysqli_query($conn, $sql);
			echo '<form id="goodUser" method="post" action="Customer/homepage.php">';
	        echo '<input type="hidden" name="fname" value = "'.$_POST["fname"].'" />';
	        echo '<input type="hidden" name="username" value = "'.$_POST["username"].'"/>';
	        echo '</form>';
	        echo "<script type='text/javascript'> document.getElementById('goodUser').submit(); </script>";
		}

	}
?>
<script type="text/javascript">
	document.getElementById("fname").value = '<?=$_POST['fname']?>';
	document.getElementById("lname").value = '<?=$_POST['lname']?>';
	document.getElementById("password").value = '<?=$_POST['password']?>';
	document.getElementById("street").value = '<?=$_POST['street']?>';
	document.getElementById("city").value = '<?=$_POST['city']?>';
	document.getElementById("postal").value = '<?=$_POST['postal']?>';
	document.getElementById("number").value = '<?=$_POST['number']?>';
	document.getElementById("email").value = '<?=$_POST['email']?>';
	document.getElementById("ccnum").value = '<?=$_POST['ccnum']?>';
	document.getElementById("month").value = '<?=$_POST['month']?>';
	document.getElementById("year").value = '<?=$_POST['year']?>';
</script>	

</body>
</html>