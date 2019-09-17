<?php

function getReservationData($id){
  
   $array=array();
    $query="Select * from reservation where `id` = '$id'; ";
   if(count(getAll($query))>0){
	   foreach(getAll($query) as $row){
		   $array['id']=$row['id'];
		   $array['username']=$row['username'];
		   $array['date_in']=$row['date_in'];
		   $array['car_type']=$row['car_type'];
	   }
   }
   return $array;
   
}

function getId($username){
	
  $query="Select id from reservation where `username` = '$username'; ";

 if(count(getAll($query))>0){
     foreach(getAll($query) as $row){
	   return $row['id'];
	 }
  }
}

?>