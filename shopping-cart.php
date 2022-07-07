<?php include ('session.php');?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
        <meta name="keywords" content="HTML5 Ecommerce Template" />
        <meta name="description" content="Pesto - Responsive HTML5 Ecommerce Template" />
        <meta name="author" content="author name" />

        <title>My Cart</title>

        <!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed" />

        <!-- Vendor -->
        <link rel="stylesheet" href="vendor/easy-responsive-tabs/css/easy-responsive-tabs.css" />
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/animate.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme-shop.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


    </head>
    <body>
        <!-- Start Header -->
        
        
         <?php include('header.php');?>
         <?php 
         if( isset( $_GET['del_id'] ) )
         {
         $id = $_GET['del_id'];
		if(isset($_SESSION['temp_id']))
		{
			$qry = "DELETE FROM ordertemp WHERE order_id ='$id'";
			$result=mysqli_query($conn, $qry);
		}
		else 
		{
			$qry = "DELETE FROM orders WHERE order_id ='$id'";
			$result=mysqli_query($conn,$qry);
		}
		if(isset($result)) {
			
         	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
         
         }
         }
         ?>

        <div class="content shopping-cart">
            <!-- Start Content-Header -->
            <div class="content-header  breadcrumb-header">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>SHOPPING CART</h2>
                            </div>
                            <ul class="breadcrumb pull-right">
                                <li><a href="#">Home&nbsp;</a></li>    
                                <li>Shopping cart&nbsp;</li>    
                            </ul>
                        </div>
                    </div>
                </div>        
            </div> <!-- End .content-header -->  
            
            <!-- Start Content-Main -->
           
            <div class="content-main">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                        <div id='div1'>
                            <!-- Start Cart-table -->
                            <table class="cart-table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-name">
                                            PRODUCT <span class="hidden-xs">NAME</span>
                                        </th>
                                        <th class="product-code">
                                            PRODUCT CODE
                                        </th>
                                        <th class="unit-price">
                                            UNIT PRICE
                                        </th>
                                        <th class="quantity">
                                            QUANTITY
                                        </th>
                                        <th class="subtotal">
                                            SUBTOTAL
                                        </th>
                                        <th class="delete">
                                            <a href="#" role="button"><i class="demo-icon pesto-icon-cross-mark"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if(isset($_SESSION['login_user']))
                                {
                                $user = $_SESSION['login_user'];
                                
                                
                                $sqlu= "select customer_id_FK from user where user_username='$user' ";
                                $resultu = mysqli_query($conn, $sqlu) or die("Error in Selecting " . mysqli_error($conn));
                                $rowu = mysqli_fetch_array($resultu);
                               
                                $cid = $rowu['customer_id_FK'];
                                 }
                                if(isset($_SESSION['login_user']) && (!isset($_SESSION['temp_id'])))
                                {
                                $sql= "select * from orders where customer_id_fk = '$cid' AND orderdetails_id_fk='0'";
                                }
                                else 
                                {
                                	$id=$_SESSION['temp_id'];
                                	$sql= "select * from ordertemp where customer_id_fk = '$id' ";
                                }
                                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                                
                                while ($row = mysqli_fetch_array($result)) {
                                	$od = $row['order_id'];
                                	$p=$row["product_id_FK"];
                               
                                	$sqlp= "select * from product where product_id = '$p' ";
                                	$resultp = mysqli_query($conn, $sqlp) or die("Error in Selecting " . mysqli_error($conn));
                                	while ($rowp = mysqli_fetch_array($resultp))
                                	{
                                ?>
                                    <tr>
                                        <td class="product-name">
                                            <div class="image">
                                                <a href="product.html" role="button">
                                                    <img src="img/products/<?php echo $rowp['product_id'];?>.jpg " onerror='this.src="img/products/<?php echo $rowp['product_id'];?>.png";' " alt="img/products/missing.jpg" onerror='this.src="img/products/missing.png";'  />
                                                </a>
                                            </div>
                                            <div class="image-comment  ">
                                                <a href="#"><h2 class="small font-istok"><?php echo $rowp['product_name'];?> </h2></a>   
                                                <span class="color">
                                                    Color: <?php echo $rowp['product_color'];?>
                                                </span>
                                                <span class="size">
                                                    Brand: <?php echo $rowp['product_brand'];?>   
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-code">
                                           <?php echo $rowp['product_code'];?>
                                        </td>  
                                        <td class="unit-price">
                                            <ins><?php echo $rowp['product_price'];?></ins>
                                        </td>
                                        <td class="quantity">
                                            <?php echo $row['order_quantity'];?>
                                        </td>
                                        <td class="subtotal">
                                            <ins><?php echo $rowp['product_price']*$row['order_quantity'];?></ins>
                                        </td>
                                        <td class="delete">
                                            <a href="shopping-cart.php?del_id=<?php echo $od;?>" role="button" id="<?php echo $od;?>"class="del"><i class="demo-icon pesto-icon-cross-mark"></i></a>
                                        </td>
                                    </tr>
                                    <?php }}?>
                                </tbody>    
                            </table><!-- End Cart-table -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="btn-continue">
                                <a href="index.php" role="button"><button class="btn btn-default font-roboto">CONTINUE SHOPPING</button></a>
                            </div>
                            <div class="btn-checkout">
                            <?php 
                            if((isset($_SESSION['login_user'])) && (!isset($_SESSION['temp_id'])))
                            {
                            ?>
                                <a href="checkout.php" class=" btn btn-default font-roboto">CHECKOUT</a>
                            <?php 
                            }
                            else 
                            {
                               echo '<a href="login.php" class=" btn btn-default font-roboto">CHECKOUT</a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Start Content-Footer -->
            <div class="content-footer">
                <div class="wrapper">
                    <div class="row text-center">
                        <h2>POPULAR PRODUCTS</h2>
                        
                        <?php 
                           $i=0;
                           
                            $sql = "select * from product where product_type='Best Sellers'";
                          
                         
                            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                            while (($row = mysqli_fetch_array($result))&&($i<8)) { 
                            	$i++;
                            
                            ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 grid-item">
                                    <div class="product wow fadeInUp" data-wow-duration="500ms">
                                        <div class="image" role="button" Style="height:300px; width:150px">
                                            <a href=""><img src="img/products/<?php echo $row['product_id'];?>.jpg " onerror='this.src="img/products/<?php echo $row['product_id'];?>.png";' " alt="img/products/missing.jpg" onerror='this.src="img/products/missing.png";'  /></a>
                                            <div class="over-comment middle">
                                                <div>
                                                    <div class="links">
                                                        <a href="#" class="icon-button small hidden-md"><i class="theme-icon pesto-icon-loving"></i></a>
                                                        <form action="addtocart.php" method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row['product_id'];?>" >
                                                        <input type="submit" name="submit" value="ADD TO CART" class="btn btn-default btn-md"/> 
                                                        </form>
                                                        <a href="#" class="icon-button small hidden-md"><i class="pesto-icon-connector"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-comment">
                                            <h4 class="small name font-istok">
                                                <?php echo $row['product_name'];?>
                                            </h4>
                                            <div class="brand"><?php echo $row['product_brand'];?></div>
                                            <div class="price"><ins><?php echo"RS ".$row['product_price'];?></ins></div>
                                            <div class="hidden sales-volume">0</div>
                                            <div class="hidden special">none</div>
                                            <div class="hidden date">2015/1/1</div>
                                        </div>
                                        <div class="rating">
                                            <span><i class="demo-icon pesto-icon-star-shape"></i> 5/5</span>
                                        </div>

                                    </div><!-- End .product -->
                                </div><!-- End .col-md-3 -->
                                
                                <?php }?>
                                
                                
                                
                            </div><!-- End .grid -->
                        </div><!-- End .wrapper-fluid -->
                    </div><!-- End Products -->
                    </div>
                </div>    
            </div>
        </div>
        <!-- Start Footer-->
<?php include 'footer.php';?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/easy-responsive-tabs/js/easyResponsiveTabs.js"></script>
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script> 
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/bootstrap-select/bootstrap_select.js"></script>  
        <script src="js/theme.js"></script>
    </body>
</html>
