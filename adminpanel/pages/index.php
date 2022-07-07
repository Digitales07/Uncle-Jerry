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

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
 width: 250px;
  height: 150px;
  text-align: center;
</head>

<body>
                                 
                    
             <!-- End .content-header -->
<?php


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "select * from orderdetails";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$orderscount = 0;
while($row =mysqli_fetch_assoc($result))
{
   $orderscount++;
}

$sql = "select * from product";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$productscount = 0;
while($row =mysqli_fetch_assoc($result))
{
   $productscount++;
}

$sql = "select * from stores";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$storescount = 0;
while($row =mysqli_fetch_assoc($result))
{
   $storescount++;
}

$sql = "select * from category";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$categoriescount = 0;
while($row =mysqli_fetch_assoc($result))
{
   $categoriescount++;
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                           <ol class="breadcrumb" style="background-color:transparent; float:right; ">
                                        <li><a href="#">Home&nbsp;</a></li>    
                                             
                                    </ol>
                                
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-glass fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $productscount; ?></div>
                                    <div>Products!</div>
                                </div>
                            </div>
                        </div>
                        <a href="products.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $storescount; ?></div>
                                    <div>Stores!</div>
                                </div>
                            </div>
                        </div>
                        <a href="stores.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $orderscount; ?> </div>
                                    <div>Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="orders.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $categoriescount; ?></div>
                                    <div>Categories!</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- /.row -->
            <div class="row">
             <?php

    				
    			if(isset($_POST['submit']))
	                {

    				


    				if ($conn->connect_error) {
    				    die("Connection failed: " . $conn->connect_error);
    				}
                    $d=null;
                    $t=null;

	                $dis = $_POST['description'];
		            $title = $_POST['title'];
		            $contact = $_POST['contact'];
                    $about_id = $_POST['about_id'];
                    $conversion_rate = $_POST['conversion_rate'];
                    $conversion_id = $_POST['conversion_id'];

    				$query = "update about SET title='$title', discription='$dis', contact='$contact' where id='$about_id' ";
                    mysqli_query($conn, $query) or die("Error in Selecting " . mysqli_error($conn));
                	
                    $query = "update about SET discription='$conversion_rate' where id='$conversion_id' ";
                    mysqli_query($conn, $query) or die("Error in Selecting " . mysqli_error($conn));
                    
}
            ?>
            <?php

    				
    			

    				

    				if ($conn->connect_error) {
    				    die("Connection failed: " . $conn->connect_error);
    				} 


    				$sql1 = "select * from about";
                    $result1 = mysqli_query($conn, $sql1) or die("Error in Selecting " . mysqli_error($conn));
                    // $about=  mysqli_fetch_array($result1);
                    $about = array('conversion'=>array(), 'about'=>array());
                    while (($row = mysqli_fetch_array($result1))) {
                        if (strtolower($row['title']) == 'conversion rate')
                        {
                            $about['conversion']['id'] = $row['id'];
                            $about['conversion']['rate'] = $row['discription'];
                        }
                        else{
                            $about['about']['id'] = $row['id'];
                            $about['about']['title'] = $row['title'];
                            $about['about']['description'] = $row['discription'];
                            $about['about']['contact'] = $row['contact'];
                        } 
                    }

                    // echo '<pre>';
                    // var_dump($about);
                    // exit;
            ?>
                    
            <form action='index.php' method='post'>
                <input type="hidden" name="about_id" value="<?php echo $about['about']['id'];?>">
                <input type="hidden" name="conversion_id" value="<?php echo $about['conversion']['id'];?>">
            <br>
            <br>
              CONTACT US EMAIL: <input type="text" name="contact" value="<?php echo $about['about']['contact'];?>"  size="35"> 
            <br>
            <br>
                Conversion Rate: <input step="any" type="number" name="conversion_rate" value="<?php echo $about['conversion']['rate'];?>"> 
            <br>
            <br>
            
                <div class="col-lg-10">
                   <h3 style="text-align:center; margin-left:20px">About us Title</h3>
                </div>
                <br>
                
                  <br>
                  <br>
                  <textarea id="title" class="textarea" name="title"  cols="110" rows="10"><?php echo $about['about']['title'];?></textarea>
                  
                  
                  <br>
                  <br>
                  <br>
                  <div class="col-lg-10">
                   <h3 style="text-align:center; margin-left:20px">About us Description</h3>
                </div>
                  <br>
                  <br>
                 <textarea id="description" class="textarea" name="description"  cols="110" rows="20"><?php echo $about['about']['description'];?></textarea>
                
                
                
                <br>
                <br>
                <div class="col-lg-10" style="text-align:center">
                <input type='submit' name='submit' value='Submit' style="text-align:center;  font-size: 30px;"/>
                </div>
             </form>
           
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
                
                <!-- /.col-lg-4 -->
            
            <!-- /.row -->
        
        <!-- /#page-wrapper -->
</div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
