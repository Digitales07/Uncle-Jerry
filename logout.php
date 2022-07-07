<?php
include 'config.php';
session_start();
unset($_SESSION["login_user"]);
if (isset($_SESSION['temp_id']))
{
	$tid=$_SESSION['temp_id'];
	$query ="delete from temp where id=$tid";
	mysqli_query($conn, $query);
unset($_SESSION['temp_id']);
}
   if(session_destroy()) {
   	$sql= "DELETE FROM ordertemp WHERE customer_id_fk=$tid";
   	mysqli_query($conn, $sql);
      header("Location: login.php");
   }
?>