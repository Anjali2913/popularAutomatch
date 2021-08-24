<?php 
include('class.dbcon.php');
$_Con=new Con;
?>
<!DOCTYPE html>
<html lang="en">

<!-- about27:04-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Service Booking</title>
<meta name="description" content="Be it mechanical repair, engine or paint work our team is well trained mechanics and body technicians that work under the supervision of a dedicated team. Car refurbishment and detailing team to make your car look as good as new. Single panel painting and small scratch repairs to make it look like it never happened">
<meta name="keywords" content="Break down repairs,Car not starting,Car Accident repairs,Scratch removal,Dent repair,Car painting,Multi brand car repairs,Mechanical repairs,Car electrical repairs,Tyre replacement,Car alignment check.">
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
                    <h1>Service Booking</h1>
                   <!-- <span class="title">The Interior speak for themselves</span>-->
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Service Booking</li>
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
                <div class="form-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">Enquiry</span>
                            <h2>Service Booking</h2>
                        </div>
						<div class="text"><p>Our mission is to be a ‘One Stop Solution for any car on the road’, be it mechanical repairs, break-down repairs, accident repairs, car refurbishment or car detailing. Going beyond limits of make, brand, age or condition of the car while always guaranteeing quality.
Popular Automatch is a customer driven automobile workshop, where we understand our customer’s needs better than anyone else. So we undertake the repairs of the car depending on our customer needs without compromising on the basics - Quality & Safety.</p><br></div>
                        <div class="contact-form">
                            <form method="post" action="form_submit.php?enquiry_on=Service Booking" target='formresponse' id="form_submit" onSubmit="document.getElementById('submit').disabled = true;">
                             	 <div class="row">
                              	 <div class="col-lg-6 col-md-6 col-sm-12">
                               
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="name" id="name" placeholder="Name *" required="">
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" id="mobile" name="mobile" maxlength="10" placeholder="Mobile * (10 Digit Mobile Number)" required="">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,3}$"  name="email" id="email" placeholder="Email *" required="">
                                    </div>

                                  <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="address" onpaste="return false;"  placeholder="Address" required></textarea>
                                    </div>                                  
                                  <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" id="pincode" name="pincode" maxlength="6" placeholder="Pincode"  required/>
                                   </div>
                                   
                                  <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                  <input placeholder="Vehicle Registration Number (Eg: AA-01-AA-7889) *" type="text"  name="veh_reg_no" id="veh_reg_no" required pattern="[A-Za-z]{2}-[0-9]{2}-[A-Za-z]{1,}-[0-9]{1,}" title="Eg: AA-01-AA-7889" maxlength="13"> 
                                  
                                  </div>
                                  
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
						 <select name="brand" id="brand" required onChange="get_model(this.value)">
						 <option value="" disabled selected>Choose Brand *</option>
								<?php

								$Sql2 ="CALL `SP_Web_Mas_Vehicle_Model`('Select_Brand', '', '')";						
								$Rs = $_Con->prepare($Sql2);
								$Rs->execute();
								$Rs->setFetchMode(PDO::FETCH_ASSOC);										
								while($rw2 = $Rs->fetch())
								{ 
								?>
									<option value="<?php echo $rw2['Veh_Brand_ID'] ?>"><?php echo $rw2['Brand_Name']; ?></option>
								<?php

								}
								?>
						 </select>
                        </div>
                     </div>	 
                      <div class="col-lg-6 col-md-6 col-sm-12">      
                        <div class="form-group col-lg-12 col-md-12 col-sm-12" id="txtModel">
						 <select name="model" id="model" required>
						 <option value="" disabled selected>Choose Model *</option>
						 </select>
                        </div>
								
                        
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                           <input type="text" id="km_run" name="km_run" placeholder="Kilometer Run" required/>
						</div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                           <textarea name="message" onpaste="return false;"  placeholder="Message"></textarea>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                         <select  name="service_type" required>
							<option value="" disabled selected>Choose type of service</option>
                            <option value="Repairs and Complaint fixing">Repairs and Complaint fixing</option>
                            <option value="Accident Repairs and Painting">Accident Repairs and Painting</option>
                            <option value="Others">Others</option>                           
                         </select>
 						</div>                                  
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <input type="text" id="date" name="date" placeholder="Prefered Service Date (DD-MM-YYYY)" required/>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                             <input type="text" id="time" name="time" placeholder="Prefered Time (HH:MM am|pm)"  required/>
                        </div>                                   
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
						 <select name="location" id="location" required>
						 	<option value="" disabled selected>Choose One Prefered Location *</option>
								<?php
								$Sql2 ="CALL `SP_Web_Locations`('Select', 'Service','')";
								$Rs = $_Con->prepare($Sql2);
								$Rs->execute();
								$Rs->setFetchMode(PDO::FETCH_ASSOC);										
								while($rw2 = $Rs->fetch())
								{ 
								?>
									<option value="<?php echo $rw2['ID'] ?>"><?php echo $rw2['Location_DisplayName']; ?></option>
								<?php

								}
								?>
						 </select>
                        </div>
                                   
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <button class="theme-btn btn-style-three" type="submit" name="submit-form" id="submit">Submit</button>
                        </div>
                        <iframe name='formresponse'  frameborder='0' id="formresponse" scrolling="no"  onload="resizeIframe(this);"></iframe>
								   </div>
								</div>
                            </form>
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
<script>
    function get_model(str){
	if(str==""){
	document.getElementById("txtModel").innerHTML="";
	displayRecords(10, 1);
	return;}
	if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("txtModel").innerHTML=xmlhttp.responseText;}}
	xmlhttp.open("GET","ajax_model.php?model="+str,true);
	xmlhttp.send();
	}
</script>
</body>

<!-- contact27:43-->
</html>