<?php 
include 'class.dbcon.php';
$_Con=new Con;
?>
<!DOCTYPE html>
<html lang="en">

<!-- blog27:18-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Offers</title>
<meta name="description" content="Check out the stock of certified, good condition, Warranted Second Hand Cars in all brands.">
<meta name="keywords" content="Hyundai, Maruti, Toyota, Tata, Honda, Mahindra, Volks Wagen, Chevrolet, Ford, Skoda, Nissan, Renault, Datsun, Kia, MG, Isuzu, Force, Opel">
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">   
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="css/color-themes/redd-color.css" rel="stylesheet">

<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
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
    <section class="page-title" style="background-image:url(image/corolla.webp);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Schemes & Offers</h1>
                   <!-- <span class="title">The Interior speak for themselves</span>-->
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Showroom Offers</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

   <!-- Blog Section -->
    <section class="blog-section">
        <div class="auto-container">
            <div class="row">
                <!-- News Block -->
                 <?php
				$Sql1 ="CALL `SP_Web_Schemes_Offers`('Select', 'Sales', '')";
				$Rs = $_Con->prepare($Sql1);
				$Rs->execute();
				$Rs->setFetchMode(PDO::FETCH_ASSOC);
				if($Rs->rowCount()>0)	
				{									
				while($rw1 = $Rs->fetch())
					{
					?>  
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="data:image/jpeg;base64,<?php echo  base64_encode( $rw1['Picture'] ); ?>" alt="Automath Sales Offers"></figure>
                           <?php      
									$Offer_ID=base64_encode($rw1['ID']);
									$Ofr_Type=base64_encode('Sales');
									$Source=base64_encode('Web');?> 
                            <div class="overlay-box"><a href="view_offer.php?T2ZmZXJfSUQ=<?php echo $Offer_ID; ?>&T2ZyX1R5cGU=<?php echo $Ofr_Type; ?>&U291cmNl=<?php echo $Source; ?> "><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <div class="inner">
                                <h3><a href="view_offer.php?T2ZmZXJfSUQ=<?php echo $Offer_ID; ?>&T2ZyX1R5cGU=<?php echo $Ofr_Type; ?>&U291cmNl=<?php echo $Source; ?> "><?php echo $rw1['Title'];  ?></a></h3>
                                <ul class="info">
                                    <li>Valid To : <?php echo $rw1['Valid_To'];  ?></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

               <?php } } else { ?>
					
				<p>The offers are being updated. Please check after sometime.</p>
					
				<?php } ?>

               
            </div>

            <!--Post Share Options-->
          
        </div>
    </section>
    <!--End Blog Section -->
    <!-- Main Footer -->
  <?php include('footer.php'); ?>
    <!-- End Main Footer -->

</div>


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/script.js"></script>
<!-- Color Setting -->
<script src="js/color-settings.js"></script>
</body>

<!-- blog27:27-->
</html>