<?php
   include('session.php');
   include 'PAGINATE.php';
   error_reporting(0);
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

    <title>Products</title>

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
    <script type="text/javascript">
    
   
        
	

</script>

</head>

<body>
<?php 
   
   	if($type == TYPE_SUPERADMIN):
       	if( isset( $_POST['arc'] ) )
       	{
       		
       	
       	
       		$id=$_POST['archive'];
       	
       	
       		$sql = "UPDATE product SET product_archived='0' where product_id='$id'";
       	
       		mysqli_query($conn,$sql);
       		echo '<script> $("#table1").load(location.href + " #table1"); </script>';
       	}
       	
       	
       	if( isset( $_POST['unarc'] ) )
       	{
       		$id=$_POST['unarchive'];
       	
       	
       		$sql = "UPDATE product SET product_archived='1' where product_id='$id'";
       	
       		mysqli_query($conn,$sql);
       		echo '<script> $("#table1").load(location.href + " #table1"); </script>';
       	
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
                      <li>&nbsp;Product&nbsp;</li>
                                           
                    </ol>
                        <h1 class="page-header">Products</h1>
                        <div id="table1">
                        <?php if($type == TYPE_SUPERADMIN): ?>
                            <button type="button" class="btn btn-success btn-lg" style="float:center" onclick="window.location='../pages/addproduct.php'" >ADD PRODUCTS</button><br><br><br>
                        <?php endif;?>
                        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="pull-left" >
                                    <div class="select_sortby inline-block">
                                    <?php  
                                    $srtb=0;
                                    $srb=0;
                                    $sb=0;
                                    $sortby=2;
                                    $st=0;
                                    $store=0;
                                    $ct=0;
                                    $cat=0;
                                    if( isset( $_GET['category'] ) && $_GET['category']!=0)
                                    {
                                    	$ct=1;
                                    	$cat=$_GET['category'];
                                    	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
                                    
                                    }
                                    if( isset( $_GET['store'] )&& $_GET['store']!=0)
                                    {
                                    	$st=1;
                                    	$store=$_GET['store'];
                                    	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
                                    
                                    }
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
                                    if( isset( $_GET['store'] )&& $_GET['store']!=0)
                                    {
                                    	if(isset( $_GET['category'] ) && $_GET['category']!=0)
                                    	{
                                    		if($srtb==1)
                                    		{
                                    			 
                                    			 
                                    			$sqlpages = "select * from product where product_archived = '$sortby' AND category_id_fk='$cat' AND stores_id_fk='$store'";
                                    			$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    		}
                                    		 
                                    		else {
                                    			$sqlpages = "select * from product where category_id_fk='$cat' AND stores_id_fk='$store'";
                                    			$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    			 
                                    		}
                                    	
                                    	}
                                    	else {
                                    		if($srtb==1)
                                    		{
                                    			 
                                    			 
                                    			$sqlpages = "select * from product where product_archived = '$sortby' AND stores_id_fk='$store'";
                                    			$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    		}
                                    	
                                    		else {
                                    			$sqlpages = "select * from product where stores_id_fk='$store'";
                                    			$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    			 
                                    		}
                                    	}
                                    	 
                                    }
                                    else 
                                    {
                                    if(isset( $_GET['category'] ) && $_GET['category']!=0)
                                    {
                                    	if($srtb==1)
                                    	{
                                    		 
                                    		 
                                    		$sqlpages = "select * from product where product_archived = '$sortby' AND category_id_fk='$cat' ";
                                    		$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    	}
                                    	
                                    	else {
                                    		$sqlpages = "select * from product where category_id_fk='$cat' ";
                                    		$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    		 
                                    	}
                                    
                                    }
                                    else {
                                    if($srtb==1)
                                    {
                                    	
                                    	
                                    $sqlpages = "select * from product where product_archived = '$sortby' ";
                                    $resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    } 
                                    
                                    else {
                                    	$sqlpages = "select * from product";
                                    	$resultpages = mysqli_query($conn, $sqlpages) or die("Error in Selecting " . mysqli_error($conn));
                                    	
                                    }
                                    }
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
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>5</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10&store=<?php echo $store;?>&category=<?php echo $cat;?>" >10</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20&store=<?php echo $store;?>&category=<?php echo $cat;?>" >20</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50&store=<?php echo $store;?>&category=<?php echo $cat;?>" >50</option>
                                            
                                            <?php } else if($per_page==10){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >5</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>10</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20&store=<?php echo $store;?>&category=<?php echo $cat;?>" >20</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50&store=<?php echo $store;?>&category=<?php echo $cat;?>" >50</option>
                                            
                                            <?php } else if($per_page==20){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >5</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10&store=<?php echo $store;?>&category=<?php echo $cat;?>" >10</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>20</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50&store=<?php echo $store;?>&category=<?php echo $cat;?>" >50</option>
                                            
                                            <?php } else if($per_page==50){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >5</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=10&store=<?php echo $store;?>&category=<?php echo $cat;?>" >10</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=20&store=<?php echo $store;?>&category=<?php echo $cat;?>" >20</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&srtby=<?php echo $sortby;?>&sb=<?php echo $sb;?>&pn=50&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>50</option>
                                            
                                            <?php }?>
                                        </select>
                                        </div>
                                        
                                        <div style="float:right; margin-left:50px;">
                                    Stores:  <?php 
                                            $query = "SELECT stores_id,stores_company_name FROM stores";
                                            if ( $result = mysqli_query($conn,$query) ) {
                                            echo '<select class="bootstrap-select type_sortby" name="number" onchange="{ window.location = this.value; }"   >';
                                            echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=0&category=$cat' selected> Default</option>";
                                            
                                            while ($row =  mysqli_fetch_array($result) ) {
                                            	if($store==$row[0])
                                            	{
                                            echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=$row[0]&category='$cat'' selected> $row[1] </option>";
                                            }
                                            else 
                                            {
                                            	echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=$row[0]&category='$cat''> $row[1] </option>";
                                            	
                                            }
                                            }
                                               echo "</select>";
                                            }


                                            ?>
                                            
                                        
                                        </div>
                                         <div style="float:right; margin-left:50px;">
                                    Categories:  <?php 
                                            $query = "SELECT category_id,category_name FROM category";
                                            if ( $result = mysqli_query($conn,$query) ) {
                                          
                                            echo '<select class="bootstrap-select type_sortby" name="number" onchange="{ window.location = this.value; }"   >';
                                            echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=$store&category=$row[0]' selected> Default</option>";
                                            
                                            while ($row =  mysqli_fetch_array($result) ) {
                                            	if($cat==$row[0])
                                            	{
                                            echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=$store&category=$row[0]' selected> $row[1] </option>";
                                            }
                                            else 
                                            {
                                            	echo "<option value='products.php?page=$ppage&tpages=$total_pages&srtby=$sortby&pn=$per_page&sb=$sb&store=$store&category=$row[0]'> $row[1] </option>";
                                            	
                                            }
                                            }
                                               echo "</select>";
                                            }


                                            ?>
                                            
                                        
                                        </div>
                                        
                                        <div style="float:right; margin-left:50px; text-align:center;">
                                      Sort by:  <select class="bootstrap-select type_sortby" name="sortb" onchange="{ window.location = this.value; }"   >
                                            <?php if($sb==0){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==1){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==2){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==3){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==4){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==5){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Deaccending</option>
                                            
                                            <?php } else if($sb==6){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=0&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=1&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=2&store=<?php echo $store;?>&category=<?php echo $cat;?>" >ID Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=3&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=4&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Name Deaccending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=5&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Price Accending</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=<?php echo $sortby;?>&pn=<?php echo $per_page;?>&sb=6&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Price Deaccending</option>
                                           
                                            <?php } ?>
                                        </select>
                                        </div>
                                        
                                        <div style="float:left; text-align:left;">
                                       SHOW:  <select class="bootstrap-select type_sortby" name="sort" onchange="{ window.location = this.value; }"   >
                                            <?php if($sortby==2){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Archived</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Unarchived</option>
                                            
                                            <?php } else if($sortby==0){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Archived</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Unarchived</option>
                                            
                                            <?php } else if($sortby==1){?>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=2&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Default</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=0&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" >Archived</option>
                                            <option value="products.php?page=<?php echo $ppage;?>&tpages=<?php echo $total_pages;?>&srtby=1&pn=<?php echo $per_page;?>&sb=<?php echo $sb;?>&store=<?php echo $store;?>&category=<?php echo $cat;?>" selected>Unarchived</option>
                                            
                                            <?php }?>
                                        </select>
                                        </div>
                                        
                                        <br>
                                        <br>
                                        
                                     </div>
                                     
                                    </div><!-- End .select_sortby -->
                                    <br>
                                        <br>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Edit</th>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Discription</th>
                                            <th>Category</th>
                                            <th>Store</th>
                                            <th>Color</th>
                                            <th>Brand</th>
                                            <th>Type</th>
                                            <?php if($type == TYPE_SUPERADMIN): ?>
                                                <th>Archive</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <?php


$offset = ($ppage-1) * $per_page; 
if($ct!=0)
{
if($st!=0)
{
if($srb!=0)
{
	if($sb==1)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset ";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	else if($sb==2)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	else if($sb==3)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' AND stores_id_fk='$store' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	else if($sb==4)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	else if($sb==5)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	else if($sb==6)
	{
if($srtb==1)
{
	$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
}
else {
$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
}
	}
	
}
else {
	if($srtb==1)
	{
		$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' AND category_id_fk='$cat' LIMIT  $per_page OFFSET $offset";
		$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
	}
	else {
		$sql = "select * from product where stores_id_fk='$store' AND category_id_fk='$cat' LIMIT  $per_page OFFSET $offset";
		$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	}
	
}
}
else 
{
	if($srb!=0)
	{
		if($sb==1)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
		else if($sb==2)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
		else if($sb==3)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
		else if($sb==4)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat'ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
		else if($sb==5)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
		else if($sb==6)
		{
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where category_id_fk='$cat' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
		}
	
	}
	else {
		if($srtb==1)
		{
			$sql = "select * from product where product_archived = $sortby AND category_id_fk='$cat' LIMIT  $per_page OFFSET $offset";
			$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
		}
		else {
			$sql = "select * from product where category_id_fk='$cat' LIMIT  $per_page OFFSET $offset";
			$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
		}
	
	}
}


}
else 
{
	if($st!=0)
	{
		if($srb!=0)
		{
			if($sb==1)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==2)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==3)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==4)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==5)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==6)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product where stores_id_fk='$store' ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
	
		}
		else {
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby AND stores_id_fk='$store' LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product where stores_id_fk='$store' LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
	
		}
	}
	else
	{
		if($srb!=0)
		{
			if($sb==1)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_id ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==2)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_id DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==3)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_name ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==4)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_name DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==5)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_price ASC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
			else if($sb==6)
			{
				if($srtb==1)
				{
					$sql = "select * from product where product_archived = $sortby ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
				}
				else {
					$sql = "select * from product ORDER BY product_price DESC LIMIT  $per_page OFFSET $offset";
					$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
				}
			}
	
		}
		else {
			if($srtb==1)
			{
				$sql = "select * from product where product_archived = $sortby LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	
			}
			else {
				$sql = "select * from product LIMIT  $per_page OFFSET $offset";
				$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
			}
	
		}
	}
	
}


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
$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages."&srtby=".$sortby."&pn=".$per_page."&sb=".$sb."&store=".'$store'."&category=".$cat;

