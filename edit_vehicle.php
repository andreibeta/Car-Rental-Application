<?php
 session_start();
  include("administrator\db_connect_administrator.php");
 if($_SESSION['login_administrator']!==true)
	{	
    header('location:login_administrator.php');
    }
else{
   if(isset($_POST['submit']))
  {
	  $id=$_GET['id'];
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicaloverview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];


$airconditioner=$_POST['airconditioner'];


$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$airbags=$_POST['airbags'];
if($_POST['navigation']==1){
$navigation=$_POST['navigation'];
}else{
	$navigation=$_POST['navigation'];
}
$crashcensor=$_POST['crashcensor'];
$leatherseats=$_POST['leatherseats'];



$query="UPDATE vehicle_table set vehicle_type='$vehicletitle',vehicle_brand='$brand',vehicle_overview='$vehicleoverview',price='$priceperday',fuel_type='$fueltype',model_year='$modelyear',seats='$seatingcapacity',air_conditioner='$airconditioner',abs='$antilockbrakingsys',brake_assist='$brakeassist',airbags='$airbags',navigation='$navigation',crash_sensor='$crashcensor',leather_seats='$leatherseats' where id='$id'";
 if(performQuery($query)){
	 echo "<script>alert('Car update has been accepted!!!')</script>";
 }else{
	 echo "<script>alert('Error!!!')</script>";
 }
  }

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
	
	<title>Car Rental Portal | Admin Post Vehicle</title>

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
	<!-- Admin Style -->
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
					
						<h2 class="page-title">Post A Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="form-control form-control-sm" name="brandname" required>
<option value=""> Select </option>
<?php 
$query="select id,nume_marca from marci";

if(count(getAll($query)) > 0)
{
foreach(getAll($query) as $row)
{
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['nume_marca'];?></option>
<?php }} ?>

</select>
</div>
</div>
											

<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-8">
<textarea class="form-control" name="vehicaloverview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in USD)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="form-control form-control-sm" name="fueltype" required>
<option value=""> Select </option>

<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" required>
</div>
</div>






<div class="form-group">




<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body">


<div class="form-group">
<label class="col-sm-2 control-label">Air Conditioner<span style="color:red">*</span></label>
<div class="col-sm-2">


<select class="form-control form-control-sm" name="airconditioner" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>

<label class="col-sm-2 control-label">ABS<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="form-control form-control-sm" name="antilockbrakingsys" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>

<label class="col-sm-2 control-label">Brake Assist<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="form-control form-control-sm" name="brakeassist" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>


</div>


<div>
<div class="form-group">
<label class="col-sm-2 control-label">Airbags<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="form-control form-control-sm" name="airbags" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>


<label class="col-sm-2 control-label">Navigation<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="form-control form-control-sm" name="navigation" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>
</div>



</div>
<div class="form-group">
<label class="col-sm-2 control-label">Crash Sensor<span style="color:red">*</span></label>
<div class="col-sm-2">
<select class="form-control form-control-sm" name="crashcensor" required>

<option value="">Select</option>
<option value="1">Yes</option>
<option value="0">No</option>

</select>
</div>





</div>




											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Update</button>
												</div>
											</div>

										</form>
									</div>
								</div>
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