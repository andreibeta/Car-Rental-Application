<?php 
  session_start();
  include("administrator\db_connect_administrator.php");
  
  ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login &amp; Register Templates</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="admin/assets/css/form-elements.css">
        <link rel="stylesheet" href="admin/assets/css/style.css">

        

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

		<style>
 body {
  background:url(admin/img/background2.jpg) no-repeat !important;
  padding-top:100px;
  background-size:cover;
 
}
</style>
    </head>
    
    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to the Admin Panel</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Username</label>
				                        	<input type="text" name="username" placeholder="Username" class="form-username form-control" id="form-username" required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password" required>
				                        </div>
				                        <button type="submit" name="submit" class="btn">Sign in!</button>
										<a href="login.php" class="btn">User Log In <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
				                    </form>
			                    </div>
		                    </div>
		                <?php
						   if(isset($_POST['submit'])){
						     $username=$_POST['username'];
							 $password=$_POST['password'];
							 $query="SELECT * from admin;";
							 if(count(getAll($query))>0){
		                         foreach(getAll($query) as $row){
		                     if($row['username']==$username && $row['password']==$password){
								$_SESSION['login_administrator']=true;
								
								header('location:administrator_index.php');
								}else{
									echo "<script>alert('Try again to login,username or password is wrong')</script>";
									}
								}
	 
	
								}else{
										echo "<script>alert('Error!!!')</script>";
									}
						   }
						
						?>
		                	
	                        
                        </div>
                        
                       
?>
        </div>

        

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>