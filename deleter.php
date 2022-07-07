<?php

include('session.php');

if(isset($_GET['id']))
{
$id = $_GET['id'];
		if(isset($_SESSION['temp_id']))
		{
			$qry = "DELETE FROM ordertemp WHERE order_id ='$id'";
			$result=mysql_query($qry);
		}
		else 
		{
			$qry = "DELETE FROM orders WHERE order_id ='$id'";
			$result=mysql_query($qry);
		}
		if(isset($result)) {
			echo "yes";
		} else {
			echo "NO";
		}
}
else 
	
{
	echo "NOT SET";
}

?>