<?php 
include 'session.php';

if(isset($_POST['create']))
{

	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$p = $_POST['phone'];
	$e= $_POST['email'];
	$un= $_POST['usern'];
	$pass= $_POST['pass'];
	$cpass=$_POST['confirm'];
	$tid=$_POST['t_id'];
	if($cpass!=$pass)
	{
		    $_SESSION['ncr']=1;
			header("location: login.php");
			
	}
		
	







	$queryc = "INSERT INTO customer( customer_fname, customer_lname,customer_phone, customer_email) VALUES ('$fn','$ln','$p','$e')";
  
	if(mysqli_query($conn,$queryc))
	{
		$id = mysqli_insert_id($conn);
		$query = "INSERT INTO user( user_username, user_password,customer_id_FK) VALUES ('$un','$pass','$id')";
			
		if(mysqli_query($conn,$query))
		{
			$sql1 = "SELECT * FROM ordertemp WHERE customer_id_fk='$tid' ";
			$result1 = mysqli_query($conn,$sql1);
			$count = mysqli_num_rows($result1);
			if($count>0)
			{
		
			
				while (	$row=mysqli_fetch_array($result1))
				{
				$sql2 = " INSERT INTO orders(order_date, customer_id_fk, order_quantity, product_id_FK) VALUES ('$row[1]','$id','$row[3]','$row[4]')";
				mysqli_query($conn,$sql2);
				}
				$sql= "DELETE FROM ordertemp WHERE customer_id_fk=$tid";
				mysqli_query($conn, $sql);
			unset($_SESSION['temp_id']);
			$query ="delete from temp where id=$tid";
			mysqli_query($conn, $query);
			$_SESSION['login_user']=$un;
			?>
			<script type="text/javascript">
			window.location.href = 'checkout.php';
			</script>
			<?php 
			
			}
			else 
			{
				?>
				<script type="text/javascript">
				window.location.href = 'index.php';
				</script>
				<?php
			}
   }
   else
   {
		echo "CANOT DO IT";	
	}
	}
}

?> 