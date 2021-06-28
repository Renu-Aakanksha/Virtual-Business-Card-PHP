<!DOCTYPE html>
<html lang="en">

<head>
	
<title>Visit Pocket E-commerce Store</title>
	  
<?php include('links.php');?>

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
</head>

<body>
	<div class="row">
	<div class="container">
	<div class="col-sm-12">
					<ul class="nav nav-pills pull-right">
					<li > <a href="visit-store" target="_blank"><i aria-hidden="true" class="fa fa-shopping-cart"></i> Visit Store</a> </li>
					<!--<li > <a href="home/index" target="_blank"><i aria-hidden="true" class="fa fa-sign-in"></i> Get In</a> </li>-->
					</ul>
				</div>
			</div>
		</div>
	</div><!--End Main Menu-->
	<!-- Login -->
	<section class="login ">
		<div class="row ">
			<div class="container">
				<div class="section-title margin-b30">
			    <img alt="" src="images/bright.jpg" alt="Logo" width="400" height="100%">
                </div>
				
				
				<?php
include('../db.php');
session_start();
?>
<?php
if(isset($_POST['visit'])){
    $storeid = $_POST['storeid'];
    echo "<script>window.location='https://brightgoals.in/shop/index?s=".$storeid."';</script>";
}
echo ' 
<div class="col-sm-12">
					<div class="login-form-panel">
						<div class="row">
							<div class="col-sm-10 col-md-5 center-block padding20 border">
							   <h4>Visit my Pocket E-commerce Store</h4>
								<div class="login-form">
									<form method="post">
										<input type="text" name="storeid" class="form-control margin-bottom-15" size="50" placeholder="Put Store Id" />
										<p class="text-center btn-block margin-top-15">
                                        </p>
										<input type="submit" class=" btn btn-primary margin-b30 btn-lg btn-block" value="Visit Store" name="visit" />
										
										<p>&nbsp;</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
 ';
    ?>
			
			</div>
		</div>
	</section>
	<!-- End of Login -->

   <br><br>
		
    <!--<div class="section-title margin-b30">
	<a href="http://industrialinfotech.com/pecomm.php" target="_blank"><img src="http://industrialinfotech.com/images/pecomm-banner.webp" alt="Banner" width="100%" height="200"></a>
	<br><br>
	<p>Copyright © 2020 - Project by : Industrial Infotech, All rights reserved.</p>
	</div>-->
    
   
    <!--  Back to Top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--  Scripts -->
	<script src="login-style/js/jquery.min.js"></script>
	<script src="login-style/js/bootstrap.min.js"></script>
	<script src="login-style/js/hoverIntent.js"></script>
	<script src="login-style/js/superfish.min.js"></script>
	<script src="login-style/js/owl.carousel.js"></script>
	<script src="login-style/js/wow.min.js"></script>
	<script src="login-style/js/jquery.circliful.min.js"></script>
	<script src="login-style/js/waypoints.min.js"></script>
	<script src="login-style/js/jquery.sticky.js"></script>
	<script src="login-style/js/jquery.slicknav.min.js"></script>
	<script src="login-style/js/jquery.parallax-1.1.3.js"></script>
	<script src="login-style/js/custom.js"></script>
	
	
</body>

</html>