<?php



function sterge_rezervari($id){
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record

$sql = "DELETE FROM reservation_requests WHERE id=$id";

if (mysqli_query($conn, $sql)) {
	echo "<script>alert('Reservation approved')</script>";
    
} else{
	echo "<script>alert('Error deleting record:')</script>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>