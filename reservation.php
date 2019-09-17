<?php
 session_start(); 
  include "include/db_connection.php";


?>


<html>
<head>

</head>
<body>
<div class="topnav">
   <a href="account_details.php"  button name="details" class="btn btn-danger my-2" value="details">Account Details</a>
  <a href="my_reservations.php" button name="reservations" class="btn btn-danger my-2" value="reservations">My Reservations</a>
  <a href="reservation.php" button name="reservations" class="btn btn-danger my-2" value="reservations">Make a testdrive Reservation</a>
  <a href="car-listing.php" button name="listing" class="btn btn-danger my-2" value="listing">Car list</a>
</div>


<div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:login.php');
                }
    
                ?>
                <form method="post">
                    <button name="logout" class="btn btn-danger my-2">Logout</button>
                </form>
            </div>

<div>

<?php
	
  if(isset($_SESSION['username'])){
	  $_POST['username']=$_SESSION['username'];
	  ?>
	  <p>Welcome:<?php echo $_SESSION['username'];?></p>
	  
	  <?php
  }else{
	  echo "False";
  }

  if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $date_in=$_POST['date_in'];
   $car_type=$_POST['car_type'];
   	$message="$username requested for a testdrive reservation approval";
   $query = "INSERT INTO reservation_requests (`username`, `date_in`, `car_type`, `message`) VALUES ('$username', '$date_in', '$car_type','$message');";
   mysqli_query($con,$query) or die (mysqli_error($con));
   header("location:success.php");

  
  

}
	   


?>

<div id="continut">
    <div id="interior_continut">
	<form action="reservation.php" method="POST">
	<h2 align="center" id="h"><u><i>Reservation System</i></u></h2>
	
       <table>
	        <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php 
			if(isset($_POST['username'])){ 
			echo $_POST['username']; } ?>"  />
              </td>
          </tr>
		 <tr>
		  <td width="113">Date in</td>
		  <td width="215">
		  <input name="date_in" type="date" value="<?php
		           if(isset($_POST['date_in'])){
					   echo $_POST['date_in'];
				   }
				   ?>"/></td>
				   </tr>
				   <tr>
				    <td>Car type</td>
					<td>
					<select name="car_type">
					  <option>--Types of cars--</option>
					  <option value="Skoda">Skoda</option>
					  <option value="Bmw">Bmw</option>
					  <option value="Volkswagen">Volkswagen</option>
					  <option value="Tesla">Tesla</option>
			        </select>
				   </table>
				   <button type="submit" name="submit">Submit</button>
				   
		
<script language="javascript" type="text/javascript">
</body>
</html>