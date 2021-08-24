<?php
if(!empty($_POST['customRadio'])) {
$location_type=$_POST['customRadio'];} 
include 'class.dbcon.php';
$_Con = New Con();
?>
<!DOCTYPE html>
<html lang="en">

<!-- team27:05-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Network</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">   
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="css/color-themes/default-theme.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
  <!-- Team Section -->
    <section class="project-detail">
        <div class="auto-container">
           <div class="row clearfix">
   		 <!--Info Column-->
                    <div class="col-lg-4 col-md-12 col-sm-12 "></div>
                    <?php $Sql ="CALL `SP_Web_Locations`('Select', '".$location_type."','')";
					$Rs = $_Con->prepare($Sql);
					$Rs->execute();
					$Rs->setFetchMode(PDO::FETCH_ASSOC);
					while ($rw = $Rs->fetch()){ 
					?>
                    
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                            <div class="inner-column wow fadeInRight">
              <!--Help Box-->
                                <div class="help-box-two">
                                    <div class="inner">
                                        <h2 align="center"><?php echo $rw['Location_DisplayName'];?></h2>
                                        <div class="text"><p class="loc"><?php 
										$Address=$rw['Address'];
										$Address = str_replace(',', '<br />', $Address);
										echo $Address.'<br>' ;
										if (!empty($rw['Mobile'])){echo 'Mobile : '.$rw['Mobile'].'<br>';} 
								       if (!empty($rw['Phone'])){echo 'Phone : '.$rw['Phone'].'<br>';} 
								      if (!empty($rw['Fax'])){echo 'Fax : '.$rw['Fax'].'<br>';} 
							          if (!empty($rw['Email'])){echo 'Email : '.$rw['Email'].'<br>';}?>
									</p></div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                         <div class="col-lg-4 col-md-12 col-sm-12 "></div>
                    </div>
                   
               <div class="row clearfix">
   		 <!--Info Column-->
          <div class="info-column col-lg-12 col-md-12 col-sm-12 ">
          <div id="map_wrapper">
        <div id="map_canvas" class="mapping"></div>
        </div> 
      </div></div>
      </div>
      </section>
      </div>
   
    <!--End Team Section -->
</body>
    

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
<?php $Sql ="CALL `SP_Web_Locations`('Select', '".$location_type."','')";
$Rs = $_Con->prepare($Sql);
$Rs->execute();
$Rs->setFetchMode(PDO::FETCH_ASSOC);?>
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl2kyOU9h-JjMqppMrstDLlDclvQc6MCk&callback=initMap"
  type="text/javascript"></script>
<script defer type="text/javascript">
$(document).ready(function(){setTimeout(function() { initialize(); }, 400);});
function initialize(){ var map; var bounds = new google.maps.LatLngBounds();
var mapOptions = { mapTypeId: 'roadmap' };
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
map.setTilt(45);  var markers = [<?php
while($rw= $Rs->fetch()){
?> ['<?php echo $rw['Location']; ?>', <?php echo $rw['Latitude']; ?>,<?php echo $rw['Longitude']; ?>], <?php
} ?>];
var infoWindowContent = [<?php 
$Sql ="CALL `SP_Web_Locations`('Select', '".$location_type."','')";
$Rs = $_Con->prepare($Sql);
$Rs->execute();
$Rs->setFetchMode(PDO::FETCH_ASSOC);
while($rw= $Rs->fetch()){ 
$Loc_Name=$rw['Location_DisplayName']; 
$add=json_encode($rw['Address']);
$add= str_replace('"', ' ', $add);
$add=explode(',',$add);
$add=implode('<br>',$add);
$add=json_encode($add);
$add=substr($add,1,strlen($add)-2);
$add=stripslashes($add);
$phone="<b>Phone : </b>".json_encode($rw['Mobile']);
$phone= str_replace('"', ' ', $phone);
$email="<b>Email : </b>".json_encode($rw['Email']);
$email= str_replace('"', ' ',$email);
?>['<div class="info_content">' +
'<strong><?php echo $Loc_Name; ?></strong>' +
'<p><?php echo $add; ?></p>' +
'<p><?php echo $phone; ?></p>' +
'<p><?php echo $email; ?></p>' +
'</div>'],<?php }?>];
var infoWindow = new google.maps.InfoWindow(), marker, i;
for( i = 0; i < markers.length; i++ ){
var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
bounds.extend(position);  marker = new google.maps.Marker({  position: position, map: map, title: markers[i][0]});
google.maps.event.addListener(marker, 'click', (function(marker, i) {
return function() { infoWindow.setContent(infoWindowContent[i][0]); infoWindow.open(map, marker);} })(marker, i));
map.fitBounds(bounds);}
var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event){
this.setZoom(9);google.maps.event.removeListener(boundsListener);});}</script>
<noscript>Your browser does not support JavaScript!</noscript>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
	
parent.document.getElementById("locations").style.display = "none";
});
</script>
</body>

<!-- team27:08-->
</html>