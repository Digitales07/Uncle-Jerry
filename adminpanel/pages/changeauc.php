<?php

include 'config.php';

if (isset($_POST('submit')))
{
	$title=$_POST('title');
	$dis = $_POST('dis');
	$contact = $_POST('contact');
	
	$query = "update about SET title='$title', discription='$dis', contact='$contact'";
	if (mysqli_query($conn, $query))
	{
		header("location: ../pages/index.php");
	}
	
}

?>