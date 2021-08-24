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
   <!-- <div class="preloader"></div>-->
    
    <!-- Main Header-->
 	<?php include('header.php');?>
    <!--End Main Header -->
    <!--Page Title-->
    
    <!--End Page Title-->

    
     <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">
            <!--Cart Outer-->
            <div class="cart-outer">
               
                <div class="cart-options clearfix">
                   

                    <div class="pull-right">
                        <a href="add_offer.php"> <button type="button" class="theme-btn cart-btn">Add Offers</button></a>
                    </div>
                </div>
               
                <div class="table-outer">
                   
                    <?php
								$Sql2 ="CALL `SP_CP_Schemes_Offers`('view_all', '', '', '', '', '', '', '')";
								$Rs = $_Con->prepare($Sql2);
								$Rs->execute();
								$Rs->setFetchMode(PDO::FETCH_ASSOC);
								if($Rs->rowCount()>0){ ?>
                   
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Offer Type</th>
                                <th class="prod-column">Image</th>
                                <th>Digital Marketing Url</th>
                            </tr>
                        </thead>            
                          
							<tbody>
							<?php while($rw2 = $Rs->fetch()){ ?>
                            <tr>
                               <td><h4 class="prod-title"><?php echo $rw2['Title'];  ?></h4></td>
                               <td><?php echo $rw2['Description'];  ?></td>
                               <td><?php echo $rw2['Location_DisplayName'];  ?></td>
                               <td><?php echo $rw2['Schemes_Offers_For'];  ?></td>
                               <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><img src="data:image/jpeg;base64,<?php echo  base64_encode( $rw2['Picture'] ); ?>" alt="Automath Offers"></figure> 
                                    </div>
                               </td>
                               <?php
									$Offer_ID=base64_encode($rw2['ID']);
									$Ofr_Type=base64_encode($rw2['Schemes_Offers_For']);
									$Source=base64_encode('DM');?>                                
                                <td>https://popularautomatch.com/view_offer.php?T2ZmZXJfSUQ=<?php echo $Offer_ID; ?>&T2ZyX1R5cGU=<?php echo $Ofr_Type; ?>&U291cmNl=<?php echo $Source; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                     <?php } else{ ?>
						<p>The offers are being updated. Please check after sometime.</p>	
						 <br><br><br><br><br><br>
					<?php } ?>
                </div>

            </div>
           
        </div>
       <br><br><br>
    </section>
    <!--End Cart Section-->
    

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