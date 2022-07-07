<script type="text/javascript">
function search(ele) {
    if(event.keyCode == 13) {
       var s= 'category.php?search='+ele.value; 
       window.location = s;     
    }
}
</script>
		<link rel="stylesheet" href="css/custom.css">
     <header id="header" class="header-center responsive-type1">
            <div class="header-body">
                <!-- Start header-top-links -->
                <div class="header-top-links">
					
                    <div class="wrapper-fluid">
						<div class="header-logo" style="position: absolute;
							width: 340px;
							left: 50%;
							margin-left: -170px;
							top: -56px;
							z-index: 101;">
							<a href="/"><img src="img/main_logo.png" alt="PESTO" style="width: 100%; height: auto;"> </a>
						</div> <!-- header-logo -->
                        <!-- Start header-table -->
                        <div class="header-table">
                            <!-- Start header-row -->
                            <div class="header-row">
                                <nav class="navbar navbar-static-top">
                                    <div class="navbar-collapse">
                                        <div class="navbar-left">
                                            <ul class="nav navbar-nav">
                                                <li> <a href="checkout.php" class="hidden-xs"> Checkout </a> </li> 
                                                <?php if(isset($_SESSION['login_user'])){?>   
												<li> <a href="logout.php"> Logout</a> </li>  
												<?php } else {?> 
												<li> <a href="login.php"> Login</a> </li>
												<?php }?>
                                            </ul>               
                                        </div>
                                        <div class="navbar-right">
                                           <ul class="nav navbar-nav">
												<li class="dropdown-search">
													<a class="dropdown-toggle hidden-xs hidden-sm" href="#">
														Search 
													</a>
													<ul class="dropdown-menu">
														<li>
															<form class="search-form" action="category.php" method="get">
																<input placeholder="Search entry Site here..." class="form-control" name="search" >
																
															</form>
														</li>
													</ul>
												</li> <!-- End dropdown-search -->
												<!-- Start mini-cart -->
												<li class="dropdown mini-cart">
													<a href="shopping-cart.php" class="dropdown-toggle">
														My cart
													</a>
												</li>
											</ul>  
										</div>
                                    </div> 
                                </nav>    
                            </div><!-- End header-row -->
                        </div><!-- End header-table -->
                    </div> <!-- wrapper-fluid -->
                </div> <!-- End header-top-links -->
                <!-- Start Header-main -->
                <div class="header-main">
                    <div class="wrapper-fluid">
                        <!-- Start header-table -->
                        <div class="header-table">
                            <div class="header-row logo">
                                <div class="header-column header-column-center">
                                    
                                </div> <!-- header-column -->
                            </div> <!-- header-row -->
                            <!-- Start header-row -->
                            <div class="header-row menu">
                                <!-- Start header-column -->
                                <div class="header-column">
                                    <button class="header-btn-search" data-toggle="collapse" type="button" 
                                        data-target=".dropdown-search .dropdown-menu"  data-object="dropdown-menu">
                                        <i class="demo-icon pesto-icon-search"></i>
                                    </button>
                                    <button class="header-btn-collapse-nav" data-toggle="collapse" type="button" 
                                        data-target="#main-nav"  data-object="main-nav">
                                        <i class="pesto-icon-menu"></i>
                                    </button>
                                    <!--  Start header-main-nav -->
                                    <div class="collapse header-main-nav"  id="main-nav">
                                        <nav class="nav bar navbar-default">
                                            <ul class="nav navbar-nav navbar-center nav-main" >
                                                <li class="dropdown classic"> 
                                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">HOME</a>
                                                   
                                                </li>
                                                <li class="dropdown dropdown-table">
                                                    <a href="category.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">CATEGORIES</a>
													<ul  class="dropdown-menu clearfix type1">   
                                                        <li>   
                                                            <div class="wrapper">
                                                                <!-- Start dropdown-table-content -->
                                                                <ul class="dropdown-table-content categories-menu">
																	<?php
																	$sql = "SELECT * FROM category WHERE category_parentID IS null AND category_archived=1";
																	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
																	while ($parent_category = mysqli_fetch_array($result)) {
																	?>
																		<li class="col-5-1">
																			<a href="/category.php?cat=<?=$parent_category['category_id']?>" role="button" class="dropdown-table-sub-title"> <?=strtoupper($parent_category['category_name'])?> </a>
																			<ul class="dropdown-table-sub-nav">
																				
																			
																			<?php
																			$sql = "SELECT * FROM category WHERE category_parentID = ".$parent_category['category_id']." AND category_archived=1";
																			$result_child_category = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
																			while ($child_category = mysqli_fetch_array($result_child_category)) {
																			?>
																				<li> <a href="/category.php?cat=<?=$child_category['category_id']?>"> <?=strtoupper($child_category['category_name'])?> </a> </li> 
																			<?php } ?>
																			</ul>
																		</li>
																	<?php } ?>
															
                                                                    
                                                                </ul> <!-- End dropdown-table-content-->
                                                            </div>
                                                        </li>   
                                                    </ul>
                                                </li>
                                                <li class="dropdown dropdown-table">
                                                    <a href="javascript:void(0)" role="button">STORES</a>
													<ul  class="dropdown-menu clearfix type1">   
                                                        <li>   
                                                            <div class="wrapper">
                                                                <!-- Start dropdown-table-content -->
                                                                <ul class="dropdown-table-content categories-menu">
																	<?php
																	$sql = "SELECT * FROM stores where stores_archived=1";
																	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
																	while ($store = mysqli_fetch_array($result)) {
																	?>
																		<li class="col-5-1">
																			<a href="stores.php?stores='<?php echo $store['stores_id'];?>'" role="button" class="dropdown-table-sub-title" style="margin-bottom: 15px"> <?=strtoupper($store['stores_company_name'])?> </a>
																		</li>
																	<?php } ?>
															
                                                                    
                                                                </ul> <!-- End dropdown-table-content-->
                                                            </div>
                                                        </li>   
                                                    </ul>
                                                </li>         
                                                <li class="dropdown classic"> 
                                                    <a href="contact-us.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">CONTACT US</a>
                                                    
                                                </li>
                                            </ul><!--End navbar-nav-->      
                                        </nav><!--End navbar-default--> 
                                    </div><!-- End header-main-nav--> 
                                    <!-- Start Header-mobile -->
                                    <div class="header-mobile hidden-lg hidden-md hidden-sm">
                                        <ul>
                                            <li class="dropdown classic"> 
												<a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">HOME</a>
											</li>
											<li class="dropdown dropdown-table">
												<a href="category.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">PRODUCTS</a>
											</li>
											<li>
												<a href="about-us.php" role="button">ABOUT US</a>
											</li>         
											<li class="dropdown classic"> 
												<a href="contact-us.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  role="button">CONTACT US</a>
											</li>
                                        </ul>
                                    </div><!-- End Header-mobile -->           
                                </div> <!-- End header-column -->
                            </div> <!-- End header-row -->
                        </div><!-- End header-table-->   
                    </div> <!-- End wrapper-fluid -->         
                </div><!-- End Header-main -->
            </div> <!-- End header-body --> 
        </header>

   