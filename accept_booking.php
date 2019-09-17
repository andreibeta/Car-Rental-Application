<?php
  session_start();
  include("administrator\db_connect_administrator.php");
  include("delete_bookings.php");
 if($_SESSION['login_administrator']!==true)
	{	
    header('location:login_administrator.php');
    }else{
		$id=$_GET['id'];
		$query="SELECT * FROM reservation_requests where id='$id';";
		if(count(getAll($query))>0){
           foreach(getAll($query) as $row){
			   $username=$row['username'];
			   $car_type=$row['car_type'];
			   $date_in=$row['date_in'];
			   $date_out=$row['date_out'];
			   $message=$row['message'];
		   }
		   $query="INSERT INTO accepted_requests (id,username,date_in,date_out,message,car_type)VALUES(NULL,'$username','$date_in','$date_out','$message','$car_type')";
		  if(performQuery($query)){
	      echo "<script>alert('Car booking has been accepted!!!')</script>";
		  header('location:booking_requests.php');
          }else{
	      echo "<script>alert('Error!!!')</script>";
		  header('location:booking_requests.php');
          }
		  delete_bookings($id);
		}
	}
	?>
			   