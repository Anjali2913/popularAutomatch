<?php
	include 'class.dbcon.php';
	$_Con = New Con();	
?>
<!DOCTYPE html>
<html lang="en">

<!-- about27:04-->
<head>
<meta charset="utf-8">
<title>Popular Automatch |Networks</title>
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
    <div class="preloader"></div>
    <!-- Main Header-->
 	<?php include('header.php');?>
    <!--End Main Header -->
 <!--Page Title-->
    <section class="page-title" style="background-image:url(image/corolla.webp);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Networks</h1>
                    <span class="title"></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Networks</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
 <section>

        <div class="project-detail">
            <div class="auto-container">
         <!--Lower Content-->
                <div class="lower-content">
                 <div class="row clearfix">
   		 <!--Info Column-->
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 "></div>
                       
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                         <form name="contactForm" id="contactForm"  method="post" action="ajax_networks.php" role="form" target='formresponse' >
                      
                          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" name="customRadio" value="Service" id="customRadio1" checked onChange="Check(this.form.submit())">
            <label class="custom-control-label Workshop " for="customRadio1">Workshop</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2" value="Sales" onChange="Check(this.form.submit())">
            <label class="custom-control-label Showroom" for="customRadio2">Showroom</label>
        </div>
                        </form>
                       </div>
                       <div class="info-column col-lg-4 col-md-12 col-sm-12 "></div>
                    </div>
                    <div id="locations">
                    <div class="row clearfix">
   		 <!--Info Column-->
                        <div class="col-lg-4 col-md-12 col-sm-12 "></div>
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                            <div class="inner-column wow fadeInRight">
              <!--Help Box-->
                                <div class="help-box-two">
                                    <div class="inner">
                                        <h2 align="center">Multi-Brand Work shop</h2>
                                        <div class="text"><p class="loc">42/3 GarvebaviPalaya<br>   
                                          Behind Nandi Toyota<br>
                                          Hosur Main Road<br>
                                          Bangalore 560068<br>
                                Phone: +91 484 280 3500 - 10<br>
                                Fax: +91 484 280 3511</p></div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-12 col-sm-12 "></div>
                    </div>
               <div class="row clearfix">
   		 <!--Info Column-->
          <div class="info-column col-lg-12 col-md-12 col-sm-12 ">
          <div id="map_wrapper">
        <div id="map_canvas" class="mapping"></div>
        </div> 
        </div>
        </div>
      </div></div>
     </div></div>
      <iframe name='formresponse' class="responsive-iframe" frameborder='0' id="formresponse" scrolling="no"  onload="resizeIframe(this);"></iframe>
     </section>	

    <!--End About Section -->
    
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
<script>
	$.extend({
    getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
},
getUrlVar: function(name){
            return $.getUrlVars()[name];
        }
});
	</script>
 <script>
function Check(){
     if( $("#customRadio1").is(':checked')) {
      $(".Workshop").css('color', '#ff423c');
	  $('.Showroom').css('color','#777777');
    }
	else{
		$(".Showroom").css('color', '#ff423c');
	  $('.Workshop').css('color','#777777');
	}
}

</script>
 <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl2kyOU9h-JjMqppMrstDLlDclvQc6MCk&callback=initMap"
  type="text/javascript"></script>
<script defer type="text/javascript">
$(document).ready(function(){setTimeout(function() { initialize(); }, 400);});
function initialize(){ var map; var bounds = new google.maps.LatLngBounds();
var mapOptions = { mapTypeId: 'roadmap' };
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
map.setTilt(45);  var markers = [ ['Bangalore', 12.974637,77.670052], ];
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
<!-- about27:05-->
</html>