<?php
session_start();
include('C:\xampp\htdocs\Masini\include\db_connection.php');
include ('delete_reservations.php');
  $id=$_GET['id'];
  
   $query=mysqli_query($con,"Select * from reservation_requests where id='".$id."'");
  
  while($row=mysqli_fetch_array($query)){
     foreach($row as $key=>$val){
	  $username= $row['username'];
	 $date_in= $row['date_in'];
	 $car_type= $row['car_type'];
	
	}
  mysqli_query($con,"INSERT INTO reservation (`id`, `username`, `date_in`, `car_type`) VALUES (NULL, '$username', '$date_in', '$car_type')");
    
  
  sterge_rezervari($id);
  }
  
  mysqli_close($con);
  
  
  

?>