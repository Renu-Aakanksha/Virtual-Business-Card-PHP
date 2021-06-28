<?php
include('db.php');
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $ccat = $_POST['cat'];
    $tagline = $_POST['tagline'];
    $mobil = $_POST['mobile'];
    $wmobil = $_POST['wmobile'];
    $aadhaar = $_POST['aadhaar'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = md5($pass);
    $datea = date("d/m/Y");
    $dater = date('d/m/Y', strtotime('+1 years'));
    $lcpre = "LCKY".rand(1000000000,9999999999);
    
    $pcapcm = $_POST['cm'];
    $pcapcw = $_POST['cw'];
    
    $mobile = $pcapcm.$mobil;
    $wmobile = $pcapcw.$wmobil;
    
    $pcal1 = $_POST['cal1'];
	$pcal2 = $_POST['cal2'];
	$pcap = $_POST['cap'];
	
	$calcap = $pcal1 + $pcal2;
	
	function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

	$cleanstr = clean($cname);
	$curll = strtolower($cleanstr);
	
	if($calcap == $pcap){
	    
	}
	else {
	    echo "<script>alert('Sorry! Invalid Capture.'); window.location='register'</script>";
        die();
	}
    
    $owners_data = $con->query("SELECT * FROM `owners` ORDER BY `id` DESC LIMIT 1");
    if($owners_data->num_rows > 0){
        $ownfe = $owners_data->fetch_assoc();
        $ownid = $ownfe['id'];
        $oemail = $ownfe['email'];
        $genid = $ownid+1;
    }
    if($email == $oemail){
        echo "<script>alert('Sorry! This email is already registered.'); window.location='register'</script>";
        die();
    }
    
    //adding data to database
    if($email != $oemail){
        $zeroval = 0;
        $stmt = $con->prepare("INSERT INTO `owners`(`id`, `name`, `address`, `cname`, `url`, `category`, `tagline`, `mobile`, `whatsapp`, `email`, `password`, `aadhaar`, `status`, `datee`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssiisssis",$genid,$name,$address,$cname,$curll,$ccat,$tagline,$mobile,$wmobile,$email,$password,$aadhaar,$zeroval,$datea);
        $stmt->execute();
        $stmt->close();
        
        $stmt = $con->prepare("INSERT INTO `renewal`(`datee`, `rdatee`, `cust`, `lkey`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssis",$datea,$dater,$genid,$lcpre);
        $stmt->execute();
        $stmt->close();
        
        echo "<script>alert('Registration Successful.'); window.location='thanks'</script>";
    }
    else {
        echo "<script>alert('Sorry! This email is already registered.'); window.location='register'</script>";
        die();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>Registration for Online Business Cards cum Portable Website</title>
	
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
</head>

<body>

 
	<!-- Login -->
	<section class="login section_sapce4">
		<div class="row ">
			<div class="container">
				<div class="section-title margin-b30">
			    <!-- <img alt="" src="images/bright.jpg" alt="Logo" width="400" height="100%">
				  <br><br> -->
				  <br>
				  <p>An initiative by : <span style="font-size:24px;"><a href="https://industrialinfotech.com/" target="_blank">Industrial Infotech</a></span></p>
				  <h3>Registration for</h3>
				  <h2>Interactive B-Cards <span>+ Portable Website<span></h2>
                 </div>
				
				<div class="col-sm-6">
						<div class="col-sm-12 m-top40">
						<div class=" section-title" >
						<h3 style="color: #fe5417;">GROW YOUR BUSINESS WITH ONE CARD</h3> 
						<p align="justify"><strong>Handshakes and paper business cards are no longer acceptable in the world post COVID19.</strong></p>
                        
						<p style='text-align:justify'; style="float:left">
						No matter if you are a Photographer, Salesman, Network Marketer, Real Estate Agent, Serviceman, Musician, Small Business Owner, Entrepreneur, etc…. 
						<strong>Online Business Card with Portable Website</strong> can help you to connect with your customers in a whole new way !
						</p>
						<p style='text-align:justify'; style="float:left">
						Equip your staff with <strong>Online Business Card with Portable Website</strong> they can safely share with your prospects and clients when 
						meeting in person, or over zoom, teams and teleconferences.
						</p>
						<p style='text-align:justify'; style="float:left">
						Switch to <strong>Interactive Business Cards</strong> and impress the people you meet by sharing your professional
						or personalized content details in a single view. 
						</p>
						
						<p style='text-align:center';">
					<a href="how-it-works" target="_blank" class="btn btn-lg btn-new">How it Works?</a>
						</p>
						<p style='text-align:left'> <strong>Introducing Features :</strong></p>
							<ul class="list3" style='text-align:left'>
								<li><i class="fa fa-check"></i>100% digitalized and eco-friendly</li>
								<li><i class="fa fa-check"></i>Replacement to paper business cards</li>
								<li><i class="fa fa-check"></i>Recipients can save your Contact !</li>
								<li><i class="fa fa-check"></i>Can whatsapp you without saving your number !</li>
								<li><i class="fa fa-check"></i>People can Share or Forward your Business Card</li>
								<li><i class="fa fa-check"></i>Fast forward, Saves time and money</li>
								<li><i class="fa fa-check"></i>Click, Call or Email and Business !</li>
								<li><i class="fa fa-check"></i>Click to Website, Navigate</li>
								<li><i class="fa fa-check"></i>Easy Contact & Lead Capture Form</li>
								<li><i class="fa fa-check"></i>Product / Service introduction with Gallery</li>
								<li><i class="fa fa-check"></i>24 X 7 X 365 in pocket</li>
								<li><i class="fa fa-check"></i>User friendly and change as per requirement</li>		
					
						</div>
						</div>
						</div>
				    
				    
				    <div class="col-sm-6">
					<div class="login-form-panel">
						<div class="row">
							<div class="center-block bg_gray padding30 border shadow">
								<div class="login-form">
									<form method="post">
									    <input type="text" name="name" class="form-control margin-bottom-15" size="50" placeholder="Contact Person" required="true" />
									    
                      <input type="text" name="address" class="form-control margin-bottom-15" size="50" placeholder="Office Address" required="true" />
									    
                      <input type="text" name="cname" class="form-control margin-bottom-15" size="50" placeholder="Business Name" required="true" />

                      <input type="text" name="cat" class="form-control margin-bottom-15" size="50" placeholder="Nature Of Business" required="true" />

                      <input type="text" name="tagline" class="form-control margin-bottom-15" size="50" placeholder="Business Caption/Tag Line" required="true" />
									    
									    <input style="width:15%;display:inline-block;" type="text" name="cm" class="form-control margin-bottom-15" size="50" value="91" required="true"/>
									    <input style="width:83%;display:inline-block;" type="text" name="mobile" class="form-control margin-bottom-15" size="50" placeholder="Mobile Number" required="true"  maxlength="10"/>
									    
									    <input style="width:15%;display:inline-block;" type="text" name="cw" class="form-control margin-bottom-15" size="50" value="91" required="true"/>
									    <input style="width:83%;display:inline-block;" type="text" name="wmobile" class="form-control margin-bottom-15" size="50" placeholder="Whatsapp Number"  required="true" maxlength="10"/>
									    
									    <input type="text" name="aadhaar" class="form-control margin-bottom-15" size="50" placeholder="Aadhaar Card" maxlength="12"/>
										<input type="text" name="email" class="form-control margin-bottom-15" size="50" placeholder="E-mail address" required="true" />
										<input type="password" name="password" class="form-control" size="20" placeholder="Password" required="true" /><br>
										<?php
										$cal1 = rand(1,10);
										$cal2 = rand(1,10);
										?>
										<input type="hidden" name="cal1" value="<?php echo $cal1;?>" />
										<input type="hidden" name="cal2" value="<?php echo $cal2;?>" />
										<div>
										<span style="display:inline-block; color: red;"><?php echo $cal1;?> + <?php echo $cal2;?> </span> = <input type="text" name="cap" class="form-control" style="width:70%; display:inline-block; size="20" placeholder="Enter Capture" />
										</div>
										<p class="text-center btn-block margin-top-15">
                                        	Already have account?<a href="login"> Click here to login</a>
                                        </p>
										<input type="submit" class=" btn btn-primary margin-b30 btn-lg btn-block" value="Register" name="register" />
										
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
	<center>
	<p>Copyright © 2020 - Industrial Infotech. All rights reserved.</p>
	</center>
    
   
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
	
	<script>
      document.querySelector('.sweet-1').onclick = function(){
        swal("Here's a message!");
      };

      document.querySelector('.sweet-2').onclick = function(){
        swal("Here's a message!", "It's pretty, isn't it?")
      };

      document.querySelector('.sweet-3').onclick = function(){
        swal("Good job!", "You clicked the button!", "success");
      };

      document.querySelector('.sweet-4').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false,
          //closeOnCancel: false
        },
        function(){
          swal("Deleted!", "Your imaginary file has been deleted!", "success");
        });
      };

      document.querySelector('.sweet-5').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
      };

      document.querySelector('.sweet-6').onclick = function(){
        swal({
          title: "Sweet!",
          text: "Here's a custom image.",
          imageUrl: 'assets/thumbs-up.jpg'
        });
      };

      document.querySelector('.sweet-7').onclick = function () {
        swal({
          title: "An input!",
          text: "Write something interesting:",
          type: "input",
          showCancelButton: true,
          closeOnConfirm: false,
          animation: "slide-from-top",
          inputPlaceholder: "Write something"
        }, function (inputValue) {
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
          }
          swal("Nice!", "You wrote: " + inputValue, "success");
        });
      };

      document.querySelector('.sweet-8').onclick = function () {
        swal({
          title: "Ajax request example",
          text: "Submit to run ajax request",
          type: "info",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        }, function () {
          setTimeout(function () {
            swal("Ajax request finished!");
          }, 2000);
        });
      };

      document.querySelector('.sweet-10').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: 'btn-primary',
          confirmButtonText: 'Primary!'
        });
      };

      document.querySelector('.sweet-11').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: 'btn-info',
          confirmButtonText: 'Info!'
        });
      };

      document.querySelector('.sweet-12').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "success",
          showCancelButton: true,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
        });
      };

      document.querySelector('.sweet-13').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-warning',
          confirmButtonText: 'Warning!'
        });
      };

      document.querySelector('.sweet-14').onclick = function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "error",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Danger!'
        });
      };
    </script>
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>
</body>

</html>