<?php
include('dash/db.php');
include('session.php');

$wurl = $_SESSION['wurl'];
$wcname = $_SESSION['wcname'];
$waemail = $_SESSION['waemail'];
$wemail = $_SESSION['wemail'];
$wphone = $_SESSION['wphone'];
$waddress = $_SESSION['waddress'];


if(isset($_POST['register'])){
    $partner = "RS";
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $cat = $_POST['cat'];
    $cmob = "91".$_POST['mobile'];
    $wmob = "91".$_POST['wmobile'];
    $email = $_POST['email'];
    $cal1 = $_POST['cal1'];
    $cal2 = $_POST['cal2'];
    $cap = $_POST['cap'];
    $calval = $cal1+$cal2;
    $pass = "MYMO".rand(1111,9999);
    $date = date('m/d/Y h:i:s a', time());
    
    
    $owners_email = $con->query("SELECT id FROM `reseller` where email = '$email' LIMIT 1");
    
    if($owners_email->num_rows > 0){
        echo "<script>alert('Sorry! This email is already registered.'); window.location='home'</script>";
        die();
    }
    
    
    if ($partner != "0"){ 
        $partner = $partner.rand(1000,9999);
        if($cap == $calval){
            $stmt = $con->prepare("INSERT INTO `reseller`(`partner`, `name`, `address`, `cname`, `cat`, `mobile`, `wmobile`, `email`, `pass`, `datee`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$partner,$name,$address,$cname,$cat,$cmob,$wmob,$email,$pass,$date);
            if($stmt->execute()){
                
                $rid = 'RE'.time();
                $rid2 = base64_encode('FsYe'.$email);
                
                $to = $waemail;
                $subject = "Thank you for your registration";
                
                $message = "
                <html>
                <head>
                <title>Thank you for your registration</title>
                </head>
                <body>
                <h3>Thank you for your registration</h3>
                <h4>Your Login Details :</h4>
                <p><strong>User Id / Email :</strong> ".$email."</p>
                <p><strong>Password :</strong> ".$pass."</p><br>
                <p><strong>Ref/ Partner ID :</strong> ".$partner."</p><br>
                <p style='color:#080;font-size:18px;'><a href='https://".$wurl."/partner/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>'
                </body>
                </html>
                ";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From: '.$wcname.' <noreply@'.$wurl.'>' . "\r\n";
                
                mail($to,$subject,$message,$headers);
                
                echo "<script>alert('Registration Successful!'); window.location='https://api.whatsapp.com/send?phone=91".$super_phone."&text=I have Registered As Reseller My Email Is : ".$email.", Kindly Active My Account!';</script>";
            }
            $stmt->close();
        }else{
            echo "<script>alert('Wrong capture, Try again'); window.location='/;</script>";
        }
        
        echo "<script>alert('Partner Not selected'); window.location='/';</script>";
    }
    
}

if(isset($_POST['sendr'])){
    $name = $_POST['ename'];
    $company = $_POST['ecompany'];
    $email = $_POST['eemail'];
    $phone = $_POST['ephone'];
    $message = $_POST['emessage'];
    
     $rid = 'RE'.time();
    $rid2 = base64_encode('FsYe'.$email);
    
    $to = $waemail;
    $subject = "Customer Enquiry";
    
    $message = "
    <html>
    <head>
    <title>Customer Enquiry</title>
    </head>
    <body>
    <h3>Thank you for your registration</h3>
    <h4>User Details :</h4>
    <p><strong> Name :</strong> ".$name."</p>
    <p><strong> Company Name :</strong> ".$company."</p>
    <p><strong> Phone No. :</strong> ".$phone."</p>
    <p><strong> Email :</strong> ".$email."</p>
    <p><strong> Message :</strong> ".$message."</p>
    </body>
    </html>
    ";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
     $headers .= 'From: '.$wcname.' <noreply@'.$wurl.'>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
}

?>

<!doctype html>
<html lang="en">

<!-- Mirrored from appco.themetags.com/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2020 09:54:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description" content="Professional Business Card Provider">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content=""/> <!-- website name -->
    <meta property="og:site" content=""/> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content=""/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>

    <!--title-->
    <title>Professional Business Card Maker</title>

    <!--favicon icon-->
    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&amp;display=swap"
          rel="stylesheet">

    <!--Bootstrap css-->
    
    <link rel="stylesheet" href="assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets_new/css/style.css">
    <link rel="stylesheet" href="assets/assets_new/css/vegas.min.css">
    <link rel="stylesheet" href="assets/assets_new/css/fxt-animation.css">
    
    <!--Magnific popup css-->
    <link rel="stylesheet" href="assets/assets/css/magnific-popup.css">
    <!--Themify icon css-->
    <link rel="stylesheet" href="assets/assets/css/themify-icons.css">
    <!--animated css-->
    <link rel="stylesheet" href="assets/assets/css/animate.min.css">
    <!--ytplayer css-->
    <link rel="stylesheet" href="assets/assets/css/jquery.mb.YTPlayer.min.css">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="assets/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/assets/css/owl.theme.default.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="assets/assets/css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" href="assets/assets/css/responsive.css">
    <link rel="stylesheet" href="assets/assets_new/css/main.css" />
    
    
    <style>
          .fake-btn{
            box-shadow: none;
            background: #999;
            -webkit-box-shadow: 0px 3px 14px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 3px 14px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 3px 14px 0px rgba(0, 0, 0, 0.15);
            line-height: 45px;
            padding: 0 60px;
            -webkit-border-radius: 22.5px;
            -moz-border-radius: 22.5px;
            border-radius: 22.5px;
            font-size: 16px;
            color: #fff;
            font-family: inherit;
            font-weight: 500;
            text-transform: capitalize;
            text-decoration: none;
            display:block;
            text-align: center;
        }
        
        .hide {
            display:none;
        }
        .input--style-1{
            max-width: 350px;
        }
        input:disabled {
            background: #999;
        }
        .fxt-btn-fillg:before {
            background-color: #d44400 !important;
        }
        .modal-open {
            overflow-y: hidden;
        }
        
        @media only screen and (max-width: 990px) {
            .cls-hide{
                display: none;
            }
        }
        
    </style>

</head>
<body>

<!--header section start-->
<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            
            <?php $logo = $_SESSION['wlogo']; ?>
            
            <a class="navbar-brand" href="/"><h1>YOURVCARDS.COM</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>

            <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item">
                        <a class="nav-link page-scroll" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#screenshots">Screenshots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="javascript:;" data-toggle="modal" data-target="#cust_login">Login</a>
                    </li>
                    

                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
</header>
<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section pt-100 background-img"
             style="background: url('assets/assets/img/hero-bg-1.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="hero-content-left text-white mt-5">
                        <h1 class="text-white"><span></span>An Advanced Version of Digital Visiting Card is Here !!</h1>
                        <p class="lead">
                        <?php     
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
                    ?>

Now, have your own mini website  @ <strong>Just Rs.</strong> <?php echo $ssprice;?>
<br>
Show Your Business to Clients In a Much Better Way...

Create Your Mini-Website in just 2 Mins !!</p>
                
                        <a href="javascript:;" class="btn app-store-btn cls-btn" data-toggle="modal" data-target="#vcard">Create My Card</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="hero-animation-img">
                        <center>
                        <?php
                        $qu = "SELECT * FROM `screen` ORDER BY `id` DESC";
                        $data = $con->query($qu);
                        if ($data->num_rows > 0) {
                            while ($rows = $data->fetch_assoc()) {
                                $bid = $rows['id'];
                                $bimage = $rows['image'];
                                $bdisplay = $rows['display'];
                                if ($bdisplay == 11) {
                                    echo '<img src="dash/images/'.$bimage.'" alt="img" class="img-fluid">';
                                }
                                else {
                                }
                            }
                        }
                        ?>
                        <!-- <img src="assets/assets/img/home-demo-card.png" alt="img" class="img-fluid"> -->
                        </center>
                        
                    </div>
                </div>
            </div>
            <!--counter start-->
            <!--<div class="row">
                <ul class="list-inline counter-wrap">
                    <li class="list-inline-item">
                        <div class="single-counter text-center">
                            <span>2305</span>
                            <h6>Happy Client</h6>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="single-counter text-center">
                            <span>2145</span>
                            <h6>Active Clients</h6>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="single-counter text-center">
                            <span>692</span>
                            <h6>Positive Feedbacks</h6>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="single-counter text-center">
                            <span>522450</span>
                            <h6>Total Views</h6>
                        </div>
                    </li>
                </ul>
            </div>-->
            <!--counter end-->
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section mt-5 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="section-heading mb-5">
                        <span class="badge badge-primary badge-pill">Key features</span>
                        <h5 class="h5 mt-3 mb-6">We will helps you to build beautiful V-Cards that stand out and
                            automatically adapt to your style.</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-lg-0">
                    <div class="card single-promo-card single-promo-hover">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-palette icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Straightforward</h5>
                                <p class="text-muted mb-0">Design your V-Card in 5 minutes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-shopping-cart-full icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Ecommerce</h5>
                                <p class="text-muted mb-0">List your all Product/Services.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-vector icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Scalable</h5>
                                <p class="text-muted mb-0">Share cards with anyone, Unlimited times.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-receipt icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Customizable</h5>
                                <p class="text-muted mb-0">Gallery, Social Media links, etc with unlimited updates to your card.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--about us section start-->
    <section id="about" class="about-us ptb-100 gray-light-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <span class="badge badge-primary badge-pill">Now Attract Your Customers</span>
                    <h2 class="mt-4">Deliver your product using <?php echo $wcname; ?></h2>
                    <p class="mb-4 lh-190">Forget about old fashioned printed visiting cards that generally goes to the dustbin. With our Digital Visiting Card, you can share your contact information that has actionable one click events like Call, Email, Whatsapp, Navigation, Website Link, Payment, Social Links, Maps and more.</p>
                    <ul class="list-unstyled">
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="badge badge-circle badge-primary mr-3">
                                        <span class="ti-check"></span>
                                    </div>
                                </div>
                                <div><p class="mb-0">Your Card, Your Brand</p></div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="badge badge-circle badge-primary mr-3">
                                        <span class="ti-check"></span>
                                    </div>
                                </div>
                                <div><p class="mb-0">Fully Customizable</p></div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="badge badge-circle badge-primary mr-3">
                                        <span class="ti-check"></span>
                                    </div>
                                </div>
                                <div><p class="mb-0">Networking of your Team</p></div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="badge badge-circle badge-primary mr-3">
                                        <span class="ti-check"></span>
                                    </div>
                                </div>
                                <div><p class="mb-0">24 x 7 x 365 in Pocket</p></div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="badge badge-circle badge-primary mr-3">
                                        <span class="ti-check"></span>
                                    </div>
                                </div>
                                <div><p class="mb-0">Testimonial & Feedback</p></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="about-content-right">
                        <center>
                            <img src="assets/assets/img/delivery-app.svg" width="500" alt="about us" class="img-fluid">
                        </center>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <!--features section start-->
    <div id="features" class="feature-section ptb-100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <span class="badge badge-primary badge-pill">Best features</span>
                        <h2>Quick & Easy Process with <br>
                            <span>best features</span></h2>
                        <p>Why we diffrent than other?</p>

                    </div>
                </div>
            </div>

            <!--feature new style start-->
            <div class="row row-grid align-items-center">
                <div class="col-lg-4">
                    <div class="d-flex align-items-start mb-5">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-1 rounded-circle">
                                <span class="ti-face-smile"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Responsive design</h5>
                            <p class="mb-0">It works on every device and looks professional everytime.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-5">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-2 rounded-circle">
                                <span class="ti-vector"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Loaded with features</h5>
                            <p class="mb-0">Hundreds of Awesome features, Provided in card and management</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-3 rounded-circle">
                                <span class="ti-headphone-alt"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Friendly online support</h5>
                            <p class="mb-0">We always available for you 27*7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="position-relative" style="z-index: 10;">
                        <?php
                        $qu = "SELECT * FROM `screen` ORDER BY `id` DESC";
                        $data = $con->query($qu);
                        if ($data->num_rows > 0) {
                            while ($rows = $data->fetch_assoc()) {
                                $bid = $rows['id'];
                                $bimage = $rows['image'];
                                $bdisplay = $rows['display'];
                                if ($bdisplay == 11) {
                                    echo '<img alt="Image placeholder" src="dash/images/'.$bimage.'" class="img-center img-fluid cls-hide">';
                                }
                                else {
                                }
                            }
                        }
                        ?>
                        <!-- <img alt="Image placeholder" src="assets/assets/img/home-demo-card.png" class="img-center img-fluid cls-hide"> -->
                    </div>
                </div>
                <br>
                <div class="col-lg-4">
                    <div class="d-flex align-items-start mb-5">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-4 rounded-circle">
                                <span class="ti-layout-media-right"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Free updates forever</h5>
                            <p class="mb-0">You will see regular updates as per market trend</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-5">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-5 rounded-circle">
                                <span class="ti-layout-cta-right"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Complete Editable</h5>
                            <p class="mb-0">You can edit each and everything to attract customers</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="pr-4">
                            <div class="icon icon-shape icon-color-6 rounded-circle">
                                <span class="ti-palette"></span>
                            </div>
                        </div>
                        <div class="icon-text">
                            <h5>Infinite colors</h5>
                            <p class="mb-0">More than 45 million different color themes</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--feature new style end-->
        </div>
    </div>
    <!--features section end-->


    <!--our video promo section start-->
    <!--<section id="download" class="video-promo ptb-100 background-img"-->
    <!--         style="background: url('assets/assets/img/video-bg.jpg')no-repeat center center / cover">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-md-6">-->
    <!--                <div class="video-promo-content mt-4 text-center">-->
    <!--                    <a href="https://www.youtube.com/watch?v=9No-FiEInLA"-->
    <!--                       class="popup-youtube video-play-icon d-inline-block"><span class="ti-control-play"></span> </a>-->
    <!--                    <h5 class="mt-4 text-white">Watch video overview</h5>-->

    <!--                    <div class="download-btn mt-5">-->
    <!--                        <a href="#" class="btn google-play-btn mr-3"><span class="ti-android"></span> Google-->
    <!--                            Play</a>-->
    <!--                        <a href="#" class="btn app-store-btn"><span class="ti-apple"></span> App Store</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--our video promo section end-->


    <!--overflow block start-->
    <!--<div class="overflow-hidden">-->
        <!--our pricing packages section start-->
    <!--    <section id="pricing" class="package-section background-shape-right ptb-100">-->
    <!--        <div class="container">-->
    <!--            <div class="row justify-content-center">-->
    <!--                <div class="col-md-8">-->
    <!--                    <div class="section-heading text-center mb-5">-->
    <!--                        <span class="badge badge-primary badge-pill">Our Pricing Package</span>-->
    <!--                        <h2>Afforadble Pricing and Packages <br><span>choose your best one</span></h2>-->
    <!--                        <p class="lead">-->
    <!--                            Monotonectally grow strategic process improvements vis-a-vis integrated resources.-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="row justify-content-center">-->
    <!--                <div class="col-lg-4 col-md">-->
    <!--                    <div class="card text-center single-pricing-pack">-->
    <!--                        <div class="pt-4"><h5>Basic</h5></div>-->
    <!--                        <div class="pricing-img mt-4">-->
    <!--                            <img src="assets/assets/img/basic.svg" alt="pricing img" class="img-fluid">-->
    <!--                        </div>-->
    <!--                        <div class="card-header py-4 border-0 pricing-header">-->
    <!--                            <div class="h1 text-center mb-0">$<span class="price font-weight-bolder">29</span></div>-->
    <!--                        </div>-->
    <!--                        <div class="card-body">-->
    <!--                            <ul class="list-unstyled text-sm mb-4 pricing-feature-list">-->
    <!--                                <li>Push Notifications</li>-->
    <!--                                <li>Data Transfer</li>-->
    <!--                                <li>SQL Database</li>-->
    <!--                                <li>Search & SEO Analytics</li>-->
    <!--                                <li>24/7 Phone Support</li>-->
    <!--                                <li>2 months technical support</li>-->
    <!--                                <li>2+ profitable keyword</li>-->
    <!--                            </ul>-->
    <!--                            <a href="#" class="btn outline-btn mb-3" target="_blank">Purchase now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-4 col-md">-->
    <!--                    <div class="card popular-price text-center single-pricing-pack">-->
    <!--                        <div class="pt-4"><h5>Standard</h5></div>-->
    <!--                        <div class="pricing-img mt-4">-->
    <!--                            <img src="assets/assets/img/standard.svg" alt="pricing img" class="img-fluid">-->
    <!--                        </div>-->
    <!--                        <div class="card-header py-4 border-0 pricing-header">-->
    <!--                            <div class="h1 text-center mb-0">$<span-->
    <!--                                    class="price font-weight-bolder">149</span></div>-->

    <!--                        </div>-->
    <!--                        <div class="card-body">-->
    <!--                            <ul class="list-unstyled text-sm mb-4 pricing-feature-list">-->
    <!--                                <li>Push Notifications</li>-->
    <!--                                <li>Data Transfer</li>-->
    <!--                                <li>SQL Database</li>-->
    <!--                                <li>Search & SEO Analytics</li>-->
    <!--                                <li>24/7 Phone Support</li>-->
    <!--                                <li>1 Year technical support</li>-->
    <!--                                <li>50+ profitable keyword</li>-->
    <!--                            </ul>-->
    <!--                            <a href="#" class="btn solid-btn mb-3" target="_blank">Purchase now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-lg-4 col-md">-->
    <!--                    <div class="card text-center single-pricing-pack">-->
    <!--                        <div class="pt-4"><h5>Unlimited</h5></div>-->
    <!--                        <div class="pricing-img mt-4">-->
    <!--                            <img src="assets/assets/img/unlimited.svg" alt="pricing img" class="img-fluid">-->
    <!--                        </div>-->
    <!--                        <div class="card-header py-4 border-0 pricing-header">-->
    <!--                            <div class="h1 text-center mb-0">$<span class="price font-weight-bolder">39</span></div>-->
    <!--                        </div>-->
    <!--                        <div class="card-body">-->
    <!--                            <ul class="list-unstyled text-sm mb-4 pricing-feature-list">-->
    <!--                                <li>Push Notifications</li>-->
    <!--                                <li>Data Transfer</li>-->
    <!--                                <li>SQL Database</li>-->
    <!--                                <li>Search & SEO Analytics</li>-->
    <!--                                <li>24/7 Phone Support</li>-->
    <!--                                <li>6 months technical support</li>-->
    <!--                                <li>10+ profitable keyword</li>-->
    <!--                            </ul>-->
    <!--                            <a href="#" class="btn outline-btn mb-3" target="_blank">Purchase now</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="mt-5 text-center">-->
    <!--                <p class="mb-2">If you need custom services or Need more? <a href="#" class="color-secondary">-->
    <!--                    Contact us-->
    <!--                </a></p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
        <!--our pricing packages section end-->
    <!--</div>-->
    <!--overflow block end-->

    <!--testimonial section start-->
    <!--<section class="testimonial-section ptb-100">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-between align-items-center">-->
    <!--            <div class="col-md-6">-->
    <!--                <div class="section-heading mb-5">-->
    <!--                    <h2>Testimonials <br><span>what clients say</span></h2>-->
    <!--                    <p class="lead">-->
    <!--                        Rapidiously morph transparent internal or "organic" sources whereas resource sucking-->
    <!--                        e-business. Conveniently innovate compelling internal.-->
    <!--                    </p>-->

    <!--                    <div class="client-section-wrap d-flex flex-row align-items-center">-->
    <!--                        <ul class="list-inline">-->
    <!--                            <li class="list-inline-item"><img src="assets/assets/img/client-1-color.png" width="85" alt="client"-->
    <!--                                                              class="img-fluid"></li>-->
    <!--                            <li class="list-inline-item"><img src="assets/assets/img/client-6-color.png" width="85" alt="client"-->
    <!--                                                              class="img-fluid"></li>-->
    <!--                            <li class="list-inline-item"><img src="assets/assets/img/client-3-color.png" width="85" alt="client"-->
    <!--                                                              class="img-fluid"></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-5">-->
    <!--                <div class="owl-carousel owl-theme client-testimonial arrow-indicator">-->
    <!--                    <div class="item">-->
    <!--                        <div class="testimonial-quote-wrap">-->
    <!--                            <div class="media author-info mb-3">-->
    <!--                                <div class="author-img mr-3">-->
    <!--                                    <img src="assets/assets/img/client-1.jpg" alt="client" class="img-fluid rounded-circle">-->
    <!--                                </div>-->
    <!--                                <div class="media-body">-->
    <!--                                    <h5 class="mb-0">John Charles</h5>-->
    <!--                                    <span>Google</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="client-say">-->
    <!--                                <p> <img src="assets/assets/img/quote.png" alt="quote" class="img-fluid"> Interactively optimize fully researched expertise vis-a-vis plug-and-play relationships. Intrinsicly develop viral core competencies for fully tested customer service. Enthusiastically create next-generation growth strategies and.</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="item">-->
    <!--                        <div class="testimonial-quote-wrap">-->
    <!--                            <div class="media author-info mb-3">-->
    <!--                                <div class="author-img mr-3">-->
    <!--                                    <img src="assets/assets/img/client-2.jpg" alt="client" class="img-fluid rounded-circle">-->
    <!--                                </div>-->
    <!--                                <div class="media-body">-->
    <!--                                    <h5 class="mb-0">Arabella Ora</h5>-->
    <!--                                    <span>Amazon</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="client-say">-->
    <!--                                <p><img src="assets/assets/img/quote.png" alt="quote" class="img-fluid">  Rapidiously develop user friendly growth strategies after extensive initiatives. Conveniently grow innovative benefits through fully tested deliverables. Rapidiously utilize focused platforms through end-to-end schemas.</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="item">-->
    <!--                        <div class="testimonial-quote-wrap">-->
    <!--                            <div class="media author-info mb-3">-->
    <!--                                <div class="author-img mr-3">-->
    <!--                                    <img src="assets/assets/img/client-1.jpg" alt="client" class="img-fluid rounded-circle">-->
    <!--                                </div>-->
    <!--                                <div class="media-body">-->
    <!--                                    <h5 class="mb-0">Jeremy Jere</h5>-->
    <!--                                    <span>Themetags</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="client-say">-->
    <!--                                <p><img src="assets/assets/img/quote.png" alt="quote" class="img-fluid"> Objectively synthesize client-centered e-tailers for maintainable channels. Holisticly administrate customer directed vortals whereas tactical functionalities. Energistically monetize reliable imperatives through client-centric best practices. Collaboratively.</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="item">-->
    <!--                        <div class="testimonial-quote-wrap">-->
    <!--                            <div class="media author-info mb-3">-->
    <!--                                <div class="author-img mr-3">-->
    <!--                                    <img src="assets/assets/img/client-1.jpg" alt="client" class="img-fluid rounded-circle">-->
    <!--                                </div>-->
    <!--                                <div class="media-body">-->
    <!--                                    <h5 class="mb-0">John Charles</h5>-->
    <!--                                    <span>Google</span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="client-say">-->
    <!--                                <p><img src="assets/assets/img/quote.png" alt="quote" class="img-fluid"> Enthusiastically innovate B2C data without clicks-and-mortar convergence. Monotonectally deliver compelling testing procedures vis-a-vis B2B testing procedures. Competently evisculate integrated resources whereas global processes. Enthusiastically.</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--testimonial section end-->

    <!--screenshots section start-->
    <section id="screenshots" class="screenshots-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center">
                        <h2>Card screenshots <br> <span>Looks awesome</span></h2>
                        <p class="lead">Best User-Friendly design and professional quality on each point</p>
                    </div>
                </div>
            </div>
            <!--start app screen carousel-->
            <div class="screen-slider-content mt-5">
                <div class="screenshot-frame"></div>
                <div class="screen-carousel owl-carousel owl-theme dot-indicator">
                    <?php
                    $qu = "SELECT * FROM `screen`";
                    $data = $con->query($qu);
                    if ($data->num_rows > 0) {
                        while ($rows = $data->fetch_assoc()) {
                            $bid = $rows['id'];
                            $bimage = $rows['image'];
                            $bdisplay = $rows['display'];
                            if ($bdisplay == 12) {
                                echo '<img src="dash/images/'.$bimage.'" class="img-fluid" alt="screenshots">';
                            }else {

                            }
                        }
                    }
                    ?>
                    <!-- <img src="assets/assets/img/1.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/2.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/3.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/4.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/5.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/6.jpg" class="img-fluid" alt="screenshots">
                    <img src="assets/assets/img/7.jpg" class="img-fluid" alt="screenshots"> -->
                </div>
            </div>
            <!--end app screen carousel-->

        </div>
    </section>
    <!--screenshots section end-->

    <!--download section start-->
    <section class="download-section pt-100 background-img"
             style="background: url('assets/assets/img/app-hero-bg.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div id="accordion-1" class="accordion accordion-faq pb-100">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                <h6 class="mb-0"><span class="ti-receipt mr-3"></span> What contents can I put in V-Card?</h6>
                            </div>
                            <div id="collapse-1-1" class="collapse show" aria-labelledby="heading-1-1"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>It's like your own website. You can put your details like (name, number, whatsapp number, email id, google location of ofc/shop) ,address, product/service details(like name ,price, description, image), images, videos, payment details & Bank Details,Customer can even save your number in his phone book at one click etc.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 2 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-2" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                <h6 class="mb-0"><span class="ti-gallery mr-3"></span>How is it different from website?</h6>
                            </div>
                            <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>Website needs different hosting and servers. Ecards is domain free. Moreover you can change designs and content unlimited times.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-3" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                <h6 class="mb-0"><span class="ti-wallet mr-3"></span> Are there any options for customers to get directly connected with me?
                                </h6>
                            </div>
                            <div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>Yes. Recipient can directly connect you via watsApp and call on a single click only.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="download-img d-flex">
                        <center>
                            <?php
                            $qu = "SELECT * FROM `screen` ORDER BY `id` DESC";
                            $data = $con->query($qu);
                            if ($data->num_rows > 0) {
                                while ($rows = $data->fetch_assoc()) {
                                    $bid = $rows['id'];
                                    $bimage = $rows['image'];
                                    $bdisplay = $rows['display'];
                                    if ($bdisplay == 11) {
                                        echo '<img src="dash/images/'.$bimage.'" alt="download" class="img-fluid cls-hide">';
                                    }
                                    else {
                                    }
                                }
                            }
                            ?>
                            <!-- <img src="assets/assets/img/home-demo-card.png" alt="download" class="img-fluid cls-hide"> -->
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--download section end-->
    
    
    <!--Register section end-->
    
    <!--Register section end-->


    <!--contact us section start-->
    <section id="contact" class="contact-us ptb-100 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-5">
                    <div class="section-heading">
                        <h3>Contact with us</h3>
                        <p>It's very easy to get in touch with us. Just use the contact form or pay us a
                            visit for a coffee at the office. Dynamically innovate competitive technology after an
                            expanded array of leadership.</p>
                    </div>
                    <div class="footer-address">
                        <h6><strong>Head Office</strong></h6>
                        <p><?php echo $waddress; ?></p>
                        <ul>
                            <li><span>Phone: +91<?php echo $wphone; ?></span></li>
                            <li><span>Email : <a href="mailto:<?php echo $wemail; ?>"><?php echo $wemail; ?></a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <form method="POST" class="contact-us-form">
                        <h5>Reach us quickly</h5>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ename"  placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="eemail" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" name="ephone" value="" class="form-control"  placeholder="Your Phone">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" name="ecompany" value="" size="40" class="form-control" placeholder="Your Company">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="emessage" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <button type="submit" class="btn solid-btn" id="btnContactUs" name="sendr">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section end-->


</div>
<!--body content wrap end-->

<!--shape image start-->
<div class="shape-img subscribe-wrap">
    <img src="assets/assets/img/footer-top-shape.png" alt="footer shape" class="img-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              
            </div>
        </div>
    </div>
</div>
<!--shape image end-->

<!--footer section start-->
<footer class="footer-section">

    <!--footer top start-->
    <div class="footer-top pt-150 pb-5 background-img-2"
         style="background: url('assets/assets/img/footer-bg.png')no-repeat center top / cover">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        
                        <p>Best Quality Business Card with awesome functionality | Provides Unlimited Sharing with tracking system</p>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Navigation Links</h5>
                        <ul class="list-unstyled">
                            <!--<li class="mb-2"><a href="#">About Us</a></li>-->
                            <!--<li class="mb-2"><a href="#">Contact Us</a></li>-->
                            <!--<li class="mb-2"><a href="#">Privacy Policy</a></li>-->
                            <!--<li class="mb-2"><a href="#">Terms and Conditions</a></li>-->
                            <li class="mb-2"><a href="javascript:;" data-toggle="modal" data-target="#cust_login">Login</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Support</h5>
                        <ul class="list-unstyled support-list">
                            <li class="mb-2 d-flex align-items-center"><span class="ti-location-pin mr-2"></span>
                                <?php echo $super_address; ?>
                            </li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-mobile mr-2"></span> <a
                                    href="tel:+91<?php echo $super_phone; ?>">+91<?php echo $super_phone; ?></a></li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-email mr-2"></span><a
                                    href="mailto:<?php echo $super_email; ?>"><?php echo $super_email; ?></a></li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-world mr-2"></span><a
                                    href="#"><?php echo $wurl; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Location</h5>
                        <img src="assets/assets/img/map.png" alt="location map" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->

    <!--footer copyright start-->
    <div class="footer-bottom gray-light-bg pt-4 pb-4">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-6 col-lg-5"><p class="copyright-text pb-0 mb-0">Copyrights © 2020 All
                    rights reserved by
                    <a href="https://<?php print $wurl;?>/" target="_blank"><?php print $wcname;?></a></p>
                </div>
            </div>
        </div>
    </div>
    <!--footer copyright end-->
    
        <div class="modal fade" id="notifyMe" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="home.php" id="js-wizard-form">
                            <div class="progress" id="js-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                    <span class="progress-val">50%</span>
                                </div>
                            </div>
                            <ul class="nav nav-tab">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">1</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">1</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active text-center" id="tab1">
                                    
                                    <div class="input-group">
                                        <label class="label">Contact Person (*)</label>
                                        <div class="input-group">
                                            <input type="text" name="name" id="name" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"> Mobile (*)</label>
                                        <div class="input-group">
                                            <input type="number" name="mobile" id="mobile" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="input-group">
                                        <label class="label">Email (*)</label>
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="btn-next-con">
                                        
                                        <a style="width: 100%; text-align: center;" class="btn-next hide" id="next" href="javascript:;">Next</a>
                                        <a style="width: 100%; text-align: center;" class="fake-btn" id="fake-btn" href="javascript:;">Next</a>
                                        <a class="btn-back" href="javascript:;" style="width: 100%; text-align: center; margin-top: 10px;">back</a>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="tab2">
                                    
                                    
                                    <div class="input-group">
                                        <label class="label">WhatsApp</label>
                                        <div class="input-group">
                                            <input type="number" name="wmobile" id="wmobile" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Business Name (*)</label>
                                        <div class="input-group">
                                            <input type="text" name="cname" id="bname" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="input-group">
                                        <label class="label"> Office Address (*)</label>
                                        <div class="input-group">
                                            <input type="text" name="address" id="address" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Nature of Business (*)</label>
                                        <div class="input-group">
                                            <input type="text" name="cat" id="nature" class="input--style-1">
                                        </div>
                                    </div>
                                    
    
                                    <div class="btn-next-con">
                                        
                                        <a style="width: 100%; text-align: center;" class="fake-btn" id="fake-btnn" href="javascript:;">Submit</a>
                                        <input  style="width: 100%; text-align: center;" type="submit" id="submit_btn" class="btn-last hide" value="Submit" name="register" />
                                        <a style="width: 100%; text-align: center; margin-top: 10px;" class="btn-back" href="#">back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe Modal Area End Here -->

        <div class="modal fade" id="cust_login" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Customer Login</h2>
                            <div class="fxt-contact-form col-md-12">
                                <form action="dash/verify-user" method="post">
                                    
                                    <div class="input-group">
                                        <label class="label"> Email </label>
                                        <div class="input-group">
                                            <input type="email" name="username" id="email_login" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"> Password </label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password_login" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"><a href="javascript:;" id="for_cust">Forgot password?</a></label>
                                    </div>
                                    
                                    <input type="submit" name="login" class="btn-last">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="partner_login" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="cust_forget" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Reset Password</h2>
                            <div class="fxt-contact-form col-md-12">
                                <form action="dash/reset" method="post">
                                    
                                    <div class="input-group">
                                        <label class="label"> Email </label>
                                        <div class="input-group">
                                            <input type="email" name="email" id="email_login" class="input--style-1">
                                        </div>
                                    </div>
                                
                                    
                                    <input type="submit" name="send" class="btn-last">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="partner_forget" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Reset Password</h2>
                            <div class="fxt-contact-form col-md-12">
                                <form action="partner/reset" method="post">
                                    
                                    <div class="input-group">
                                        <label class="label"> Email </label>
                                        <div class="input-group">
                                            <input type="email" name="email" id="email_login" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <input type="submit" name="send" class="btn-last">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="vcard" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Choose Design</h2>
                            <div class="fxt-contact-form col-md-12">
                                
                                <?php 
                                        
                                        for ($i = 1; $i <= 11; $i++){
                                        
                                        echo'
                                        <div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1">
                                            <img src="assets/assets_new/img/st'.$i.'.png" width="90%" style="margin-left: 5%; margin-right: 5%;">
                                            <a href="https://'.$wurl.'/form.php?design='.$i.'"><button style="width: 80%; height: 30px; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</button></a>
                                        </div>';
                                        }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!--footer section end-->


        <!-- Contact Form Modal Area End Here -->






<!--jQuery-->
<script src="assets/assets_new/js/jquery-3.5.0.min.js"></script>
<script src="assets/assets_new/js/imagesloaded.pkgd.min.js"></script> 
<script src="assets/assets_new/js/vegas.min.js"></script>
<script src="assets/assets_new/js/main.js"></script>
<script src="assets/assets/js/bootstrap.min.js"></script>
<script src="assets/assets_new/js/jquery.bootstrap.wizard.min.js"></script>

<script>
    (function ($) {
    'use strict';
    /*[ Wizard Config ]
        ===========================================================*/
    
    try {
    
    
        $("#js-wizard-form").bootstrapWizard({
            'tabClass' : 'nav-tab',
            'nextSelector': '.btn-next',
            'previousSelector' : '.btn-back',
            'lastSelector': '.btn-last',
            'onNext': function(tab, navigation, index) {
                var progressBar = $('#js-progress').find('.progress-bar');
                var progressVal = $('#js-progress').find('.progress-val');
                var current = index + 1;
                if (current > 1) {
                    var val = parseInt(progressBar.text());
                    val += 50;
                    progressBar.css('width', val+ '%');
                    progressVal.text(val+'%');
                }
    
            },
            'onPrevious' : function(tab, navigation, index) {
                var progressBar = $('#js-progress').find('.progress-bar');
                var progressVal = $('#js-progress').find('.progress-val');
                var current = index - 1;
                if (current !== 1) {
                    var val = parseInt(progressBar.text());
                    val -= 50;
                    progressBar.css('width', val+ '%');
                    progressVal.text(val+'%');
                }
    
            }
    
        });
        
        
        }
        catch (e) {
            console.log(e)
        }
    
    })(jQuery);
    
    
    
    $(document).ready(function() {
        var name
        var mobile
        var email
        var emailtemp
        
        $(document).on('keyup','#name', function(){
            name = $('#name').val();
            console.log(name);
            checkval();
        });
        
        
            $(document).on('keyup','#mobile', function(){
            mobile = $('#mobile').val();
            checkval();
        });
        
        $(document).on('keyup','#email', function(){
            emailtemp = $('#email').val();
            if (validateEmail(emailtemp)){
                email = emailtemp;
                checkval();
            }else{
                email = null;
                checkval();
            }
        });
        
        function checkval() {
            if ( name == null || name.length === 0){
                hide();
                return
            }
            if ( mobile == null || mobile.length < 10 || mobile.length > 15){
                hide();
                return
            }
            if ( email == null || email.length === 0){
                hide();
                return
            }
            $( "#next" ).removeClass( "hide" );
            $( "#fake-btn" ).addClass( "hide" );
        }
        
        function hide(){
            if (!($( "#next" ).hasClass( "hide" ))) {
                $( "#next" ).addClass( "hide" );
                $( "#fake-btn" ).removeClass( "hide" );
            }
        }
        
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        
        
        var bname
        var nature
        var address
        
        $(document).on('keyup','#bname', function(){
            bname = $('#bname').val();
            checkvals();
        });
        
            $(document).on('keyup','#nature', function(){
            nature = $('#nature').val();
            checkvals();
        });
            $(document).on('keyup','#address', function(){
            address = $('#address').val();
            checkvals();
        });
        
        function checkvals() {
            if ( bname == null || bname.length === 0 ){
                hidesub();
                return
            }
            if ( nature == null || nature.length === 0 ){
                hidesub();
                return
            }
            if ( address == null || address.length === 0 ){
                hidesub();
                return
            }
            $( "#submit_btn" ).removeClass( "hide" );
            $( "#fake-btnn" ).addClass( "hide" );
        }
        
        function hidesub(){
            if (!($( "#submit_btn" ).hasClass( "hide" ))) {
                $( "#submit_btn" ).addClass( "hide" );
                $( "#fake-btnn" ).removeClass( "hide" );
            }
        }
        
        
        $(document).on('click','#for_part', function(){
            $('#partner_login').modal('hide');
            $('#partner_forget').modal('show');
        });
        
        $(document).on('click','#for_cust', function(){
            $('#cust_login').modal('hide');
            $('#cust_forget').modal('show');
        });
    });
        
        
</script>


<!--Popper js-->
<script src="assets/assets/js/popper.min.js"></script>
<!--Magnific popup js-->
<script src="assets/assets/js/jquery.magnific-popup.min.js"></script>
<!--jquery easing js-->
<script src="assets/assets/js/jquery.easing.min.js"></script>
<!--jquery ytplayer js-->
<script src="assets/assets/js/jquery.mb.YTPlayer.min.js"></script>
<!--wow js-->
<script src="assets/assets/js/wow.min.js"></script>
<!--owl carousel js-->
<script src="assets/assets/js/owl.carousel.min.js"></script>
<!--countdown js-->
<script src="assets/assets/js/jquery.countdown.min.js"></script>
<!--validator js-->
<script src="assets/assets/js/validator.min.js"></script>
<!--custom js-->
<script src="assets/assets/js/scripts.js"></script>
      
</body>
    
<!-- Mirrored from appco.themetags.com/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2020 09:56:21 GMT -->
</html>