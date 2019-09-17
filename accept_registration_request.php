<?php
  session_start();
  include("administrator\db_connect_administrator.php");
  
 if($_SESSION['login_administrator']!==true)
	{	
    header('location:login_administrator.php');
    }else{
		include("delete_registration_requests.php");
		$id=$_GET['id'];
		$query="SELECT * FROM registration_request where id='$id';";
		if(count(getAll($query))>0){
           foreach(getAll($query) as $row){
			   $first_name=$row['first_name'];
			   $last_name=$row['last_name'];
			   $phone=$row['phone'];
			   $username=$row['username'];
			   $password=$row['password'];
			   $city=$row['city'];
			   $country=$row['country'];
			   
		   }
		   $query="INSERT INTO tabel_utilizatori (id,first_name,last_name,phone,username,password,city,country)VALUES(NULL,'$first_name','$last_name','$phone','$username','$password','$city','$country')";
		  if(performQuery($query)){
	      echo "<script>alert('Car booking has been accepted!!!')</script>";
		  header('location:registration_requests.php');
          }else{
	      echo "<script>alert('Error!!!')</script>";
		  header('location:registration_requests.php');
          }
		  delete_registration_requests($id);
		}
	}
	?>