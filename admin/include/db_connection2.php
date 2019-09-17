<?php
function user($username){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql= "select * from `users` where `username` = '$username'; ";



?>