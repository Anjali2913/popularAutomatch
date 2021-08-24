<?php
session_start();
include 'class.dbcon.php';
$_Con=new Con;
if(!isset($_REQUEST['T2ZmZXJfSUQ']))
{	
header("Location:service_offers.php"); 
		exit;
}
else
{
	$Offer_ID = base64_decode($_REQUEST['T2ZmZXJfSUQ']);
	$Offer_Type = base64_decode($_REQUEST['T2ZyX1R5cGU']);
	$_SESSION['Offer_ID']=$Offer_ID;
	$Source =  base64_decode($_REQUEST['U291cmNl']);
	$Sql ="CALL `SP_Web_Schemes_Offers`('view_ofr', ?, ?)";
		$Rs = $_Con->prepare($Sql);
		$Rs->bindValue(1, $Offer_Type,PDO::PARAM_STR);
		$Rs->bindValue(2, $Offer_ID,PDO::PARAM_INT);
		$Rs->execute();
		$Rs->setFetchMode(PDO::FETCH_ASSOC);      
	  	$row = $Rs->fetch();
		$_SESSION['Schemes_Offers_For']=$row['Schemes_Offers_For'];
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- blog-detail-227:31-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | View Offers</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">   
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="css/color-themes/default-theme.css" rel="stylesheet">

<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<script async type="text/javascript">
    function resizeIframe(obj){obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';}
</script>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <!--<div class="preloader"></div>-->
    
    <!-- Main Header-->
 	<?php include('header.php');?>
    <!--End Main Header -->
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(image/corolla.webp);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Offer Detail</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Offer Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Blog Detail -->
    <div class="blog-detail style-two">
        <div class="inner-container">
            <!-- News Block -->
            <div class="news-block-two">
                <div class="inner-box">
                     <div class="image-box">
                        <figure class="image">
                        <img  src="data:image/jpeg;base64,<?php echo  base64_encode( $row['Picture'] ); ?>"  alt=""></figure>
                       
                    </div>

                    <div class="caption-box">
                        <div class="inner">
                            <h3><?php echo $row['Title'];  ?></h3>
                            <ul class="info">
                                 <li>Valid To : <?php echo $row['Valid_To'];  ?></li>
                            <p><?php echo $row['Description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <!-- End Blog Detail -->
  <section class="faq-form-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Enquiry</span>
                <h2>Your Question</h2>
            </div>


            <!-- Faq Form -->
            <div class="faq-form">
                <form method="post" action="form_submit.php?enquiry_on=Offer-Scheme" id="form_submit" target='formresponse' onSubmit="document.getElementById('submit').disabled = true;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                           <?php $title=$row['Title']; $title=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($title)))); ?>
                                         <input type="hidden"  name="offer" value="<?php echo $title; ?>"> 
                            <input type="text" name="name" id="name" placeholder="Name" required>
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,3}$" placeholder="Email" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile" pattern="[0-9]{10}" required>
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12">
						 <select name="location" id="location" required>
						 <option value="" disabled selected>Choose One Prefered Location *</option>
								<?php

								$Sql2 ="CALL `SP_Web_Locations`('Select_Location','$Offer_Type',0)";						
								$Rs = $_Con->prepare($Sql2);
								$Rs->execute();
								$Rs->setFetchMode(PDO::FETCH_ASSOC);										
								while($rw2 = $Rs->fetch())
								{ 

								?>
									<option value="<?php echo $rw2['ID'] ?>" <?php  if($row['Location_ID']==$rw2['ID']) { ?> selected<?php } else { ?>  <?php } ?> ><?php echo $rw2['Location_DisplayName']; ?></option>
								<?php

								}
								?>
						 </select>
                        </div>
                        
                        <div class="form-group col-lg-12 col-md-12">
                            <textarea name="message" onpaste="return false;" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <button class="theme-btn btn-style-three" type="submit" id="submit" name="submit-form">Submit</button>
                        </div>
                        <iframe name='formresponse'  frameborder='0' id="formresponse" scrolling="no"  onload="resizeIframe(this);"></iframe>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
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

<!-- blog-detail-227:33-->
</html>