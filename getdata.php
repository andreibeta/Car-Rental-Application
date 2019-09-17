<?php

function getProfileData($id){
	

  
  
   $query="Select * from users where `id` = '$id'; ";
   $array=array();
   if(count(getAll($query))>0){
	   foreach(getAll($query) as $row){
		   $array['firstname']=$row['firstname'];
		   $array['lastname']=$row['lastname'];
		   $array['phone']=$row['phone'];
		   $array['username']=$row['username'];
		   $array['city']=$row['city'];
		   $array['country']=$row['country'];
	   }
   }
   return $array;
   
}

function getId($username){
	
   
  
  $query="Select id from users where `username` = '$username'; ";
  if(count(getAll($query))>0){
     foreach(getAll($query) as $row){
	   return $row['id'];
	 }
  }
  
  
}

?>