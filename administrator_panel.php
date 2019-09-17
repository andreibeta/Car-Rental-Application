<?php
    session_start(); //we need session for the log in thingy XD 
    include('C:\xampp\htdocs\Masini\administrator\db_connect_administrator.php');
    if($_SESSION['login_administrator']!==true){
        header('location:login_administrator.php');
    }
?>

<html>
<body>
<div class="topnav">
  <a class="active" href="administrator_panel.php" name="panel" value="Accept Registrations">Accept registrations</a>
  <a href="reservation_requests.php" name="reservations" value="reservations">Reservation requests</a>
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
 $query="SELECT * FROM registration_requests;";
   if(count(getAll($query))>0){
    foreach(getAll($query) as $row){
	 ?>
	 <h1><?php echo $row['username'] ?></h1>
	 <p><?php echo $row['message'] ?></p>
	 <p>
	 <a href="administrator\administrator_accept.php?id=<?php echo $row['id']?>" class="btn">Accept</a>
	 </p>
	<?php
	}
   }else{
	   echo "No requests in pending right now";
   }
?>


</div>


</body>

</html>