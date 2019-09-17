<?php 
 session_start();
 include("administrator\db_connect_administrator.php");
  if($_SESSION['login']!==true){
        header('location:login.php');
    }else{
		if(isset($_POST['update'])){
			
		   $first_name=$_POST['first_name'];
		   $last_name=$_POST['last_name'];
		   $phone=$_POST['phone'];
		   $username=$_SESSION['username'];
		   $city=$_POST['city'];
		   $country=$_POST['country'];
		   $query = "UPDATE tabel_utilizatori SET first_name='$first_name',last_name='$last_name',numar_telefon='$phone',city='$city', country='$country' WHERE username='$username'";
		  
		   if(performQuery($query)){
            echo "<script>alert('Update has been accepted!!!')</script>";
          }else{
           echo "<script>alert('Error!!!')</script>";
           }
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
<title>Car Rental Portal | My Profile</title>
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
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 
</head>
	<body>
	<!--Header--> 
<?php include('include/header_user.php');?>
<!-- /Header --> 
	
	
	<?php 
       $nume=$_SESSION['username'];
       $query = "SELECT * from tabel_utilizatori where username='$nume'";

if(count(getAll($query)) > 0)
{
foreach(getAll($query) as $row)
{ ?>
     <section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      

      <div class="dealer_info">
        <h5><?php echo $row['first_name'];
		        echo "\t";
		        echo $row['last_name'];
		?></h5>
        <p>
          <?php echo $row['city'];?>&nbsp;<?php echo $row['country'];?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('include/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">General Settings</h5>
            <form  method="post">
			<div class="form-group">
              <label class="control-label">First Name</label>
              <input class="form-control white_bg" name="first_name" value="<?php echo $row['first_name'];?>" id="first_name" type="text"  required>
            </div>
			<div class="form-group">
              <label class="control-label">First Name</label>
              <input class="form-control white_bg" name="last_name" value="<?php echo $row['last_name'];?>" id="last_name" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo $row['username'];?>" name="username" id="username" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="phone" value="<?php echo $row['phone'];?>" id="phone" type="text" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg"  id="country" name="country" value="<?php echo $row['country'];?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo $row['city'];?>" type="text">
            </div>
            <?php }} ?>
           
            <div class="form-group">
              <button type="submit" name="update" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<!--/Profile-setting--> 



<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php } ?>
