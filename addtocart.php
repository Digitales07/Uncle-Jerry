<?php
include ('session.php');
if(isset($_POST['submit']))
{
	if(isset($_SESSION['login_user']))
	{
	$p=$_POST['pid'];
	$p_price=$_POST['p_price'];
	$d=date("Y/m/d");
	$user = $_SESSION['login_user'];
	$sqlu= "select customer_id_FK from user where user_username='$user' ";
	$resultu = mysqli_query($conn, $sqlu) or die("Error in Selecting " . mysqli_error($conn));
	while($rowu = mysqli_fetch_array($resultu))
	{
		$queryc = "INSERT INTO orders( order_date, customer_id_fk, product_id_FK, product_amount) VALUES ('$d','$rowu[0]','$p','$p_price')";
		if(mysqli_query($conn,$queryc))
		{
				
			?>
					<script type="text/javascript">
					window.location.href = 'shopping-cart.php';
					</script>
					<?php 
		   }
	}
}

else{

	if(isset($_SESSION['temp_id']))
	{
		$p=$_POST['pid'];
		$d=date("Y/m/d");
		$id = $_SESSION['temp_id'];
	
       
		$queryc = "insert into ordertemp( order_date, product_id_FK, customer_id_FK) VALUES ('$d','$p','$id')";
		if(mysqli_query($conn,$queryc))
		{

			?>
						<script type="text/javascript">
						window.location.href = 'shopping-cart.php';
						</script>
						<?php 
			   }
		
	}
	else 
	{
		echo "Session problem";
	}
	
}
}

?>