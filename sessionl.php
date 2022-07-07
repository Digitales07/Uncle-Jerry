<?php
include('config.php');
session_start();
if((!isset($_SESSION['login_user']))&&(!isset($_SESSION['temp_id']))){
	
	$qurey="insert INTO temp values()";
	mysqli_query($conn, $qurey);
	$id =mysqli_insert_id($conn);
	$_SESSION['temp_id']=$id;
}


?>