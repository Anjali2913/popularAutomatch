<?php 
session_start();
include('../class.dbcon.php');
$_Con=new Con;
if(!isset($_SESSION['user'])){	
	header('location:index.php');	
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- about27:04-->
<head>
<meta charset="utf-8">
<meta charset="utf-8">
<title>Popular Automatch | Home </title>
<!-- Stylesheets -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">   
<!--Color Switcher Mockup-->
<link href="../css/color-switcher-design.css" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="../css/color-themes/redd-color.css" rel="stylesheet">

<link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
<link rel="icon" href="../image/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!-- Main Header-->
 	<?php include('header.php');?>
    <!--End Main Header -->
    <!--Page Title-->
    
    <!--End Page Title-->

     <!--Login Section-->
    <section class="app-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-lg-12 col-md-12 col-sm-12" align="center">
                    <h2>Welcome <?php echo $_SESSION['user']; ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
     <!-- Fun Fact And Features -->
    <section class="fun-fact-and-features alternate"  style="background-image: url(images/background/3.jpg);">
        <div class="outer-box">
            <div class="auto-container">
               
                <!-- Features -->
                <div class="features">
                    <div class="row">
                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-envelope-of-white-paper"></span></div>
                                <h3><a href="blank_page.php">Total Enquiries</a></h3>
                                <div class="row">
									<!--Column-->
									<div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
										<div class="count-box">
										   <h6 class="counter-title"><br></h6>
											<div class="count"><span>0</span></div>                                
										</div>
									</div>
								</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-shopping-cart"></span></div>
                                <h3><a href="blank_page.php">Showroom Enquiries</a></h3>
                             	
                             	 <div class="row">
									<!--Column-->
									<div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
										<div class="count-box">
										   <h6 class="counter-title">Offers</h6>
											<div class="count"><span>0</span></div>                                
										</div>
									</div>

									<!--Column-->
									<div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
										<div class="count-box">
										   <h6 class="counter-title">Booking</h6>
											<div class="count"><span>0</span></div>                                
										</div>
									</div>
								</div>	
                             	
                             	
                             	
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon flaticon-cogwheel"></span></div>
                                <h3><a href="blank_page.php">Service Enquiries</a></h3>
                                 <div class="row">
									<!--Column-->
									<div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
										<div class="count-box">
										   <h6 class="counter-title">Offers</h6>
											<div class="count"><span>0</span></div>                                
										</div>
									</div>

									<!--Column-->
									<div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
										<div class="count-box">
										   <h6 class="counter-title">Booking</h6>
											<div class="count"><span>0</span></div>                                
										</div>
									</div>
								</div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

<!-- Main Footer -->
  	<?php include('footer.php'); ?>
<!-- End Main Footer -->

</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
<script src="../js/jquery.js"></script> 
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.js"></script>
<script src="../js/owl.js"></script>
<script src="../js/wow.js"></script>
<script src="../js/appear.js"></script>
<script src="../js/mixitup.js"></script>
<script src="../js/script.js"></script>
<!-- Color Setting -->
<script src="../js/color-settings.js"></script>
</body>

<!-- about27:05-->
</html>