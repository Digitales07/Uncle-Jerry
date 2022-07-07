<?php include('session.php');?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
        <meta name="keywords" content="HTML5 Ecommerce Template" />
        <meta name="description" content="Pesto - Responsive HTML5 Ecommerce Template" />
        <meta name="author" content="author name" />

        <title>Products</title>

        <!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />

        <!-- jquery ui -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <!-- vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />              
        <link rel="stylesheet" href="css/theme-shop.css" />              
        <link rel="stylesheet" href="css/theme.css" />
       
   
        <?php 
        	
       
      
                 $sqls = "select MAX(product_price) from product";
                 $results = mysqli_query($conn, $sqls) or die("Error in Selecting " . mysqli_error($conn));
		           $maxprice = mysqli_fetch_array($results);
		           $sqlsm = "select MIN(product_price) from product";
		           $resultsm = mysqli_query($conn, $sqlsm) or die("Error in Selecting " . mysqli_error($conn));
		           $minprice = mysqli_fetch_array($resultsm);
		           $max=$maxprice[0];
		           $min=$minprice[0];
                	?>
		            	  
   <?php 
        $pr=0;
        if(isset($_GET['start']) && isset($_GET['end'])){
        	$pr=1;
        	$min = $_GET['start'];
        	$max = $_GET['end'];
        	
        }
        ?>
         
    </head>
    <body class="page-type-1 category_page">
        <!-- Start Header -->
       
            
             <?php 
        include 'header.php';
    $cat=null;
    $str=null;
    $sortby=null;
    $search=null;
   	$catb = 0;
   	$strb=0;
   	$srtb=0;
   	if(isset($_GET['search'])&&$_GET['search']!=null)
   	{
   		$search=$_GET['search'];
   	}
   	if( isset( $_GET['cat'] ) && $_GET['cat']!=null )
   	{
   		$catb=1;
   	$cat=$_GET['cat'];
   	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['str'] )&& $_GET['str']!=null )
   	{
   		$strb=1;
   		$str=$_GET['str'];
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['srtby'] )&& $_GET['srtby']!=null )
   	{
   		$srtb=1;
   		$sortby=$_GET['srtby'];
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	?>

        <!-- Start Content -->
        <section class="content" role="main">
            <!-- Start Content-Header -->
            <div class="content-header  breadcrumb-header">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>Products</h2>
                            </div>
                            <ul class="breadcrumb pull-right">
                                <li><a href="#">Home&nbsp;</a></li>    
                                <li>&nbsp;Category page&nbsp;</li>    
                                <li>&nbsp;Products</li>    
                            </ul>

                        </div>

                    </div>
                </div>        
            </div> <!-- End .content-header -->  

            <!-- Start Content-Main -->
            <div class="content-main">
                <div class="wrapper">
                    <div class="row">
                  <div class="category-top row pb-md">
                                <div class="pull-left">
                                    <div class="select_sortby inline-block">
                                    
                                        <select class="bootstrap-select type_sortby" name="sort" onchange="{ window.location = this.value; }"   >
                                            <?php if($sortby==00){?>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=0&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" selected>Default</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=1&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>">High to Low</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=2&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>">Low to High</option>
                                           <?php }elseif($sortby==1){?>
                                           <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=0&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" >Default</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=1&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" selected>High to Low</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=2&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>">Low to High</option>
                                            <?php }elseif($sortby==2){?>
                                             <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=0&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" >Default</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=1&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" >High to Low</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=2&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" selected>Low to High</option>
                                            <?php }else{?>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=0&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" selected>Default</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=1&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>">High to Low</option>
                                            <option value="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=2&search=<?php echo$search;?>&end=<?php echo$min;?>&start=<?php echo$max;?>">Low to High</option>
                                           <?php }?>
                                        </select>
                                     
                                    </div><!-- End .select_sortby -->
                  </div>
                  </div>
                        <div class="col-md-9">
                            
                          <div id="div1">
                            <div class="products pt-md">
                                <div class="row grid">
                            <?php 
                            
                           if($pr!=0){
                           	if($sortby!=0)
                           	{
                           		if($sortby==1)
                           		{
                           			$ad='DESC';
                           		}
                           		else if($sortby==2)
                           		{
                           			$ad='ASC';
                           		}
                           		if(isset($_GET['search'])&&$_GET['search']!=null)
                           		{
                           			 
                           			$sql = "select * from product where product_archived=1 AND product_price BETWEEN $min AND $max AND product_name like '%$search%' OR category_id_FK=(select category_id from category where category_id=product.category_id_FK AND category_name like '%$search% ') ORDER BY  product_price ".$ad;
                           		}
                           		else
                           		{
                           			if($catb==0&&$strb==0)
                           			{
                           				$sql = "select * from product where product_archived=1 AND product_price BETWEEN $min AND $max  ORDER BY  product_price ".$ad;
                           			}
                           			elseif($catb==1&&$strb==0)
                           			{
                           				$sql = "select * from product where category_id_FK=$cat AND product_archived=1 AND product_price BETWEEN $min AND $max  ORDER BY  product_price ".$ad;
                           			}
                           			elseif($catb==1&&$strb==1)
                           			{
                           				$sql = "select * from product where category_id_FK=$cat AND stores_id_FK=$str AND product_archived=1 AND product_price BETWEEN $min AND $max  ORDER BY  product_price ".$ad;
                           			}
                           			elseif($catb==0&&$strb==1)
                           			{
                           				$sql = "select * from product where stores_id_FK=$str AND product_archived=1 AND product_price BETWEEN $min AND $max  ORDER BY  product_price ".$ad;
                           			}
                           		}
                           	}
                           	else
                           	{
                           		if(isset($_GET['search'])&&$_GET['search']!=null)
                           		{
                           	
                           			$sql = "select * from product where product_archived=1 AND product_price BETWEEN $min AND $max  AND  product_name like '%$search%'OR category_id_FK=(select category_id from category where category_id=product.category_id_FK AND category_name like '%$search%')";
                           		}
                           		else
                           		{
                           			if($catb==0&&$strb==0)
                           			{
                           				$sql = "select * from product where product_archived=1 AND product_price BETWEEN $min AND $max ";
                           			}
                           			elseif($catb==1&&$strb==0)
                           			{
                           				$sql = "select * from product where category_id_FK=$cat AND product_archived=1 AND product_price BETWEEN $min AND $max ";
                           			}
                           			elseif($catb==1&&$strb==1)
                           			{
                           				$sql = "select * from product where category_id_FK=$cat AND product_price BETWEEN $min AND $max  AND stores_id_FK=$str  AND product_archived=1";
                           			}
                           			elseif($catb==0&&$strb==1)
                           			{
                           				$sql = "select * from product where stores_id_FK=$str AND product_archived=1 AND product_price BETWEEN $min AND $max ";
                           			}
                           		}
                           	}
                           }
                           else {
                            if($sortby!=0)
                            {
                            if($sortby==1)
                            {
                            	$ad='DESC';
                            }
                            else if($sortby==2)
                            {
                            	$ad='ASC';
                            }
                            if(isset($_GET['search'])&&$_GET['search']!=null)
                            {
                            	
                            	$sql = "select * from product where product_archived=1 AND product_name like '%$search%' OR category_id_FK=(select category_id from category where category_id=product.category_id_FK AND category_name like '%$search% ') ORDER BY  product_price ".$ad;
                            }
                            else 
                            {
                            if($catb==0&&$strb==0)
                            {
                            $sql = "select * from product where product_archived=1 ORDER BY  product_price ".$ad;
                            }
                            elseif($catb==1&&$strb==0)
                            {
                            $sql = "select * from product where category_id_FK=$cat AND product_archived=1 ORDER BY  product_price ".$ad;
                            }
                            elseif($catb==1&&$strb==1)
                            {
                            	$sql = "select * from product where category_id_FK=$cat AND stores_id_FK=$str AND product_archived=1 ORDER BY  product_price ".$ad;
                            }
                            elseif($catb==0&&$strb==1)
                            {
                            	$sql = "select * from product where stores_id_FK=$str AND product_archived=1 ORDER BY  product_price ".$ad;
                            }
                            }
                            }
                            else 
                            {
                            	if(isset($_GET['search'])&&$_GET['search']!=null)
                            	{
                            		
                            		$sql = "select * from product where product_archived=1 AND product_name like '%$search%'OR category_id_FK=(select category_id from category where category_id=product.category_id_FK AND category_name like '%$search%')";
                            	}
                            	else 
                            	{
                            	if($catb==0&&$strb==0)
                            	{
                            		$sql = "select * from product where product_archived=1";
                            	}
                            	elseif($catb==1&&$strb==0)
                            	{
                            		$sql = "select * from product where category_id_FK=$cat AND product_archived=1";
                            	}
                            	elseif($catb==1&&$strb==1)
                            	{
                            		$sql = "select * from product where category_id_FK=$cat AND stores_id_FK=$str  AND product_archived=1";
                            	}
                            	elseif($catb==0&&$strb==1)
                            	{
                            		$sql = "select * from product where stores_id_FK=$str AND product_archived=1";
                            	}
                            	}
                            }
                           }
                            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                            while ($rowp = mysqli_fetch_array($result)) {
                            ?>
                             
                                    <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12 grid-item">
                                        <div class="image wow fadeInUp" data-wow-duration="500ms" role="button" Style="height:250px; width:100%; ">
                                            <a href="">
                                                <img style=" width: 100%; height: 100%; object-fit: contain;" src="img/products/<?php echo $rowp['product_id'];?>.jpg " onerror='this.src="img/products/<?php echo $rowp['product_id'];?>.png";' alt="img/products/missing.jpg" alt="img/products/missing.jpg" class="full-width"   />
                                            </a>
                                            <div class="over-comment middle">
                                                <div>
                                                    <span class="brand font-istok"><?php echo"$rowp[11]";?></span>
                                                    <div class="links">
                                                        <form action="addtocart.php" method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $rowp[0]?>" >
                                                        <input type="submit" name="submit" value="ADD TO CART" class="btn btn-default btn-md"/> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End .image -->

                                        <div class="image-comment">
                                            <h4><?php echo"$rowp[2]";?></h4>
                                            <div class="price"><ins><?php echo"$rowp[3]";?></ins> </div>
                                        </div><!-- End .image-comment -->
                                    </div><!-- End .product -->
                              
                                 
                                    
                             <?php }?>  
                                    
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            </div>

                            <div class="lg-margin hidden-xs hidden-sm"></div><!-- space -->

                        </div><!-- End .col-md-9 -->
                        
    					<aside class="col-md-3 sidebar">
                            
							<?php 
							
							
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							
							
							$sql = "select category_name,category_id from category where category_type='Primary' AND category_archived=1";
							
							$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
							
							?>
							<div class="panel-group widget-category">
                                <div class="panel-group-heading">
                                    <div class="title">
                                        CATEGORY
                                        <a class="toggle" data-toggle="collapse" href="#categorywidget"  data-object="categorywidget">
                                            <i class="visible-collapsed pesto-icon-up-open-mini"></i>
                                            <i class="visible-opened pesto-icon-down-open-mini"></i>
                                        </a>
                                    </div><!-- End .title -->
                                </div><!-- End .panel-group-heading -->
                                <div id="categorywidget" class="panel-group-body panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <?php 
                                    $i = 0;
									while ($row = mysqli_fetch_array($result)) {
										$i++;
										?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tablist" id="headingOne">
                                            <h5 class="panel-title">
                                          <?php if($row[1]==$cat){?>
                                                <a href="category.php?cat=<?php echo $row[1];?>&str=<?php echo $str;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" ><b><?= $row[0]?></b></a>
                                                <?php } else{?>
                                                <a href="category.php?cat=<?php echo $row[1];?>&str=<?php echo $str;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" ><?= $row[0]?></a>
                                                <?php }?>
                                                <a class="toggle" role="button" data-toggle="collapse" href="#collapse<?=$i?>"  data-object="collapse<?=$i?>">  
                                                    <i class="visible-collapsed caret-icon demo-icon pesto-icon-plus"></i>
                                                    <i class="visible-opened fa caret-icon demo-icon pesto-icon-minus"></i>  
                                                </a>
                                            </h5>
                                        </div><!-- End .panel-heading -->
                                        <div id="collapse<?=$i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                           <div class="panel-body">
                                                <ul>
                                            <?php 
                                            $sqlc = "select category_name,category_id from category where category_type='Secondary' AND category_parentID='$row[1]' AND category_archived=1";
                               $resultc = mysqli_query($conn, $sqlc) or die("Error in Selecting " . mysqli_error($conn));
            		 while ($rowc = mysqli_fetch_array($resultc)) {
            		 	
            		 	 if($cat==$rowc[1]){?>
            		 	 
            		 	 
            		 	              <li> <a href="category.php?cat=<?php echo $rowc[1];?>&str=<?php echo $str;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" ><b><?= $rowc[0]?></b></a></li>
            		 	              <?php } else{?>
            		 	              <li><a href="category.php?cat=<?php echo $rowc[1];?>&str=<?php echo $str;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" ><?= $rowc[0]?></a>
            		 	              <?php }?>           
                                                    
                                                                 
                                 
							


								<?php } ?>
							
							</ul>
							</div>
							</div><!-- End #collapse$i -->
							</div> <!-- End .panel -->
							<?php 
									}
							?>
							  
                                </div><!-- End #categorywidget -->
                            </div><!-- End .panel-group --> 
                            <div class="panel-group widget-brand">
                                <div class="panel-group-heading">
                                    <div class="title">
                                       Stores
                                        <a class="toggle" data-toggle="collapse" href="#brandwidget"  data-object="brandwidget">
                                            <i class="visible-collapsed pesto-icon-up-open-mini"></i>
                                            <i class="visible-opened pesto-icon-down-open-mini"></i>
                                        </a>
                                    </div><!-- End .title -->
                                </div><!-- End .panel-group-heading -->
                                
            		            
                                <div id="brandwidget" class="panel-group-body panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <ul class="checkbox-list">
                                    <?php 
                               $sqls = "select stores_company_name,stores_id from stores where stores_archived=1";
                               $results = mysqli_query($conn, $sqls) or die("Error in Selecting " . mysqli_error($conn));
            		            while ($rows = mysqli_fetch_array($results)) {
            		            	?>
                                        <li>
                                            <div class="input-container" >
                                            <?php if($rows[1]==$str){?>
                                                <input type="checkbox" name="stores" value="category.php?str=<?php echo $rows[1];?>&cat=<?php echo $cat;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" checked class="smart_input" onClick="if (this.checked) { window.location = this.value; }" checked="checked" />
                                                <?php } else{?>
                                                <input type="checkbox" name="stores" value="category.php?str=<?php echo $rows[1];?>&cat=<?php echo $cat;?>&srtby=<?php echo $sortby;?>&end=<?php echo$min;?>&start=<?php echo$max;?>" class="smart_input" onClick="if (this.checked) { window.location = this.value; }" />
                                                <?php } ?>
                                                <div class="input-skin">
                                                    <i class="visible-unchecked theme-icon pesto-icon-circle-empty"></i>
                                                    <i class="visible-checked theme-icon pesto-icon-ok"></i> 
                                                </div>
                                            </div>
                                            <div class="inline-block input-text">
                                                <?php echo $rows[0]?>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul><!-- End .checkbox-list -->
                                </div><!-- End #brandwidget -->
                            </div><!-- End .panel-group -->
                            
                            
                           
                            <div class="panel-group widget-price">
                                <div class="panel-group-heading">
                                    <div class="title">
                                        PRICE
                                        
                                        <a class="toggle" data-toggle="collapse" href="#pricewidget"  data-object="pricewidget">
                                            <i class="visible-collapsed pesto-icon-up-open-mini"></i>
                                            <i class="visible-opened pesto-icon-down-open-mini"></i>
                                        </a>
                                    </div><!-- End .title -->
                                </div><!-- End .panel-group-heading -->
                                <div id="pricewidget" class="panel-group-body panel-collapse collapse in">
                                
                                         <form action="category.php" method="get" id="products">
                                         
                                       
                                   <div class="mt-one-23">
                                        from&nbsp;
                                        <?php 
                                        if(isset($_GET['start']) || isset($_GET['end'])){
                                        	?>
                                        	<input type="text" id="start" name="start" value="<?php echo $min;?>" class="price-amount amount-start" >
                                        <span>&nbsp;to&nbsp;</span>
                                        <input type="text" id="end" name="end"  value="<?php echo $max;?>" class="price-amount amount-end"  >
                                        
                                        	<?php 
                                        }
                                        else {
                                        ?>
                                        <input type="text" id="start" name="start" value="<?php echo $minprice[0];?>" class="price-amount amount-start" >
                                        <span>&nbsp;to&nbsp;</span>
                                        <input type="text" id="end" name="end"  value="<?php echo $maxprice[0];?>" class="price-amount amount-end"  >
                                        <?php }?>
                                        <input type="hidden"  name="cat" value="<?php echo $cat;?>" />
                                     <input type="hidden"  name="str" value="<?php echo $str;?>" />
                                    </div>
                                    <div class="mt-lg">
                                        <input type="submit" class="btn btn-ok btn-borders btn-transparent mr-sm" value="OK">
                                        <a href="category.php?cat=<?php echo $cat;?>&str=<?php echo $str;?>&srtby=<?php echo $sortby;?>" class="btn btn-clear btn-borders btn-transparent mr-xs">CLEAR</button></a>
                                    </div>
                                    </form>
                                </div><!-- End #pricewidget -->
                            </div><!-- End .panel-group -->
        
   
                          
                        </aside><!-- End .col-md-3 -->
                    
                    </div><!-- End .row -->
                </div><!-- End .wrapper -->
            </div><!-- Start .content-main -->
        </section><!-- End .content -->

<?php include 'footer.php';?>

        <!-- Vendor -->
        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/jquery-ui/jquery-plus-ui.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/bootstrap-select/bootstrap_select.js"></script> 
        <script src="vendor/isotope/isotope.pkgd.min.js"></script>
        <script src="vendor/imagesloaded/imagesloaded.pkgd.js"></script> 
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script> 

        <!-- Theme Script -->
        <script src="js/theme.js"></script>
    </body>
</html>
