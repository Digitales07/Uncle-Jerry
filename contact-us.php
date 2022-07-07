<?php include('session.php'); ?>
<!DOCTYPE html >
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
        <meta name="keywords" content="HTML5 Ecommerce Template" />
        <meta name="description" content="Pesto - Responsive HTML5 Ecommerce Template" />
        <meta name="author" content="author name" />

        <title>Contact us</title>

        <!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed" />

        <!-- Vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/animate.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme-contactus.css" />
        <link rel="stylesheet" href="css/theme.css" />

    </head>
    <body>
        <!-- Start Header -->
        <?php include('header.php'); ?>

        <!-- Start Content -->
        <section id="content" class="contactus type2">
            <!-- Start Content-Main -->
            <div class="content-main">
                <div class="wrapper">
                    
                    <div class="row">
                        <!-- Start form -->
                        <div class="col-md-12 col-sm-12">
                            <div class="review-customer">
                                <h3>WRITE YOUR REVIEW</h3>
                                <div class="alert alert-success hidden" id="contact_success">
                                    <strong>
                                        Success!
                                    </strong>
                                    Your message has been sent to us.
                                </div>
                                <div class="alert alert-danger hidden" id="contact_danger">
                                    <strong>
                                        Danger!                                 
                                    </strong>
                                    Your message has been sent to us.
                                </div>
                                <form id="contactForm" action="contact-form.php" method="POST" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label> Enter your name*</label>
                                            <input type="text" id="name" class="form-control pb-sm" name="name" maxlength="100" aria-required="true" aria-invalid="false">
                                            <label> Enter your email*</label>
                                            <input type="text" id="email" class="form-control pb-sm" name="email" maxlength="100" aria-required="true" aria-invalid="false">
                                            <label> Enter your subject*</label>
                                            <input type="text" id="subject" class="form-control pb-sm" name="subject" maxlength="100" aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label> Enter your review*</label>
                                            <textarea rows="10" id="comments" class="form-control pb-sm" name="comments" maxlength="5000" aria-required="true" aria-invalid="false"></textarea>
                                            <input type="submit" name="review" value="POST COMMENT" class="btn btn-default" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End form -->
                    </div>
                </div>
            </div> <!-- End .content-main -->
            
            <!-- Start Content-Footer -->
            <div class="content-footer">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" location text-center wow fadeIn" data-wow-duration="500ms">
                                <a href="#"><i class="demo-icon pesto-icon-gps"></i></a>
                                <h4>OUR LOCATION</h4>
                                <div>Oxford Street 48/188 , London 02587, </div>
                                <div>United Kingdom, 24-157</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" details text-center wow fadeIn" data-wow-duration="700ms">
                                <a href="#"><i class="demo-icon pesto-icon-email"></i></a>
                                <h4>CONTACT DETAILS</h4>
                                <div>Email: hoki_shop@gmail.com </div>
                                <div class="-xs">Skype: hoki_shop</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="phone text-center wow fadeIn" data-wow-duration="900ms">
                                <a href="#"><i class="demo-icon pesto-icon-telephone"></i></a>
                                <h4>CONTACT US</h4>
                                <div>Phone: 0203 - 980 - 14 - 79</div>
                                <div>Mobile: 0203 - 478 - 12 - 96 </div>
                            </div>
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .wrapper -->
            </div><!-- End .content-Footer -->  
        </section><!-- End .content -->

        <!-- Start Footer-->
<?php include 'footer.php';?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script> 
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="js/theme.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    </body>
</html>
