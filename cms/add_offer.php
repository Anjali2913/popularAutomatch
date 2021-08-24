<?php 
session_start();
include('../class.dbcon.php');
$_Con=new Con; $Ofr_Id=0;
if(!isset($_SESSION['user'])){	
	header('location:index.php');	
}
if(isset($_POST['submit']) && ($_POST['submit']!='')){
	
	$ofr_type = $_POST['ofr_type'];
	$location = $_POST['location'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$valid_from = $_POST['valid_from'];
	$valid_to = $_POST['valid_to'];
	
	$picture = '';
	$picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
	$Sql ="CALL `SP_CP_Schemes_Offers`('Insertion', '$location','$title', '$description', '$picture', '$valid_from', '$valid_to ', '$ofr_type')";
	$Rs = $_Con->prepare($Sql);				
	$Result = $Rs->execute();
	//$Rs->setFetchMode(PDO::FETCH_ASSOC);										
	//$rows = $Rs->fetch();
	//$Ofr_Id=$rows['Ofr_Id'];
	header('location:view_all_offer.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- about27:04-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Offers </title>
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
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
				<div class="column col-lg-3 col-md-12 col-sm-12"></div>
                <div class="column col-lg-6 col-md-12 col-sm-12">
                   
                    <h2>Add Offer Details</h2>
                    
                    <!-- Login Form -->
                       <div class="contact-form">
                        <!--Login Form-->
                        <form method="post" action="add_offer.php" enctype="multipart/form-data">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                         <select  name="ofr_type" required onChange="get_location(this.value)">
							<option value="" disabled selected>Choose One *</option>
                            <option value="Sales">Showroom</option>
                            <option value="Service">Service</option>                       
                         </select>
 						</div> 
                        <div class="form-group col-lg-12 col-md-12 col-sm-12" id="txtLoc">
						 <select name="location" id="location" required>
						 	<option value="" disabled selected>Choose One Prefered Location *</option>
								<?php
								$Sql2 ="CALL `SP_Web_Locations`('Select_Location', '','')";
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
                            <input type="text" name="title" id="title" placeholder="Title *" required="">
                        </div>
                         <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <input type="text" name="description" id="description" placeholder="Description *" required="">
                         </div>
                           <div class="form-group col-lg-12 col-md-12 col-sm-12">
                           <label>Valid From  :  </label>
                            <input type="date" name="valid_from" id="valid_from" placeholder="Valid From *" required="">
                         </div>
                           <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label>Valid To  :  </label>
                            <input type="date" name="valid_to" id="valid_to" placeholder="Valid To *" required="">
                         </div>
                           <div class="form-group col-lg-12 col-md-12 col-sm-12">
                           
                            <input type="file" name="picture" id="picture" placeholder="Upload Picture *" required="">
                         </div>
                            <div class="clearfix">                               
                                <div class="pull-right">
                                    <div class="form-group no-margin">
                                        <input class="theme-btn btn-style-one" type="submit" value="SUBMIT" name="submit">
                                    </div>
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <!--End Login Form -->
                </div>
                
              <div class="column col-lg-3 col-md-12 col-sm-12"></div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
    

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
<script>
    function get_location(str){
	if(str==""){
	document.getElementById("txtLoc").innerHTML="";
	return;}
	if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("txtLoc").innerHTML=xmlhttp.responseText;}}
	xmlhttp.open("GET","ajax_location.php?type="+str,true);
	xmlhttp.send();
	}
</script>
</body>

<!-- about27:05-->
</html>
