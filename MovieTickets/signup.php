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
	Postal Code: <input type="text" name="city" class="signup">
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
