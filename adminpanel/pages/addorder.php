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

    <title>Add Order</title>

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

$t=null;
if(isset($_POST['submit']))
	{
		
		
		
	    $d = $_POST['date'];
		$p = $_POST['product'];
		$c = $_POST['customer'];
		$q = $_POST['quantity'];
		
		
		$sql1 = "select product_price from product where product_id=".$p;
		$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
		 
		$pr=  mysqli_fetch_array($result1);
		$t= $q*$pr[0];
		
		
		
		
		if($d=='')
		{
			echo "<script>window.open('addorders.php?date=Date is required','_self')</script>";
			exit();
		}
		if($p=='')
		{
			echo "<script>window.open('addorders.php?product=product is required','_self')</script>";
			exit();
		}
		
		if($q=='')
		{
			echo "<script>window.open('addorders.php?number=Number is required','_self')</script>";
			exit();
		}
		
		
		
		$queryc = "INSERT INTO orders( order_date, customer_id_fk, order_quantity, order_total, product_id_FK) VALUES ('$d','$c','$q','$t','$p')";
	if(mysqli_query($conn,$queryc))
		{
			
			?>
			<script type="text/javascript">
			window.location.href = '../pages/orders.php';
			</script>
			<?php 
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
                <?php if($type == TYPE_SUPERADMIN){ ?>
                <div class="row">
                    <div class="col-lg-12">
                    <ol class="breadcrumb" style="background-color:transparent; float:right; ">
                      <li>Home&nbsp;</li>    
                      <li>&nbsp;Orders&nbsp;</li>
                      <li>&nbsp;Add Orders&nbsp;</li>                      
                    </ol>
                        <h1 class="page-header">Add Order</h1>   
              








                        <div class="col-lg-4">
                        <form action="addorder.php" method="post">
Date:  <input type="date" name="date" value="" style="float:right;" required="required">

<br>
<br>
Product:  
<?php 
$query = "SELECT product_id,product_name FROM product";
if ( $result = mysqli_query($conn,$query) ) {
    echo "<select name='product' id='product' style='float:right;'>";
     while ($row =  mysqli_fetch_array($result) ) {
       echo "<option value='".$row[0]."'> ".$row[1]." </option>";
     }
     echo "</select>";
}


?>
<br>
<br>
Quantity:  <input type="text" name="quantity" value="" style="float:right;">
<br>
<br>


Customer: 
<?php 
$query = "SELECT customer_id,customer_fname FROM customer";
if ( $result = mysqli_query($conn,$query) ) {
    echo "<select name='customer' id='customer' style='float:right;'>";
     while ($row =  mysqli_fetch_array($result) ) {
       echo "<option value='".$row[0]."'> ".$row[1]." </option>";
     }
     echo "</select>";
}


?>
<br>
<br>
<br>
<br>



		<div align ='center' colspan='6' >
		<input type='submit' name='submit' value='submit' ></div>
		
		</form>
		

    </div>
                    </div>                
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <?php }else{ ?>
                <h3 class="text-center">You are not allowed to perform this action</h3>
            <?php }?>
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
