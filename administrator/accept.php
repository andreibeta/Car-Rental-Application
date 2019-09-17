
<?php
    include('C:\xampp\htdocs\Masini\include\db_connection.php');
    $id = $_GET['id'];
    $query = "select * from `registration_requests` where `id` = '$id'; ";
    if(count(getAll($query)) > 0){
        foreach(getAll($query) as $row){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone= $row['phone'];
	 $username= $row['username'];
	 $password= $row['password'];
	 $city= $row['city'];
	 $country= $row['country'];
            $query = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `phone`, `username`, `password`, 'city', 'country') VALUES (NULL, '$firstname', '$lastname', '$phone' , '$username', '$password', '$city', $country);";
        }
        $query .= "DELETE FROM `registration_requests` WHERE `registration_requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="home.php">Back</a>