<?php


 
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "licenta";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$id=$_GET['id'];
$sql = "DELETE FROM reservation_requests WHERE id=$id";

if (mysqli_query($conn, $sql)) {
	echo "<script>alert('Reservation approved')</script>";
	header('location:booking_requests.php');
    
} else{
	echo "<script>alert('Error deleting record:')</script>" . mysqli_error($conn);
}
mysqli_close($conn);

?>