

<?php
    session_start(); //we need session for the log in thingy XD 
    include("administrator\db_connect_administrator.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
	
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Portal | Car Listing</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<body>
<!--Header--> 
<?php include('include/header_user.php');?>
<!-- /Header --> 



<!--Listing-Image-Slider-->
<?php
if(isset($_POST['submit']))
{
    $from_date=$_POST['date_in'];
	$finish_date=$_POST['date_out'];
    $message=$_POST['message'];
    $username=$_SESSION['username'];
	$car=$_GET['vhid'];
	
    
    $query="INSERT INTO reservation_requests(id,username,date_in,date_out,car_type,message) VALUES
	('NULL','$username','$from_date','$finish_date','$car','$message')";
    
	if(performQuery($query)){
                echo "<script>alert('Your booking request is now pending for approval. 
				Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }		
     }

?>


<?php 
$id=$_GET['vhid'];

$query = "SELECT vehicle_table.*,marci.nume_marca,marci.id as bid from vehicle_table join marci on marci.id=vehicle_table.vehicle_brand where vehicle_table.id='$id'; ";
performQuery($query);
$cnt=1;
$results=getAll($query);
if(count(getAll($query))>0){
    foreach($results as $row){ 
       $_SESSION['brndid']=$row['bid'];  
?>  

<section id="listing_img_slider">
  <div><img src="assets/images/<?php echo $row['image1'];?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="assets/images/<?php echo $row['image2'];?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="assets/images/<?php echo $row['image3'];?>" class="img-responsive" alt="image" width="900" height="600"></div>

  
 
  
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
	<form method="post">
      <div class="col-md-9">
	  
        <h2><a name="car_name"><?php echo $row['nume_marca'];
		?></a>
		<a name="car_type"> <?php echo $row['vehicle_type'];?></a></h2>
		</div>
      </form>
      <div class="col-md-3">
        <div class="price_info">
          <p>$<?php echo $row['price'];?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo $row['model_year'];?></h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo $row['fuel_type'];?></h5>
              <p>Fuel Type</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo $row['seats'];?></h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo $row['vehicle_overview'];?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane " id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
                <?php if($row['air_conditioner']==1){
?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
   <?php } ?> </tr>

<tr>
<td>Braking Assist System</td>
<?php if($row['brake_assist']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>

<tr>
<td>Airbags</td>
<?php if($row['airbags']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   

<tr>

<td>ABS</td>

<?php if($row['abs']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   
 <tr>
<td>CrashSensor</td>
<?php if($row['crash_sensor']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($row['leather_seats']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
<tr>
<td>Navigation</td>
<?php if($row['navigation']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
<tr>
<td>Power Steering</td>
<?php if($row['power_steering']==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>



                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }
} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form method="post">
		    
            <div class="form-group">
              <input type="date" class="form-control" name="date_in" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
			  
              <input type="date" class="form-control" name="date_out" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
          <?php if($_SESSION['login']==true)
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Book Now">
              </div>
              <?php } else { ?>
        <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

              <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Similar Cars</h3>
      <div class="row">
<?php

$bid=$_SESSION['brndid'];
$query = "SELECT vehicle_table.*,marci.nume_marca,marci.id as bid  from vehicle_table join marci on marci.id=vehicle_table.vehicle_brand where vehicle_table.id='$id';";
performQuery($query);
$cnt=1;
if(count(getAll($query))>0){
    foreach(getAll($query) as $row){ 
         ?>     
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo $row['id'];?>"><img src="assets/images/<?php echo $row['image1'];?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehicle-specification.php?vhid=<?php echo $row['id'];?>"><?php echo $row['nume_marca'];?> , <?php echo $row['vehicle_type'];?></a></h5>
              <p class="list-price">$<?php echo $row['price'];?></p>
          
              <ul class="features_list">
                
             <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $row['seats'];?> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['model_year'];?> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $row['fuel_type'];?></li>
              </ul>
            </div>
          </div>
        </div>
		
 <?php }}  ?>       

      </div> 
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>

<div id="back-top" class="back-top"> <a href="#top"><i class="angle-up" aria-hidden="true"></i> </a> </div>




<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>