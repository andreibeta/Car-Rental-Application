<?php
  session_start();
  include("administrator\db_connect_administrator.php");
 if($_SESSION['login_administrator']!==true)
	{	
    header('location:login_administrator.php');
    }
else{
	
	
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal |Admin Manage Vehicles   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="admin/css/style.css">
  

</head>
<body>
	<?php include('include/header.php');?>

	<div class="ts-main-content">
		<?php include('leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							
								<table id="zct" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Number</th>
											<th>Name</th>
											<th>Vehicle Id</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Message</th>
											
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

									<?php 
$query="SELECT * FROM reservation_requests;";
if(count(getAll($query))>0){
    foreach(getAll($query) as $row){
	 			?>	
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['username'];?></td>
											<td><?php echo $row['car_type'];?></td>
											<td><?php echo $row['date_in'];?></td>
											<td><?php echo $row['date_out'];?></td>
											<td><?php echo $row['message'];?></td>
											
		<td><a type="button" class="btn btn-success btn-xs" href="accept_booking.php?id=<?php echo $row['id'];?>" 
		onclick="return confirm('Do you really want to Confirm this booking')"> Accept</a> 
        <a type="button" class="btn btn-danger btn-xs" href="reject_bookings.php?id=<?php echo $row['id'];?>" 
		onclick="return confirm('Do you really want to Cancel this Booking')"> Reject</a>
</td>

										</tr>
										<?php  }
										}else{
	   echo "No requests in pending right now";
   } ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="admin/js/jquery.min.js"></script>
	<script src="admin/js/bootstrap-select.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
	<script src="admin/js/jquery.dataTables.min.js"></script>
	<script src="admin/js/dataTables.bootstrap.min.js"></script>
	<script src="admin/js/Chart.min.js"></script>
	<script src="admin/js/fileinput.js"></script>
	<script src="admin/js/chartData.js"></script>
	<script src="admin/js/main.js"></script>
</body>
</html>
<?php } ?>
