<?php
include('config.php');
session_start();

if((!isset($_SESSION['login_user']))&&(!isset($_SESSION['temp_id']))){
	$_SESSION['nc']=2;
	$_SESSION['ncr']=2;
	$qurey="insert INTO temp values()";
	mysqli_query($conn, $qurey);
	$id =mysqli_insert_id($conn);
	$_SESSION['temp_id']=$id;
	
}
else 
{
	if(isset($_SESSION['login_user']))
	{
		$user_check =$_SESSION['login_user'];

      
	}
	if(isset($_SESSION['temp_id']))
	{
		
	}
	
 
}

?>