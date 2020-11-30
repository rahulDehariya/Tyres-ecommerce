<?php
  
 // include_once 'config.php';


include_once 'config/config.php';





function Checklogin()
{
	$res=0;

	if(isset($_SESSION['user_id']) && $_SESSION['is_logged_in']==1)
	{
	 $res=1;
	}
	
  	else
  	{

	  	if(isset($_COOKIE['is_logged_in']) && $_COOKIE['is_logged_in'] ==1)
	  	{
	  		$res=1;
	  		
	  		$user_id=$_COOKIE['user_id'];
	  		$username=$_COOKIE['username'];
	  		$is_logged_in=1;

	 
	  		$_SESSION=$_COOKIE;

	  	
	  	}
	 }
	return  $res ;
}


?>