for ($i = $start; $i < $end; $i++) {
	// make sure that PHP doesn't try to show results that don't exist
	if ($i == $total_results) {
		break;
	}
 

                                    ?>
                                    <tbody>
                                       
                                        <?php 
                                                       
                                            $row = mysqli_fetch_array($result); 
                                        	$sql1 = "select stores_company_name from stores where stores_id=".$row[6];
                                        	$result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
                                        	
                                        	$stor=  mysqli_fetch_array($result1);
                                        	
                                        	
                                        	$sql2 = "select category_name from category where category_id=".$row[5];
                                        	$result2 = mysqli_query($conn, $sql2) or die("Error in Selecting " . mysqli_error($conn));
                                        	
                                        	$category=  mysqli_fetch_array($result2);
                                        	
                                        	
                                            echo "<tr>
        		                           <td><form action='editpageproducts.php' method='post'>
                                           <input type='hidden' name='idp' value=".$row[0].">
                                           <input type='submit' name='edit' value='Edit'/>
                                           </form>
                                           </td>
        		
                                            <td>" . $row[0] . "</td>
                                            <td>" . $row[1] . "</td>
    		                                <td>" . $row[2]. "</td>
                                            <td>" . $row[3] . "</td>
                                            <td>" . $row[4] . "</td>
                		                    <td>".$category[0]."</td>
    		                                <td>".$stor[0]."</td>
   			                                <td>" . $row[9] . "</td>
                                            <td>" . $row[10] . "</td>
   				                            <td>".$row[11]."</td>";
                                            if($type == TYPE_SUPERADMIN):

                                                if($row[7]==1)
                                                {
                                                    	
                                                   echo"
                            		               
                        		                    <td> <form action='products.php' method='post'>
                                                   <input type='hidden' name='archive' id='archive' value=".$row[0].">
                                		           <input type='submit' name='arc' value='Archive'>
                                                   </form></td>";
                                                   
                                        		}
                                        		else 
                                        		{
                                        		 	 echo"
                            		               
                        		                    <td> <form action='products.php' method='post'>
                                                   <input type='hidden' name='unarchive' id='unarchive' value=".$row[0].">
                                		          <input type='submit' name='unarc' value='Unarchive'/>
                                                   </form></td>";
                                        		}
                                            endif;
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
                    <!-- /.col-lg-12 -->
                    </div>
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
