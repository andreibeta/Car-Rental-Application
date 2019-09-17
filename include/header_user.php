<header>
 
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
     
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$name=$_SESSION['username'];
echo $name;
$query ="SELECT first_name FROM tabel_utilizatori WHERE 'username'='$name;' ";
if(count(getAll($query)) > 0)
{
foreach(getAll($query) as $row)
	{

	 }}?><i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){  ?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="user_bookings.php">My Accepted Bookings</a></li>
            
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Accepted Bookings</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="login.php">User Login</a></li>
		  <li><a href="login_administrator.php">Administrator</a></li>
		  

<div>
		 

		  
		  

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>
<!-- /Header --> 