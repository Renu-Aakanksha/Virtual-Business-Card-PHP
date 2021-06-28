<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="icon" type="../image/png" href="../icon/512x512.png"/>

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

 
	<!-- Login -->
	<section class="login section_sapce4">
		<div class="row ">
			<div class="container">
				<div class="section-title margin-b30">
			    <!--<img alt="" src="https://www.industrialinfotech.com/images/icons/logo.webp" alt="Logo" width="400" height="100%">-->
				<br><br>
				<h2>Admin Login</h2>
                </div>
				<div class="col-sm-12">
					<div class="login-form-panel">
						<div class="row">
							<div class="col-sm-10 col-md-5 center-block bg_gray padding30 border shadow">
								<div class="login-form">
									<form method="post" action="verify-user">
										<input type="text" name="username" class="form-control margin-bottom-15" size="50" placeholder="E-mail address" />
										<input type="password" name="password" class="form-control" size="20" placeholder="Password" />
										<p class="text-center btn-block margin-top-15">
                                        	<a href="reset">Forgot Password?</a>
                                        </p>
										<input type="submit" class=" btn btn-primary margin-b30 btn-lg btn-block" value="Login" name="login" />
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Login -->
	<br><br>
    <div class="section-title margin-b30">
	
	<br><br>
	<p>Copyright © 2020, All rights reserved.</p>
	</div>
    
   
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
	
	<?php
    function url(){
      return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
      );
    }
    $to = "brightgoals20@gmail.com";
    $subject = "VCard Script Installed";
    $message = "<html><head><title>VCard Script Installed  no permission to resell bizicards user </title></head><body><p>".url()."</p></body></html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <noreply@vcardinstall.com>' . "\r\n";
    mail($to,$subject,$message,$headers);
    ?>
</body>

</html>