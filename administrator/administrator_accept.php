<?php
session_start();
include('C:\xampp\htdocs\Masini\administrator\db_connect_administrator.php');
include ('delete.php');
  $id=$_GET['id'];
  
   $query = "SELECT * FROM `registration_requests` where `id` = '$id'; ";
  if(count(getAll($query))>0){
    foreach(getAll($query) as $row){
	 $first_name= $row['firstname'];
	 $last_name= $row['lastname'];
	 $phone= $row['phone'];
	 $username= $row['username'];
	 $password= $row['password'];
	 $city= $row['city'];
	 $country= $row['country'];
	 $query = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `username`,`password` ,`city`,`country`) VALUES (NULL, '$first_name', '$last_name', '$phone','$username', '$password','$city','$country')";
	}
  
   sterge($id);
  if(performQuery($query)){
   echo "Registration request has been accepted";
 
  
  }else{
	  echo "<script>alert('Unknown error 1')</script>";
  }
  }else{
	  echo "<script>alert('Unknown error 2')</script>";
  }
  

?>