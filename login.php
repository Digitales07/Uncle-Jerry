<?php

        include('session.php');
        if(isset($_SESSION['temp_id']))
        {
        $x=$_SESSION['temp_id'];
      
       
        }
        if(isset($_SESSION['login_user']))
        {
        	header("location: index.php");
        }
       
        
        ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
        <meta name="keywords" content="HTML5 Ecommerce Template" />
        <meta name="description" content="Pesto - Responsive HTML5 Ecommerce Template" />
        <meta name="author" content="author name" />

        <title>Login/Register</title>
        
		<!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">

        <!-- Vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />
		
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme.css" />
		
    </head>
    <body class="body-login page-type1">
        <!-- Start Header -->
        <?php

        include('header.php');
        

        ?>

        <!-- Start Content -->
        <section class="content checkout">
            <!-- Start Content-Header -->
            <div class="content-header breadcrumb-header">
                <div class="wrapper">
					<div class="row">
						<div class="col-md-12">
							<div class="pull-left">
								<h1>LOGIN</h1>
							</div>
							<ul class="breadcrumb pull-right">
							    <li><a href="#">Home&nbsp;</a></li>    
								<li>&nbsp;Login</li>    
							</ul>
						</div>
			    	</div>
                </div>        
            </div> <!-- End .content-header -->  
            
            <!-- Start Content-Main -->
            <div class="content-main">
                <div class="wrapper">
                    <div class="pt-one-41" >
                        <form action="register_user.php" method="POST" id="form_personal_details">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="personal-details">
                                        <h2>YOUR PERSONAL DETAILS</h2>
                                        <div class="row pt-xlg mt-sm">
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR FIRST NAME*</label>
                                                <input class="form-control" id="first_name" name="fname" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR LAST NAME*</label>
                                                <input class="form-control" id="last_name" name="lname" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR E-MAIL*</label>
                                                <input class="form-control" id="email" name="email" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR TELEPHONE*</label>
                                                <input class="form-control" id="phone" name="phone" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR USERNAME</label>
                                                <input type="text" class="form-control" id="usern" name="usern" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR PASSWORD*</label>
                                                <input type="password" class="form-control" id="pass" name="pass" required="required">
                                            </div> 
                                            <div class="col-md-12 input-field">
                                                <label>CONFIRM PASSWORD*</label>
                                                <input type="password" class="form-control" id="pass1" name="confirm" required="required">
                                            </div> 
                                            <label id="ncr" style="color:red;"></label>
                                             <input type="hidden" name="t_id" value="<?php echo $x;?>">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                    <div class="row mt-one-7">
                                        <div class="col-md-12 action-field">
											<input type="submit" name="create" value="CREATE AN ACCOUNT" class="btn-default btn-create-an-account">
                                        </div>
                                    </div>
                                </div>
                                </form >
                               
                                    </div><!-- End .personal-details -->    
                                </div><!-- End .col-md-6 -->
                                <form action="login_user.php" method="POST" id="form_personal_details">
                                <div class="col-md-6 col-sm-6">
                                    <div class="right-field">
                                        <h1>REGISTERED CUSTOMERS</h1>
                                        <div class="row pt-xlg mt-sm">
                                            <div class="col-md-12 mb-one-20">
                                                <p class="m-none">If you have an account with us, please log in.</p>
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR USERNAME</label>
                                                <input type="text" class="form-control" id="username" name="username" required="required">
                                            </div>
                                            <div class="col-md-12 input-field">
                                                <label>ENTER YOUR PASSWORD*</label>
                                                <input type="password" class="form-control" id="password" name="password" required="required">
                                            </div> 
                                            <label id="ncl" style="color:red;"></label>
                                            <input type="hidden" name="t_id" value="<?php echo $x;?>">
                                    <div class="col-md-6 col-sm-6">
                                    <div class="row mt-one-7">
                                        <div class="col-md-12 action-field">
											<input type="submit" name="submit" value="Login" class="btn-default btn-create-an-account">
                                        </div>
                                    </div>
                                </div>
                                
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="right-field">

                                        <div class="row mt-xs">
                                            <div class="col-md-12 action-field">
												
												<a class="pull-right" href="#">Forgot Your Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php 
		if( ($_SESSION['nc']==1))
        {
        	
        	?>
        	<script type="text/javascript">
        
             document.getElementById('ncl').innerHTML = 'Username or Password incoorrect!';
            </script>
            
        	<?php 
        	unset($_SESSION['nc']);
        }
        if($_SESSION['ncr']==1)
        {
        	?>
                	<script type="text/javascript">
                     document.getElementById('ncr').innerHTML = 'Passwords do not match!';
                    </script>
                	<?php
                	unset($_SESSION['ncr']);
                }
                ?>
                            </div>
                        </form>
                    </div><!-- End .billing-information -->
                </div><!-- End .wrapper -->
            </div><!-- End .content-main -->
        </section><!-- End .content -->    
        
        <!-- Start Footer -->
	<?php	include('footer.php'); ?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/owlcarousel/owl.carousel.min.js"></script> 
		
        <script src="js/theme.js"></script>
    </body>
</html>
