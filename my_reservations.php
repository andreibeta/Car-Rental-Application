<?php
 session_start(); //we need session for the log in thingy XD 
    include("administrator\db_connect_administrator.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
	require('getReservationData.php');

?>

<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<!--Customer Style -->
<link rel="stylesheet" href="css/style.css" type="text/css">

<!--bootstrap-slider -->
<link href="css/bootstrap-slider.min.css" rel="stylesheet">
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
  $reservation_data=getReservationData(getId($_SESSION['username']));

}else{
	echo "Error";
}?>
  
   <p>Username:
   <?php echo $reservation_data['username'];?> </p>
   <p>Reservation Date:<?php  echo $reservation_data['date_in'];?></p>
   <p>Car type:<?php  echo $reservation_data['car_type'];?></p>
   
   

</body>
</html>