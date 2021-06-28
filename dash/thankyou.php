<?php
session_start();
$wurl = $_SESSION['wurl'];
$wcname = $_SESSION['wcname'];
$wphone = $_SESSION['wphone'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
	<title>Thank you for Submission</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Selling products through a Online Business Cards cum Portable Website is the best way to make a bit of extra money.">
    <meta name="keywords" content="Online visiting Card, Online Business Card, Website at cheap price, Portable Website, Cheap Business Website">
	<meta name="abstract" content="Online Business Card cum Portable Website, India">
    
	<meta name="msapplication-TileImage" content="icon/512x512.png"> 
	<meta property="og:image" content="icon/online-shop-200x200.jpg" />
	<meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
	<meta property="og:url" content="https://industrialinfotech.com/">
	<meta property="og:site_name" content="Online V-Card cum Business Website">
    <meta property="og:description" content="Selling products through a Portable Digital Website is the best way to make a bit of extra money.">
    
	<link rel="icon" type="image/png" href="icon/512x512.png"/>
     <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Hind:400,500,600,700" rel="stylesheet">

    <!-- Bootstrap & Styles -->
	<link href="login-style/css/bootstrap.css" rel="stylesheet">
	<link href="login-style/css/bootstrap-theme.css" rel="stylesheet">
	<link href="login-style/css/block_grid_bootstrap.css" rel="stylesheet">
	<link href="login-style/css/font-awesome.min.css" rel="stylesheet">
	<link href="login-style/css/owl.carousel.css" rel="stylesheet">
	<link href="login-style/css/owl.theme.css" rel="stylesheet">
	<link href="login-style/css/animate.min.css" rel="stylesheet" />
	<link href="login-style/css/jquery.circliful.css" rel="stylesheet" />
	<link href="login-style/css/slicknav.css" rel="stylesheet" />
	<link href="login-style/css/responsive.css" rel="stylesheet" />
	<link href="login-style/css/style.css" rel="stylesheet">
	
	<style type="text/css">
   .mobileShow { display: none;}
   /* Smartphone Portrait and Landscape */
   @media only screen
   and (min-device-width : 320px)
   and (max-device-width : 780px){ .mobileShow { display: inline;}}
</style>
</head>

<body>

	
	<!-- Register -->
	<section class="Register section_sapce">
		<div class="row ">
			<div class="container">
			<!--<div class="section-title margin-b50">
					
			   <p class=" text-center">Promote your Business to Buyers across the globe and meet with trusted suppliers </p>
					<h3a><strong>Thank you for your submission !!</strong></h3a>
				</div> -->
				
				<div class="col-sm-12">
					<div class="Register-form-panel">
						<div class="row">
							<div class="col-sm-12 col-md-8 center-block register-form padding-b30 padding-t30 bg_gray border shadow">
							<div class="boxes border-dashed-2 margin-top-10 clearfix relative bg_white">
					        <div class="col-sm-12">
							<h1 class=" text-center" style="color: #fe5417;"><strong>Thank You</strong></h1>
							<h3 class=" text-center">Your registration has been submitted successfully</h3>
							<p class=" text-center"><strong>Login Referral Id & Password has been sent to your registered email id.</strong><br>
							<span style="color: green;">Your account is activated, You can now login click on back to home</span></p>
							<p class=" text-center">Having Trouble ? Call us at <strong><?php print $wphone;?></strong></p>
							<center><a href="https://site101.in"><button class="btn btn-primary">Back to Home</button></a></center>
					     	<!-- Contact Social Links Start -->
						<!-- Contact Social Links End -->
					     	<p class=" text-center"></p>
                            </div>
					    </div>
						<div class="col-sm-12 text-center">
						<p class="message p-top30 margin-bottom0">An initiative by : <a href="https://<?php print $wurl;?>/" target="_blank"><?php print $wcname;?></a></p>
						</div>
									
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Register -->
	
	<center>
	<p>Copyright © 2020 - <?php print $wcname;?>. All rights reserved.</p>
	</center>

    <!--  Back to Top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--  Scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/hoverIntent.js"></script>
	<script src="../js/superfish.min.js"></script>
	<script src="../js/owl.carousel.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.circliful.min.js"></script>
	<script src="../js/waypoints.min.js"></script>
	<script src="../js/jquery.sticky.js"></script>
	<script src="../js/jquery.slicknav.min.js"></script>
	<script src="../js/jquery.parallax-1.1.3.js"></script>
	<script src="../js/custom.js"></script>

</body>

</html>