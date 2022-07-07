<?php 
include('session.php');

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

        <title>Home</title>

        <!-- Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />

        <!-- Vendor -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme-font/css/pesto.css" />
        <link rel="stylesheet" href="vendor/animate.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css" />
        <link rel="stylesheet" href="vendor/owlcarousel/css/animate.css" />
        <link rel="stylesheet" href="vendor/revolution/css/settings.css">
        <link rel="stylesheet" href="vendor/revolution/css/layers.css">
        <link rel="stylesheet" href="vendor/revolution/css/navigation.css">

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" href="css/theme-elements.css" />
        <link rel="stylesheet" href="css/theme-shop.css" />
        <link rel="stylesheet" href="css/theme.css" />
		


    </head>
    <body>
        <!-- Start Header -->
      
        <?php 
        include 'header.php';
   
   	$bool = 0;
   	if( isset( $_GET['hot'] ) )
   	{
   		$bool=1;
   	$ptype="Hot Product";
   	echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['Latest'] ) )
   	{
   		$bool=1;
   		$ptype="Latest";
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['Best Seller'] ) )
   	{
   		$bool=1;
   		$ptype="Best Seller";
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['Featured'] ) )
   	{
   		$bool=1;
   		$ptype="Featured";
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   	if( isset( $_GET['all'] ) )
   	{
   		$bool=0;
   		
   		echo '<script> $("#div1").load(location.href + " #div1"); </script>';
   	
   	}
   ?>
  
        <!-- Start Content -->
        <section id="content" class="home1" style="padding-top: 30px;" style="visibility: hidden">
			<!-- Start Content-Header -->
            <div class="content-header">
                <div class="wrapper-fluid">
                    <div id="rev_slider_wrapper1" class="rev-slider-wrapper" style="position: relative">
                        <div id="rev_slider1" class="rev-slider fullwidthbanner" data-version="5.0.7">
                            <ul >
                                <li data-transition="boxslide">
                                    <img src="img/slides/home1-slider-1.jpg" alt="" data-bgposition="center center" 
                                        data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                                    <div class="tp-caption" 
                                        data-x="left" 
                                        data-hoffset="['259','116','40']"
                                        data-y="center"
                                        data-start="1000"
                                        data-voffset="-61"
                                        data-fontsize="['27','23','19']"
                                        data-transform_in="y:[100%];s:500;"
                                        data-transform_out="opacity:0;s:500;"
                                        data-whitespace="nowrap"
                                        style="color:#444444;font-weight: normal; z-index: 5;">
                                        The next big thing...
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['259','116','40']"
                                        data-y="center"
                                        data-voffset="-11"
                                        data-fontsize="['18','17','16']"
                                        data-lineheight="23"
                                        data-transform_idle="o:1;"
                                        data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:500;e:Power4.easeInOut;"
                                        data-transform_out="opacity:0;s:500;"
                                        data-splitin="chars" 
                                        data-splitout="none"
                                        data-start="1500"
                                        data-width="370"
                                        data-elementdelay="0.02"
                                        style="color:#666666;letter-spacing: 0;z-index: 6;">Take, view and share photos with the 17MP camera and stunning 6" display.
                                    </div>
                                    <div class="tp-caption btn btn-default btn-lg border-normal font-istok" 
                                        data-x="left" 
                                        data-hoffset="['260','117','41']"
                                        data-y="center"
                                        data-voffset="49"
                                        data-whitespace="nowrap"
                                        data-fontsize="['15','14','13']"
                                        data-start="2800"
                                        data-transform_idle="o:1;"
                                        data-transform_in="y:[100%];s:500;"
                                        data-transform_out="opacity:0;s:500;"
                                        style="z-index: 8; line-height: 15px;">
                                        TAKE A LOOK
                                    </div>
                                </li>
                                <li data-transition="papercut">
                                    <img src="img/slides/home1-slider-2.jpg" alt="" data-bgposition="center center" 
                                        data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                                    <div class="tp-caption title" 
                                        data-x="left" 
                                        data-hoffset="['1130','350','40']"
                                        data-y="center"
                                        data-voffset="-61"
                                        data-fontsize="['27','23','19']"
                                        data-whitespace="nowrap"                         
                                        data-transform_in="y:[100%];s:500;"
                                        data-transform_out="opacity:0;s:500;"

                                        style="color:#444444;font-weight: normal;z-index: 5;">
                                        Bigger Display Experience
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['1130','350','40']"
                                        data-y="center"
                                        data-voffset="-15"
                                        data-fontsize="['18','17','16']"
                                        data-start="1000"
                                        data-transform_idle="o:1;"
                                        data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:500;e:Power4.easeInOut;"
                                        data-transform_out="opacity:0;s:500;"
                                        data-elementdelay="0.02"
                                        data-splitin="chars" 
                                        data-splitout="none"
                                        data-width="340"
                                        style="color:#666666;letter-spacing: 0;z-index: 6;">This device is the perfect size for all your multitasking needs.
                                    </div>
                                    <div class="tp-caption btn btn-default btn-lg border-normal font-istok" 
                                        data-x="left" 
                                        data-hoffset="['1130','350','40']"
                                        data-y="center"
                                        data-voffset="49"
                                        data-whitespace="nowrap"
                                        data-fontsize="['15','14','13']"
                                        data-start="2500"
                                        data-transform="x:[150%];opacity:0;s:2000;"
                                        data-transform_in="opacity:0;s:2000;e:Power3.easeOut;" 
                                        data-transform_out="opacity:0;s:500;"
                                        style="z-index: 8;">
                                        DISCOVER
                                    </div>
                                </li>
                                <li data-transition="slidingoverlayhorizontal">
                                    <img src="img/slides/home1-slider-3.jpg" alt="" data-bgposition="center center" 
                                        data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                                    <div class="tp-caption " 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="['-142','-120','-100']"
                                        data-fontsize="['27','23','19']"
                                        data-splitin="line" 
                                        data-transform_in="o:0.5;sX:1.5;sY:1.5;rX:0;rY:0;rZ:0;s:1000;e:Power1.easeIn;x:-200px;"
                                        data-transform_out="s:1500;o:0.1;sX:2;sY:3;z:0;rX:0,skY:20px;rX:100px;rY:20px;rZ:20;e:Power3.easeOut;x:1000px;"
                                        data-width="371"
                                        style="color:#444444;font-weight: normal;letter-spacing: 2.5px !important;line-height: 30px;z-index: 5;">
                                        Enjoy the wide possibilities with pesto
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="['-62','-57','-52']"
                                        data-whitespace="nowrap"
                                        data-fontsize="['18','17','16']"
                                        data-start="1000"
                                        data-transform_in="opacity:0;x:-200px;skX:50px;s:500;e:Power3.easeIn;" 
                                        data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;y:0px;" 
                                        style="color:#666666;letter-spacing: 3.2px !important;z-index: 6;">
                                        <span style="border:1px solid #666666;display:inline-block;font-size: 11px;height: 20px;line-height: 20px;text-align:center;width: 25px;"><i class="demo-icon pesto-icon-keyboard"></i></span> Easy to use &amp; customize
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="['-25','-20','-15']"
                                        data-whitespace="nowrap"
                                        data-fontsize="['18','17','16']"
                                        data-start="1300"
                                        data-transform_in="opacity:0;x:-200px;skX:50px;s:500;e:Power3.easeIn;" 
                                        data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;y:0px;" 
                                        style="color:#666666;letter-spacing: 3.2px !important;z-index: 6;">
                                        <span style="border:1px solid #666666;display:inline-block;font-size: 11px;height: 20px;line-height: 20px;text-align:center;width: 25px;"><i class="demo-icon pesto-icon-keyboard"></i></span> Fully responsive &amp; retina ready
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="['12','17','22']"
                                        data-whitespace="nowrap"
                                        data-fontsize="['18','17','16']"
                                        data-start="1600"
                                        data-transform_in="opacity:0;x:-200px;skX:50px;s:500;e:Power3.easeIn;" 
                                        data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;y:0px;" 
                                        style="color:#666666;letter-spacing: 3.2px !important;z-index: 6;">
                                        <span style="border:1px solid #666666;display:inline-block;font-size: 11px;height: 20px;line-height: 20px;text-align:center;width: 25px;"><i class="demo-icon pesto-icon-keyboard"></i></span> Unlimited color options
                                    </div>
                                    <div class="tp-caption font-istok" 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="['50','55','60']"
                                        data-whitespace="nowrap"
                                        data-fontsize="['18','17','16']"
                                        data-start="1900"
                                        data-transform_in="opacity:0;x:-200px;skX:50px;s:500;e:Power3.easeIn;" 
                                        data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;y:0px;" 
                                        style="color:#666666;letter-spacing: 3.2px !important;z-index: 6;">
                                        <span style="border:1px solid #666666;display:inline-block;font-size: 11px;height: 20px;line-height: 20px;text-align:center;width: 25px;"><i class="demo-icon pesto-icon-keyboard"></i></span> Based on bootstrap 3
                                    </div>
                                    <div class="tp-caption btn btn-default btn-lg border-normal font-istok" 
                                        data-x="left" 
                                        data-hoffset="['340','150','5']"
                                        data-y="center"
                                        data-voffset="110"
                                        data-whitespace="nowrap"
                                        data-fontsize="['15','14','13']"
                                        data-start="2100"
                                        data-transform="x:[150%];opacity:0;s:2000;"
                                        data-transform_in="opacity:0;sX:2;sY:2;s:2000;e:Power3.easeOut;" 
                                        data-transform_out="opacity:0;s:500;" 
                                        style="z-index: 8;">
                                        LEARN MORE
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
           <!-- Start Content-Main -->
            <div class="content-main">
                <div class="products-container">
                    <div class="products-top">
                        <div class="wrapper-fluid text-center">
                            <form action="index.php" method="post">
							
                            <ul class="list-float-left clearfix" data-object="grid">
								<li> <!--class="active"-->  <a class="sort"  href="index.php?all=ALL">All</a></li>
                                <li> <a class="sort" href="index.php?hot=Hot Products">Hot Products</a></li>
                                <li> <a class="sort" href="index.php?Latest=Latest">Latest</a></li>
                                <li> <a class="sort" href="index.php?Bestsellers=Bestsellers">Bestsellers</a></li>
                               <!-- <li> <a class="sort" href="index.php?Featured=Featured">Featured</a></li>-->
								<!--
                                <li> <input type="submit" name="all" value="ALL" class="sort" ></li>
                                <li> <input type="submit" name="hot" value="Hot Products" class="sort" ></li>
                                <li> <input type="submit" name="Latest" value="Latest" class="sort" ></li>
                                <li> <input type="submit" name="Bestsellers" value="Bestsellers" class="sort" ></li>
                                <li> <input type="submit" name="Featured" value="Featured" class="sort" ></li>-->
                            </ul>
                            </form>
                        </div>
                    </div><!-- End .products-top -->
                    <div id="div1">
                    <div class="products">
                        <div  class="wrapper-fluid clearfix">    
                            <div class="row-fluid grid">
                            <?php 
                           $i=0;
                           if($bool==1)
                           {
                            $sql = "select * from product where product_type='$ptype' AND product_archived=1 LIMIT 12";
                           }
                           else{
                           	$sql = "select * from product where product_archived=1 LIMIT 12";
                           }
                            $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
                            while (($row = mysqli_fetch_array($result))) { 
                            	$i++;
                            
                            ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 grid-item">
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
                                
                                
                                
                            </div><!-- End .grid -->
                        </div><!-- End .wrapper-fluid -->
                    </div><!-- End Products -->
                    </div>
                </div><!-- End .pagination-container -->

            </div><!-- End .content-main -->

            <!-- Start Content-Footer -->
        </section><!-- End .content -->

        <!-- Start Footer -->
<?php include 'footer.php';?>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="vendor/js/jquery/jquery.min.js"></script>
        <script src="vendor/wow/wow.js"></script>
        <script src="vendor/isotope/isotope.pkgd.min.js"></script>
        <script src="vendor/imagesloaded/imagesloaded.pkgd.js"></script>
        <script src="vendor/owlcarousel/owl.carousel.min.js"></script> 
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
        <script src="vendor/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="js/theme.js"></script>
        <script>
            var revapi26;
            $(document).ready(function() {
				
                    //setTimeout(setHeightOfAdvertisements(),300);    
                    if($("#rev_slider1").revolution == undefined){
                        revslider_showDoubleJqueryError("#rev_slider1");
                    }else{
                        revapi26 = $("#rev_slider1").show().revolution({
                                sliderType:"standard",
                                jsFileLocation:"vendor/revolution/js/",
                                sliderLayout:"auto",
                                dottedOverlay:"none",
                                delay:9000,
                                navigation: {
                                    keyboardNavigation:"off",
                                    keyboard_direction: "horizontal",
                                    mouseScrollNavigation:"off",
                                    onHoverStop:"on",
                                    touch:{
                                        touchenabled:"on",
                                        swipe_threshold: 75,
                                        swipe_min_touches: 1,
                                        swipe_direction: "horizontal",
                                        drag_block_vertical: false
                                    }
                                    ,
                                    arrows: {
                                        style: "rev_pesto",
                                        enable: true,
                                        hide_onmobile: true,
                                        hide_under: 600,
                                        hide_onleave: true,
                                        hide_delay: 200,
                                        hide_delay_mobile: 1200,
                                        left:{
                                            h_align:"left",
                                            v_align:"center",
                                            h_offset:30,
                                            v_offset:0
                                        },
                                        right:{
                                            h_align:"right",
                                            v_align:"center",
                                            h_offset:30,
                                            v_offset:0
                                        }
                                    }
                                    ,
                                    thumbnails: {
                                        style: 'rev_pesto',
                                        enable: true,
                                        width: 20,
                                        height: 20,
                                        min_width: 14,
                                        wrapper_padding: 0,
                                        wrapper_color: 'transparent',
                                        wrapper_opacity: '1',
                                        tmp: '<span class="tp-thumb-icon-circle"><i class="theme-icon pesto-icon-circle"></i></span>',
                                        visibleAmount: 5,
                                        hide_onmobile: true,
                                        hide_under: 800,
                                        hide_onleave: true,
                                        direction: 'horizontal',
                                        span: false,
                                        position: 'inner',
                                        space: 5,
                                        h_align: 'center',
                                        v_align: 'bottom',
                                        h_offset: 0,
                                        v_offset: 20
                                    }
                                },
                                responsiveLevels:[1920,992,768],
                                gridwidth: [1840,754,280],
                                gridheight: [850,348,280],
                                parallax: {
                                    type:"mouse+scroll",
                                    origo:"slidercenter",
                                    speed:2000,
                                    levels:[1,2,3,20,25,30,35,40,45,50],
                                    disable_onmobile:"on"
                                },
                                spinner:"spinner3",
                                stopLoop:"on",
                                stopAfterLoops:0,
                                stopAtSlide:1,
                                shuffle:"off",
                                autoHeight:"on",
                                minHeight:"280",
                                disableProgressBar:"on",
                                hideThumbsOnMobile:"on",
                                hideSliderAtLimit:0,
                                hideCaptionAtLimit:0,
                                hideAllCaptionAtLilmit:0,
                                debugMode:false,
                                fallbacks: {
                                    simplifyAll:"off",
                                    nextSlideOnWindowFocus:"off",
                                    disableFocusListener:false,
                                }
                        });
                    }
					
            }); /*ready*/
        </script>
    </body>
</html>
