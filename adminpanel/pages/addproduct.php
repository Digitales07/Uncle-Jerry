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

    <title>Add Product</title>

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
	
	    $n = $_POST['name'];
	    $b= $_POST['brand'];
		$d = $_POST['dis'];
		$cl= $_POST['color'];
		$p= $_POST['price'];
		$c= $_POST['code'];
		$t = $_POST['type'];
		$cat =$_POST['category'];
		$st = $_POST['store'];

		
		
	
		
		
		$queryc = "INSERT INTO product( product_code, product_name, product_price, product_discription, category_id_FK, stores_id_FK,product_brand,product_color,product_type) VALUES ('$c','$n','$p','$d','$cat','$st','$b','$cl','$t')";
	if(mysqli_query($conn,$queryc))
		{
			$pid = mysqli_insert_id($conn);
		$target_dir = "C:/xampp/htdocs/uncle-jerry/img/products/";
		$temp = explode(".", $_FILES["image"]["name"]);
		$newfilename = $pid . '.' . end($temp);
		$target_file = $target_dir . $newfilename;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		
		
		if ($_FILES["image"]["size"] > 10000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
			
			?>
			<script type="text/javascript">
			window.location.href = '../pages/products.php';
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
                      <li>&nbsp;Products&nbsp;</li>
                      <li>&nbsp;Add Products&nbsp;</li>                      
                    </ol>
                        <h1 class="page-header">ADD PRODUCT</h1>   
              







                        <div class="col-lg-4">
                        <form enctype="multipart/form-data"  action="addproduct.php" method="post">
Code:  <input type="text" name="code" style="float:right;" required="required">

<br>
<br>
Name:  <input type="text" name="name" style="float:right;" required="required">

<br>
<br>
Price:  <input type="text" name="price" style="float:right;" required="required">
<br>
<br>
Category:
<?php 
$query = "SELECT category_id,category_name FROM category";
if ( $result = mysqli_query($conn,$query) ) {
    echo "<select name='category' id='category' style='float:right;' required='required'>";
     while ($row =  mysqli_fetch_array($result) ) {
       echo "<option value='".$row[0]."'> ".$row[1]." </option>";
     }
     echo "</select>";
}


?>

<br>
<br>
Store:  
<?php 
$query = "SELECT stores_id,stores_company_name FROM stores";
if ( $result = mysqli_query($conn,$query) ) {
    echo "<select name='store' id='store' style='float:right;' required='required'>";
     while ($row =  mysqli_fetch_array($result) ) {
       echo "<option value='".$row[0]."'> ".$row[1]." </option>";
     }
     echo "</select>";
}


?>
<br>
<br>

Brand:  <input type="text" name="brand" style="float:right;" required="required">
<br>
<br>
Color:  <input type="text" name="color" style="float:right;" required="required">
<br>
<br>
Type: <select name='type' id='type' style='float:right;' required="required">
     <?php 
     if ($type=='Regular')
     {
     	echo '<option value="Regular" selected>Regular</option>
		    <option value="Best Seller">Best Seller</option>
    		<option value="Featured">Featured</option>
    		<option value="Hot product">Hot product</option>
    		<option value="Latest">Latest</option>';
     }
     elseif ($type=='Latest')
     {
     	echo '<option value="Latest" selected>Latest</option>
    		   <option value="Regular" selected>Regular</option>
		     <option value="Best Seller">Best Seller</option>
    		<option value="Featured">Featured</option>
    		<option value="Hot product">Hot product</option>
    		';
     }
     elseif ($type=='Hot Product')
     {
     	echo '<option value="Hot product" selected>Hot product</option>
    		<option value="Regular" selected>Regular</option>
		     <option value="Best Seller">Best Seller</option>
    		<option value="Featured">Featured</option>
    		
    		<option value="Latest">Latest</option>';
     }
     elseif ($type=='Featured')
     {
     	echo '<option value="Featured" selected>Featured</option>
        	<option value="Regular" selected>Regular</option>
		     <option value="Best Seller">Best Seller</option>
    		
    		<option value="Hot product">Hot product</option>
    		<option value="Latest">Latest</option>';
     }
     elseif ($type=='Best Seller')
     {
     	echo '<option value="Best Seller" selected>Best Seller</option>';
     }
     else
     {echo '<option value="Regular">Regular</option>
    		<option value="Best Seller">Best Seller</option>
    		<option value="Featured">Featured</option>
    		<option value="Hot product">Hot product</option>
    		<option value="Latest">Latest</option>';}
     	?>
      
      
     </select>
<br>
<br>
Discription:  <input type="text" name="dis"  style="float:right;" required="required">
<br>
<br>
<br>
<br>

<input type="file" name="image"  />


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
