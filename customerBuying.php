<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MovieTix";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
$showing = $_GET["showing"];
$getDetails = "Select movietitle, starttime from theatercomplex_movie_showing inner join showing where showing.id = theatercomplex_movie_showing.showingid and showing.id = $showing";
$getSeatsAvail = "Select numseatsavailable from showing where id = '$showing'";

$result = mysqli_query($conn, $getDetails);
$row = mysqli_fetch_assoc($result);
$movietitle = $row["movietitle"];
$time = $row["starttime"];

$result = mysqli_query($conn, $getSeatsAvail);
$row = mysqli_fetch_assoc($result);
$seatsAvail = $row["numseatsavailable"];
?>


<html >
<h2> Confirm Reservation </h2>
<img src="images/<?php echo ''.$movietitle.'.jpg';?>"  style="width:250px;height:350px;" alt="<?php echo $movietitle ?>">

<h3> <?php echo "$movietitle"; ?> </h3>
at: <?php echo "$time" ?>

<form method="post" action="processBuying.php">
	<input type="number" name="number" min="0" max="<?php echo $seatsAvail ?>">
	<input type="hidden" name="showing" value="<?php echo $showing ?>">
	<input type="submit" name="submit" value="Buy Tickets">
</form>

</html>


 


 