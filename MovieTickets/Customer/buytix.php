<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
$user = $_SESSION["username"];
//$showing = $_GET["showing"];
$showing = 1;
$getDetails = "Select movietitle, starttime from theatercomplex_movie_showing inner join showing where showing.id = theatercomplex_movie_showing.showingid and showing.id = $showing";
$result = mysqli_query($conn, $getDetails);
$row = mysqli_fetch_assoc($result);
$movietitle = $row["movietitle"];
$time = $row["starttime"];
?>


<html >
<h2> Confirm Reservation </h2>
<img src="images/<?php echo ''.$movietitle.'.jpg';?>"  style="width:250px;height:350px;">

<h3> <?php echo "$movietitle"; ?> </h3>
at: <?php echo "$time" ?>

<form method="post" action="processBuytix.php">
	<input type="number" name="number">
	<input type="hidden" name="showing" value="<?php echo $showing ?>">
	<input type="submit" name="submit" value="Buy Tickets">
</form>

</html>


 