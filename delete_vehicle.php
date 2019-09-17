<?php
session_start();
include("administrator\db_connect_administrator.php");
include ('delete2.php');

$id=$_GET['id'];
sterge($id);
header('location:manage-vehicles.php');
?>