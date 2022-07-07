<?php

   include('session.php');
   include ('PAGINATE.php');

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

    <title>Orders</title>

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
    <script src="scripts/jquery-1.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    		



</head>

<body>
   
   
   <?php 
   
    if($type == TYPE_SUPERADMIN):
       	if( isset( $_POST['arc'] ) )
       	{
       		
       	$id=$_POST['archive'];
       	
       		$sql = "UPDATE orderdetails SET order_archived='0' where orderdetails_id='$id'";
       	
       		mysqli_query($conn,$sql);

       		if(mysqli_query($conn,$sql))
       		{
       			echo '<script> $("#table1").load(location.href + " #table1"); </script>';
       		}
       	
       	}
       	
       	
       	if( isset( $_POST['unarc'] ) )
       	{
       		$id=$_POST['unarchive'];
       	
       	
       		$sql = "UPDATE orderdetails SET order_archived='1' where orderdetails_id='$id'";
       	
       		if(mysqli_query($conn,$sql))
       		{
       			echo '<script> $("#table1").load(location.href + " #table1"); </script>';
       		}
       	
       	}
    endif;
   	
   	
   
   
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
                                           
                    </ol>
                        <h1 class="page-header">Orders</h1>
                        <div id="table1">
                            <?php if($type == TYPE_SUPERADMIN): ?>
                                <button type="button" class="btn btn-success btn-lg" style="float:center" onclick="window.location='../pages/addorder.php'">ADD ORDERS</button><br><br><br>
                            <?php endif;?>                        
                        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Orders
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <div class="pull-left">
                                    <div class="select_sortby inline-block">
                                    <?php  
                                    $srtb=0;
                                    $srb=0;
                                    $sb=0;
                                    $sortby=2;
                                    if( isset( $_GET['sb'] )&& $_GET['sb']!=0)
                                    {
                                    	$srb=1;
                                    	$sb=$_GET['sb'];
                                    	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
                                    
                                    }
                                    if( isset( $_GET['srtby'] )&& $_GET['srtby']!=2 )
                                    {
                                    	$srtb=1;
                                    	$sortby=$_GET['srtby'];
                                    	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
                                    
                                    }
                                    if(isset($_GET['pn']))
                                    {
                                    	$per_page =$_GET['pn'];
                                    }
                                    else{
                                    $per_page = 10;
                                    }
                                    if($srtb==1)
                                    {
                                    $sqlpages = "select * from orderdetails where order_archived = '$sortby'";
                                    $resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    } 
                                    else {
                                    	$sqlpages = "select * from orderdetails ";
                                    	$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    	
                                    }
                                    $total_results = mysqli_num_rows($resultpages);
                                    $total_pages = ceil($total_results / $per_page);//total pages we going to have
                                    
                                    
                                    if (isset($_GET['page'])) {
                                    	$ppage = $_GET['page'];
                                    }
                                    else{
                                    	$ppage = 1;
                                    	
                                    }
                                    ?>
                                    <div style="float:right; margin-left:50px;">
                                    Rows:  <select class="bootstrap-select type_sortby" name="number" onchange="{ window.location = this.value; }"   >
                                            <?php if($per_page==5){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5" selected>5</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10" >10</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20" >20</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50" >50</option>
                                            
                                            <?php } else if($per_page==10){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5" >5</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10" selected>10</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20" >20</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50" >50</option>
                                            
                                            <?php } else if($per_page==20){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5" >5</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10" >10</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20" selected>20</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50" >50</option>
                                            
                                            <?php } else if($per_page==50){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5" >5</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10" >10</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20" >20</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50" selected>50</option>
                                            
                                            <?php }?>
                                        </select>
                                        </div>
                                        <div style="float:right; margin-left:50px; text-align:center;">
                                      Sort by:  <select class="bootstrap-select type_sortby" name="sortb" onchange="{ window.location = this.value; }"   >
                                            <?php if($sb==0){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0" selected>Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1" >ID Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2" >ID Deaccending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3" >Customer Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4" >Customer Deaccending</option>
                                           
                                            <?php } else if($sb==1){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1" selected>ID Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2" >ID Deaccending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3" >Customer Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4" >Customer Deaccending</option>
                                           
                                            <?php } else if($sb==2){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1" >ID Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2" selected >ID Deaccending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3" >Customer Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4" >Customer Deaccending</option>
                                           
                                            <?php } else if($sb==3){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1" >ID Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2" >ID Deaccending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3" selected >Customer Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4" >Customer Deaccending</option>
                                           
                                            <?php } else if($sb==4){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1" >ID Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2" >ID Deaccending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3" >Customer Accending</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4" selected>Customer Deaccending</option>
                                           
                                            <?php } ?>
                                        </select>
                                        </div>
                                        
                                        <div style="float:left; text-align:left;">
                                       SHOW:  <select class="bootstrap-select type_sortby" name="sort" onchange="{ window.location = this.value; }"   >
                                            <?php if($sortby==2){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" selected>Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Archived</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Unarchived</option>
                                            
                                            <?php } else if($sortby==0){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" selected>Archived</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Unarchived</option>
                                            
                                            <?php } else if($sortby==1){?>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Default</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" >Archived</option>
                                            <option value="orders.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>" selected>Unarchived</option>
                                            
                                            <?php }?>
                                        </select>
                                        </div>
                                        
                                        <br>
                                        <br>
                                      
                                        
                                     </div>
                                     
                                    </div><!-- End .select_sortby -->
                            <div class="dataTable_wrapper">
                               
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Edit</th>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Total</th>
                                            <th>Customer</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>Payment Type</th>
                                            <?php if($type == TYPE_SUPERADMIN): ?>
                                                <th>Archive</th>
                                            <?php endif;?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                  
                                    
                                    


                                   
                                   
                                    	
                                    $offset = ($ppage-1) * $per_page;
