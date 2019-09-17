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

						<h2 class="page-title">Current Users</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Users Info</div>
							<div class="panel-body">
							
								<table id="zct" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Number</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Phone Number</th>
											<th>Username</th>
											<th>City</th>
											<th>Country</th>
											
											
										</tr>
									</thead>
									
									<tbody>

									<?php 
$query="SELECT * FROM tabel_utilizatori;";
if(count(getAll($query))>0){
    foreach(getAll($query) as $row){
	 			?>	
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['first_name'];?></td>
											<td><?php echo $row['last_name'];?></td>
											<td><?php echo $row['phone'];?></td>
											<td><?php echo $row['username'];?></td>
											<td><?php echo $row['city'];?></td>
											<td><?php echo $row['country'];?></td>
											
									

										</tr>
										<?php  }
										}else{
	   echo "No users right now";
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