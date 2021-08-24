<!DOCTYPE html>
<html lang="en">

<!-- about27:04-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Contact Us</title>
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
<script async type="text/javascript">
    function resizeIframe(obj){obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';}
</script>
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
   
    
    <!-- Main Header-->
 	<?php include('header.php');?>
    <!--End Main Header -->
    
   <!--Page Title-->
    <section class="page-title" style="background-image:url(image/corolla.webp);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Contact Us</h1>
                   <!-- <span class="title">The Interior speak for themselves</span>-->
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">Speak To Us</span>
                            <h2>Contact Us</h2>
                        </div>

                        <div class="contact-form">
                            <form method="post" action="form_submit.php?enquiry_on=Contact Us" id="form_submit" target='formresponse' onSubmit="document.getElementById('submit').disabled = true;">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="name" id="name" placeholder="Name *" required="">
                                    </div>
                                    
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" id="mobile" name="mobile" placeholder="Mobile * (10 Digit Mobile Number)" required="" maxlength="10">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,3}$"  name="email" id="email" placeholder="Email *" required="">
                                    </div>
									<div class="form-group col-lg-6 col-md-12 col-sm-12">
									 <select  name="cnt_type" required>
										<option value="" disabled selected>Choose One *</option>
										<option value="Sales">Showroom</option>
										<option value="Service">Service</option>                       
									 </select>
									</div> 
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="message" onpaste="return false;"  placeholder="Message"></textarea>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button class="theme-btn btn-style-three" type="submit" name="submit-form" id="submit">Submit</button>
                                    </div>
                                     <iframe name='formresponse'  frameborder='0' id="formresponse" scrolling="no"  onload="resizeIframe(this);"></iframe>
                                </div>
                            </form>
                        </div>

                       
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12">
                   <div id="map_wrapper">
        					<div id="map_canvas" class="mapping"></div>
        			</div> 
                   
                </div>
               </div>
                 <div class="row">
                 <div class="contact-info">
                            <div class="row">
                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Location</h4>
                                        <p>Popular Automatch - Multi-Brand Work shop <br>
                                        42/3, GarvebaviPalaya <br> Behind Nandi Toyota,
                                   <br> Hosur Main Road,<br>Bangalore 560068.</p>
                                    </div>
                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Call Us</h4>
                                        <p>+91 484 280 3500 - 10</p>
                                    </div>

                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Email</h4>                                        
                                        <p><a href="#">info@popularautomatch.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                
            </div>
        </div>
    </section>
    <!--End Contact Page Section -->

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
<script src="js/validate.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/script.js"></script>
<!-- Color Setting -->
<script src="js/color-settings.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl2kyOU9h-JjMqppMrstDLlDclvQc6MCk&callback=initMap" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){setTimeout(function() { initialize(); }, 400);});
function initialize(){ var map; var bounds = new google.maps.LatLngBounds();
var mapOptions = { mapTypeId: 'roadmap' };
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
map.setTilt(45);  var markers = [ ['Multi-Brand Showroom & Work shop', 12.974637,77.670052], ];
var infoWindowContent = [['<div class="info_content">' +
'<strong> Multi-Brand Work shop</strong>' +
'<p> 42/3 GarvebaviPalaya<br>  Behind Nandi Toyota<br> Hosur Main Road, Bangalore </p>' +
'<p><b>Phone : </b> +91 484 280 3500 - 10</p>' +
'<p><b>Fax : </b> +91 484 280 3511 </p>' +
'</div>'],]; 
var infoWindow = new google.maps.InfoWindow(), marker, i;
for( i = 0; i < markers.length; i++ ){
var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
bounds.extend(position);  marker = new google.maps.Marker({  position: position, map: map, title: markers[i][0]});
google.maps.event.addListener(marker, 'click', (function(marker, i) {
return function() { infoWindow.setContent(infoWindowContent[i][0]); infoWindow.open(map, marker);} })(marker, i));
map.fitBounds(bounds);}
var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event){
this.setZoom(18);google.maps.event.removeListener(boundsListener);});}</script>
</body>

<!-- contact27:43-->
</html>