if($srb!=0) 
{
if($sb==1)     
{
	if($srtb==1)
	{
$sql1 = "select * from orderdetails where order_archived = $sortby ORDER BY orderdetails_id ASC LIMIT  $per_page OFFSET $offset";
$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
}
else {
	$sql1 = "select * from orderdetails ORDER BY orderdetails_id ASC LIMIT  $per_page OFFSET $offset";
$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));

}
}

else if($sb==2)     
{
	if($srtb==1)
	{
$sql1 = "select * from orderdetails where order_archived = $sortby ORDER BY orderdetails_id DESC LIMIT  $per_page OFFSET $offset";
$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
}
else {
$sql1 = "select * from orderdetails ORDER BY orderdetails_id DESC LIMIT  $per_page OFFSET $offset";
$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	
}
	}
else if($sb==3)
{
	if($srtb==1)
	{
	$sql1 = "select * from orderdetails where order_archived = $sortby ORDER BY customer_id_fk ASC LIMIT  $per_page OFFSET $offset";
	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	}
	else {
		$sql1 = "select * from orderdetails ORDER BY customer_id_fk ASC LIMIT  $per_page OFFSET $offset";
	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	
	}
	}
else if($sb==4)
{
	if($srtb==1)
	{
	$sql1 = "select * from orderdetails where order_archived = $sortby ORDER BY customer_id_fk DESC LIMIT  $per_page OFFSET $offset";
	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	}
	else {
		$sql1 = "select * from orderdetails ORDER BY customer_id_fk DESC LIMIT  $per_page OFFSET $offset";
	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	
	}
	}
else {
	$sql1 = "select * from orderdetails ORDER BY orderdetails_id DESC LIMIT  $per_page OFFSET $offset";
	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	
	
}
}
else {
	if($srtb==1)
	{
		$sql1 = "select * from orderdetails where order_archived = $sortby ORDER BY orderdetails_id DESC LIMIT  $per_page OFFSET $offset";
		$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	}
	
	
	else {
		$sql1 = "select * from orderdetails ORDER BY orderdetails_id DESC LIMIT  $per_page OFFSET $offset";
		$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
	
	
	}
	
}
        // number of results to show per page



