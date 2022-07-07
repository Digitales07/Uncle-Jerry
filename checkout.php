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

        <title>Shipping info</title>
        
		<!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">

        <!-- Vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />
        <link rel="stylesheet" href"css/custom.css">
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme.css" />
		
    </head>
    <body class="body-checkout page-type-1">
        <!-- Start Header -->
        <?php include 'header.php';?>

        <!-- Start Content -->
        <section class="content checkout">
			<div class="content-header breadcrumb-header">
                <div class="wrapper">
					<div class="row">
						<div class="col-md-12">
							<div class="pull-left">
								<h1>CHECKOUT</h1>
							</div>
							<ul class="breadcrumb pull-right">
								<li><a href="#">Home&nbsp;</a></li>    
								<li>&nbsp;Checkout</li>     
							</ul>
						</div>
			    	</div>
                </div>        
            </div> <!-- End .content-header -->		
            
            <!-- Start Content-Main -->		
            <div class="content-main">
                <div class="wrapper">
					<!-- Start billing-information -->    
					<div class="billing-information" >
						<h1>SHIPPING INFORMATION </h1>
						<div class="register_account_row row">
							<form action="confirmorder.php" method="POST" >
								<div class="col-md-6">
									<div class="your-address">
										<h2>YOUR ADDRESS</h2>
										<div class="billing-information-group">
											<div class="personal-information">
												<label>ENTER YOUR ADDRESS*</label>
												<input type="text" class="form-control" id="address" name="address" required="required"/>
											</div>
											
											<div class="personal-information">
												<label>ENTER YOUR CITY*</label>
												<input type="text" class="form-control" id="city" name="city" required="required"/>
											</div>
											<div class="personal-information">
												<label>ENTER YOUR POST CODE*</label>
												<input type="text" class="form-control" id="pcode" name="pcode" required="required"/>
											</div>
											<div class="personal-information">
												<label>ENTER YOUR COUNTRY*</label>
												<input type="text" class="form-control" id="country" name="country" required="required"/>
											</div>
											<div class="personal-information">
												<label>ENTER YOUR REGION/STATE*</label>
												<input type="text" class="form-control" id="state" name="state" required="required"/>
											</div>
											<div class="checkbox-group">
												<div class="checkbox-field">
													<div class="inputbox-type1" >
														<input type="checkbox" class="smart_input" />
														<div class="input-skin">
															<i class="visible-checked theme-icon pesto-icon-ok"></i>    
														</div>
													</div>
													<label>I have reed and agree to the Privacy Policy.</label>
												</div>
											</div>
											<div class="billing-information-action">
												<input type="submit" name="submit" value="Check out with Cash On Delivery" class="btn-default btn-continue" > OR
											</div>
										</div>
									</div><!-- End .personal-address -->
								</div><!-- End .col-md-6 --> 
							</form><!-- End Form -->
						</div><!-- End .row -->
						<div>
							<?php 
								$cid = 0;
								$conversion_rate =0;
								if(isset($_SESSION['login_user'])){
									$user = $_SESSION['login_user'];
								    $sqlu= "select customer_id_FK from user where user_username='$user' ";
								    $sqla= "select discription from about where title='Conversion Rate'";
								    $resultu = mysqli_query($conn, $sqlu) or die("Error in Selecting " . mysqli_error($conn));
								    $rowu = mysqli_fetch_array($resultu);
								    $resultu = mysqli_query($conn, $sqla) or die("Error in Selecting " . mysqli_error($conn));
								    $rowa = mysqli_fetch_array($resultu);
								    $cid = $rowu['customer_id_FK'];
								    $conversion_rate = $rowa['discription'];
								}
								$sql = "SELECT ROUND(SUM((product_amount * order_quantity) / ".$conversion_rate."), 2) as total from orders where customer_id_fk='$cid' AND orderdetails_id_fk='0'";
								$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                            	while (($row = mysqli_fetch_array($result))) {?>
                            		<form action="<?php if($row['total'] != 0.00)
                            		echo PAYPAL_URL; ?>" method="post">
								        <input type="hidden" name="business" value="<?php echo PAYPAL_BUSINESS_ID; ?>">    
								        <input type="hidden" name="cmd" value="_xclick">
								        <!-- Specify details about the item that buyers will purchase. -->
								        <input type="hidden" name="item_name" value="<?php echo ucfirst($user) ?> item(s)">
								        <input type="hidden" name="amount" value="<?php echo $row['total']?>">
								        <input type="hidden" name="currency_code" value="USD">
								        <!-- Specify URLs -->
								        <input type='hidden' name='custom' value='<?php echo $user ?>'>
								        <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL ?>'>
										<input type='hidden' name='return' value='<?php echo PAYPAL_SUCCESS_URL ?>'>
										<input name="notify_url" type="hidden" value="<?php echo PAYPAL_NOTIFY_URL ?>">
										<input type='hidden' name='rm' value='2'>

								        <!-- Display the payment button. -->
		    	            			<input id="paypal-checkout" type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" <?php if($row['total'] == 0.00): ?> disabled <?php endif;?>>
								    </form>

                            	<?php }
                            	?>
						</div>
					</div><!-- End .billing-information -->
				</div><!-- End .wrapper -->
            </div><!-- End .conten t-main -->
        </section><!-- End .content -->    
        
<?php include 'footer.php';?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/owlcarousel/owl.carousel.min.js"></script> 
		
        <script src="js/theme.js"></script>
    </body>
</html>
