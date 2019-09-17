
<?php
    session_start(); //we need session for the log in thingy XD 
    include "administrator\db_connect_administrator.php";
	 
?>
<html>
<body>

<head>
<style type="text/css">
	#contenair{
		height: 100%;
		width: 100%;
		
	}
	#right{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-right: 20px;
		float: right;
		height:95%;
		width:35%;
		background-color: #b7bcbd;
		
	}
	#left
	{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-left:20px;
		float: left;
		
		width: 60%;
		background-color: #b7bcbd;
	
	}
	</style>
</head>
<div class="topnav">
  <a class="active" href="login.php" name="logare" value="USER LOGIN">USER LOGIN\REGISTER</a>
  <a href="login_administrator.php" name="administrator" value="ADMINISTRATOR LOGIN">ADMINISTRATOR LOGIN</a>
</div>

<div id="contenair">
<?php


if(isset($_POST['submit_reg'])){
	$first_name=$_POST['firstname'];
	$last_name=$_POST['lastname'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$message="$first_name $last_name requested for account approval";
	
	 $query = "INSERT INTO `registration_request` (`id`, `first_name`, `last_name`, `phone`, `username`,`password` ,`city`,`country`,`message`) VALUES (NULL, '$first_name', '$last_name', '$phone','$username', '$password','$city','$country','$message')";
	if(performQuery($query)){
	   echo "<script>alert('Account request in pending!')</script>";
	}else{
		echo "script>alert('Unknown error!')</script>";
	}
	
}
?>
<div id="left" align="left">
  <table>
  <form method="POST" name="signupform" action="login.php">
  <tr>
  <td height="55">FIRSTNAME:</td>
  <td><input name="firstname" type="text" id="firstname" size="55"/></td>
  </tr>
  <tr>
    <td height="55">LASTNAME:</td>
	<td><input name="lastname" type="text" id="lastname" size="55"/></td>
  </tr>
  <tr>
    <td height="55">PHONE NUMBER:</td>
	<td><input name="phone" type="text" id="phone" size="55" class="phone"/></td>
  </tr>
  <tr>
    <td height="55">USERNAME:</td>
	<td><input name="username" type="text" id="username" size="55"/></td>
  </tr>
  <tr>
    <td height="55">PASSWORD:</td>
	<td><input name="password" type="password" id="password" size="55"/></td>
  </tr>
  <tr>
    <td height="55">CITY:</td>
	<td><input name="city" type="text" id="city" size="55"/></td>
  </tr>
  <tr>
    <td height="55">COUNTRY:</td>
	<td><input name="country" type="text" id="country" size="55"/></td>
  </tr>
  <tr>
  <td align="center" colspan="2"><input type="submit" name="submit_reg" value="submit_reg" /></td>
		</tr>
    </form>
  
  </form>
  </table>
</div>
<div id="right" align="center">
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="submit" id="submit" />
            </div>
        </div>
    </form>
</div>

  <?php
    if(isset($_POST['submit'])){
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $query="SELECT * from tabel_utilizatori;";
	 if(count(getAll($query))>0){
		 foreach(getAll($query) as $row){
		 if($row['username']==$username && $row['password']==$password){
		    $_SESSION['login']=true;
			$_SESSION['username']=$row['username'];
			header('location:index.php');
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
</div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>