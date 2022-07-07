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

        <title>About us</title>
        
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
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme-contactus.css" />
		
    </head>
    <body>
        <!-- Start Header -->
        <?php include 'header.php';?>
        <!-- Start Content -->
        <section class="content aboutus">
            <!-- Start Content-Header -->
            <div class="content-header image-header">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image">
                                <img src="img/aboutus-background.jpg" alt="loading...">
                                <div class="page-title">
                                    <h1 class="medium font-roboto"> ABOUT US </h1>
                                    <ol class="breadcrumb">
                                        <li><a href="#">Home&nbsp;</a></li>    
                                        <li>&nbsp;About us</li>    
                                    </ol>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>        
            </div> <!-- End .content-header -->
            <?php 
            $sql="select * from about";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result)
            
            ?>
            <!-- Start Content-Main -->
            <div class="content-main">
                <div class="product-summary">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span class="mark"><i class="demo-icon pesto-icon-left"></i></span>
                                <p class="summary"><?php echo $row[1];?>.</p>
                            </div>
                        </div>
                    </div><!-- End .wrapper -->
                </div><!-- End .product-summary -->
                
                
                
                <div class="short-about-us">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-md-7 col-sm-6">
                                <div class="image-comments">
                                    <h2 class=" font-roboto large">SHORTLY ABOUT US</h2>
                                    <div class="explanation type1">
                                        <?php echo $row[2];?>    
                                    </div>
                                </div><!-- End .image-comments-->
                            </div><!-- End .col-md-7 -->
                            
                            <div class="col-md-5 col-sm-6">
                                <div class="image">
                                    <img src="img/short-about-us.jpg" alt="">
                                </div>
                            </div><!-- End .col-md-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .wrapper -->
                </div><!-- End .short-about-us -->
                
                <div class="team">
                    <div class="wrapper">
                        <div class="row text-center">
                            <h4 class="medium font-roboto">MEET OUR TEAM</h4>
                            <div class="col-md-3 col-sm-6">
                                <div class="member flipInX wow" data-wow-duration="500ms">
                                    <div class="image">
                                        <img src="img/member1.png" alt="member1">
                                    </div>
                                    <div class="image-comment">
                                        <span class="name">
                                            WALTER MARTIN
                                        </span>
                                        <span class="role font-roboto">
                                            CEO
                                        </span>
                                    </div>
                                </div><!-- End .member -->
                            </div><!-- End .col-md-3 -->
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="member flipInX wow" data-wow-duration="500ms">
                                    <div class="image">
                                        <img src="img/member2.png" alt="member2">
                                    </div>
                                    <div class="image-comment">
                                        <span class="name">
                                            HUNTER GONZALES
                                        </span>
                                        <span class="role font-istok">President</span>
                                    </div>
                                </div><!-- End .member -->
                            </div><!-- End .col-md-3 -->
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="member flipInX wow" data-wow-duration="500ms">
                                    <div class="image">
                                        <img src="img/member3.png" alt="member3">
                                    </div>
                                    <div class="image-comment">
                                        <span class="name">
                                            CHRISTINE PETERSON
                                        </span>
                                        <span class="role font-istok">Commercial Director</span>
                                    </div>
                                </div><!-- End .member -->
                            </div><!-- End .col-md-3 -->
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="member flipInX wow" data-wow-duration="500ms">
                                    <div class="image">
                                        <img src="img/member4.png" alt="member4">
                                    </div>
                                    <div class="image-comment">
                                        <span class="name">AIDEN BROWN</span>
                                        <span class="role font-istok">Chief Financial Officer</span>
                                    </div>
                                </div><!-- End .member -->
                            </div><!-- End .col-md-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .wrapper -->
                </div><!-- End .team -->
            </div><!-- End .wrapper -->
            
            <!-- Start Content-Footer -->
            <div class="content-footer">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-4 text-center location fadeInUp wow" data-wow-duration="500ms">
                            <a href="#" class="fs-xxl pt-sm pb-sm"><i class="demo-icon pesto-icon-gps"></i></a>
                            <h4>OUR LOCATION</h4>
                            <div>Oxford Street 48/188 , London 02587, </div>
                            <div >United Kingdom, 24-157</div>
                        </div>
                        <div class="col-md-4 text-center details fadeInUp wow" data-wow-duration="500ms">
                            <a href="#"><i class="demo-icon pesto-icon-email"></i></a>
                            <h4>CONTACT DETAILS</h4>
                            <div>Email: hoki_shop@gmail.com </div>
                            <div>Skype: hoki_shop</div>
                        </div>
                        <div class="col-md-4 text-center phone fadeInUp wow" data-wow-duration="500ms">
                            <a href="#" class="fs-xxl pt-sm pb-sm"><i class="demo-icon pesto-icon-telephone"></i></a>
                            <h4>CONTACT US</h4>
                            <div>Phone: 0203 - 980 - 14 - 79</div>
                            <div>Mobile: 0203 - 478 - 12 - 96 </div>
                        </div>
                    </div>
                </div><!-- End .wrapper -->
            </div><!-- End Content-footer -->      
        </section><!-- End .content -->

        <!-- Start Footer-->
 <?php include 'footer.php';?>

        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="js/theme.js"></script>
    </body>
</html>
