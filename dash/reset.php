<?php
include('db.php');
include('../session.php');

$wurl = $_SESSION['wurl'];
$wemail = $_SESSION['wemail'];

if(isset($_POST['send'])){
    $email = $_POST['email'];
    $squ = "SELECT * FROM `owners` WHERE `email`='$email'";
    $sqdata = $con->query($squ);
    if($sqdata->num_rows > 0){
        $sqrow = $sqdata->fetch_assoc();
        $ids = $sqrow['id'];
        $rid = "RESET958869SETNEW";
    }
    else {
        echo "<script>alert('Sorry, This email is not linked with any account'); window.location='../';</script>";
        die();
    }
    
    $to = $email;
    $subject = 'Password Reset';
    $from = "support@".$wurl;
     
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
     
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h2 style="color:#000;">Forgot your password ?</h2>';
    $message .= '<h3 style="color:#f40;">Don ot worry, we have got your back.</h3>';
    $message .= '<p style="color:#080;font-size:18px;">Click here : <a href="https://'.$wurl.'/dash/security?id='.$ids.'&se='.$rid.'">Reset my password</a></p>';

    $message .= '<p style="color:#000;">If you received this message by mistake, ignore this email.</p>';
    
    $message .= '<p style="color:#000;">- The <strong>'.$wurl.'</strong> (Store Owner)  Team</p>';
    $message .= '</body></html>';
     
    // Sending email
    $sents = mail($to, $subject, $message, $headers);
    if($sents){
        echo "<script>alert('Email sent successfully, please check your inbox.'); window.location='../';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

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
			   
				<br><br>
				<h2>Reset Password</h2>
                </div>
				<div class="col-sm-12">
					<div class="login-form-panel">
						<div class="row">
							<div class="col-sm-10 col-md-5 center-block bg_gray padding30 border shadow">
								<div class="login-form">
									<form method="post">
										<input type="text" name="email" class="form-control margin-bottom-15" size="50" placeholder="E-mail address" />
										
										<input type="submit" class=" btn btn-primary margin-b30 btn-lg btn-block" value="Send" name="send" />
										<br>
										<a href="login">Back To Login</a>
										
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