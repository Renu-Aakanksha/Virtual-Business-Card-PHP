<?php
include('../db.php');
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $ccat = $_POST['cat'];
    $tagline = $_POST['tagline'];
    $mobile = $_POST['mobile'];
    $wmobile = $_POST['wmobile'];
    $aadhaar = $_POST['aadhaar'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $ref = $_POST['ref'];
    $password = md5($pass);
    $datea = date("d/m/Y");
    $dater = date('d/m/Y', strtotime('+1 years'));
    $lcpre = "LCKY".rand(1000000000,9999999999);
    
    $pcal1 = $_POST['cal1'];
	$pcal2 = $_POST['cal2'];

	
	function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

	$cleanstr = clean($cname);
	$curll = strtolower($cleanstr);
	
    
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
        $stmt = $con->prepare("INSERT INTO `owners`(`id`, `name`, `address`, `cname`, `url`, `category`, `tagline`, `mobile`, `whatsapp`, `email`, `password`, `aadhaar`, `status`, `datee`, `ref`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssiisssiss",$genid,$name,$address,$cname,$curll,$ccat,$tagline,$mobile,$wmobile,$email,$password,$aadhaar,$zeroval,$datea,$ref);
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

<html class="no-js" lang="">

<head>
<title>Order Registration | Digital Business Kits - VerifiedBiz.online</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Digital Business Kits are one of the innovative ways to share your personal and business details with your prospect by just using your Mobile Phone.">
<meta name="keywords" content="Digital Business Cards with website, Digital Visiting Card with website, Digital Brochure, Portable Website, Mini Website"

<meta property="og:title" content="Order Registration | Digital Business Kits -  VerifiedBiz.online" />
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<meta property="og:url" content="https://www.verifiedbiz.online">
<meta property="og:site_name" content="Digital Business Cards, Websites, Brochures">
<meta property="og:description" content="Digital Business Kits are one of the innovative ways to share your personal and business details with your prospect by just using your Mobile Phone.">
 
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/512x512.png" />
    
   <!-- Vegas CSS -->
    <link rel="stylesheet" href="../assets/assets_new/css/vegas.min.css">
    
    <!-- Custom Animation CSS -->
    <link rel="stylesheet" href="../assets/assets_new/css/fxt-animation.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/assets_new/css/style.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/assets_new/css/bootstrap.min.css">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Wizard Form CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.css" />
    
    <link rel="stylesheet" href="../assets/assets_new/css/main.css" />

    <style>
    .modal-backdrop{
        display: none;
    }
        
    </style>
    
</head>

<body>
    <div style="width: 100%; height: 5px; background-color: #ff4100;">
        
    </div>
    
    
    <!-- Page Loader Start -->
    <div id="preloader">
        <img src="../assets/assets_new/img/preloader.gif" alt="Preloader">
    </div>
    
	<!-- Page Loader End --> 
	
    <div id="wrapper" class="wrapper">
        <div class="vegas-container fxt-template-layout1 has-animation" id="vegas-slide" data-vegas-options='{"delay":4000,"animation":"kenburns", "timer":false, "transition":"fade", 
        "slides":[{"src": "../assets/assets_new/img/figure/bg1-1.jpg"}, {"src": "../assets/assets_new/img/figure/bg1-2.jpg"},
        {"src": "../assets/assets_new/img/figure/bg1-3.jpg"}]}'>
            
            <!-- Main Content Start Here -->
            
            <div class="fxt-main-content">

                <div class="fxt-sub-title translate-bottom-50 transition-100 transition-delay-400">CREATE YOUR</div> 
                <h1 class="fxt-main-title translate-bottom-50 transition-100 transition-delay-600">Professional Business Card</h1>
                <p class="fxt-paragraph translate-bottom-50 transition-100 transition-delay-800" style="text-align: justify; text-justify: inter-word;">Hey, Still Using Old Boring Business Card Sharing Method? Try This Unlimited Free Sharing With Thousand of benefits. Share the details of your products with customers with only one click.</p>
                <ul class="fxt-btn-group translate-zoomout-10 transition-100 transition-delay-1000">
                    <li class="fxt-single-item">
                        <button type="button" class="fxt-btn-fill" data-toggle="modal" data-target="#contactUs">Create My Card</button> 
                    </li>
                    <li class="fxt-single-item">
                        <button type="button" class="fxt-btn-fill" data-toggle="modal" data-target="#notifyMe">Join As Reseller</button>            
                    </li>
                    
                </ul>
                <div class="fxt-copyright translate-top-50 transition-100 transition-delay-1700">&copy; 2020 Bright Goals — All Rights Reserved.</div>  
            </div>
            <!-- Main Content End Here -->
        </div>
        
        <!-- Subscribe Modal Area Start Here -->
        <div class="modal fade" id="notifyMe" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fxt-subscribe-wrap">
                            <h2 class="item-title">Subscribe</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit dummy text here.</p>
                            <form action="vendor/php/subscribe.php" class="fxt-subscribe-form" method="POST" data-pixsaas="newsletter-subscribe">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" id="newsletter-form-email" placeholder="Enter your Email">
                                    <button type="submit" class="fxt-btn-fill">SUBMIT</button>                                    
                                </div>
                                <div class="form-result alert">
                                    <div class="content"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe Modal Area End Here -->

        <!-- Contact Form Modal Area Start Here -->
        <div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="wizard-container" method="POST" action="" id="js-wizard-form">
                            <div class="progress" id="js-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                    <span class="progress-val">40%</span>
                                </div>
                            </div>
                            <ul class="nav nav-tab">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">1</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">1</a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">1</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="input-group" data-design="1" class="img_design">
                                        <img src="../assets/assets_new/img/st1.png" alt="">
                                    </div>
                                    <div class="input-group" data-design='2' class="img_design">
                                        <img src="../assets/assets_new/img/st1.png" alt="">
                                    </div>
                                    <div class="input-group" data-design='3' class="img_design">
                                        <img src="../assets/assets_new/img/st1.png" alt="">
                                    </div>
                                    <div class="btn-next-con">
                                        <a class="btn-next" href="#">Next</a>
                                    </div>
                                    <input type="hidden" name="design" id="hidden_design">
                                </div>
                                <div class="tab-pane" id="tab2">
                                    
                                    
                                    <div class="input-group">
                                        <label class="label">Contact Person</label>
                                        <div class="input-group">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <input type="text" name="name" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"> Mobile</label>
                                        <div class="input-group">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                            <input type="text" name="mobile" value="91" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">WhatsApp</label>
                                        <div class="input-group">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            <input type="text" name="wmobile" value="91" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Email</label>
                                        <div class="input-group">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <input type="text" name="email" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <div class="input-group">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            <input name="password" type="password" class="input--style-1">
                                        </div>
                                    </div>

                                    
                                    <div class="btn-next-con">
                                        <a class="btn-back" href="#">back</a>
                                        <a class="btn-next" href="#">Next</a>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="input-group">
                                        <label class="label">Business Name</label>
                                        <div class="input-group">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                            <input type="text" name="cname" class="input--style-1">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="label"> Office Address</label>
                                        <div class="input-group">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <input type="text" name="address" class="input--style-1">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Business Caption or Tag Line</label>
                                        <div class="input-group">
                                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                                            <input type="text" name="cat" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">GSTIN:</label>
                                        <div class="input-group">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                            <input name="aadhaar" type="text" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Refrence Id</label>
                                        <div class="input-group">
                                            <i class="fa fa-info" aria-hidden="true"></i>
                                            <input type="text" name="ref" class="input--style-1">
                                        </div>
                                    </div>
    
                                    <div class="btn-next-con">
                                        <a class="btn-back" href="#">back</a>
                                        <a class="btn-last" href="#">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Form Modal Area End Here -->
    </div>


    <!-- jQuery -->
    <script src="../assets/assets_new/js/jquery-3.5.0.min.js"></script>   
    
    <!-- Popper js -->
    
    <script src="../assets/assets_new/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    
    <script src="../assets/assets_new/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    
    <script src="../assets/assets_new/js/imagesloaded.pkgd.min.js"></script>  
    <!-- Vegas js -->
    
    <script src="../assets/assets_new/js/vegas.min.js"></script>
    <!-- Validator js -->
    
    <script src="../assets/assets_new/js/main.js"></script>
    
    <script src="../assets/assets_new/js/jquery.bootstrap.wizard.min.js"></script>
    
    <script src="../assets/assets_new/js/wizard.js"></script>
    
    <script>
        $(document).ready(function() {
            $(document).on('click', '.img_design', function(event){
                $('#hidden_design').val($(this).data('design'));
            });
        }
        
    </script>

</body>

</html>