<?php
    session_start(); //we need session for the log in thingy XD 
    include("administrator\db_connect_administrator.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
	require('getdata.php');
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
<html>
<body>
<div class="topnav">
  <a></a>
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
  $data=getProfileData(getId($_SESSION['username']));

}else{
	echo "Error";
}?>
 <p>First name:
   <?php echo $data['firstname'];?> </p>
   <p>Last name:<?php  echo $data['lastname'];?></p>
   <p>Phone number:<?php  echo $data['phone'];?></p>
   <p>Username:<?php  echo $data['username'];?></p>
   <p>City:<?php  echo $data['city'];?></p>
   <p>Country:<?php  echo $data['country'];?></p>


</body>

</html>