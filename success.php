<?php include 'session.php';

if(isset($_POST, $_POST['custom']) && !empty($_POST['custom'])){
	$x=0;
    $a = $_POST['address_street'];
	$ct = $_POST['address_city'];
	$c = $_POST['address_country'];
	$s = $_POST['address_state'];
	$ipnTrackId = $_POST['ipn_track_id'];
	$ot = 'paypal';


	$amount = $_POST['mc_gross']; //not in use yet

    $user = $_POST['custom'];

    $sqlu= "select customer_id_FK from user where user_username='$user' ";
    $resultu = mysqli_query($conn, $sqlu) or die("Error in Selecting " . mysqli_error($conn));
    $rowu = mysqli_fetch_array($resultu);
    	
    $cid = $rowu['customer_id_FK'];

	$queryc = "INSERT INTO orderdetails( customer_id_fk,address, city,country,paypal_ipn_track_id) VALUES ('$cid','$a','$ct','$c','$ipnTrackId')";
	if(mysqli_query($conn,$queryc)){
		$od = mysqli_insert_id($conn);
		$sql = "select order_id from orders where customer_id_fk='$cid' AND orderdetails_id_fk='0'";
		$result= mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
		while ($row = mysqli_fetch_array($result)) {	
			$query = "UPDATE orders  SET orderdetails_id_fk='$od', order_payment_type='$ot' where order_id='$row[0]'";
           	mysqli_query($conn, $query);
		}
	}
    else{}
}
?>