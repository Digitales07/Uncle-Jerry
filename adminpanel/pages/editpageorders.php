<?php
   include('session.php');
   $type = $_SESSION['admin_type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
                         <?php

if(isset($_POST['submit']))
	{
	
		
		$c = $_POST['customer'];
		$d=$_POST['date'];
		$a=$_POST['address'];
		$c=$_POST['phone'];
		$id=$_POST['ido'];
		
		
		$sqld= "UPDATE orders SET order_date='$d' where orderdetails_id_fk='$id'";
		mysqli_query($conn,$sqld);
	
		
$sql = "UPDATE orderdetails SET address='$a' where orderdetails_id='$id'";
if(mysqli_query($conn,$sql) )
{
	
$sql1 = "UPDATE customer SET customer_phone='$c' where customer_id='$c'";
		
	if(mysqli_query($conn,$sql1) )
		{
			
			?>
			<script type="text/javascript">
			window.location.href = '../pages/orders.php';
			</script>
			<?php 
   }
			
	}
	}

?> 
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="orders.php"><i class="fa fa-shopping-cart fa-fw"></i>Orders</a> 
                        </li>
                         <li>
                            <a href="products.php"><i class="fa fa-glass fa-fw"></i>Products</a> 
                        </li>
                         <li>
                            <a href="categories.php"><i class="fa fa-tasks fa-fw"></i>Categories</a> 
                        </li>
                         <li>
                            <a href="stores.php"><i class="fa fa-home fa-fw"></i>Stores</a> 
                        </li>
                       <?php  if($type == TYPE_SUPERADMIN){?>
                       <li>
                            <a href="admins.php"><i class="fa fa-home fa-fw"></i>Admins</a> 
                        </li>
                        <?php }?>
                            
                        
     </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <ol class="breadcrumb" style="background-color:transparent; float:right; ">
                      <li>Home&nbsp;</li>    
                      <li>&nbsp;Orders&nbsp;</li>
                      <li>&nbsp;Edit Orders&nbsp;</li>                      
                    </ol>
                        <h1 class="page-header">Edit Order</h1>   
              
<?php 
$i=0;


$idorder = null;
$cid = null;
$pid = null;
if(isset($_POST['edit']))
{
$idorder = $_POST['oid'];

}

$sql1 = "select * from orderdetails where orderdetails_id=".$idorder;
$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
$od=  mysqli_fetch_array($result1);
$address=$od['address'];


$sql = "select * from customer where customer_id =".$od['customer_id_fk'];
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
$customer=  mysqli_fetch_array($result);
$number=$customer['customer_phone'];


$sql3 = "select * from orders where orderdetails_id_fk =".$od['orderdetails_id'];
$result3 = mysqli_query($conn, $sql3) or die("Error in Selecting " . mysqli_error($conn));


while ($row = mysqli_fetch_array($result3)) {
	$date=$row['order_date'];
	$i++;
}

	
	

?>






                        <div class="col-lg-4">
                        <form action="editpageorders.php" method="post">
                        
Address:  <input type="text" name="address" value="<?php echo $address; ?>" style="float:right;">
<br>
<br>
Number:  <input type="text" name="phone" value="<?php echo $number; ?>" style="float:right;">

<br>
<br>
Date:  <input type="date" name="date" value="<?php echo $date; ?>" style="float:right;">

<br>
<br>
<?php 
$j=0;
while($j<=$i)
{
echo "Product ".$j.":";  

$query = "SELECT product_id,product_name FROM product";
if ( $result = mysqli_query($conn,$query) ) {
    echo "<select name='product' id='product' style='float:right;'>";
    
     while ($row =  mysqli_fetch_array($result) ) {
     	if($row[1]==$productname[$j])
     	{
     		echo "<option value='".$row[0]."'selected> ".$row[1]." </option>";
     	}
     	else {
       echo "<option value='".$row[0]."'> ".$row[1]." </option>";
     	}
     }
     echo "</select>
    		<br>
            <br>";
}
$j++;
}

?>

<br>
<br>
<br>
<br>
<input type='hidden' name='ido'  value=<?php echo $idorder; ?>>
<input type='hidden' name='customer'  value=<?php echo $customer[0]; ?>>

		<div align ='center' colspan='6' >
		<input type='submit' name='submit' value='submit' ></div>
		
		</form>
		

    </div>
                    </div>                
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
