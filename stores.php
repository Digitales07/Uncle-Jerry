<?php include 'session.php';?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
        <meta name="keywords" content="HTML5 Ecommerce Template" />
        <meta name="description" content="Pesto - Responsive HTML5 Ecommerce Template" />
        <meta name="author" content="author name" />

        <title>Stores</title>
        
		<!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />
        
        <!-- jquery ui -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

		<!-- Vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/animate.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />
        
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/theme-shop.css" /> 
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme-contactus.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        
    </head>
    <body>
        <!-- Start Header -->
       
             <?php 
        include 'header.php';
    $cat=null;
  
   	$catb = 0;
   
   	if( isset( $_GET['cat'] ) )
   	{
   		$catb=1;
   	$cat=$_GET['cat'];
   	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	
   	?>
         <?php 
         if(isset($_GET['stores']))
         {
         	$id=$_GET['stores'];
         	$sql="select * from stores where stores_id=$id";
         	
         }
         else 
         {
         	$sql="select * from stores";
         }
        
            
            
            $result=mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
           
            
            ?>
        <!-- Start Content -->
        <!-- <ol class="breadcrumb pull-right">
                            <li><a href="#">Home&nbsp;</a></li>    
                            <li>&nbsp;<?php echo $row['stores_company_name'];?></li>    
                        </ol> -->
        <div id="store-page">
            <section id="store-info" class="content aboutus">
                <div class="container">
                    <div class="col-md-4 col-sm-4">
                        <div class="page-title">
                            <h1 class="medium font-roboto text-capitalize"> 
                                <?php echo $row['stores_company_name'];?>
                            </h1>
                        </div>
                        <ul class="info-color-size">
                            <li class="store-title"><?php echo $row['stores_title'];?></li>
                            <li class="store-contact"><?php echo $row['stores_contact'];?></li>
                            <li class="store-email"><a><u><?php echo $row['stores_email'];?></a></u></li>
                            <br>
                            <li class="store-address"><?php echo $row['stores_location'];?></li>

                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="image pull-right">
                            <img class="round-image" src="img/stores/<?php echo $row['stores_id'];?>.jpg " onerror='this.src="img/stores/<?php echo $row['stores_id'];?>.png";'  alt="img/products/missing.jpg" onerror='this.src="img/products/missing.png";'/>
                        </div>
                    </div>
                </div>
            </section>
            <section id="ceo-info">
                <div class="short-about-us">
                    <div class="row">
                        <div id="ceo-information">
                            <h1 class="text-center">About Us</h2>
                            <div class="col-md-5 col-sm-6">
                                <div class="image text-center">
                                    <img class="round-image" src="img/stores/ceo/<?php echo $row['stores_id'];?>.jpg " onerror='this.src="img/stores/ceo/<?php echo $row['stores_id'];?>.png";'  alt="img/products/missing.jpg" onerror='this.src="img/products/missing.png";'  />              
                                </div>
                                <h4 class="text-center">CEO</h4>
                            </div><!-- End .col-md-5 -->
                            <div class="col-md-7 col-sm-6">
                                <p class="explanation type1">
                                    <?php echo $row['stores_discription'];?>    
                                </p>
                            </div><!-- End .col-md-7 -->
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .short-about-us -->
            </section>
            <section id='store-products' class="content">
                <div class="container-fluid">
                    <h1 class="text-center">
                        GET ALL THE LATEST CELL PHONES, TABLETS & LAPTOPS UNDER ONE ROOF!
                    </h1>
                    <div class="row grid">
                      
                     <div class="">       
                          <div class="wrapper-fluid clearfix">
                            <div class="products pt-md">
                                <div class="row grid">
                            <?php 
                            if($catb==0)
                            {
                            $sql = "select * from product where stores_id_FK=$id AND product_archived=1";
                            }
                            elseif($catb==1)
                            {
                            $sql = "select * from product where stores_id_FK=$id AND category_id_FK=$cat AND product_archived=1";
                            }
                            
                            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grid-item">
                                    <div class="product wow fadeInUp" dataa-wow-duration="500ms">
                                        <div class="image" role="button"  style="height: 400px;">
                                            <a href="" style="display: block; height: 100%;">
                                                <img src="img/products/<?php echo $row['product_id'];?>.jpg "
                                                    onerror='this.src="img/products/<?php echo $row['product_id'];?>.png";'
                                                    alt="img/products/missing.jpg" onerror='this.src="img/products/missing.png";'
                                                    style="width: 100%;height: 100%; object-fit: contain;"
                                                />
                                            </a>
                                            <div class="over-comment middle">
                                                <div>
                                                    <div class="links">
                                                        <form action="addtocart.php" method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row['product_id'];?>" >
                                                        <input type="hidden" name="p_price" value="<?php echo $row['product_price'];?>" >
                                                        <input type="submit" name="submit" value="ADD TO CART" class="btn btn-default btn-md"/> 
                                                        </form>
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
                                    </div><!-- End .product -->
                                </div><!-- End .col-md-3 -->
                             <?php }?>  
                                    
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            </div>

                            <div class="lg-margin hidden-xs hidden-sm"></div><!-- space -->

                        </div><!-- End .col-md-12-->
                        <div class="row" style="padding-bottom:20px;">
                            <div class="col-md-12 text-center">
                                <a style=""class="btn btn-default btn-md" style="background:#ffffff;" href="/category.php?str=<?php echo $id ?>">View All Products</a>
                            </div>
                        </div>    
                    </div><!-- End .row -->
                </div>
            </section>
        </div>
        <!-- Start Content-Footer -->
                                
        <!-- Start Footer-->
 <?php include 'footer.php';?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="js/theme.js"></script>
    </body>
</html>
