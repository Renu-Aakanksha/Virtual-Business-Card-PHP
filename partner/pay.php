<?php
use Razorpay\Api\Api;
include('../dash/db.php');
require('../config.php');
require('../razorpay-php/Razorpay.php');

if(isset($_POST['register'])) {
    $namec = $_POST['wallb'];
    
if (!empty($namec)){
    $ssprice = $namec;
}else{
    echo "<script>window.location='/'</script>";
}

$_SESSION['add_wall'] = $namec;

$usernv = $_SESSION['partner'];

$qe = "SELECT * FROM `reseller` Where reseller.id = '$usernv' Limit 1";
$data = $con->query($qe);
if($data->num_rows > 0){
    $rows = $data->fetch_assoc();
    $name = $rows['name'];
    $cname = $rows['cname'];
    $email = $rows['email'];
    $mobile = $rows['mobile'];
    $address = $rows['address'];
}


// Create the Razorpay Order
$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $ssprice * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $name,
    "description"       => $cname,
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $name,
    "email"             => "",
    "contact"           => "",
    ],
    "notes"             => [
    "address"           => $address,
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
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
	<link href="../dash/login-style/css/bootstrap.css" rel="stylesheet">
	<link href="../dash/login-style/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../dash/login-style/css/block_grid_bootstrap.css" rel="stylesheet">
	<link href="../dash/login-style/css/font-awesome.min.css" rel="stylesheet">
	<link href="../dash/login-style/css/owl.carousel.css" rel="stylesheet">
	<link href="../dash/login-style/css/owl.theme.css" rel="stylesheet">
	<link href="../dash/login-style/css/animate.min.css" rel="stylesheet" />
	<link href="../dash/login-style/css/jquery.circliful.css" rel="stylesheet" />
	<link href="../dash/login-style/css/slicknav.css" rel="stylesheet" />
	<link href="../dash/login-style/css/responsive.css" rel="stylesheet" />
	<link href="../dash/login-style/css/style.css" rel="stylesheet">
	
	<style type="text/css">
   .mobileShow { display: none;}
   /* Smartphone Portrait and Landscape */
   @media only screen
   and (min-device-width : 320px)
   and (max-device-width : 780px){ .mobileShow { display: inline;}}
   
   .razorpay-payment-button{
        background: #fe5417;
        color: #fff;
        border: 1px solid #fe5417;
        padding: 8px 26px !important;
        line-height: 1.3333333;
        margin-bottom: 2px;
        text-shadow: none;
        padding: 6px 22px;
        transition: all .3s;
        position: relative;
        overflow: hidden;
        font-size: 16px;
        padding: 8px 26px !important;
        font-size: 15px;
        line-height: 1.3333333;
        margin-bottom: 2px;
        margin: 0;
        font: inherit;
        box-sizing: border-box;
   }
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
					     	<div class="text-center">
					     		<form action="verify" method="POST">
                                  <script
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="<?php echo $data['key']?>"
                                    data-amount="<?php echo $data['amount']?>"
                                    data-currency="INR"
                                    data-name="<?php echo $data['name']?>"
                                    data-image="<?php echo $data['image']?>"
                                    data-description="<?php echo $data['description']?>"
                                    data-prefill.name="<?php echo $data['prefill']['name']?>"
                                    data-prefill.email="<?php echo $data['prefill']['email']?>"
                                    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                                    data-buttontext = "Pay Rs. <?php echo $ssprice; ?>";
                                    data-notes.shopping_order_id="3456"
                                    data-order_id="<?php echo $data['order_id']?>"
                                    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                                    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                                   >
                    			    </script>
                    		</div>
					     	<p class=" text-center"></p>
                            </div>
					    </div>
						<div class="col-sm-12 text-center">
						<p class="message p-top30 margin-bottom0">An initiative by : <a href="https://site101.in/" target="_blank">Site101</a></p>
						</div>
									
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
              <input type="hidden" name="shopping_order_id" value="3456">
              <input type="hidden" name="amount" value="<?php echo $ssprice; ?>">
            </form>
            
		</div>
	</section>
	<!-- End of Register -->
	
	<center>
	<p>Copyright © 2020 - Site101. All rights reserved.</p>
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
	<script src="../assets/assets_new/../js/jquery-3.5.0.min.js"></script>   
    <script>
        $(document).ready(function() {
            // $('input[value="Pay Now"]').addClass('btn btn-new btn-lg');
        });
    </script>
</body>

</html>

<?php

}else{
    echo "<script>window.location='/'</script>";
}

?>