<?php
use Razorpay\Api\Api;
include('dash/db.php');
require('config.php');
require('razorpay-php/Razorpay.php');

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $cat = $_POST['cat'];
    $tagline = $_POST['tagline'];
    $mobile = $_POST['mobile'];
    $wmobile = $_POST['wmobile'];
    $aadhaar = $_POST['aadhaar'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ref = $_POST['ref'];
    $theme = $_POST['theme'];


$owners_email = $con->query("SELECT id FROM `owners` where email = '$email' LIMIT 1");
if($owners_email->num_rows > 0){
    echo "<script>alert('Sorry! This email is already registered.'); window.location='form'</script>";
    die();
}


$ssprice = 200;


$qe = "SELECT partner FROM `admin` Limit 1";
$data = $con->query($qe);
$rows = $data->fetch_assoc();
$temp = $rows['partner'];
if (!empty($temp)){
    $reff = $temp;
    $qe = "SELECT price FROM `reseller` Where reseller.partner = '$reff' Limit 1";
    $data = $con->query($qe);
    if($data->num_rows > 0){
        $rows = $data->fetch_assoc();
        $temp = $rows['price'];
        if (!empty($temp)){
            $ssprice = $temp;
        }
    }
}

$p_es = false;

if (!empty($ref)){
    $qe = "SELECT price FROM `reseller` Where reseller.partner = '$ref' Limit 1";
    $data = $con->query($qe);
    if($data->num_rows > 0){
        $p_es = true;
        $rows = $data->fetch_assoc();
        $temp = $rows['price'];
        if (!empty($temp)){
            $ssprice = $temp;
        }
    }
}

if ($p_es) {
$date = date("d/m/Y");
$qe = "SELECT price FROM `admin` Limit 1";
$data = $con->query($qe);
$rows = $data->fetch_assoc();
$temp = $rows['price'];

$temp = $ssprice - $temp;
$sts = 0;

$que = "INSERT INTO `credits`(`partner`, `amount`, `date`, `status`) VALUES ('$ref', '$temp', '$date', $sts)";
$data_insert = $con->query($que);

}

// Create the Razorpay Order
$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $ssprice * 100, //  rupees in paise
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

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $name,
    "description"       => $cname,
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $mobile,
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
	<link href="dash/login-style/css/bootstrap.css" rel="stylesheet">
	<link href="dash/login-style/css/bootstrap-theme.css" rel="stylesheet">
	<link href="dash/login-style/css/block_grid_bootstrap.css" rel="stylesheet">
	<link href="dash/login-style/css/font-awesome.min.css" rel="stylesheet">
	<link href="dash/login-style/css/owl.carousel.css" rel="stylesheet">
	<link href="dash/login-style/css/owl.theme.css" rel="stylesheet">
	<link href="dash/login-style/css/animate.min.css" rel="stylesheet" />
	<link href="dash/login-style/css/jquery.circliful.css" rel="stylesheet" />
	<link href="dash/login-style/css/slicknav.css" rel="stylesheet" />
	<link href="dash/login-style/css/responsive.css" rel="stylesheet" />
	<link href="dash/login-style/css/style.css" rel="stylesheet">
	
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
							
            
            <br>
            <form action="freeday.php" method="post">
                <input type="hidden" name="shopping_order_id" value="3456">
                <input type="hidden" name="theme" value="<?php echo $theme;?>">
                <input type="hidden" name="name"  value="<?php echo $name;?>">
                <input type="hidden" name="mobile" value="<?php echo $mobile;?>">
                <input type="hidden" name="wmobile"  value="<?php echo $wmobile;?>">
                <input type="hidden" name="email"  value="<?php echo $email;?>">
                <input type="hidden" name="password"  value="<?php echo $password;?>">
                <input type="hidden" name="cname"  value="<?php echo $cname;?>">
                <input type="hidden" name="address" value="<?php echo $address;?>">
                <input type="hidden" name="cat"  value="<?php echo $cat;?>">
                <input type="hidden" name="tagline" value="<?php echo $tagline;?>">
                <input type="hidden" name="aadhaar" value="<?php echo $aadhaar;?>">
                <input type="hidden" name="ref" value="<?php echo $ref;?>">
                <button type="submit" name="freer" class="btn btn-primary">Continue </button>
            </form>
            <br>
                    		</div>
					     	<p class=" text-center">Having Trouble ? Call us at <strong>+91-<?php echo $super_phone; ?></strong></p>
					     	<!-- Contact Social Links Start -->
						<!-- Contact Social Links End -->
					     	<p class=" text-center"></p>
                            </div>
					    </div>
						<div class="col-sm-12 text-center">
						<p class="message p-top30 margin-bottom0">An initiative by : <a href="https://<?php echo $super_url; ?>/" target="_blank"><?php echo $super_url; ?></a></p>
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
	<p>Copyright © 2020 - <?php echo $super_url; ?>. All rights reserved.</p>
	</center>

    <!--  Back to Top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--  Scripts -->
    
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.circliful.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/jquery.parallax-1.1.3.js"></script>
	<script src="js/custom.js"></script>
	<script src="assets/assets_new/js/jquery-3.5.0.min.js"></script>   
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