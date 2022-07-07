<?php
 include("session.php");

 
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if((isset($_SESSION['temp_id']))&&(!isset($_SESSION['login_user'])))
      {
      	$id=$_SESSION['temp_id'];
      	if(isset($_POST['submit']))
      	{
      	$tid=$_POST['t_id'];
      	}
      	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
      	$mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      	
      	$sql = "SELECT * FROM user WHERE user_username = '$myusername' and user_password = '$mypassword'";
      	$result = mysqli_query($conn,$sql);
      	$row1 = mysqli_fetch_array($result);
      	 
      	
      	$count = mysqli_num_rows($result);
      	
      	// If result matched $myusername and $mypassword, table row must be 1 row
      	
      	if($count == 1) {
      		$_SESSION['login_user'] = $myusername;
      		unset($_SESSION['temp_id']);
      		
      		$sql1 = "SELECT * FROM ordertemp WHERE customer_id_fk='$tid' ";
      		$result1 = mysqli_query($conn,$sql1);
      		$count1 = mysqli_num_rows($result1);
      		if($count1>0)
      		{
      			while($row=mysqli_fetch_array($result1))
      			{
      		$sql2 = " INSERT INTO orders(order_date, customer_id_fk, order_quantity, product_id_FK, order_archived) VALUES ('$row[1]','$row1[3]','$row[3]','$row[4]','$row[5]')";
      		mysqli_query($conn,$sql2);
      			}
      	  
      	   	$sql= "DELETE FROM ordertemp WHERE customer_id_fk=$tid";
      	   	mysqli_query($conn, $sql);
      		$_SESSION['login_user'] = $myusername;
      		$query ="delete from temp where id=$tid";
      		mysqli_query($conn, $query);
      		unset($_SESSION['temp_id']);
      		 
      		header("location: checkout.php");
      	
      		}
      		else {
      			unset($_SESSION['temp_id']);
      			header("location: index.php");
      			 
      		}
      		
      	}
      	else {
      		$_SESSION['nc']=1;
      		header("location: login.php");
      		
      		 
      	}
      	
      }
      else{
      
         header("location: index.php");
      
      }
   }

?>