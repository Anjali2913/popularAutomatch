<?php 
session_start();
include('../class.dbcon.php');
$_Con=new Con;
if(isset($_REQUEST['logout']) && ($_REQUEST['logout']=='logout')){
	session_destroy();
	header('location:index.php');
	
}
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$Sql="CALL `SP_CP_Mas_Users_Login`('Login', ?, ?)";
$Rs= $_Con->prepare($Sql);	
$Rs->bindValue(1, $username,PDO::PARAM_STR);
$Rs->bindValue(2, $password,PDO::PARAM_STR);
$Rs->execute();
$Rs->setFetchMode(PDO::FETCH_ASSOC);
$rw1= $Rs->fetch();
	if($Rs->rowCount() > 0)
	{

		$_SESSION['user'] = $rw1['Name'];	
		header('location:home.php');

	}
	else
	{
		echo "<script type='text/javascript'>alert('Login Failed. Please try again');</script>";	 
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- about27:04-->
<head>
<meta charset="utf-8">
<title>Popular Automatch | Login</title>
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
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!--Page Title-->
    
    <!--End Page Title-->

     <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
				<div class="column col-lg-3 col-md-12 col-sm-12"></div>
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    <div class="logo-box">
                    <div class="logo" align="center"><a href="index.php">
                    <img src="../image/logo.webp" alt="" title=""></a>
                    </div>
              		</div>
                    <h2 align="center"> Control Panel</h2>
                    <!-- Login Form -->
                    <div class="login-form">
                        <!--Login Form-->
                        <form method="post" action="index.php">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Enter Your Password</label>
                                <input type="password" name="password" required>
                            </div>
                            
                            <div class="clearfix">                               
                                <div class="pull-right">
                                    <div class="form-group no-margin">
                                        <input class="theme-btn btn-style-one" value="LOGIN" type="submit" name="submit">
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