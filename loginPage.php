<!DOCTYPE HTML>  
<html>
<head>
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
  $name = $_POST["name"];
  $password = $_POST["password"];
  $getUser = "SELECT username, admin, fname from customer where username = '$name' and password = '$password'";
  $result = mysqli_query($conn, $getUser);

  //user does not exist/wrong password
  if (mysqli_num_rows($result) <= 0) {
    $error =  "Please enter a valid username/password combination"; 
  }
  else{
    //user exists
    $row = mysqli_fetch_assoc($result);
    $fname = $row["fname"];
    if($row["admin"] == 0){ //customer
        
        echo '<form id="goodUser" method="post" action="Customer/homepage.php">';
        echo '<input type="hidden" name="fname" value = '.$fname.' />';
        echo '<input type="hidden" name="username" value = '.$name.'/>';
        echo '</form>';
        echo "<script type='text/javascript'> document.getElementById('goodUser').submit(); </script>";
    }
    else{ //admin

    }
  }
}

?>
<h2>Movie Tickets</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
  <label>Name: <input type="text" name="name">
  <br><br>
  <label>Password: <input type="text" name="password">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
echo "<br>";
echo $error;
echo "<br>";
?>
<br>
  <a href ="signup.php">New User? Sign up here</a>



<style>
body{

}
body::after {
  content: "";
  background: url(Customer/images/login.jpg);
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
img{
  display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
h2 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 100px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 700px;
    text-align: right;
}
  input{
    display: inline-block;
    float: right;
  }

</style>



</body>
</html>