//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
	$show_page = $_GET['page']; //current page
	if ($show_page > 0 && $show_page <= $total_pages) {
		$start = ($show_page - 1) * $per_page;
		$end = $start + $per_page;
	} else {
		// error - show first set of results
		$start = 0;
		$end = $per_page;
	}
} else {
	// if page isn't set, show first set of results
	$start = 0;
	$end = $per_page;
}
// display pagination
if (isset($_GET['page'])) {
$page = intval($_GET['page']);
}
$tpages=$total_pages;
if (isset($_GET['page'])) {
if ($page <= 0)
	$page = 1;
}
$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages."&srtby=".$sortby."&pn=".$per_page."&sb=".$sb;

for ($i = $start; $i < $end; $i++) {
	// make sure that PHP doesn't try to show results that don't exist
	if ($i == $total_results) {
		break;
	}
   $row1 = mysqli_fetch_assoc($result1);

	
	$sql2 = "select customer_fname,customer_phone from customer where customer_id=".$row1['customer_id_fk'];
	$result2 = mysqli_query($conn, $sql2) or die("Error in Selecting " . mysqli_error($conn));
	 
	$customer=  mysqli_fetch_array($result2);
	
	$total=0;
	$productprice=0;
	$productname="";
    $order_payment_type = "";
	
	$sql = "select * from orders where orderdetails_id_fk =".$row1['orderdetails_id'];
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	 
	while ($row = mysqli_fetch_array($result)) {
		$date=$row['order_date'];
		$sql3 = "select product_name,product_price from product where product_id=".$row['product_id_FK'];
		$result3 = mysqli_query($conn, $sql3) or die("Error in Selecting " . mysqli_error($conn));
		 
		$product =  mysqli_fetch_array($result3);
		$productname=$productname.$product['product_name'].', ';
		$total= $total+($product['product_price']*$row["order_quantity"]);
        if(empty($order_payment_type))
            $order_payment_type = $row['order_payment_type'];
	}


                                    ?>
                                    
                                       
                                        
                                        
                                       
                                         <tr>
                                           <td><form action='editpageorders.php' method='post'>
                                           <input type='hidden' name='oid'  value="<?php echo $row1['orderdetails_id'];?>">
    		                          
                                           <input type='submit' name='edit' value='Edit'/>
                                           </form>
                                           </td>
                                           
                                           <td> <?php  echo $row1['orderdetails_id']; ?> </td>
                                        <?php 	
        		
                                           echo" 
                                            <td>" . $date. "</td> 
    		                                <td>" . $productname. "</td>  
                                            <td>" . $total . "</td>
                		                    <td>".$customer[0]."</td>
    		                                <td>".$customer[1]."</td>
   				                            <td>" . $row1["address"] . "</td>
                                            <td>" . $order_payment_type . "</td>";
                                            if($type == TYPE_SUPERADMIN):
                                                if($row1['order_archived']==1)
                                                {
                                                	
                                                   echo"
                            		               
                        		                    <td> <form action='orders.php' method='post'>
                                                   <input type='hidden' name='archive' id='archive' value=".$row1['orderdetails_id'].">
                                		           <input type='submit' name='arc' value='Archive'>
                                                   </form></td>";
                                                   
                                        		 }
                                        		 else 
                                        		 {
                                        		 	 echo"
                            		               
                        		                    <td> <form action='orders.php' method='post'>
                                                   <input type='hidden' name='unarchive' id='unarchive' value=".$row1['orderdetails_id'].">
                                		          <input type='submit' name='unarc' value='Unarchive'/>
                                                   </form></td>";
                                        		 }
                                            endif;
                                     echo'</tr>';
                                        }
                                        
                ?>
                
                                        
                                    </tbody>
                                      
                                </table>
                              <?php 
                                echo '<div class="pagination" style="float:right"><ul class="pagination">';
                               
                                if ($total_pages > 1) {
                                	
                                	if (isset($_GET['page'])) {
                                		echo paginate($reload, $show_page, $total_pages);
                                	}
                                	else
                                	{
                                		echo paginate($reload,1, $total_pages);
                                	}
                                }
                                echo "</ul></div>";
                                ?>
                            </div>
                            <!-- /.table-responsive -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        </div>
        </div>
        </div>
        </div>
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