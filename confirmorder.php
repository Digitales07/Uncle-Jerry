<?php include 'session.php';
        
        if(isset($_POST['submit']))
	{
		
		$x=0;
	    $a = $_POST['address'];
		$ct = $_POST['city'];
		$pc = $_POST['pcode'];
		$c = $_POST['country'];
		$s = $_POST['state'];
	    $user = $_SESSION['login_user'];
	    $sqlu= "select customer_id_FK from user where user_username='$user' ";
	    $resultu = mysqli_query($conn, $sqlu) or die("Error in Selecting " . mysqli_error($conn));
	    $rowu = mysqli_fetch_array($resultu);
	    	
	    $cid = $rowu['customer_id_FK'];
	
		$queryc = "INSERT INTO orderdetails( customer_id_fk,address, city,country,postcode) VALUES ('$cid','$a','$ct','$c','$pc')";
	if(mysqli_query($conn,$queryc))
		{
			$od = mysqli_insert_id($conn);
			
			
			$sql = "select order_id from orders where customer_id_fk='$cid' AND orderdetails_id_fk='0'";
			$result= mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			while ($row = mysqli_fetch_array($result)) {	
			
			$query = "UPDATE orders  SET orderdetails_id_fk='$od' where order_id='$row[0]'";
           	mysqli_query($conn, $query);
   }
   ?>
   			<script type="text/javascript">
   			window.location.href = 'index.php';
   			alert("Your order has been placed");
   			</script>
   			<?php 
	
        }
        else{
        			
        }
	}
	ELSE
	{
		
	}

?> 
        
        

        