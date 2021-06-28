<?php
include('dash/db.php');
include('session.php');

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
                
                $to = "mail.site101@gmail.com";
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
                <p style='color:#080;font-size:18px;'><a href='https://site101.in/partner/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>';
                </body>
                </html>
                ";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From: Site101 <noreply@site101.in>' . "\r\n";
                
                mail($to,$subject,$message,$headers);
                
                echo "<script>alert('Registration Successful!'); window.location='https://api.whatsapp.com/send?phone=918838082531&text=I have Registered As Reseller My Email Is : ".$email.", Kindly Active My Account!';</script>";
            }
            $stmt->close();
        }else{
            echo "<script>alert('Wrong capture, Try again'); window.location='/;</script>";
        }
        
        echo "<script>alert('Partner Not selected'); window.location='/';</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <link rel="icon" href="assets/img/8fdbdb7e1310a4e6421eb2872e73c2f9.png" sizes="32x32"/>
      <link rel="icon" href="assets/img/2c1626a4f9399a59a94887c1d87574d0.png" sizes="192x192"/>
      <link rel="apple-touch-icon-precomposed" href="assets/img/938e372dd03dc2b9371f4609dc794a86.png"/>
      
      <title>Digital Visiting Card PRO (Mini-Website) | Home</title>
      <meta name="description" content="Now Create Mini-Website just @ Rs.1/- Per Day. Create in 2 minutes and Impress Your Clients Digitally...">
      <meta property="og:title" content="">
      <meta property="og:description" content="">
      <meta property="og:url" content="">
      <meta content="summary_large_image" name="twitter:card">
      <meta content="width=device-width,initial-scale=1" name="viewport">
      <link class="brz-link brz-link-preview" href="assets/8e9c0a0ee6b60b1cbc9b18cf195e6b98.css" rel="stylesheet">
      <link class="brz-link brz-link-preview-pro" href="assets/dfc504d95e1ca01182c8ba044c30bf25.css" rel="stylesheet">
      
      
      
      <link rel="stylesheet" href="assets/assets_new/css/main.css" />
      <link rel="stylesheet" href="assets/assets_new/css/bootstrap.min.css">
       <link rel="stylesheet" href="assets/assets_new/css/style.css">
       <link rel="stylesheet" href="assets/assets_new/css/vegas.min.css">
       <link rel="stylesheet" href="assets/assets_new/css/fxt-animation.css">
      
      <style class="brz-style">.brz .css-8am1n7, .brz [data-css-8am1n7] {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 5px;stroke-width: 2.3;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-8am1n7:hover, .brz [data-css-8am1n7]:hover {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-8am1n7, .brz [data-css-8am1n7] {width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 0px;stroke-width: 1.4;}}
         @media (max-width: 767px) {.brz .css-8am1n7, .brz [data-css-8am1n7] {width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 0px;stroke-width: 1.4;}}
         .brz .css-1n2fmpp, .brz [data-css-1n2fmpp] {color: rgba(255,255,255,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 4px;stroke-width: 0;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-1n2fmpp:hover, .brz [data-css-1n2fmpp]:hover {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-1n2fmpp, .brz [data-css-1n2fmpp] {width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         @media (max-width: 767px) {.brz .css-1n2fmpp, .brz [data-css-1n2fmpp] {width: 32px;height: 32px;font-size: 32px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         .brz .css-17ysa7i, .brz [data-css-17ysa7i] {color: rgba(247,255,254,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 4px;stroke-width: 0;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-17ysa7i:hover, .brz [data-css-17ysa7i]:hover {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-17ysa7i, .brz [data-css-17ysa7i] {width: 48px;height: 48px;font-size: 48px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         @media (max-width: 767px) {.brz .css-17ysa7i, .brz [data-css-17ysa7i] {width: 32px;height: 32px;font-size: 32px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         .brz .css-wtjz1e, .brz [data-css-wtjz1e] {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 21px;height: 21px;font-size: 21px;padding: 0px;border-radius: 0;stroke-width: 0;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-wtjz1e:hover, .brz [data-css-wtjz1e]:hover {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-wtjz1e, .brz [data-css-wtjz1e] {width: 21px;height: 21px;font-size: 21px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         @media (max-width: 767px) {.brz .css-wtjz1e, .brz [data-css-wtjz1e] {width: 21px;height: 21px;font-size: 21px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         .brz .css-wno9xn, .brz [data-css-wno9xn] {color: rgba(5,202,182,1);border-color: rgba(204,204,204,0);background-color: rgba(0,153,0,0);background-image: none;border-width: 0;border-style: solid;width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 0;stroke-width: 0;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-wno9xn:hover, .brz [data-css-wno9xn]:hover {color: rgba(5,202,182,1);border-color: rgba(0,153,0,0);background-color: rgba(33,111,189,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-wno9xn, .brz [data-css-wno9xn] {width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         @media (max-width: 767px) {.brz .css-wno9xn, .brz [data-css-wno9xn] {width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         .brz .css-a0g0ha, .brz [data-css-a0g0ha] {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 32px;height: 32px;font-size: 32px;padding: 0px;border-radius: 3px;stroke-width: 0;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-a0g0ha:hover, .brz [data-css-a0g0ha]:hover {color: rgba(5,202,182,1);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-a0g0ha, .brz [data-css-a0g0ha] {width: 32px;height: 32px;font-size: 32px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         @media (max-width: 767px) {.brz .css-a0g0ha, .brz [data-css-a0g0ha] {width: 32px;height: 32px;font-size: 32px;padding: 0px;border-radius: 0px;stroke-width: 0;}}
         .brz .css-83kws0, .brz [data-css-83kws0] {color: rgba(102,102,102,.5);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;border-width: 0;border-style: solid;width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 5px;stroke-width: 2.3;transition: all .5s ease-in-out;transition-property: background,border-radius,color,border-color,box-shadow;-webkit-transition: all .5s ease-in-out;-moz-transition: all .5s ease-in-out;-webkit-transition-property: background,border-radius,color,border-color,box-shadow;-moz-transition-property: background,border-radius,color,border-color,box-shadow;}
         @media (min-width: 991px) {.brz .css-83kws0:hover, .brz [data-css-83kws0]:hover {color: rgba(102,102,102,.5);border-color: rgba(35,157,219,0);background-color: rgba(189,225,244,0);background-image: none;}}
         @media (max-width: 991px) {.brz .css-83kws0, .brz [data-css-83kws0] {width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 0px;stroke-width: 2.3;}}
         @media (max-width: 767px) {.brz .css-83kws0, .brz [data-css-83kws0] {width: 64px;height: 64px;font-size: 64px;padding: 0px;border-radius: 0px;stroke-width: 2.3;}}
      </style>
      <style class="brz-style">.brz .brz-css-zbjnw {z-index: auto;margin: 0;}
         .brz .brz-css-zbjnw .brz-section__content {min-height: auto;}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__dots {color: rgba(0,0,0,1);}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__arrow {color: rgba(0,0,0,.7);}
         @media (min-width:991px) {.brz .brz-css-zbjnw {display: block;}
         .brz .brz-css-zbjnw .brz-container__wrap {align-items: center;}}
         @media (min-width:991px) {.brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__arrow:hover {color: rgba(0,0,0,1);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zbjnw {z-index: auto;margin: 0;}
         .brz .brz-css-zbjnw .brz-section__content {min-height: auto;}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__dots {color: rgba(0,0,0,1);}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__arrow {color: rgba(0,0,0,.7);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zbjnw {display: block;}
         .brz .brz-css-zbjnw .brz-container__wrap {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-zbjnw {z-index: auto;margin: 0;}
         .brz .brz-css-zbjnw .brz-section__content {min-height: auto;}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__dots {color: rgba(0,0,0,1);}
         .brz .brz-css-zbjnw > .slick-slider > .brz-slick-slider__arrow {color: rgba(0,0,0,.7);}}
         @media (max-width:767px) {.brz .brz-css-zbjnw {display: block;}
         .brz .brz-css-zbjnw .brz-container__wrap {align-items: center;}}
         .brz .brz-css-ldgql > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__top {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(0deg) rotateY(0deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__bottom {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(-180deg) rotateY(-180deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-content {padding: 75px 0px 75px 0px;display: flex;}
         @media (min-width:991px) {.brz .brz-css-ldgql > .brz-bg-media > .brz-bg-image {background-attachment: scroll;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ldgql > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__top {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(0deg) rotateY(0deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__bottom {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(-180deg) rotateY(-180deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-content {padding: 50px 15px 50px 15px;display: flex;}}
         @media (max-width:767px) {.brz .brz-css-ldgql > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__top {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(0deg) rotateY(0deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-media > .brz-bg-shape__bottom {background-image: none;background-size: 100% 100px;height: 100px;transform: rotateX(-180deg) rotateY(-180deg);z-index: auto;}
         .brz .brz-css-ldgql > .brz-bg-content {padding: 25px 15px 25px 15px;display: flex;}}
         .brz .brz-css-irtvk {border: 0px solid transparent;}
         @media (min-width:991px) {.brz .brz-css-irtvk {max-width: 100%;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-irtvk {border: 0px solid transparent;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-irtvk {max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-irtvk {border: 0px solid transparent;}}
         @media (max-width:767px) {.brz .brz-css-irtvk {max-width: 100%;}}
         @media (min-width:991px) {.brz .brz-css-itweo {max-width: 1170px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-itweo {max-width: 1170px;}}
         @media (max-width:767px) {.brz .brz-css-itweo {max-width: 1170px;}}
         .brz .brz-css-alnld {margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-alnld {margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-alnld {margin: 0;}}
         .brz .brz-css-veruz {z-index: auto;align-items: flex-start;}
         .brz .brz-css-veruz > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-veruz > .brz-bg-content {border: 0px solid transparent;}
         @media (min-width:991px) {.brz .brz-css-veruz {max-width: 100%;min-height: auto;display: flex;}
         .brz .brz-css-veruz > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-video {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-veruz {z-index: auto;align-items: flex-start;}
         .brz .brz-css-veruz > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-veruz > .brz-bg-content {border: 0px solid transparent;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-veruz {max-width: 100%;min-height: auto;display: flex;}
         .brz .brz-css-veruz > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-video {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-veruz {z-index: auto;align-items: flex-start;}
         .brz .brz-css-veruz > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-map {display: none;}
         .brz .brz-css-veruz > .brz-bg-content {border: 0px solid transparent;}}
         @media (max-width:767px) {.brz .brz-css-veruz {max-width: 100%;min-height: auto;display: flex;}
         .brz .brz-css-veruz > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-media > .brz-bg-video {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-veruz > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         .brz .brz-css-ippaq {padding: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ippaq {padding: 0;}}
         @media (max-width:767px) {.brz .brz-css-ippaq {padding: 0;}}
         .brz .brz-css-aghhv {z-index: auto;flex: 1 1 50%;max-width: 50%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-aghhv {z-index: auto;flex: 1 1 50%;max-width: 50%;}}
         @media (max-width:767px) {.brz .brz-css-aghhv {z-index: auto;flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-wqmvr {z-index: auto;align-items: flex-start;padding: 5px 15px 5px 15px;margin: 0;}
         .brz .brz-css-wqmvr > .brz-bg-content {border: 0px solid transparent;}
         .brz .brz-css-wqmvr > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}
         @media (min-width:991px) {.brz .brz-css-wqmvr {display: flex;}
         .brz .brz-css-wqmvr > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wqmvr {z-index: auto;align-items: flex-start;padding: 5px 15px 5px 15px;margin: 0;}
         .brz .brz-css-wqmvr > .brz-bg-content {border: 0px solid transparent;}
         .brz .brz-css-wqmvr > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wqmvr {display: flex;}
         .brz .brz-css-wqmvr > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}}
         @media (max-width:767px) {.brz .brz-css-wqmvr {z-index: auto;align-items: flex-start;padding: 0;margin: 10px 0px 10px 0px;}
         .brz .brz-css-wqmvr > .brz-bg-content {border: 0px solid transparent;}
         .brz .brz-css-wqmvr > .brz-bg-media {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {background-image: none;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,0);background-image: none;}}
         @media (max-width:767px) {.brz .brz-css-wqmvr {display: flex;}
         .brz .brz-css-wqmvr > .brz-bg-content {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-image {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}
         .brz .brz-css-wqmvr > .brz-bg-media > .brz-bg-color {transition-duration: .5s;transition-property: filter,box-shadow,background,border-radius,border-color;}}
         @media (min-width:991px) {.brz .brz-css-wfugs {display: block;z-index: auto;position: relative;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wfugs {display: block;z-index: auto;position: relative;}}
         @media (max-width:767px) {.brz .brz-css-wfugs {display: block;z-index: auto;position: relative;}}
         .brz .brz-css-gxzco {padding: 0;margin: 10px 0px 10px 0px;justify-content: center;position: relative;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gxzco {padding: 0;margin: 10px 0px 10px 0px;justify-content: center;position: relative;}}
         @media (max-width:767px) {.brz .brz-css-gxzco {padding: 0;margin: 10px 0px 10px 0px;justify-content: center;position: relative;}}
         .brz .brz-css-zzcwm {max-width: 100%;height: 72px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-zzcwm {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zzcwm {max-width: 100%;height: 49px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zzcwm {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-zzcwm {max-width: 100%;height: 144px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-zzcwm {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zzcwm .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-xvjaf {padding-top: 36.1809%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xvjaf {padding-top: 36.0294%;}}
         @media (max-width:767px) {.brz .brz-css-xvjaf {padding-top: 36%;}}
         @media (min-width:991px) {.brz .brz-css-amamn {display: block;position: relative;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-amamn {display: block;position: relative;}}
         @media (max-width:767px) {.brz .brz-css-amamn {display: block;position: relative;}}
         .brz .brz-css-ishxb {justify-content: center;padding: 0;margin: 0px -5px -20px -5px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ishxb {justify-content: center;padding: 0;margin: 0px -5px -20px -5px;}}
         @media (max-width:767px) {.brz .brz-css-ishxb {justify-content: center;padding: 0;margin: 0px -5px -20px -5px;}}
         .brz .brz-css-grmwo {padding: 0px 5px 20px 5px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-grmwo {padding: 0px 5px 20px 5px;}}
         @media (max-width:767px) {.brz .brz-css-grmwo {padding: 0px 5px 20px 5px;}}
         .brz .brz-css-yhslb {z-index: auto;position: relative;margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yhslb {z-index: auto;position: relative;margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-yhslb {z-index: auto;position: relative;margin: 10px 0px 10px 0px;}}
         .brz .brz-css-jzmrc.brz-btn {font-family: Overpass,sans-serif;font-weight: 700;font-size: 15px;line-height: 1.6;letter-spacing: 0px;color: rgba(255,255,255,1);border: 2px solid rgba(5,202,182,0);background-color: rgba(5,202,182,1);background-image: none;border-radius: 2px;padding: 14px 42px 14px 42px;flex-flow: row-reverse nowrap;}
         @media (min-width:991px) {.brz .brz-css-jzmrc.brz-btn {transition-duration: .5s;transition-property: color,box-shadow,background,border-color;}}
         @media (min-width:991px) {.brz .brz-css-jzmrc.brz-btn:hover {background-color: rgba(5,202,182,.8);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jzmrc.brz-btn {font-family: Overpass,sans-serif;font-weight: 700;font-size: 17px;line-height: 1.6;letter-spacing: 0px;color: rgba(255,255,255,1);border: 2px solid rgba(5,202,182,0);background-color: rgba(5,202,182,1);background-image: none;border-radius: 2px;padding: 11px 26px 11px 26px;flex-flow: row-reverse nowrap;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jzmrc.brz-btn {transition-duration: .5s;transition-property: color,box-shadow,background,border-color;}}
         @media (max-width:767px) {.brz .brz-css-jzmrc.brz-btn {font-family: Overpass,sans-serif;font-weight: 700;font-size: 15px;line-height: 1.6;letter-spacing: 0px;color: rgba(255,255,255,1);border: 2px solid rgba(5,202,182,0);background-color: rgba(5,202,182,1);background-image: none;border-radius: 2px;padding: 11px 26px 11px 26px;flex-flow: row-reverse nowrap;}}
         @media (max-width:767px) {.brz .brz-css-jzmrc.brz-btn {transition-duration: .5s;transition-property: color,box-shadow,background,border-color;}}
         .brz .brz-css-jfqjt .brz-ed-box__resizer {width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jfqjt .brz-ed-box__resizer {width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-jfqjt .brz-ed-box__resizer {width: 100%;}}
         .brz .brz-css-rduub {max-width: 100%;height: 399px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-rduub {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rduub {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rduub {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-rduub {max-width: 100%;height: 258px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-rduub {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-rduub .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-xuxxp {padding-top: 74.7191%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xuxxp {padding-top: 74.6313%;}}
         @media (max-width:767px) {.brz .brz-css-xuxxp {padding-top: 74.7826%;}}
         .brz .brz-css-jyjfy {height: 50px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jyjfy {height: 50px;}}
         @media (max-width:767px) {.brz .brz-css-jyjfy {height: 50px;}}
         .brz .brz-css-decrt {max-width: 80%;height: 191px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-decrt {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-decrt {max-width: 80%;height: 139px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-decrt {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-decrt {max-width: 80%;height: 219px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-decrt {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-decrt .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-hubjc {padding-top: 80.5907%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hubjc {padding-top: 80.3468%;}}
         @media (max-width:767px) {.brz .brz-css-hubjc {padding-top: 80.5147%;}}
         .brz .brz-css-tzuov {max-width: 80%;height: 191px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-tzuov {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tzuov {max-width: 80%;height: 139px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tzuov {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-tzuov {max-width: 80%;height: 219px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-tzuov {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-tzuov .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-mmski {padding-top: 80.5907%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mmski {padding-top: 80.3468%;}}
         @media (max-width:767px) {.brz .brz-css-mmski {padding-top: 80.5147%;}}
         .brz .brz-css-jpdlw {max-width: 80%;height: 192px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-jpdlw {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jpdlw {max-width: 80%;height: 140px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jpdlw {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-jpdlw {max-width: 80%;height: 219px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-jpdlw {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-jpdlw .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-eelia {padding-top: 80.6723%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-eelia {padding-top: 80.9249%;}}
         @media (max-width:767px) {.brz .brz-css-eelia {padding-top: 80.5147%;}}
         .brz .brz-css-prwla {flex-direction: row;}
         .brz .brz-css-prwla .brz-icon__container {margin-left: auto;margin-right: 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-prwla {flex-direction: row;}
         .brz .brz-css-prwla .brz-icon__container {margin-left: auto;margin-right: 20px;}}
         @media (max-width:767px) {.brz .brz-css-prwla {flex-direction: row;}
         .brz .brz-css-prwla .brz-icon__container {margin-left: auto;margin-right: 20px;}}
         .brz .brz-css-pkzjz {width: 75%;}
         .brz .brz-css-pkzjz .brz-hr {border-top: 2px solid rgba(102,102,102,.75);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-pkzjz {width: 75%;}
         .brz .brz-css-pkzjz .brz-hr {border-top: 2px solid rgba(102,102,102,.75);}}
         @media (max-width:767px) {.brz .brz-css-pkzjz {width: 75%;}
         .brz .brz-css-pkzjz .brz-hr {border-top: 2px solid rgba(102,102,102,.75);}}
         .brz .brz-css-atgso {max-width: 100%;height: 383px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-atgso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-atgso {max-width: 100%;height: 232px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-atgso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-atgso {max-width: 100%;height: 243px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-atgso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-atgso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-wwpkt {padding-top: 72.5379%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wwpkt {padding-top: 72.7273%;}}
         @media (max-width:767px) {.brz .brz-css-wwpkt {padding-top: 72.3214%;}}
         .brz .brz-css-fzoox {width: calc(100% + 5px);margin: -2.5px;}
         .brz .brz-css-fzoox .brz-image__gallery-item {width: 50%;padding: 2.5px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fzoox {width: calc(100% + 5px);margin: -2.5px;}
         .brz .brz-css-fzoox .brz-image__gallery-item {width: 50%;padding: 2.5px;}}
         @media (max-width:767px) {.brz .brz-css-fzoox {width: calc(100% + 5px);margin: -2.5px;}
         .brz .brz-css-fzoox .brz-image__gallery-item {width: 100%;padding: 2.5px;}}
         .brz .brz-css-undwb {max-width: 100%;height: 261px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-undwb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-undwb {max-width: 100%;height: 182px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-undwb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-undwb {max-width: 100%;height: 255px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-undwb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-undwb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-yjvhs {padding-top: 101.9531%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yjvhs {padding-top: 102.2472%;}}
         @media (max-width:767px) {.brz .brz-css-yjvhs {padding-top: 102%;}}
         .brz .brz-css-ovptb {max-width: 100%;height: 266px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-ovptb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ovptb {max-width: 100%;height: 185px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ovptb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-ovptb {max-width: 100%;height: 260px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-ovptb {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ovptb .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-mbcrc {padding-top: 103.9063%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mbcrc {padding-top: 103.9326%;}}
         @media (max-width:767px) {.brz .brz-css-mbcrc {padding-top: 104%;}}
         .brz .brz-css-nvjmu {max-width: 100%;height: 269px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-nvjmu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nvjmu {max-width: 100%;height: 187px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nvjmu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-nvjmu {max-width: 100%;height: 263px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-nvjmu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nvjmu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-bjlgh {padding-top: 105.0781%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bjlgh {padding-top: 105.0562%;}}
         @media (max-width:767px) {.brz .brz-css-bjlgh {padding-top: 105.2%;}}
         .brz .brz-css-qzyan {max-width: 100%;height: 261px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-qzyan {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qzyan {max-width: 100%;height: 182px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qzyan {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-qzyan {max-width: 100%;height: 255px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-qzyan {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-qzyan .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-fylek {padding-top: 101.9531%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fylek {padding-top: 102.2472%;}}
         @media (max-width:767px) {.brz .brz-css-fylek {padding-top: 102%;}}
         .brz .brz-css-nwobu {max-width: 100%;height: 266px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-nwobu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nwobu {max-width: 100%;height: 185px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nwobu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-nwobu {max-width: 100%;height: 260px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-nwobu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-nwobu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-shzrn {padding-top: 103.9063%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-shzrn {padding-top: 103.9326%;}}
         @media (max-width:767px) {.brz .brz-css-shzrn {padding-top: 104%;}}
         .brz .brz-css-ckuin {max-width: 100%;height: 264px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-ckuin {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ckuin {max-width: 100%;height: 183px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ckuin {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-ckuin {max-width: 100%;height: 258px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-ckuin {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ckuin .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-qfgje {padding-top: 103.125%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qfgje {padding-top: 102.809%;}}
         @media (max-width:767px) {.brz .brz-css-qfgje {padding-top: 103.2%;}}
         .brz .brz-css-imkjx {max-width: 100%;height: 261px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-imkjx {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-imkjx {max-width: 100%;height: 182px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-imkjx {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-imkjx {max-width: 100%;height: 255px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-imkjx {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-imkjx .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-uwqpx {padding-top: 101.9531%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uwqpx {padding-top: 102.2472%;}}
         @media (max-width:767px) {.brz .brz-css-uwqpx {padding-top: 102%;}}
         .brz .brz-css-venyp {max-width: 100%;height: 259px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-venyp {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-venyp {max-width: 100%;height: 180px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-venyp {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-venyp {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-venyp {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-venyp .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-qqdgw {padding-top: 101.1719%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qqdgw {padding-top: 101.1236%;}}
         @media (max-width:767px) {.brz .brz-css-qqdgw {padding-top: 101.2%;}}
         .brz .brz-css-drcsy {max-width: 100%;height: 259px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-drcsy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-drcsy {max-width: 100%;height: 180px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-drcsy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-drcsy {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-drcsy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-drcsy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-vizrv {padding-top: 101.1719%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vizrv {padding-top: 101.1236%;}}
         @media (max-width:767px) {.brz .brz-css-vizrv {padding-top: 101.2%;}}
         .brz .brz-css-xpmfn {max-width: 100%;height: 256px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-xpmfn {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xpmfn {max-width: 100%;height: 178px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xpmfn {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-xpmfn {max-width: 100%;height: 250px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-xpmfn {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-xpmfn .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-dhypd {padding-top: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dhypd {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-dhypd {padding-top: 100%;}}
         .brz .brz-css-dbvxq {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-dbvxq {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dbvxq {max-width: 100%;height: 176px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dbvxq {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-dbvxq {max-width: 100%;height: 248px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-dbvxq {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-dbvxq .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-sdeof {padding-top: 98.8281%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-sdeof {padding-top: 98.8764%;}}
         @media (max-width:767px) {.brz .brz-css-sdeof {padding-top: 99.2%;}}
         .brz .brz-css-ysouy {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-ysouy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ysouy {max-width: 100%;height: 176px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ysouy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-ysouy {max-width: 100%;height: 248px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-ysouy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ysouy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-mgmax {padding-top: 98.8281%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mgmax {padding-top: 98.8764%;}}
         @media (max-width:767px) {.brz .brz-css-mgmax {padding-top: 99.2%;}}
         .brz .brz-css-ijyqu {max-width: 100%;height: 256px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-ijyqu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ijyqu {max-width: 100%;height: 178px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ijyqu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-ijyqu {max-width: 100%;height: 250px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-ijyqu {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ijyqu .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-yonuo {padding-top: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yonuo {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-yonuo {padding-top: 100%;}}
         .brz .brz-css-vasgf {max-width: 100%;height: 256px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-vasgf {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vasgf {max-width: 100%;height: 178px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vasgf {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-vasgf {max-width: 100%;height: 250px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-vasgf {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-vasgf .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-witly {padding-top: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-witly {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-witly {padding-top: 100%;}}
         .brz .brz-css-ptskg {max-width: 100%;height: 253px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-ptskg {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ptskg {max-width: 100%;height: 176px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ptskg {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-ptskg {max-width: 100%;height: 248px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-ptskg {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-ptskg .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-imiaz {padding-top: 98.8281%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-imiaz {padding-top: 98.8764%;}}
         @media (max-width:767px) {.brz .brz-css-imiaz {padding-top: 99.2%;}}
         .brz .brz-css-isbyi {max-width: 100%;height: 256px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-isbyi {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-isbyi {max-width: 100%;height: 178px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-isbyi {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-isbyi {max-width: 100%;height: 250px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-isbyi {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-isbyi .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-tbarx {padding-top: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tbarx {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-tbarx {padding-top: 100%;}}
         .brz .brz-css-zaxfy {max-width: 36%;height: 95px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-zaxfy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zaxfy {max-width: 36%;height: 66px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zaxfy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-zaxfy {max-width: 26%;height: 95px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-zaxfy {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-zaxfy .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-gczlv {padding-top: 98.9583%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gczlv {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-gczlv {padding-top: 98.9583%;}}
         .brz .brz-css-weuim {max-width: 36%;height: 95px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-weuim {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-weuim {max-width: 36%;height: 66px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-weuim {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-weuim {max-width: 26%;height: 95px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-weuim {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-weuim .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-bmfrp {padding-top: 98.9583%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bmfrp {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-bmfrp {padding-top: 98.9583%;}}
         .brz .brz-css-mnaso {max-width: 36%;height: 96px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-mnaso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mnaso {max-width: 36%;height: 66px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mnaso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-mnaso {max-width: 26%;height: 95px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-mnaso {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-mnaso .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-rxcks {padding-top: 98.9691%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rxcks {padding-top: 100%;}}
         @media (max-width:767px) {.brz .brz-css-rxcks {padding-top: 98.9583%;}}
         .brz .brz-css-jukyd {width: 100%;height: 400px;}
         .brz .brz-css-jukyd:before {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-jukyd:after {height: unset;}
         .brz .brz-css-jukyd .brz-map-content {border-radius: 0;}
         @media (min-width:991px) {.brz .brz-css-jukyd:before {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-map-content {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-iframe {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jukyd {width: 100%;height: 400px;}
         .brz .brz-css-jukyd:before {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-jukyd:after {height: unset;}
         .brz .brz-css-jukyd .brz-map-content {border-radius: 0;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jukyd:before {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-map-content {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-iframe {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}}
         @media (max-width:767px) {.brz .brz-css-jukyd {width: 100%;height: 400px;}
         .brz .brz-css-jukyd:before {border: 0px solid rgba(102,115,141,0);border-radius: 0;}
         .brz .brz-css-jukyd:after {height: unset;}
         .brz .brz-css-jukyd .brz-map-content {border-radius: 0;}}
         @media (max-width:767px) {.brz .brz-css-jukyd:before {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-map-content {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}
         .brz .brz-css-jukyd .brz-iframe {transition-duration: .5s;transition-property: filter,box-shadow,border-radius,border;}}
         .brz .brz-css-crjba {max-width: 45%;height: 75px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}
         @media (min-width:991px) {.brz .brz-css-crjba {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-crjba {max-width: 45%;height: 46px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-crjba {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         @media (max-width:767px) {.brz .brz-css-crjba {max-width: 45%;height: 54px;border: 0px solid rgba(102,115,141,0);border-radius: 0px;}}
         @media (max-width:767px) {.brz .brz-css-crjba {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba:after {transition-duration: .5s;transition-property: border,box-shadow,filter;}
         .brz .brz-css-crjba .brz-picture {transition-duration: .5s;transition-property: border,box-shadow,filter;}}
         .brz .brz-css-fqnmt {padding-top: 29.8805%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fqnmt {padding-top: 30.0654%;}}
         @media (max-width:767px) {.brz .brz-css-fqnmt {padding-top: 30%;}}
         .brz .brz-css-ntdxp {padding: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ntdxp {padding: 0;}}
         @media (max-width:767px) {.brz .brz-css-ntdxp {padding: 0;}}
         .brz .brz-css-adtby {margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-adtby {margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-adtby {margin: 0;}}
         .brz .brz-css-ggxec > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-ggxec > .brz-bg-media > .brz-bg-shape__bottom {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 200px;height: 200px;}
         .brz .brz-css-ggxec > .brz-bg-content {padding: 15px 0px 225px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ggxec > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-ggxec > .brz-bg-media > .brz-bg-shape__bottom {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 98px;height: 98px;}
         .brz .brz-css-ggxec > .brz-bg-content {padding: 15px 15px 100px 15px;}}
         @media (max-width:767px) {.brz .brz-css-ggxec > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-ggxec > .brz-bg-media > .brz-bg-shape__bottom {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 98px;height: 98px;}
         .brz .brz-css-ggxec > .brz-bg-content {padding: 15px 15px 90px 15px;}}
         .brz .brz-css-sbmvh {flex: 1 1 20%;max-width: 20%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-sbmvh {flex: 1 1 23.1%;max-width: 23.1%;}}
         @media (max-width:767px) {.brz .brz-css-sbmvh {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-ikuca {padding: 5px 15px 5px 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ikuca {padding: 5px 15px 5px 20px;}}
         @media (max-width:767px) {.brz .brz-css-ikuca {padding: 0;}}
         .brz .brz-css-vtvkg {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vtvkg {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-vtvkg {height: auto;}}
         .brz .brz-css-bctet {flex: 1 1 20%;max-width: 20%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bctet {flex: 1 1 54.2%;max-width: 54.2%;}}
         @media (max-width:767px) {.brz .brz-css-bctet {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-vhvla {align-items: center;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vhvla {align-items: center;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-vhvla {align-items: center;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-vhvla {display: none;}}
         .brz .brz-css-tlwbl {justify-content: flex-end;margin: 0px -20px -20px -20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tlwbl {justify-content: center;margin: 0px -19px -20px -19px;}}
         @media (max-width:767px) {.brz .brz-css-tlwbl {justify-content: center;margin: 0px -22.5px -20px -22.5px;}}
         .brz .brz-css-uvyfw {padding: 0px 20px 20px 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uvyfw {padding: 0px 19px 20px 19px;}}
         @media (max-width:767px) {.brz .brz-css-uvyfw {padding: 0px 22.5px 20px 22.5px;}}
         .brz .brz-css-fnlop {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fnlop {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-fnlop {margin: 0;}}
         .brz .brz-css-dptms.brz-btn {font-size: 16px;line-height: 1.5;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}
         @media (min-width:991px) {.brz .brz-css-dptms.brz-btn {transition-duration: .3s;}}
         @media (min-width:991px) {.brz .brz-css-dptms.brz-btn:hover {color: rgba(28,28,28,1);border: 0px solid rgba(5,202,182,0);background-color: rgba(5,202,182,0);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dptms.brz-btn {font-size: 17px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dptms.brz-btn {transition-duration: .3s;}}
         @media (max-width:767px) {.brz .brz-css-dptms.brz-btn {font-size: 15px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:767px) {.brz .brz-css-dptms.brz-btn {transition-duration: .3s;}}
         .brz .brz-css-xdisj {flex: 1 1 20%;max-width: 20%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xdisj {flex: 1 1 20%;max-width: 20%;}}
         @media (max-width:767px) {.brz .brz-css-xdisj {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-upmwd {display: none;}}
         .brz .brz-css-rlpnq {justify-content: flex-end;margin: 0px -20px -20px -20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rlpnq {justify-content: center;margin: 0px -19px -20px -19px;}}
         @media (max-width:767px) {.brz .brz-css-rlpnq {justify-content: center;margin: 0px -22.5px -20px -22.5px;}}
         .brz .brz-css-hvvwv {padding: 0px 20px 20px 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hvvwv {padding: 0px 19px 20px 19px;}}
         @media (max-width:767px) {.brz .brz-css-hvvwv {padding: 0px 22.5px 20px 22.5px;}}
         .brz .brz-css-mnpvd {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mnpvd {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-mnpvd {margin: 0;}}
         .brz .brz-css-ypsny.brz-btn {font-size: 16px;line-height: 1.5;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}
         @media (min-width:991px) {.brz .brz-css-ypsny.brz-btn {transition-duration: .3s;}}
         @media (min-width:991px) {.brz .brz-css-ypsny.brz-btn:hover {color: rgba(28,28,28,1);border: 0px solid rgba(5,202,182,0);background-color: rgba(5,202,182,0);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ypsny.brz-btn {font-size: 17px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ypsny.brz-btn {transition-duration: .3s;}}
         @media (max-width:767px) {.brz .brz-css-ypsny.brz-btn {font-size: 15px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:767px) {.brz .brz-css-ypsny.brz-btn {transition-duration: .3s;}}
         .brz .brz-css-prixf {flex: 1 1 20%;max-width: 20%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-prixf {flex: 1 1 20%;max-width: 20%;}}
         @media (max-width:767px) {.brz .brz-css-prixf {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-wkzti {justify-content: flex-end;margin: 0px -20px -20px -20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wkzti {justify-content: center;margin: 0px -19px -20px -19px;}}
         @media (max-width:767px) {.brz .brz-css-wkzti {justify-content: center;margin: 0px -22.5px -20px -22.5px;}}
         .brz .brz-css-wyahd {padding: 0px 20px 20px 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wyahd {padding: 0px 19px 20px 19px;}}
         @media (max-width:767px) {.brz .brz-css-wyahd {padding: 0px 22.5px 20px 22.5px;}}
         .brz .brz-css-uqrro {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uqrro {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-uqrro {margin: -20px 0px 0px 0px;}}
         .brz .brz-css-phknn.brz-btn {font-size: 16px;line-height: 1.5;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}
         @media (min-width:991px) {.brz .brz-css-phknn.brz-btn {transition-duration: .3s;}}
         @media (min-width:991px) {.brz .brz-css-phknn.brz-btn:hover {color: rgba(28,28,28,1);border: 0px solid rgba(5,202,182,0);background-color: rgba(5,202,182,0);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-phknn.brz-btn {font-size: 17px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-phknn.brz-btn {transition-duration: .3s;}}
         @media (max-width:767px) {.brz .brz-css-phknn.brz-btn {font-size: 15px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:767px) {.brz .brz-css-phknn.brz-btn {transition-duration: .3s;}}
         .brz .brz-css-ffcym {flex: 1 1 20%;max-width: 20%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ffcym {flex: 1 1 20%;max-width: 20%;}}
         @media (max-width:767px) {.brz .brz-css-ffcym {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-lajcd {justify-content: flex-start;padding: 0;margin: 0px -20px -20px -20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lajcd {justify-content: center;padding: 0;margin: 0px -19px -20px -19px;}}
         @media (max-width:767px) {.brz .brz-css-lajcd {justify-content: center;padding: 21px;margin: 0px -22.5px -20px -22.5px;}}
         .brz .brz-css-dmlyc {padding: 0px 20px 20px 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dmlyc {padding: 0px 19px 20px 19px;}}
         @media (max-width:767px) {.brz .brz-css-dmlyc {padding: 0px 22.5px 20px 22.5px;}}
         .brz .brz-css-epwic {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-epwic {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-epwic {margin: -49px 0px 0px 0px;}}
         .brz .brz-css-rzidi.brz-btn {font-size: 16px;line-height: 1.5;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}
         @media (min-width:991px) {.brz .brz-css-rzidi.brz-btn {transition-duration: .3s;}}
         @media (min-width:991px) {.brz .brz-css-rzidi.brz-btn:hover {color: rgba(28,28,28,1);border: 0px solid rgba(5,202,182,0);background-color: rgba(5,202,182,0);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rzidi.brz-btn {font-size: 17px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rzidi.brz-btn {transition-duration: .3s;}}
         @media (max-width:767px) {.brz .brz-css-rzidi.brz-btn {font-size: 15px;line-height: 1.6;color: rgba(235,235,235,1);border: 0px solid rgba(35,157,219,0);background-color: rgba(35,157,219,0);padding: 11px 0px 11px 0px;}}
         @media (max-width:767px) {.brz .brz-css-rzidi.brz-btn {transition-duration: .3s;}}
         .brz .brz-css-rjqjv {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rjqjv {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-rjqjv {margin: -52px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gcgkv > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-gcgkv > .brz-bg-content > .brz-row {flex-direction: row-reverse;flex-wrap: wrap-reverse;justify-content: flex-end;}}
         .brz .brz-css-gezgy {flex: 1 1 50%;max-width: 50%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gezgy {flex: 1 1 42%;max-width: 42%;}}
         @media (max-width:767px) {.brz .brz-css-gezgy {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-wmzio {align-items: center;padding: 5px 15px 5px 25px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wmzio {align-items: center;padding: 5px 20px 5px 20px;}}
         @media (max-width:767px) {.brz .brz-css-wmzio {align-items: center;padding: 10px 0px 0px 0px;}}
         .brz .brz-css-rveqf {padding: 0;margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rveqf {padding: 0px 15px 0px 0px;margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-rveqf {padding: 0;margin: 0;}}
         .brz .brz-css-dimem {padding: 0px 30px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dimem {padding: 0;}}
         @media (max-width:767px) {.brz .brz-css-dimem {padding: 0px 60px 0px 60px;}}
         .brz .brz-css-zugcx {padding: 24px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zugcx {padding: 0;}}
         @media (max-width:767px) {.brz .brz-css-zugcx {padding: 0;}}
         .brz .brz-css-sbpua.brz-btn {font-family: Palanquin Dark,sans-serif;font-weight: 400;font-size: 21px;color: rgba(252,252,252,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 9px 32px 9px 32px;}
         @media (min-width:991px) {.brz .brz-css-sbpua.brz-btn:hover {color: rgba(28,28,28,1);border: 2px solid rgba(255,255,255,1);background-color: rgba(255,255,255,1);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-sbpua.brz-btn {font-family: Palanquin Dark,sans-serif;font-weight: 700;font-size: 17px;color: rgba(252,252,252,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 14px 42px 14px 42px;}}
         @media (max-width:767px) {.brz .brz-css-sbpua.brz-btn {font-family: Palanquin Dark,sans-serif;font-weight: 400;font-size: 26px;color: rgba(252,252,252,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 11px 14px 11px 14px;}}
         .brz .brz-css-kwwfr {padding: 2px 2px 2px 28px;margin: 10px 0px 10px -9px;justify-content: flex-start;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kwwfr {padding: 0;margin: 10px 0px 10px 0px;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-kwwfr {padding: 0;margin: 32px 0px 1px 55px;justify-content: center;}}
         .brz .brz-css-qpzth {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qpzth {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-qpzth {height: auto;}}
         .brz .brz-css-lmzlk > .brz-bg-content {padding: 50px 0px 21px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lmzlk > .brz-bg-content {padding: 15px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-lmzlk > .brz-bg-content {padding: 20px 15px 25px 15px;}}
         .brz .brz-css-gpwpe {padding: 0;margin: 10px 25% 10px 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gpwpe {padding: 0px 80px 0px 80px;margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-gpwpe {padding: 0;margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-vckxs {display: none;}}
         .brz .brz-css-ezixh {height: 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ezixh {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-ezixh {height: 20px;}}
         .brz .brz-css-zftlk {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zftlk {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-zftlk {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-dumyu {padding: 5px 12% 5px 12%;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dumyu {padding: 5px 15px 5px 15px;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-dumyu {padding: 0px 30px 0px 30px;margin: 0;}}
         .brz .brz-css-vwgzu {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vwgzu {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-vwgzu {height: auto;}}
         .brz .brz-css-qolrs {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qolrs {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-qolrs {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-zrfmt {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zrfmt {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-zrfmt {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-rqtlw {padding: 5px 12% 5px 12%;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rqtlw {padding: 5px 15px 5px 15px;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-rqtlw {padding: 0px 30px 0px 30px;margin: 0;}}
         .brz .brz-css-zujis {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zujis {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-zujis {height: auto;}}
         .brz .brz-css-nhurj {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nhurj {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-nhurj {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-abbzw {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-abbzw {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-abbzw {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-uvfwi {padding: 5px 12% 5px 12%;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uvfwi {padding: 5px 15px 5px 15px;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-uvfwi {padding: 0px 30px 0px 30px;margin: 0;}}
         .brz .brz-css-wwxrj {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wwxrj {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-wwxrj {height: auto;}}
         .brz .brz-css-fdlxt {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fdlxt {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-fdlxt {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-lroem {height: 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lroem {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-lroem {height: 20px;}}
         .brz .brz-css-bonbm.brz-btn {color: rgba(28,28,28,1);border: 2px solid rgba(28,28,28,1);background-color: rgba(5,202,182,0);border-radius: 4px;padding: 18px 56px 18px 56px;}
         @media (min-width:991px) {.brz .brz-css-bonbm.brz-btn:hover {color: rgba(255,255,255,1);border: 2px solid rgba(28,28,28,0);background-color: rgba(28,28,28,1);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bonbm.brz-btn {color: rgba(28,28,28,1);border: 2px solid rgba(28,28,28,1);background-color: rgba(5,202,182,0);border-radius: 4px;padding: 14px 42px 14px 42px;}}
         @media (max-width:767px) {.brz .brz-css-bonbm.brz-btn {color: rgba(28,28,28,1);border: 2px solid rgba(28,28,28,1);background-color: rgba(5,202,182,0);border-radius: 4px;padding: 14px 42px 14px 42px;}}
         .brz .brz-css-kftqa > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-kftqa > .brz-bg-media > .brz-bg-color {background-color: rgba(5,202,182,1);}
         .brz .brz-css-kftqa > .brz-bg-content {padding: 15px 0px 15px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kftqa > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-kftqa > .brz-bg-media > .brz-bg-color {background-color: rgba(5,202,182,1);}
         .brz .brz-css-kftqa > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-kftqa > .brz-bg-media {border-radius: 17px;}
         .brz .brz-css-kftqa > .brz-bg-media > .brz-bg-color {background-color: rgba(5,202,182,1);}
         .brz .brz-css-kftqa > .brz-bg-content {padding: 0px 15px 0px 15px;}}
         .brz .brz-css-tfynj {margin: 10px 0px -17px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tfynj {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-tfynj {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-xdzty > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/fb50309f800f1726e6ab8f4b10618b2d.jpeg");background-position: 50% 50%;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-color {background-color: rgba(253,253,253,.98);}
         .brz .brz-css-xdzty > .brz-bg-content {padding: 39px 0px 75px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xdzty > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/fb50309f800f1726e6ab8f4b10618b2d.jpeg");background-position: 50% 50%;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-color {background-color: rgba(253,253,253,.98);}
         .brz .brz-css-xdzty > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-xdzty > .brz-bg-media {border-radius: 17px;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/fb50309f800f1726e6ab8f4b10618b2d.jpeg");background-position: 50% 50%;}
         .brz .brz-css-xdzty > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         .brz .brz-css-xdzty > .brz-bg-content {padding: 25px 15px 25px 15px;}}
         @media (min-width:991px) {.brz .brz-css-ukhog {max-width: 85%;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ukhog {max-width: 85%;}}
         @media (max-width:767px) {.brz .brz-css-ukhog {max-width: 85%;}}
         @media (max-width:767px) {.brz .brz-css-mwrwm {display: none;}}
         .brz .brz-css-sjtyc {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-sjtyc {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-sjtyc {margin: 10px -20px 10px -20px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jzdxt > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-jzdxt > .brz-bg-content > .brz-row {flex-direction: row-reverse;flex-wrap: wrap-reverse;justify-content: flex-end;}}
         .brz .brz-css-eyjeu {flex: 1 1 43.9%;max-width: 43.9%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-eyjeu {flex: 1 1 43.9%;max-width: 43.9%;}}
         @media (max-width:767px) {.brz .brz-css-eyjeu {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-xmwxi {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xmwxi {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-xmwxi {align-items: center;}}
         .brz .brz-css-bdxuf .brz-icon__container {margin-right: 39px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bdxuf .brz-icon__container {margin-right: 39px;}}
         @media (max-width:767px) {.brz .brz-css-bdxuf .brz-icon__container {margin-right: 39px;}}
         .brz .brz-css-cmbbj {width: 90%;}
         .brz .brz-css-cmbbj .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cmbbj {width: 90%;}
         .brz .brz-css-cmbbj .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}}
         @media (max-width:767px) {.brz .brz-css-cmbbj {width: 90%;}
         .brz .brz-css-cmbbj .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}}
         .brz .brz-css-dknsi .brz-icon__container {margin-right: 39px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dknsi .brz-icon__container {margin-right: 39px;}}
         @media (max-width:767px) {.brz .brz-css-dknsi .brz-icon__container {margin-right: 39px;}}
         .brz .brz-css-clawo {width: 90%;}
         .brz .brz-css-clawo .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-clawo {width: 90%;}
         .brz .brz-css-clawo .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}}
         @media (max-width:767px) {.brz .brz-css-clawo {width: 90%;}
         .brz .brz-css-clawo .brz-hr {border-top: 2px solid rgba(102,102,102,.15);}}
         .brz .brz-css-zhunn .brz-icon__container {margin-right: 39px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zhunn .brz-icon__container {margin-right: 39px;}}
         @media (max-width:767px) {.brz .brz-css-zhunn .brz-icon__container {margin-right: 39px;}}
         .brz .brz-css-spuwi {flex: 1 1 56.1%;max-width: 56.1%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-spuwi {flex: 1 1 56.1%;max-width: 56.1%;}}
         @media (max-width:767px) {.brz .brz-css-spuwi {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-zneuj {margin: 59px 0px 10px 0px;justify-content: flex-start;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zneuj {margin: 10px 0px 10px 0px;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-zneuj {margin: 10px 0px 10px 0px;justify-content: flex-start;}}
         .brz .brz-css-cukdm {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cukdm {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-cukdm {height: auto;}}
         .brz .brz-css-ljuob > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/cc7c95f588f909c6e94542accb324867.jpg");background-position: 50% 50%;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,.9);}
         .brz .brz-css-ljuob > .brz-bg-content {padding: 99px 0px 75px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ljuob > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/cc7c95f588f909c6e94542accb324867.jpg");background-position: 50% 50%;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,.9);}
         .brz .brz-css-ljuob > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-ljuob > .brz-bg-media {border-radius: 23px;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/cc7c95f588f909c6e94542accb324867.jpg");background-position: 50% 50%;}
         .brz .brz-css-ljuob > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,.9);}
         .brz .brz-css-ljuob > .brz-bg-content {padding: 25px;}}
         .brz .brz-css-tswkz {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tswkz {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-tswkz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-azrbr {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-azrbr {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-azrbr {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-rzzwy {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rzzwy {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-rzzwy {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-lapqx {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lapqx {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-lapqx {align-items: center;}}
         .brz .brz-css-gfqxg {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gfqxg {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-gfqxg {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-uztwj {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uztwj {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-uztwj {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-esdgv {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-esdgv {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-esdgv {align-items: center;}}
         .brz .brz-css-rqxkp {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rqxkp {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-rqxkp {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-wcsmf .brz-icon__container {margin-right: 11px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wcsmf .brz-icon__container {margin-right: 11px;}}
         @media (max-width:767px) {.brz .brz-css-wcsmf .brz-icon__container {margin-right: 11px;}}
         .brz .brz-css-zkfvw {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zkfvw {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-zkfvw {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-wgqmv {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wgqmv {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-wgqmv {align-items: center;}}
         .brz .brz-css-gxspy {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gxspy {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-gxspy {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-opdba {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-opdba {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-opdba {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-cocce {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cocce {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-cocce {align-items: center;}}
         .brz .brz-css-kpewg {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kpewg {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-kpewg {margin: 10px 0px 0px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fyqqu {display: none;}}
         @media (max-width:767px) {.brz .brz-css-fyqqu {display: none;}}
         .brz .brz-css-jbton {height: 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jbton {height: 30px;}}
         @media (max-width:767px) {.brz .brz-css-jbton {height: 30px;}}
         .brz .brz-css-qilwe {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qilwe {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-qilwe {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-dzxgb {align-items: center;padding: 5px 15px 5px 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dzxgb {align-items: center;padding: 5px 0px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-dzxgb {align-items: center;padding: 0;}}
         .brz .brz-css-seuyj {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-seuyj {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-seuyj {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-bjwat {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bjwat {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-bjwat {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-pnwdf {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-pnwdf {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-pnwdf {align-items: center;}}
         .brz .brz-css-hrhwa {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hrhwa {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-hrhwa {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-dcuqf {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dcuqf {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-dcuqf {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-bjban {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bjban {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-bjban {align-items: center;}}
         .brz .brz-css-igryx {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-igryx {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-igryx {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-korxz {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-korxz {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-korxz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-svqxf {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-svqxf {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-svqxf {align-items: center;}}
         .brz .brz-css-cpjbj {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cpjbj {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-cpjbj {margin: 10px 0px 0px 0px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mbfqs {display: none;}}
         @media (max-width:767px) {.brz .brz-css-mbfqs {display: none;}}
         .brz .brz-css-osaix {height: 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-osaix {height: 30px;}}
         @media (max-width:767px) {.brz .brz-css-osaix {height: 30px;}}
         .brz .brz-css-lovpj {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lovpj {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-lovpj {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-bazdp {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bazdp {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-bazdp {align-items: center;}}
         .brz .brz-css-xzfvb {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xzfvb {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-xzfvb {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-qedtz {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qedtz {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-qedtz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-jsrws {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jsrws {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-jsrws {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-lrgjb {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lrgjb {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-lrgjb {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-nrusc {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nrusc {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-nrusc {align-items: center;}}
         .brz .brz-css-zmqxr {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zmqxr {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-zmqxr {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-uhmpm {flex: 1 1 25%;max-width: 25%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uhmpm {flex: 1 1 25%;max-width: 25%;}}
         @media (max-width:767px) {.brz .brz-css-uhmpm {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-bvrfa {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bvrfa {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-bvrfa {align-items: center;}}
         .brz .brz-css-plcqa {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-plcqa {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-plcqa {margin: 10px 0px 0px 0px;}}
         .brz .brz-css-wlcjd > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-wlcjd > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-wlcjd > .brz-bg-content {padding: 65px 0px 15px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wlcjd > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-wlcjd > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-wlcjd > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-wlcjd > .brz-bg-media {border-radius: 17px;}
         .brz .brz-css-wlcjd > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-wlcjd > .brz-bg-content {padding: 25px 15px 25px 15px;}}
         .brz .brz-css-nrpmh {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nrpmh {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-nrpmh {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-qieec {margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qieec {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-qieec {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-azetb {padding: 53px;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-azetb {padding: 0;margin: 10px 25px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-azetb {padding: 13px;margin: 10px 70px 10px 54px;}}
         .brz .brz-css-bjehc {width: calc(100% + 10px);margin: -5px;}
         .brz .brz-css-bjehc .brz-image__gallery-item {width: 25%;padding: 5px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bjehc {width: calc(100% + 10px);margin: -5px;}
         .brz .brz-css-bjehc .brz-image__gallery-item {width: 25%;padding: 5px;}}
         @media (max-width:767px) {.brz .brz-css-bjehc {width: calc(100% + 10px);margin: -5px;}
         .brz .brz-css-bjehc .brz-image__gallery-item {width: 100%;padding: 5px;}}
         .brz .brz-css-gyyqu {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gyyqu {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-gyyqu {height: auto;}}
         .brz .brz-css-rymiw {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rymiw {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-rymiw {height: auto;}}
         .brz .brz-css-buaeg {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-buaeg {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-buaeg {height: auto;}}
         .brz .brz-css-rgxsj {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rgxsj {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-rgxsj {height: auto;}}
         .brz .brz-css-wdbgf {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wdbgf {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-wdbgf {height: auto;}}
         .brz .brz-css-imqaf {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-imqaf {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-imqaf {height: auto;}}
         .brz .brz-css-djgku {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-djgku {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-djgku {height: auto;}}
         .brz .brz-css-wajmp {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wajmp {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-wajmp {height: auto;}}
         .brz .brz-css-imqhw {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-imqhw {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-imqhw {height: auto;}}
         .brz .brz-css-kevnh {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kevnh {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-kevnh {height: auto;}}
         .brz .brz-css-kxapu {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kxapu {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-kxapu {height: auto;}}
         .brz .brz-css-ytyld {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ytyld {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-ytyld {height: auto;}}
         .brz .brz-css-auasy {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-auasy {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-auasy {height: auto;}}
         .brz .brz-css-cukgp {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cukgp {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-cukgp {height: auto;}}
         .brz .brz-css-rqmib {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rqmib {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-rqmib {height: auto;}}
         .brz .brz-css-rzvtn {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rzvtn {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-rzvtn {height: auto;}}
         .brz .brz-css-ddcgl > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-color {background-color: rgba(28,28,28,1);}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-shape__top {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgxODQsIDIzMCwgMjI1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 141px;height: 141px;}
         .brz .brz-css-ddcgl > .brz-bg-content {padding: 166px 0px 47px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ddcgl > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-color {background-color: rgba(28,28,28,1);}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-shape__top {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgxODQsIDIzMCwgMjI1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 80px;height: 80px;}
         .brz .brz-css-ddcgl > .brz-bg-content {padding: 100px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-ddcgl > .brz-bg-media {border-radius: 30px;}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-color {background-color: rgba(28,28,28,1);}
         .brz .brz-css-ddcgl > .brz-bg-media > .brz-bg-shape__top {background-image: url("data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTkyMCAyNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGcgZmlsbD0icmdiYSgxODQsIDIzMCwgMjI1LCAxKSIgZmlsbC1ydWxlPSJub256ZXJvIj48cGF0aCBkPSJNMTkyMCAxMjkuNzUxQzE3NjAgMTkxLjkxNyAxNjAwIDIyMyAxNDQwIDIyM2MtMTUyLjg5MiAwLTM5OS41MzItMzEuMzg0LTYyMC40NzUtNTMuNzg0QzY4NyAxOTEgNTU3LjEwOCAyMDUuNDY1IDQ3MCAyMDZjLTE2Mi0yLTMxOC42NjctMjEuMzMzLTQ3MC01OFYwaDE5MjB2MTI5Ljc1MXoiIG9wYWNpdHk9Ii4yMDMiLz48cGF0aCBkPSJNMjMwIDE5MGMxNjAgMzMuMzMzIDMyMCA1MCA0ODAgNTAgMjQwIDAgNzc2LTEwNSA5MjMtMTE1IDk4LTYuNjY3IDE5My42NjcgMSAyODcgMjNWMEgwdjE0OGM0NS4wNzMgMTAuNDE2IDgxLjA3MyAxOC4wODMgMTA4IDIzIDI2LjkyNyA0LjkxNyA2Ny41OTQgMTEuMjUgMTIyIDE5eiIgb3BhY2l0eT0iLjMiLz48cGF0aCBkPSJNMCAxNDhjMTYwIDM4LjQ3NiAzMjAgNTcuNzE0IDQ4MCA1Ny43MTQgMjQwIDAgNzIwLTExOC43MSA5NjAtMTE3LjIzNSAxNjAgLjk4MyAzMjAgMjAuODI0IDQ4MCA1OS41MjFWMEgwdjE0OHoiLz48L2c+PC9zdmc+");background-size: 100% 80px;height: 80px;}
         .brz .brz-css-ddcgl > .brz-bg-content {padding: 60px 15px 15px 0px;}}
         .brz .brz-css-kfjht {margin: 10px 0px 0px -33px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kfjht {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-kfjht {margin: 10px 0px 0px -9px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ypade > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-ypade > .brz-bg-content > .brz-row {flex-direction: row-reverse;flex-wrap: wrap-reverse;justify-content: flex-end;}}
         .brz .brz-css-vqcci {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vqcci {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-vqcci {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-travu {display: none;}}
         .brz .brz-css-byrps {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-byrps {flex: 1 1 50%;max-width: 50%;}}
         @media (max-width:767px) {.brz .brz-css-byrps {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-cszsh {padding: 5px 15px 5px 78px;margin: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-cszsh {padding: 5px 30px 5px 30px;margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-cszsh {padding: 0px 26px 0px 100px;margin: -22px 0px 10px 18px;}}
         .brz .brz-css-rxbrr {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rxbrr {flex: 1 1 28.2%;max-width: 28.2%;}}
         @media (max-width:767px) {.brz .brz-css-rxbrr {flex: 1 1 97.7%;max-width: 97.7%;}}
         .brz .brz-css-ozbqc {padding: 5px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ozbqc {padding: 5px 15px 5px 0px;}}
         @media (max-width:767px) {.brz .brz-css-ozbqc {padding: 0;}}
         .brz .brz-css-jbbej {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jbbej {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-jbbej {margin: 10px 0px 10px 5px;}}
         .brz .brz-css-xqhgu {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-xqhgu {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-xqhgu {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-qkujv .brz-icon__container {margin-right: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qkujv .brz-icon__container {margin-right: 10px;}}
         @media (max-width:767px) {.brz .brz-css-qkujv .brz-icon__container {margin-right: 10px;}}
         .brz .brz-css-tnqgh {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tnqgh {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-tnqgh {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-jqnrf .brz-icon__container {margin-right: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jqnrf .brz-icon__container {margin-right: 10px;}}
         @media (max-width:767px) {.brz .brz-css-jqnrf .brz-icon__container {margin-right: 10px;}}
         .brz .brz-css-zqqkl {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zqqkl {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-zqqkl {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-zjtlj .brz-icon__container {margin-right: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zjtlj .brz-icon__container {margin-right: 10px;}}
         @media (max-width:767px) {.brz .brz-css-zjtlj .brz-icon__container {margin-right: 10px;}}
         .brz .brz-css-rlzpt {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rlzpt {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-rlzpt {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-lhufl .brz-icon__container {margin-right: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lhufl .brz-icon__container {margin-right: 10px;}}
         @media (max-width:767px) {.brz .brz-css-lhufl .brz-icon__container {margin-right: 10px;}}
         .brz .brz-css-qfboi {margin: 10px 0px 5px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qfboi {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-qfboi {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-zrhpc .brz-icon__container {margin-right: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zrhpc .brz-icon__container {margin-right: 10px;}}
         @media (max-width:767px) {.brz .brz-css-zrhpc .brz-icon__container {margin-right: 10px;}}
         .brz .brz-css-geaau {height: 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-geaau {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-geaau {height: 15px;}}
         .brz .brz-css-wsquc {justify-content: flex-start;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wsquc {justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-wsquc {justify-content: flex-start;}}
         .brz .brz-css-bzjtk {margin: 10px 0px 10px 18px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bzjtk {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-bzjtk {margin: 10px -40px 10px 7px;}}
         .brz .brz-css-jhtjs.brz-btn {font-size: 19px;color: rgba(28,28,28,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 11px 26px 11px 26px;}
         @media (min-width:991px) {.brz .brz-css-jhtjs.brz-btn:hover {border: 2px solid rgba(109,93,243,0);background-color: rgba(255,255,255,1);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jhtjs.brz-btn {font-size: 17px;color: rgba(28,28,28,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 14px 42px 14px 42px;}}
         @media (max-width:767px) {.brz .brz-css-jhtjs.brz-btn {font-size: 15px;color: rgba(28,28,28,1);border: 2px solid rgba(35,157,219,0);border-radius: 4px;padding: 19px 44px 19px 44px;}}
         .brz .brz-css-fuxup {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fuxup {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-fuxup {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-iyroj {display: none;}}
         .brz .brz-css-usbyz > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-usbyz > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-usbyz > .brz-bg-content {padding: 24px 0px 15px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-usbyz > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-usbyz > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-usbyz > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-usbyz > .brz-bg-media {border-radius: 23px;}
         .brz .brz-css-usbyz > .brz-bg-media > .brz-bg-color {background-color: rgba(90,47,183,1);}
         .brz .brz-css-usbyz > .brz-bg-content {padding: 25px 15px 15px 15px;}}
         .brz .brz-css-bnqen {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bnqen {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-bnqen {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-ptocf {display: none;}}
         .brz .brz-css-kpyxz {height: 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kpyxz {height: 15px;}}
         @media (max-width:767px) {.brz .brz-css-kpyxz {height: 15px;}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bvhpm > .brz-bg-content > .brz-row {flex-direction: row;flex-wrap: wrap;justify-content: flex-start;}}
         @media (max-width:767px) {.brz .brz-css-bvhpm > .brz-bg-content > .brz-row {flex-direction: row-reverse;flex-wrap: wrap-reverse;justify-content: flex-end;}}
         .brz .brz-css-kcdur {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kcdur {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-kcdur {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-kyfdr {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kyfdr {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-kyfdr {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-kyfdr > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dosxf {display: none;}}
         @media (max-width:767px) {.brz .brz-css-dosxf {display: none;}}
         .brz .brz-css-yjxwe {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yjxwe {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-yjxwe {height: 10px;}}
         .brz .brz-css-ojqco {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ojqco {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-ojqco {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-lzluq {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lzluq {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-lzluq {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-lzluq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uxlio {display: none;}}
         @media (max-width:767px) {.brz .brz-css-uxlio {display: none;}}
         .brz .brz-css-nzjcf {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nzjcf {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-nzjcf {height: 10px;}}
         .brz .brz-css-fffmz {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fffmz {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-fffmz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-ptpkf {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/5547f4276f024d319b4f4b4600acd190.jpeg");background-position: 100% 91%;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ptpkf {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/5547f4276f024d319b4f4b4600acd190.jpeg");background-position: 100% 91%;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-ptpkf {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/5547f4276f024d319b4f4b4600acd190.jpeg");background-position: 100% 91%;}
         .brz .brz-css-ptpkf > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hupan {display: none;}}
         .brz .brz-css-rbkuv {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rbkuv {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-rbkuv {height: 10px;}}
         .brz .brz-css-janpk {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-janpk {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-janpk {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-jykbs {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jykbs {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-jykbs {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-jykbs > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rycnm {display: none;}}
         .brz .brz-css-owain {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-owain {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-owain {height: 10px;}}
         .brz .brz-css-otyyq {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-otyyq {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-otyyq {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-jqguq {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jqguq {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-jqguq {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jqguq > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-frsij {display: none;}}
         @media (max-width:767px) {.brz .brz-css-frsij {display: none;}}
         .brz .brz-css-ivicr {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ivicr {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-ivicr {height: 10px;}}
         .brz .brz-css-hnkkz {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hnkkz {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-hnkkz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-kvcai {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kvcai {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-kvcai {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-kvcai > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hdnss {display: none;}}
         .brz .brz-css-shkzb {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-shkzb {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-shkzb {height: 10px;}}
         .brz .brz-css-wvukl {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wvukl {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-wvukl {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-igdfv {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-igdfv {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-igdfv {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-igdfv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-iijnr {display: none;}}
         .brz .brz-css-jqqcb {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jqqcb {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-jqqcb {height: 10px;}}
         .brz .brz-css-rvghx {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rvghx {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-rvghx {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-jfoln {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jfoln {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-jfoln {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/e301e28e254abefb23a3765bd30e52c4.jpeg");background-position: 50% 91%;}
         .brz .brz-css-jfoln > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jlfce {display: none;}}
         @media (max-width:767px) {.brz .brz-css-jlfce {display: none;}}
         .brz .brz-css-ytwvo {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ytwvo {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-ytwvo {height: 10px;}}
         .brz .brz-css-uuabz {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-uuabz {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-uuabz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-ugyxo {align-items: center;padding: 70px 65px 70px 65px;margin: 15px;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ugyxo {align-items: center;padding: 5px 15px 5px 15px;margin: 10px;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:767px) {.brz .brz-css-ugyxo {align-items: center;padding: 15px;margin: 10px 15px 10px 15px;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/98c8618edf51ffc552338762a3f128c6.jpeg");background-position: 20% 49%;}
         .brz .brz-css-ugyxo > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,.9);}}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jgvkd {display: none;}}
         .brz .brz-css-mtriz {height: 10px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mtriz {height: 10px;}}
         @media (max-width:767px) {.brz .brz-css-mtriz {height: 10px;}}
         .brz .brz-css-dnrwz > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-dnrwz > .brz-bg-media > .brz-bg-color {background-color: rgba(238,240,242,1);}
         .brz .brz-css-dnrwz > .brz-bg-content {padding: 15px 0px 15px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dnrwz > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-dnrwz > .brz-bg-media > .brz-bg-color {background-color: rgba(238,240,242,1);}
         .brz .brz-css-dnrwz > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-dnrwz > .brz-bg-media {border-radius: 36px;}
         .brz .brz-css-dnrwz > .brz-bg-media > .brz-bg-color {background-color: rgba(238,240,242,1);}
         .brz .brz-css-dnrwz > .brz-bg-content {padding: 25px 15px 19px 15px;}}
         .brz .brz-css-brwvx {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-brwvx {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-brwvx {margin: 10px 0px 0px 0px;}}
         @media (max-width:767px) {.brz .brz-css-yejiw {display: none;}}
         .brz .brz-css-ulaqu {margin: 0px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ulaqu {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-ulaqu {margin: 0px 0px 10px 0px;}}
         .brz .brz-css-eanvs {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-eanvs {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-eanvs {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-sgavb {padding: 50px 45px 50px 45px;margin: 15px;}
         .brz .brz-css-sgavb > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-sgavb > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-sgavb > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-sgavb {padding: 15px 25px 15px 25px;margin: 5px;}
         .brz .brz-css-sgavb > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-sgavb > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-sgavb > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         @media (max-width:767px) {.brz .brz-css-sgavb {padding: 15px;margin: 10px 0px 10px 0px;}
         .brz .brz-css-sgavb > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-sgavb > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-sgavb > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         .brz .brz-css-yplxm {height: auto;border-radius: 48px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yplxm {height: auto;border-radius: 33px;}}
         @media (max-width:767px) {.brz .brz-css-yplxm {height: auto;border-radius: 48px;}}
         .brz .brz-css-rvvuf {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rvvuf {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-rvvuf {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-deasv {padding: 50px 45px 50px 45px;margin: 15px;}
         .brz .brz-css-deasv > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-deasv > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-deasv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-deasv {padding: 15px 25px 15px 25px;margin: 5px;}
         .brz .brz-css-deasv > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-deasv > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-deasv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         @media (max-width:767px) {.brz .brz-css-deasv {padding: 15px;margin: 10px 0px 10px 0px;}
         .brz .brz-css-deasv > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-deasv > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-deasv > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         .brz .brz-css-amzjc {height: auto;border-radius: 48px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-amzjc {height: auto;border-radius: 33px;}}
         @media (max-width:767px) {.brz .brz-css-amzjc {height: auto;border-radius: 48px;}}
         .brz .brz-css-vegal {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vegal {flex: 1 1 33.4%;max-width: 33.4%;}}
         @media (max-width:767px) {.brz .brz-css-vegal {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-hkawu {padding: 50px 45px 50px 45px;margin: 15px;}
         .brz .brz-css-hkawu > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-hkawu > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-hkawu > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hkawu {padding: 15px 25px 15px 25px;margin: 5px;}
         .brz .brz-css-hkawu > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-hkawu > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-hkawu > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         @media (max-width:767px) {.brz .brz-css-hkawu {padding: 15px;margin: 10px 0px 10px 0px;}
         .brz .brz-css-hkawu > .brz-bg-content {border: 1px solid transparent;}
         .brz .brz-css-hkawu > .brz-bg-media {border: 1px solid rgba(102,102,102,.15);}
         .brz .brz-css-hkawu > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         .brz .brz-css-kuhkd {height: auto;border-radius: 48px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kuhkd {height: auto;border-radius: 33px;}}
         @media (max-width:767px) {.brz .brz-css-kuhkd {height: auto;border-radius: 48px;}}
         .brz .brz-css-rtaqp > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/b862f17b03c381d714724045e74725dd.jpg");background-position: 43% 63%;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-color {background-color: rgba(68,22,168,.9);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rtaqp > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/b862f17b03c381d714724045e74725dd.jpg");background-position: 43% 63%;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-color {background-color: rgba(68,22,168,.9);}}
         @media (max-width:767px) {.brz .brz-css-rtaqp > .brz-bg-media {border-radius: 15px;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-image {background-image: url("assets/img/b862f17b03c381d714724045e74725dd.jpg");background-position: 43% 63%;}
         .brz .brz-css-rtaqp > .brz-bg-media > .brz-bg-color {background-color: rgba(68,22,168,.9);}}
         .brz .brz-css-vqpsi {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vqpsi {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-vqpsi {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-wfrul {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-wfrul {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-wfrul {padding: 0;}}
         .brz .brz-css-vagpb {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-vagpb {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-vagpb {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-scxos {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-scxos {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-scxos {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-oxtgf {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-oxtgf {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-oxtgf {padding: 0;}}
         .brz .brz-css-jexkv {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jexkv {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-jexkv {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-fvdsv {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fvdsv {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-fvdsv {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-iyszu {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-iyszu {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-iyszu {padding: 0;}}
         .brz .brz-css-yhupl {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yhupl {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-yhupl {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-phzwl {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-phzwl {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-phzwl {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-hmfsc {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hmfsc {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-hmfsc {padding: 0;}}
         .brz .brz-css-lyhtv {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-lyhtv {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-lyhtv {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-agond {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-agond {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-agond {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-iulqc {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-iulqc {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-iulqc {padding: 0;}}
         .brz .brz-css-meznk {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-meznk {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-meznk {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-yzayo {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-yzayo {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-yzayo {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-gxdrw {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gxdrw {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-gxdrw {padding: 0;}}
         .brz .brz-css-kqrqw {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kqrqw {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-kqrqw {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-jsoov {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-jsoov {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-jsoov {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-esdbo {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-esdbo {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-esdbo {padding: 0;}}
         .brz .brz-css-dazjs {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dazjs {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-dazjs {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-fjxoz {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fjxoz {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-fjxoz {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-fhbfd {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-fhbfd {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-fhbfd {padding: 0;}}
         .brz .brz-css-dmdtx {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-dmdtx {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-dmdtx {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-qkdwi {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-qkdwi {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-qkdwi {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-nhwqj {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nhwqj {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-nhwqj {padding: 0;}}
         .brz .brz-css-stocp {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-stocp {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-stocp {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-knazq {flex: 1 1 100%;max-width: 100%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-knazq {flex: 1 1 100%;max-width: 100%;}}
         @media (max-width:767px) {.brz .brz-css-knazq {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-gwrbx {padding: 5px 30px 5px 30px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-gwrbx {padding: 5px 15px 5px 15px;}}
         @media (max-width:767px) {.brz .brz-css-gwrbx {padding: 0;}}
         .brz .brz-css-tzeps {margin: 10px 0px 0px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-tzeps {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-tzeps {margin: 10px 0px 10px 0px;}}
         .brz .brz-css-zovkr > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-zovkr > .brz-bg-media > .brz-bg-color {background-color: rgba(238,240,242,1);}
         .brz .brz-css-zovkr > .brz-bg-content {padding: 15px 0px 15px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zovkr > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-zovkr > .brz-bg-media > .brz-bg-color {background-color: rgba(238,240,242,1);}
         .brz .brz-css-zovkr > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-zovkr > .brz-bg-media {border-radius: 15px;}
         .brz .brz-css-zovkr > .brz-bg-media > .brz-bg-color {background-color: rgba(13,1,1,1);}
         .brz .brz-css-zovkr > .brz-bg-content {padding: 25px 15px 15px 15px;}}
         .brz .brz-css-nopyk {align-items: center;padding: 0px 90px 0px 90px;}
         .brz .brz-css-nopyk > .brz-bg-media {border-radius: 10px 0px 0px 10px;}
         .brz .brz-css-nopyk > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-nopyk {align-items: center;padding: 5px 15px 5px 35px;}
         .brz .brz-css-nopyk > .brz-bg-media {border-radius: 10px 0px 0px 10px;}
         .brz .brz-css-nopyk > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         @media (max-width:767px) {.brz .brz-css-nopyk {align-items: center;padding: 25px;}
         .brz .brz-css-nopyk > .brz-bg-media {border-radius: 10px;}
         .brz .brz-css-nopyk > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         .brz .brz-css-eikoe .brz-icon__container {margin-right: 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-eikoe .brz-icon__container {margin-right: 15px;}}
         @media (max-width:767px) {.brz .brz-css-eikoe .brz-icon__container {margin-right: 15px;}}
         .brz .brz-css-kyngb .brz-icon__container {margin-right: 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-kyngb .brz-icon__container {margin-right: 15px;}}
         @media (max-width:767px) {.brz .brz-css-kyngb .brz-icon__container {margin-right: 15px;}}
         .brz .brz-css-hwmez .brz-icon__container {margin-right: 15px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hwmez .brz-icon__container {margin-right: 15px;}}
         @media (max-width:767px) {.brz .brz-css-hwmez .brz-icon__container {margin-right: 15px;}}
         .brz .brz-css-huioj {padding: 0px 100px 0px 15px;}
         .brz .brz-css-huioj > .brz-bg-media {border-radius: 0px 10px 10px 0px;}
         .brz .brz-css-huioj > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-huioj {padding: 5px 15px 5px 15px;}
         .brz .brz-css-huioj > .brz-bg-media {border-radius: 0px 10px 10px 0px;}
         .brz .brz-css-huioj > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}}
         @media (max-width:767px) {.brz .brz-css-huioj {padding: 0;}
         .brz .brz-css-huioj > .brz-bg-media {border-radius: 0;}
         .brz .brz-css-huioj > .brz-bg-media > .brz-bg-color {background-color: rgba(30,25,25,1);}}
         @media (max-width:767px) {.brz .brz-css-qzysq {display: none;}}
         .brz .brz-css-mxbow {height: 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-mxbow {height: 20px;}}
         @media (max-width:767px) {.brz .brz-css-mxbow {height: 20px;}}
         .brz .brz-css-hqsdm {margin: 10px 0px 10px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hqsdm {margin: 10px 0px 10px 0px;}}
         @media (max-width:767px) {.brz .brz-css-hqsdm {margin: 37px 0px 37px 0px;}}
         .brz .brz-css-bqcjp {width: 64%;height: 266px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bqcjp {width: 64%;height: 400px;}}
         @media (max-width:767px) {.brz .brz-css-bqcjp {width: 64%;height: 266px;}}
         @media (max-width:767px) {.brz .brz-css-lifys {display: none;}}
         .brz .brz-css-hhqud {height: 20px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-hhqud {height: 20px;}}
         @media (max-width:767px) {.brz .brz-css-hhqud {height: 20px;}}
         @media (max-width:767px) {.brz .brz-css-zrtqi {display: none;}}
         .brz .brz-css-bvbht > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-bvbht > .brz-bg-content {padding: 50px 0px 24px 0px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bvbht > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-bvbht > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-bvbht > .brz-bg-media > .brz-bg-color {background-color: rgba(255,255,255,1);}
         .brz .brz-css-bvbht > .brz-bg-content {padding: 25px 15px 25px 15px;}}
         .brz .brz-css-rorql {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-rorql {flex: 1 1 34.4%;max-width: 34.4%;}}
         @media (max-width:767px) {.brz .brz-css-rorql {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-igkrk {flex: 1 1 33.4%;max-width: 33.4%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-igkrk {flex: 1 1 31.8%;max-width: 31.8%;}}
         @media (max-width:767px) {.brz .brz-css-igkrk {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-zajnu {flex: 1 1 33.3%;max-width: 33.3%;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-zajnu {flex: 1 1 33.3%;max-width: 33.3%;}}
         @media (max-width:767px) {.brz .brz-css-zajnu {flex: 1 1 100%;max-width: 100%;}}
         .brz .brz-css-blnwq {margin: -13px;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-blnwq {margin: 0;}}
         @media (max-width:767px) {.brz .brz-css-blnwq {margin: 0px 0px 22px 0px;}}
         .brz .brz-css-czmjz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,1);}
         .brz .brz-css-czmjz > .brz-bg-content {padding: 0;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-czmjz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,1);}
         .brz .brz-css-czmjz > .brz-bg-content {padding: 50px 15px 50px 15px;}}
         @media (max-width:767px) {.brz .brz-css-czmjz > .brz-bg-media > .brz-bg-color {background-color: rgba(0,0,0,1);}
         .brz .brz-css-czmjz > .brz-bg-content {padding: 0px 15px 0px 15px;}}
         .brz .brz-css-ueupi {height: auto;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-ueupi {height: auto;}}
         @media (max-width:767px) {.brz .brz-css-ueupi {height: auto;}}
         .brz .brz-css-bafle {align-items: center;}
         @media (max-width:991px) and (min-width:768px) {.brz .brz-css-bafle {align-items: center;}}
         @media (max-width:767px) {.brz .brz-css-bafle {align-items: center;}}
      </style>
      <style class="brz-style" id="dc-color"></style>
      <style class="brz-style">.brz .brz-cp-color1, .brz .brz-bcp-color1 {color: #a170d9;}
         .brz .brz-cp-color2, .brz .brz-bcp-color2 {color: #1c1c1c;}
         .brz .brz-cp-color3, .brz .brz-bcp-color3 {color: #05cab6;}
         .brz .brz-cp-color4, .brz .brz-bcp-color4 {color: #b8e6e1;}
         .brz .brz-cp-color5, .brz .brz-bcp-color5 {color: #f5d4d1;}
         .brz .brz-cp-color6, .brz .brz-bcp-color6 {color: #ebebeb;}
         .brz .brz-cp-color7, .brz .brz-bcp-color7 {color: #666;}
         .brz .brz-cp-color8, .brz .brz-bcp-color8 {color: #fff;}
      </style>
      <style class="brz-style">.brz .brz-tp-paragraph {font-family: Overpass,sans-serif;font-size: 16px;font-weight: 400;letter-spacing: 0px;line-height: 1.9em;}
         @media (max-width: 991px) {.brz .brz-tp-paragraph {font-size: 15px;font-weight: 400;letter-spacing: 0px;line-height: 1.6em;}}
         @media (max-width: 767px) {.brz .brz-tp-paragraph {font-size: 15px;font-weight: 400;letter-spacing: 0px;line-height: 1.6em;}}
         .brz .brz-tp-subtitle {font-family: Overpass,sans-serif;font-size: 17px;font-weight: 400;letter-spacing: 0px;line-height: 1.8em;}
         @media (max-width: 991px) {.brz .brz-tp-subtitle {font-size: 17px;font-weight: 400;letter-spacing: 0px;line-height: 1.5em;}}
         @media (max-width: 767px) {.brz .brz-tp-subtitle {font-size: 16px;font-weight: 400;letter-spacing: 0px;line-height: 1.5em;}}
         .brz .brz-tp-abovetitle {font-family: Overpass,sans-serif;font-size: 13px;font-weight: 700;letter-spacing: 1.1px;line-height: 1.5em;}
         @media (max-width: 991px) {.brz .brz-tp-abovetitle {font-size: 13px;font-weight: 700;letter-spacing: 1px;line-height: 1.5em;}}
         @media (max-width: 767px) {.brz .brz-tp-abovetitle {font-size: 13px;font-weight: 700;letter-spacing: 1px;line-height: 1.5em;}}
         .brz .brz-tp-heading1 {font-family: Overpass,sans-serif;font-size: 46px;font-weight: 700;letter-spacing: -1.5px;line-height: 1.3em;}
         @media (max-width: 991px) {.brz .brz-tp-heading1 {font-size: 38px;font-weight: 700;letter-spacing: -1px;line-height: 1.2em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading1 {font-size: 36px;font-weight: 700;letter-spacing: -1px;line-height: 1.3em;}}
         .brz .brz-tp-heading2 {font-family: Overpass,sans-serif;font-size: 36px;font-weight: 700;letter-spacing: -1.5px;line-height: 1.3em;}
         @media (max-width: 991px) {.brz .brz-tp-heading2 {font-size: 30px;font-weight: 700;letter-spacing: -1px;line-height: 1.2em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading2 {font-size: 28px;font-weight: 700;letter-spacing: -1px;line-height: 1.3em;}}
         .brz .brz-tp-heading3 {font-family: Overpass,sans-serif;font-size: 28px;font-weight: 700;letter-spacing: -1.5px;line-height: 1.4em;}
         @media (max-width: 991px) {.brz .brz-tp-heading3 {font-size: 27px;font-weight: 700;letter-spacing: -1px;line-height: 1.3em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading3 {font-size: 22px;font-weight: 700;letter-spacing: -.5px;line-height: 1.3em;}}
         .brz .brz-tp-heading4 {font-family: Overpass,sans-serif;font-size: 22px;font-weight: 700;letter-spacing: -.5px;line-height: 1.5em;}
         @media (max-width: 991px) {.brz .brz-tp-heading4 {font-size: 22px;font-weight: 700;letter-spacing: -.5px;line-height: 1.4em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading4 {font-size: 20px;font-weight: 700;letter-spacing: 0px;line-height: 1.4em;}}
         .brz .brz-tp-heading5 {font-family: Overpass,sans-serif;font-size: 20px;font-weight: 700;letter-spacing: 0px;line-height: 1.6em;}
         @media (max-width: 991px) {.brz .brz-tp-heading5 {font-size: 17px;font-weight: 700;letter-spacing: 0px;line-height: 1.7em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading5 {font-size: 17px;font-weight: 700;letter-spacing: 0px;line-height: 1.8em;}}
         .brz .brz-tp-heading6 {font-family: Overpass,sans-serif;font-size: 16px;font-weight: 700;letter-spacing: 0px;line-height: 1.5em;}
         @media (max-width: 991px) {.brz .brz-tp-heading6 {font-size: 16px;font-weight: 700;letter-spacing: 0px;line-height: 1.5em;}}
         @media (max-width: 767px) {.brz .brz-tp-heading6 {font-size: 16px;font-weight: 700;letter-spacing: 0px;line-height: 1.5em;}}
      </style>
      <link class="brz-link brz-link-google" type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic|Overpass:100,100italic,200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic|Palanquin+Dark:regular,500,600,700|Red+Hat+Text:regular,italic,500,500italic,700,700italic|DM+Serif+Text:regular,italic|Blinker:100,200,300,regular,600,700,800,900|Aleo:300,300italic,regular,italic,700,700italic|Nunito:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic|Knewave:regular|Palanquin:100,200,300,regular,500,600,700|Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic|Oswald:200,300,regular,500,600,700|Oxygen:300,regular,700|Playfair+Display:regular,italic,700,700italic,900,900italic|Fira+Sans:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Abril+Fatface:regular|Comfortaa:300,regular,500,600,700|Kaushan+Script:regular|Noto+Serif:regular,italic,700,700italic&amp;subset=arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,khmer,korean,latin-ext,tamil,telugu,thai,vietnamese&amp;display=swap">
      <style class="brz-style">.brz .brz-ff-montserrat {font-family: Montserrat,sans-serif !important;}
         .brz .brz-ff-lato {font-family: Lato,sans-serif !important;}
         .brz .brz-ff-overpass {font-family: Overpass,sans-serif !important;}
         .brz .brz-ff-palanquin_dark {font-family: Palanquin Dark,sans-serif !important;}
         .brz .brz-ff-red_hat_text {font-family: Red Hat Text,sans-serif !important;}
         .brz .brz-ff-dm_serif_text {font-family: DM Serif Text,serif !important;}
         .brz .brz-ff-blinker {font-family: Blinker,sans-serif !important;}
         .brz .brz-ff-aleo {font-family: Aleo,serif !important;}
         .brz .brz-ff-nunito {font-family: Nunito,sans-serif !important;}
         .brz .brz-ff-knewave {font-family: Knewave,display !important;}
         .brz .brz-ff-palanquin {font-family: Palanquin,sans-serif !important;}
         .brz .brz-ff-roboto {font-family: Roboto,sans-serif !important;}
         .brz .brz-ff-oswald {font-family: Oswald,sans-serif !important;}
         .brz .brz-ff-oxygen {font-family: Oxygen,sans-serif !important;}
         .brz .brz-ff-playfair_display {font-family: Playfair Display,serif !important;}
         .brz .brz-ff-fira_sans {font-family: Fira Sans,sans-serif !important;}
         .brz .brz-ff-abril_fatface {font-family: Abril Fatface,display !important;}
         .brz .brz-ff-comfortaa {font-family: Comfortaa,display !important;}
         .brz .brz-ff-kaushan_script {font-family: Kaushan Script,handwriting !important;}
         .brz .brz-ff-noto_serif {font-family: Noto Serif,serif !important;}
      </style>
      <style class="brz-style">.brz .brz-root__container, .brz .brz-popup2, .brz .brz-popup {font-family: Lato,sans-serif !important;}</style>
      <style class="brz-style" id="custom-css"></style>
      
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
    </style>
      </style>
   </head>
   <body class="brz">
      <div class="brz-root__container brz-reset-all">
         <section data-uid="zxgpfshxzbokqapnyvhaoxozqajdvqqsnxdm" id="zxgpfshxzbokqapnyvhaoxozqajdvqqsnxdm" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="zhuenhxufhqhqluknlsbgujosrnqsnezidgk">
                  <div class="brz-bg brz-css-ldgql brz-css-ggxec">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                        <div class="brz-bg-shape brz-bg-shape__bottom"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="dleemmdxnmspvshqmbsgbbnskyswelyynwsd">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-sbmvh" data-custom-id="ezxlnoagmxlbjwjijeupvrscpvgtpdvtufdo">
                                             <div class="brz-bg brz-css-wqmvr brz-css-ikuca">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-zzcwm brz-css-vtvkg">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-xvjaf" data-custom-id="xmmismjsmdvnaxrnmtezdvgssxhtthyregby">
                                                               <source srcset="assets/img/a6907d776db2e671b50f45fd3ede1a5f.png 1x, assets/img/abb069a061d1e6b5295e709047909292.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/f8b0a88d75b8e0651b20e205da795b5d.png 1x, assets/img/026c71fed62ffb2ccd47f5a94396fcfb.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/60c4d7173c3cd4c3ba3cb0b824c8c760.png 1x, assets/img/87cfef41b6963b2c881af75e9e3889ef.png 2x" src="assets/img/a6907d776db2e671b50f45fd3ede1a5f.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>

                                            <div class="brz-wrapper-clone__item brz-css-grmwo brz-css-wyahd" id="qpzfocgifxeghsxpcjczebxggvipfbuefmnv"><a class="brz-a brz-btn brz-css-jzmrc brz-css-phknn" data-toggle="modal" data-target="#cust_login"><span class="brz-span brz-text__editor">Customer Login</span></a></div>

                                            <div class="brz-wrapper-clone__item brz-css-grmwo brz-css-dmlyc" id="ekvsnhshmmxsvidvsymtarqhbsnpjtgzgzde"><a class="brz-a brz-btn brz-css-jzmrc brz-css-rzidi" data-toggle="modal" data-target="#partner_login"><span class="brz-span brz-text__editor">Franchise Login</span></a></div>

                                            <div class="brz-wrapper-clone__item brz-css-grmwo brz-css-dmlyc" id="ekvsnhshmmxsvidvsymtarqhbsnpjtgzgzde"><a class="brz-a brz-btn brz-css-jzmrc brz-css-rzidi" data-toggle="modal" data-target="#notifyMe"><span class="brz-span brz-text__editor">Franchise Sign Up</span></a></div>
       
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-rjqjv">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="lnvyejrspetaayokyxoezozcrggflewgsdyl">
                                       <p class="brz-mt-xs-30 brz-mb-xs-0 brz-mt-lg-13 brz-mb-lg-9 brz-text-lg-center brz-tp-heading3 brz-text-xs-center brz-fs-xs-29"><span style="color: rgb(255, 255, 255);">Digital Visiting Card PRO </span></p>
                                       <p class="brz-mb-xs-0 brz-mt-lg-13 brz-mb-lg-9 brz-text-lg-center brz-tp-heading3 brz-text-xs-center brz-mt-xs-12 brz-fs-xs-29"><span style="color: rgb(255, 255, 255);">(Mini - Website) </span></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="mpfpzbgnvdwbzrkqifjgnxehmrdbcaedlceq">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz brz-css-gcgkv">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-gezgy" data-custom-id="bvokbzlpjvoubqykobclticzxipdjybzzwdp">
                                             <div class="brz-bg brz-css-wqmvr brz-css-wmzio">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-rveqf">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="utepfarxcyusxmzifsxgwustlkynchroebuz">
                                                            <p class="brz-tp-heading2 brz-text-xs-center"><span class="brz-cp-color8">Now, have your own mini website </span></p>
                                                            <p class="brz-tp-heading2 brz-text-xs-center"><span class="brz-cp-color8">@ &#x20B9; 1 /- per day.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-dimem">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jdwnhuxqnzropuwxkulhnyegjlwnrlhceimv">
                                                            <p class="brz-text-xs-center brz-mt-lg-10 brz-mb-lg-10 brz-mt-sm-0 brz-mb-sm-0 brz-lh-lg-1_8 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400 brz-fs-lg-20 brz-fs-sm-im-20 brz-fs-xs-im-19"><span class="brz-cp-color6">Show Your Business to Clients In a Much Better Way ...</span></p>
                                                            <p class="brz-text-xs-center brz-mt-lg-10 brz-mb-lg-10 brz-mt-sm-0 brz-mb-sm-0 brz-lh-lg-1_8 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400 brz-fs-lg-20 brz-fs-sm-im-20 brz-fs-xs-im-19"><span class="brz-cp-color6">Create Your Mini-Website in just 2 Mins !!</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb brz-css-zugcx">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="eetfhlzzeyccfhiiptafrcaxjkiearlxywzb"><a class="brz-a brz-btn brz-css-jzmrc brz-css-sbpua" href="#gallery" data-brz-link-type="external" data-custom-id="eetfhlzzeyccfhiiptafrcaxjkiearlxywzb"><span class="brz-span brz-text__editor">Create Card &gt;&gt;</span></a></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv" data-custom-id="ksqoeisxkzozrnkuekkwmioiyzqsbvzaihzg">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-kwwfr">
                                                         <div class="brz-image brz-css-rduub brz-css-qpzth">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-xuxxp" data-custom-id="vedmcjvbiwiapnyowvktjllrlvhdgiohcdof">
                                                               <source srcset="assets/img/1676dfea76c59a14f0dd1eabd96ec6e1.png 1x, assets/img/d6e9997dae375b3b23dd148e3aee28c6.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/743db3be2a8da0672e8496eeda8afc69.png 1x, assets/img/2fe290a9da012cb4375b53810e90b5ac.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/742887da2df67f8ca7c64a10b38c2a68.png 1x, assets/img/cd42d68f553f3d71426d443c725cef09.png 2x" src="assets/img/1676dfea76c59a14f0dd1eabd96ec6e1.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="jikeezjyuzuvmzzuuxqgjgjunejilfobedgj" id="Features" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="bnghmklrztfbkorbyfpdwsyqmosmlewxtdqy">
                  <div class="brz-bg brz-css-ldgql brz-css-lmzlk">
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-gpwpe">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jjzpjbpwckjkekvtbbrqbljdcjuprwdevmoc">
                                       <p class="brz-tp-heading2 brz-text-lg-center"><span class="brz-cp-color2">How it Works?</span></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-css-vckxs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                    <div class="brz-spacer brz-css-jyjfy brz-css-ezixh"></div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="mjhrxvdyplhuujdxoegodjnwbppmfjjvhayv">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-zftlk" data-custom-id="wwaqwdrlacdvfslcgxllcweiyziomcbayecj">
                                             <div class="brz-bg brz-css-wqmvr brz-css-dumyu">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-decrt brz-css-vwgzu">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-hubjc" data-custom-id="usimtdbszneuwstixwqqmrzyvnxumaacaxty">
                                                               <source srcset="assets/img/098dc047df80a3c8e8b1814dc5e1450e.png 1x, assets/img/cd26d8e2dc6b585bf6c3281017aa37c5.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/817bd77a992b3349951abd20bf432500.png 1x, assets/img/487bfac594374abf8c1eadd5cae91b61.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/8544f1e75e92f98c9f81185e8f03f098.png 1x, assets/img/2dc581aea27b13e0d0e2203ec7a3f2cc.png 2x" src="assets/img/098dc047df80a3c8e8b1814dc5e1450e.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-qolrs">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="qsyjvpckwgcmertmilsuwejgwtualuupoekp">
                                                            <p class="brz-tp-heading5 brz-text-lg-center"><span class="brz-cp-color2">1. Create your Card</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="dkkjklemojzxabtuivjccprhjkhtlpbndsdx">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Design your digital visiting card in 2 minutes</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-zrfmt" data-custom-id="bznvbcwdaqworkruzovmjrsfnuvesunbuxsq">
                                             <div class="brz-bg brz-css-wqmvr brz-css-rqtlw">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-tzuov brz-css-zujis">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-mmski" data-custom-id="nfadckxvmxhvpwpbnbsohokcfmuifelhmjre">
                                                               <source srcset="assets/img/f578ef2e7ed0ab34eeb2fb92a7ffcfb6.png 1x, assets/img/c9d094a70ea016e5dc3f81ced43cf27a.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/d63dc9ba0b1c5e5b54a620e2bc4621fa.png 1x, assets/img/b8a93e0b7db43f6a97d99ca881d447ba.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/2091c3fb0b6ac2ece5cc09cbbb948e5a.png 1x, assets/img/f1134552d1165eed95f05bd79c12c082.png 2x" src="assets/img/f578ef2e7ed0ab34eeb2fb92a7ffcfb6.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-nhurj">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="ewqnuhhpfmncefwinhcznfdssutlnsqpuhea">
                                                            <p class="brz-text-lg-center brz-tp-heading5"><span class="brz-cp-color2">2. Save to your Device</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="zhejzhiurmttxfmibgwwcsdnptgpwivzwwfk">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Digital Visiting Card is accessible anytime from anywhere</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-abbzw" data-custom-id="qxxqcousdcaitutinmjwyrmawjdssgmaxxpq">
                                             <div class="brz-bg brz-css-wqmvr brz-css-uvfwi">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-jpdlw brz-css-wwxrj">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-eelia" data-custom-id="mpytmygvcxtfiytmjvshujwnuaxsfpkkbpyo">
                                                               <source srcset="assets/img/d4c1285cc350e0d0b6bc4a40f0da012e.png 1x, assets/img/67af7e59c160197eeab7f0d291db257f.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/d6bf68d9a9d4ce875cddf53105d58c51.png 1x, assets/img/511fa40f25c34f211458d3a5c4edb352.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/3c86e18870d7415491b6e1babc0f7734.png 1x, assets/img/823d1ad910f7e5f1105a692f697c772d.png 2x" src="assets/img/d4c1285cc350e0d0b6bc4a40f0da012e.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-fdlxt">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="pzbyizdlzshlnmjgxlzwvtibmipygtbjydon">
                                                            <p class="brz-text-lg-center brz-tp-heading5"><span class="brz-cp-color2">3. Share with friends and colleagues</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="aplfvyrkbytxumzfsxqfwsunipujxeijbcpu">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Share it through a variety of channels</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                    <div class="brz-spacer brz-css-jyjfy brz-css-lroem"></div>
                                 </div>
                              </div>
                              <div class="brz-wrapper-clone brz-css-amamn">
                                 <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                    <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                       <div class="brz-wrapper-clone__item brz-css-grmwo" id="hayuszbiyxrjiqcpxktqtdywufntiymoozzo"><a class="brz-a brz-anchor brz-btn brz-css-jzmrc brz-css-bonbm" href="#lyjsxvmuerktmuaotxywmdtyhzwagddbdzjl" data-brz-link-type="anchor" data-custom-id="hayuszbiyxrjiqcpxktqtdywufntiymoozzo"><span class="brz-span brz-text__editor">MORE FEATURES</span></a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="dauhzuqibhlyejwlgjvwxajvlbcbyvakrubz" id="dauhzuqibhlyejwlgjvwxajvlbcbyvakrubz" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="yebtppidrrjaeoxrigyvgyhqxjwrmasaklnu">
                  <div class="brz-bg brz-css-ldgql brz-css-kftqa">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-tfynj">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="uktmaicgnciwahvnwkbwgbqfergtzegjlnjo">
                                       <p class="brz-text-lg-center brz-lh-lg-1_9 brz-lh-sm-im-1_6 brz-lh-xs-im-1_6 brz-fs-lg-29 brz-fs-sm-im-28 brz-fs-xs-im-28 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400" style="color: rgb(0, 0, 0);"><strong>HIGHLIGHTS OF OUR </strong></p>
                                       <p class="brz-text-lg-center brz-lh-lg-1_9 brz-lh-sm-im-1_6 brz-lh-xs-im-1_6 brz-fs-lg-29 brz-fs-sm-im-28 brz-fs-xs-im-28 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400" style="color: rgb(0, 0, 0);"><strong>MINI-WEBSITE </strong></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="vazipjkyixibllhwmkboxjakvwiwntvvtift" id="vazipjkyixibllhwmkboxjakvwiwntvvtift" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="nvngggndkpittyogvvduomhpnduxriipvbik">
                  <div class="brz-bg brz-css-ldgql brz-css-xdzty">
                     <div class="brz-bg-media">
                        <div class="brz-bg-image"></div>
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk brz-css-ukhog">
                              <div class="brz-css-wfugs brz-css-mwrwm brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-sjtyc">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="kqvhryllpuazipcpiwcqfvbujmagiddoudgi">
                                       <p class="brz-text-lg-center brz-lh-lg-1_9 brz-lh-sm-im-1_6 brz-lh-xs-im-1_6 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400 brz-fs-lg-29 brz-fs-sm-im-28 brz-fs-xs-im-28"><br></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="pdmuykvzjssiuqbdcitoquywhzsextugpnje">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz brz-css-jzdxt">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-eyjeu" data-custom-id="aehlcbfttmgeyzzpybmqnfgrbhwqtiobtjsb">
                                             <div class="brz-bg brz-css-wqmvr brz-css-xmwxi">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-bdxuf" data-custom-id="sfbwtbdxdrhsoqadrasjzuqsklaadzhyhysn">
                                                            <div class="brz-icon__container" data-custom-id="lsflbbqkkdtmvlhypsifhudwyvbhdjihtjbj">
                                                               <span class="brz-span brz-icon css-8am1n7">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="path-minus">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <polyline fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points="8,8 8,1 23,1 23,16 16,16 " stroke-linejoin="miter"/>
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 14,23 16,23 16,21 " stroke-linejoin="miter"/>
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 1,21 1,23 3,23 " stroke-linejoin="miter"/>
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 3,8 1,8 1,10 " stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="10" y1="23" x2="7" y2="23" stroke-linejoin="miter"/>
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 14,8 16,8 16,10 " stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="10" y1="8" x2="7" y2="8" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="1" y1="17" x2="1" y2="14" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="16" y1="17" x2="16" y2="14" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="qzmxsghmmwwbtpnkknjsfzywbwfeifzaujpx">
                                                                  <h4 class="brz-mb-xs-10 brz-tp-heading4 brz-mb-lg-20"><span style="color: rgb(5, 0, 0);">E-Commerce</span></h4>
                                                                  <p class="brz-tp-paragraph"><span style="color: rgb(10, 0, 0);">List Your Products/Services With Custom Buying Link.</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-line brz-css-pkzjz brz-css-cmbbj" data-custom-id="dxagzdpbgznfvfybsrvvrhmqblhjzvijefih">
                                                            <hr class="brz-hr">
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-dknsi" data-custom-id="ybubmzcboeddofewoztlafxonjntxgwlpprc">
                                                            <div class="brz-icon__container" data-custom-id="iswuycutwdqqwgpmnzchxvwwzkjnpyowybiz">
                                                               <span class="brz-span brz-icon css-8am1n7">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="tablet">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <polyline data-cap="butt" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" points="21,5 23,5 23,21 1,21 1,5 17,5 " stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <circle data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" cx="5" cy="13" r="1" stroke-linejoin="miter"/>
                                                                        <polyline data-cap="butt" data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" points="18,8 20,8 20,18 9,18 9,8 14,8 " stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <path fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M12.586,11.414 c0,0,0.448-2.448,1-3l7-7c0.552-0.552,1.448-0.552,2,0l0,0c0.552,0.552,0.552,1.448,0,2l-7,7 C15.034,10.966,12.586,11.414,12.586,11.414z" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="5" y1="8" x2="5" y2="9" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="5" y1="17" x2="5" y2="18" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="cwujtbahubeoqqdkkwgnhwcygmbdddqjrhek">
                                                                  <h4 class="brz-mb-lg-20 brz-tp-heading4 brz-mb-xs-10"><span style="color: rgb(0, 0, 0);">Payment Section</span></h4>
                                                                  <p class="brz-tp-paragraph"><span style="color: rgb(0, 0, 0);">Show All Your Payment Option to your Clients to Choose from.</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-line brz-css-pkzjz brz-css-clawo" data-custom-id="ptptgjprsknfakzhkcbmdefyzngvkkwyqpvj">
                                                            <hr class="brz-hr">
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-zhunn" data-custom-id="jxmteqotsstwxjlalnstbffqmyqshuntbfao">
                                                            <div class="brz-icon__container" data-custom-id="pqplezvwccyxbnzpchhvwbzhitlngwwtgknu">
                                                               <span class="brz-span brz-icon css-8am1n7">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="money-time">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <path data-cap="butt" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" d="M11,12v4c0,1.657,2.686,3,6,3 s6-1.343,6-3v-4" stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <path data-cap="butt" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" d="M11,16v4c0,1.657,2.686,3,6,3 s6-1.343,6-3v-4" stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <ellipse fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" cx="17" cy="12" rx="6" ry="3" stroke-linejoin="miter"/>
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 8,5 8,8 5,8 " stroke-linejoin="miter"/>
                                                                        <path data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M8,15 c-3.866,0-7-3.134-7-7s3.134-7,7-7c3.171,0,5.85,2.109,6.71,5.001" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="qyetrbvsyshabscjpyirihnqtkyggvgxdgwr">
                                                                  <h4 class="brz-mb-xs-10 brz-mb-lg-20 brz-tp-heading4"><span style="color: rgb(0, 0, 0);">15+ Elegant Themes</span></h4>
                                                                  <p class="brz-tp-paragraph"><span style="color: rgb(0, 0, 0);">Create Stunning Mini-website from our Great Collection of themes which can be changed / Edited any time.</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-spuwi" data-custom-id="ihyuaqwyvzljqdsmwtpdcubswpnowaycazok">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-zneuj">
                                                         <div class="brz-image brz-css-atgso brz-css-cukdm">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-wwpkt" data-custom-id="wyhdjtqflzoppqluncyjrfjvbohtzfkuqnti">
                                                               <source srcset="assets/img/0ecc2b82c6bc190c24da2ddfea480901.png 1x, assets/img/41d8c61475b5f48bd20e7e244c214922.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/37bcffc1cc9e8fb20b69c6e7616ae779.png 1x, assets/img/6bf8345a75ccaf9bb0c85606ca1e344a.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/608a66aae7996bd1aad814eb219733db.png 1x, assets/img/27c7321c4c7451ffe9c93adc458b9576.png 2x" src="assets/img/0ecc2b82c6bc190c24da2ddfea480901.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="zmkvtdrqxkdyehqupdovsjqqxdzacpngdylv" id="features" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="udmauwjuwpnsbceusirswnygkvtovogtfnrh">
                  <div class="brz-bg brz-css-ldgql brz-css-ljuob">
                     <div class="brz-bg-media">
                        <div class="brz-bg-image brz-bg-image-parallax"></div>
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="yylensafwhqwnhypupoyzzdkqlsvjszzvtpa">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-tswkz" data-custom-id="qtfafwhtoqiouikgorvmavhqtytarfiesfwj">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="xhbptveinphwijxlhdfmxinwbgyzwfmhfcjg">
                                                            <h2 class="brz-tp-heading2 brz-text-xs-center brz-text-lg-center"><span style="color: rgb(241, 243, 78);">Powerful &amp; Best Features for Digital Business Card</span></h2>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="padpfuuaiafksoskczudmqicawlogjgfyfoa">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-azrbr" data-custom-id="mivckfvvuyxrdxrybfibhunyurfzhvmkaqzq">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="oriltbmkabbbogbfcmmppjzgwcflbxocwrff">
                                                            <p class="brz-tp-paragraph brz-text-xs-center brz-text-lg-center"><span style="color: rgb(255, 255, 255);">Design your own digital Business card in just 1 minute. Your DV-Card can be easily updated with our user-friendly panel. Share your every business detail with your clients/customers just at one click.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="hqdgbdnmoirxfnvrslgnhakulodzjrwyaiqp">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-rzzwy" data-custom-id="scecwnnsvlphslfriuyjvrlltxpjtdmoyogr">
                                             <div class="brz-bg brz-css-wqmvr brz-css-lapqx">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-gfqxg">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="borlhamunzvqfclxstlebnbhwxnskxcwglxx">
                                                            <div class="brz-icon__container" data-custom-id="jqnsnmokuawbocxeuoptrzmtoixoretenluo">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="phone-call">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M16.293,14.293L13,17.586L6.414,11l3.293-3.293c0.391-0.391,0.391-1.024,0-1.414l-5-5 c-0.391-0.391-1.024-0.391-1.414,0L0,4.586C0,15.653,8.345,24,19.414,24l3.293-3.293c0.391-0.391,0.391-1.024,0-1.414l-5-5 C17.317,13.903,16.684,13.903,16.293,14.293z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M24,10h-2c0-4.411-3.589-8-8-8V0C19.514,0,24,4.486,24,10z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M20,10h-2c0-2.206-1.794-4-4-4V4C17.309,4,20,6.691,20,10z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="lkkhxhgzqvftukkuzmsoiqphwgxstmposjgx">
                                                                  <p class="brz-mt-xs-0 brz-fw-xs-400 brz-fs-xs-im-22 brz-fs-sm-im-22 brz-fs-lg-22 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mb-xs-0 brz-text-xs-left brz-mt-sm-0 brz-mt-lg-0"><span style="color: rgb(255, 255, 255);">One Click Call&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-uztwj" data-custom-id="pnilououhpbapbxaclozqesxghtiyhwtquer">
                                             <div class="brz-bg brz-css-wqmvr brz-css-esdgv">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-rqxkp">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-wcsmf" data-custom-id="vjzbfnpqesllgairjpqkdzghcqjurnddkaef">
                                                            <div class="brz-icon__container" data-custom-id="ljoloemwpnxzeudjtdcqymgjsooymsabhyxs">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="logo-whatsapp">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M0.05369,24l1.68771-6.16271c-1.04102-1.80344-1.58881-3.84947-1.58796-5.94549 C0.15607,5.33464,5.49277,0,12.04988,0c3.18237,0.00127,6.16932,1.23986,8.41533,3.48773 c2.24607,2.24788,3.48232,5.23587,3.48109,8.41356c-0.00266,6.55716-5.33983,11.8925-11.89626,11.8925h-0.00003h-0.00487 c-1.99106-0.00082-3.9474-0.50012-5.68498-1.44752L0.05369,24z M6.65233,20.19318l0.36107,0.21425 c1.5181,0.90064,3.25833,1.3771,5.03255,1.37779h0.00405c5.44987,0,9.88551-4.43425,9.88772-9.88468 c0.00101-2.64119-1.0265-5.1247-2.89334-6.99306c-1.86684-1.86836-4.34946-2.89789-6.99046-2.8989 c-5.45405,0-9.88973,4.43393-9.89191,9.88399c-0.00076,1.86766,0.52201,3.68667,1.51178,5.26048l0.23513,0.37395l-0.99891,3.64756 L6.65233,20.19318z"/>
                                                                        <path data-color="color-2" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M9.07668,6.92043 C8.83542,6.34098,8.59035,6.41938,8.40789,6.4103c-0.17318-0.00862-0.37154-0.01044-0.5697-0.01044S7.31801,6.47422,7.04553,6.77169 C6.77307,7.06918,6.0052,7.7881,6.0052,9.25069c0,1.46259,1.06511,2.8756,1.21374,3.07393 c0.14861,0.19833,2.09602,3.1998,5.07784,4.48696c0.70918,0.30615,1.26289,0.48895,1.69455,0.62597 c0.71212,0.22611,1.36011,0.19422,1.87228,0.11772c0.57108-0.08529,1.75864-0.71889,2.00636-1.41301 c0.24769-0.69412,0.24769-1.28908,0.17337-1.41304c-0.07428-0.12392-0.27246-0.1983-0.56969-0.34706 c-0.29726-0.14872-1.75867-0.86765-2.03116-0.96679c-0.27246-0.09915-0.4706-0.14873-0.66877,0.14875 c-0.19814,0.29745-0.7678,0.9668-0.9412,1.1651c-0.17337,0.19833-0.34677,0.22314-0.644,0.07438 c-0.29726-0.14872-1.25504-0.46253-2.3904-1.47489c-0.88362-0.78789-1.48023-1.76108-1.65362-2.05856 c-0.17339-0.29748-0.01844-0.45833,0.13036-0.60645c0.1337-0.13313,0.29723-0.34706,0.44586-0.52059 c0.14861-0.17353,0.19816-0.29748,0.29723-0.49578c0.09909-0.19833,0.04954-0.37186-0.02477-0.5206 C9.91886,8.978,9.3244,7.51538,9.07668,6.92043z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="ydlnkhoskwegxvvluvgtfubqghhgycgtyhro">
                                                                  <p class="brz-fw-xs-400 brz-fs-xs-im-22 brz-fs-sm-im-22 brz-fs-lg-22 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-text-lg-left brz-mt-lg-0 brz-mt-xs-0"><span style="color: rgb(255, 255, 255);"> One Click WhatsApp&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-zkfvw" data-custom-id="sbiytnrpandjcfvzoixlmikybxdeiaxpqocp">
                                             <div class="brz-bg brz-css-wqmvr brz-css-wgqmv">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-gxspy">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="nppidgjqxccdjmwrlxyosffusmhxrzkjyhpa">
                                                            <div class="brz-icon__container" data-custom-id="kxhgskamiogqshihmthegsqzutsqkksofult">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="scale-2">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M23,0H1C0.448,0,0,0.448,0,1v22c0,0.552,0.448,1,1,1h22c0.552,0,1-0.448,1-1V1C24,0.448,23.552,0,23,0z	 M22,22H12v-9c0-0.552-0.448-1-1-1H2V2h20V22z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="msgbfqajuctnshrcjgreuytcsuewyxouwywe">
                                                                  <p class="brz-fs-xs-22 brz-fw-xs-400 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-fs-sm-im-25 brz-fs-lg-25 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-mt-xs-0 brz-mt-lg-15"><span style="color: rgb(255, 255, 255);">Lead Form</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-opdba" data-custom-id="waslmnrioodtcdlysxagkajzyysynljzryko">
                                             <div class="brz-bg brz-css-wqmvr brz-css-cocce">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-kpewg">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="uqpwhlmrfvcyzzsrmpljbkaxyuqyqivijztk">
                                                            <div class="brz-icon__container" data-custom-id="ptoxxjarxmsjlrjnweylguckokzdirqkvywh">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="email-84">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M23,2H1C0.4,2,0,2.4,0,3v18c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3C24,2.4,23.6,2,23,2z M20.7,6.8l-8,7 C12.5,13.9,12.2,14,12,14s-0.5-0.1-0.7-0.2l-8-7c-0.4-0.4-0.5-1-0.1-1.4c0.4-0.4,1-0.5,1.4-0.1l7.3,6.4l7.3-6.4 c0.4-0.4,1-0.3,1.4,0.1C21.1,5.8,21.1,6.4,20.7,6.8z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="kmircsbyunlbvnbxenuwjvwhmvllubsprtox">
                                                                  <p class="brz-mt-xs-0 brz-text-xs-left brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-fs-sm-im-25 brz-fs-lg-25 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-mt-lg-0 brz-fw-xs-400 brz-fs-xs-22"><span style="color: rgb(255, 255, 255);">One Click Email&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-css-fyqqu brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                    <div class="brz-spacer brz-css-jyjfy brz-css-jbton"></div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="fmdvgpavuuzajfjcbzocwvyurahunemknelh">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-qilwe" data-custom-id="pzjackksiijsooprzpzqeheswzhcsubfcdqk">
                                             <div class="brz-bg brz-css-wqmvr brz-css-dzxgb">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-seuyj">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="fwdvqlpvznpzknvnqigagpqdmmxcrcpobpek">
                                                            <div class="brz-icon__container" data-custom-id="cjjypwptslroatndsubosaweiouucyqgdkin">
                                                               <span class="brz-span brz-icon css-17ysa7i">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="appointment">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M12,0C7.576,0,3,3.366,3,9c0,5.289,7.951,13.363,8.29,13.705C11.478,22.894,11.733,23,12,23 s0.522-0.106,0.71-0.295C13.049,22.363,21,14.289,21,9C21,3.366,16.424,0,12,0z M17,10h-6V4h2v4h4V10z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="zbvkoaxescefgyleyagvgzxuwjzcpcxriflq">
                                                                  <p class="brz-fs-xs-22 brz-mt-xs-0 brz-text-xs-justify brz-mt-sm-10 brz-lh-lg-1_5 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-fs-lg-25 brz-fs-sm-im-25 brz-ls-lg-1_1 brz-ls-sm-im-1 brz-ls-xs-im-1 brz-ff-overpass brz-ft-google brz-fw-lg-700 brz-fw-sm-im-700 brz-fw-xs-400 brz-mt-lg-0"><span style="color: rgb(255, 255, 255);">One Click Navigate&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-bjwat" data-custom-id="qheozpzohnvpxgzzgezonvgkwohsxgyjleyv">
                                             <div class="brz-bg brz-css-wqmvr brz-css-pnwdf">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-hrhwa">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="chqongxmrxlwrizpemwfimvukuxgyulwvxoh">
                                                            <div class="brz-icon__container" data-custom-id="mimdjqqlmmmypityntibiymquflircxjtkys">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="contacts-44">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M9,12c2.757,0,5-2.243,5-5V5c0-2.757-2.243-5-5-5S4,2.243,4,5v2C4,9.757,6.243,12,9,12z"/>
                                                                        <path fill="currentColor" d="M15.423,15.145C14.042,14.622,11.806,14,9,14s-5.042,0.622-6.424,1.146C1.035,15.729,0,17.233,0,18.886V24 h18v-5.114C18,17.233,16.965,15.729,15.423,15.145z"/>
                                                                        <rect data-color="color-2" x="16" y="3" fill="currentColor" width="8" height="2"/>
                                                                        <rect data-color="color-2" x="16" y="8" fill="currentColor" width="8" height="2"/>
                                                                        <rect data-color="color-2" x="19" y="13" fill="currentColor" width="5" height="2"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="getxwyeelxqnqeptvchrmabyntrthnpdzmdh">
                                                                  <p class="brz-mt-xs-0 brz-mt-lg-0 brz-mt-sm-0 brz-lh-lg-1_5 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-fs-lg-25 brz-fs-sm-im-25 brz-ls-lg-1_1 brz-ls-sm-im-1 brz-ls-xs-im-1 brz-ff-overpass brz-ft-google brz-fw-lg-700 brz-fw-sm-im-700 brz-fw-xs-400 brz-fs-xs-22"><span style="color: rgb(255, 255, 255);">Add to Contacts&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-dcuqf" data-custom-id="rcnuilbimlnazchdrwfvykragenqkigdikes">
                                             <div class="brz-bg brz-css-wqmvr brz-css-bjban">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-igryx">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="tepbnrtidlyqzgbbwwologstqexgnjobwqtr">
                                                            <div class="brz-icon__container" data-custom-id="mgkxkuprlzwjvluvoxwqyugafapnedfxopce">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="folder-image">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M23,4H12.5L9.8,0.4C9.611,0.148,9.315,0,9,0H1C0.448,0,0,0.447,0,1v22c0,0.553,0.448,1,1,1h22 c0.552,0,1-0.447,1-1V5C24,4.447,23.552,4,23,4z M9,7c1.105,0,2,0.895,2,2c0,1.105-0.895,2-2,2s-2-0.895-2-2C7,7.895,7.895,7,9,7z M20.875,19.485C20.698,19.803,20.363,20,20,20H4c-0.379,0-0.725-0.214-0.895-0.553C2.936,19.108,2.973,18.703,3.2,18.4l3-4 c0.174-0.232,0.439-0.377,0.729-0.397c0.298-0.017,0.573,0.085,0.778,0.291l2.165,2.165l4.314-6.039 c0.193-0.271,0.494-0.424,0.845-0.418c0.333,0.01,0.64,0.187,0.816,0.47l5,8C21.041,18.778,21.051,19.167,20.875,19.485z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jepkuvkvtbniovzldynxgitnvzgbkagvikpc">
                                                                  <p class="brz-fs-xs-22 brz-mt-xs-0 brz-fw-xs-400 brz-mt-sm-0 brz-lh-lg-1_5 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-fs-lg-25 brz-fs-sm-im-25 brz-ls-lg-1_1 brz-ls-sm-im-1 brz-ls-xs-im-1 brz-ff-overpass brz-ft-google brz-fw-lg-700 brz-fw-sm-im-700 brz-mt-lg-15"><span style="color: rgb(255, 255, 255);">Photo Gallery&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-korxz" data-custom-id="wpjbalrwiuxfnrkaagvxcacdelizwledxxnm">
                                             <div class="brz-bg brz-css-wqmvr brz-css-svqxf">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-cpjbj">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="mmqyeglfsyyfwihyunsxeypnrikzhluropmp">
                                                            <div class="brz-icon__container" data-custom-id="vhdixclwjdsjpiikvrhajbtrbjhdqvphshkb">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="link-broken-70">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M11.864 16.378a3.914 3.914 0 0 1-1.124 2.468l-2 2a3.956 3.956 0 0 1-5.586 0 3.954 3.954 0 0 1 0-5.586l2-2a3.916 3.916 0 0 1 2.468-1.124l1.816-1.816c-1.974-.51-4.155-.017-5.698 1.527l-2 2a5.956 5.956 0 0 0 0 8.414C2.9 23.42 4.424 24 5.947 24s3.047-.58 4.207-1.74l2-2c1.543-1.543 2.036-3.724 1.527-5.698l-1.817 1.816z"/>
                                                                        <path fill="currentColor" d="M16.378 11.864a3.914 3.914 0 0 0 2.468-1.124l2-2a3.956 3.956 0 0 0 0-5.586 3.954 3.954 0 0 0-5.586 0l-2 2a3.916 3.916 0 0 0-1.124 2.468L10.32 9.438c-.51-1.974-.017-4.155 1.527-5.698l2-2a5.956 5.956 0 0 1 8.414 0C23.42 2.9 24 4.424 24 5.947s-.58 3.047-1.74 4.207l-2 2c-1.543 1.543-3.724 2.036-5.698 1.527l1.816-1.817z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M7.586 15l7.413-7.414L16.414 9 9 16.415z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M18.658 17.447l.895-1.789 3.789 1.895-.895 1.789z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M15.658 19.553l1.79-.895 1.894 3.79-1.79.894z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M4.658 1.553l1.79-.895 1.894 3.79-1.79.894z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M.658 6.447l.895-1.789 3.789 1.895-.895 1.789z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="lwtqjhnuwwcgnpalaierpfiefpgohlskoqkl">
                                                                  <p class="brz-mt-xs-0 brz-fw-xs-400 brz-mt-lg-0 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-fs-sm-im-25 brz-fs-lg-25 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-fs-xs-23"><span style="color: rgb(255, 255, 255);">Website &amp; Social Links&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-css-mbfqs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                    <div class="brz-spacer brz-css-jyjfy brz-css-osaix"></div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="txpzzpprawouhdfrjpozgcufplqfxqsoxyju">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-lovpj" data-custom-id="aczysefzabjhyyaybfvqotxjdhgepqhmfkyp">
                                             <div class="brz-bg brz-css-wqmvr brz-css-bazdp">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-xzfvb">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="khndzthqlsblhrcajlaunulmctkrbpgmpryj">
                                                            <div class="brz-icon__container" data-custom-id="anvzlwdvfdbnkndxhbjsulofzgvbaeumfwdl">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="a-share">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M10,12L10,12c-2.761,0-5-3.239-5-6V5c0-2.761,2.239-5,5-5h0c2.761,0,5,2.239,5,5v1C15,8.761,12.761,12,10,12 z"/>
                                                                        <path fill="currentColor" d="M12,19c0-2.206,1.794-4,4-4c0.177,0,0.352,0.026,0.528,0.05C14.893,14.534,12.584,14,10,14 c-2.824,0-5.329,0.638-6.974,1.193C1.81,15.604,1,16.749,1,18.032V22h12.382C12.542,21.266,12,20.2,12,19z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M21,20c-0.35,0-0.674,0.098-0.961,0.257l-2.042-1.225C17.997,19.021,18,19.011,18,19 s-0.003-0.021-0.003-0.032l2.042-1.225C20.326,17.902,20.65,18,21,18c1.103,0,2-0.897,2-2s-0.897-2-2-2s-2,0.897-2,2 c0,0.011,0.003,0.021,0.003,0.032l-2.042,1.225C16.674,17.098,16.35,17,16,17c-1.103,0-2,0.897-2,2s0.897,2,2,2 c0.35,0,0.674-0.098,0.961-0.257l2.042,1.225C19.003,21.979,19,21.989,19,22c0,1.103,0.897,2,2,2s2-0.897,2-2S22.103,20,21,20z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jruclaltidmpabzpqxxhnmtptszuisvaoixv">
                                                                  <p class="brz-fs-xs-22 brz-mt-xs-0 brz-fw-xs-400 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-fs-sm-im-25 brz-fs-lg-25 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-mt-lg-15"><span style="color: rgb(255, 255, 255);">Share Unlimited&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-qedtz" data-custom-id="etjjbhrtuylrzdewsxfvxkbdjsfnuqmsopeg">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-jsrws">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="bwhmvxwstobeihjcgxinbmknvrbmwqulxzeh">
                                                            <div class="brz-icon__container" data-custom-id="ziorpjtwdyadusdafwqtmtoygzitcorqwvjr">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="logo-youtube">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M23.8,7.2c0,0-0.2-1.7-1-2.4c-0.9-1-1.9-1-2.4-1C17,3.6,12,3.6,12,3.6h0c0,0-5,0-8.4,0.2 c-0.5,0.1-1.5,0.1-2.4,1c-0.7,0.7-1,2.4-1,2.4S0,9.1,0,11.1v1.8c0,1.9,0.2,3.9,0.2,3.9s0.2,1.7,1,2.4c0.9,1,2.1,0.9,2.6,1 c1.9,0.2,8.2,0.2,8.2,0.2s5,0,8.4-0.3c0.5-0.1,1.5-0.1,2.4-1c0.7-0.7,1-2.4,1-2.4s0.2-1.9,0.2-3.9v-1.8C24,9.1,23.8,7.2,23.8,7.2z M9.5,15.1l0-6.7l6.5,3.4L9.5,15.1z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="dibpoctopvjrfiudhgqbtacwgrrfsneudtiz">
                                                                  <p class="brz-mt-xs-0 brz-mt-sm-0 brz-lh-lg-1_5 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-fs-lg-25 brz-fs-sm-im-25 brz-ls-lg-1_1 brz-ls-sm-im-1 brz-ls-xs-im-1 brz-ff-overpass brz-ft-google brz-fw-lg-700 brz-fw-sm-im-700 brz-mt-lg-0 brz-fw-xs-400 brz-fs-xs-22"><span style="color: rgb(255, 255, 255);">Youtube Video Gallery&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-lrgjb" data-custom-id="amqemgitjmfzjynqculaynfsmobzphvajvsj">
                                             <div class="brz-bg brz-css-wqmvr brz-css-nrusc">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-zmqxr">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="ruczacbysdzgvfvcyrpecifskestltubdgru">
                                                            <div class="brz-icon__container" data-custom-id="bcrhavgyrokrplrsxqqrzltvivuvfyqdhvpu">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="shop">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M19.5,13c-0.885,0-1.735-0.207-2.5-0.599C16.235,12.793,15.385,13,14.5,13s-1.735-0.207-2.5-0.599 C11.235,12.793,10.385,13,9.5,13S7.765,12.793,7,12.402C6.235,12.793,5.385,13,4.5,13c-0.527,0-1.027-0.075-1.5-0.206V23 c0,0.552,0.448,1,1,1h6v-5h4v5h6c0.552,0,1-0.448,1-1V12.794C20.527,12.925,20.027,13,19.5,13z"/>
                                                                        <path data-color="color-2" fill="currentColor" d="M22.832,6.446l-4-6C18.646,0.167,18.334,0,18,0H6C5.666,0,5.354,0.167,5.168,0.446l-4,6 C1.059,6.61,1,6.803,1,7c0,2.355,1.439,4,3.5,4c0.979,0,1.864-0.403,2.5-1.053C7.636,10.597,8.521,11,9.5,11s1.864-0.403,2.5-1.053 C12.636,10.597,13.521,11,14.5,11s1.864-0.403,2.5-1.053C17.636,10.597,18.521,11,19.5,11c2.061,0,3.5-1.645,3.5-4 C23,6.803,22.941,6.61,22.832,6.446z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="icgqfgabkehkyyrvhtepbfmevbvhbkkjvwlk">
                                                                  <p class="brz-fs-xs-22 brz-mt-xs-0 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-1 brz-ls-sm-im-1 brz-ls-lg-1_1 brz-fs-sm-im-25 brz-fs-lg-25 brz-lh-xs-im-1_5 brz-lh-sm-im-1_5 brz-lh-lg-1_5 brz-mt-sm-0 brz-fw-xs-400 brz-text-lg-left brz-mt-lg-15"><span style="color: rgb(255, 255, 255);">Online Store&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-uhmpm" data-custom-id="yzohmxqhlraxxgedsngxopjmfirfjvjuklri">
                                             <div class="brz-bg brz-css-wqmvr brz-css-bvrfa">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-plcqa">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="vbikhziqntsjvjprevtuzbsgjhryzwnichfg">
                                                            <div class="brz-icon__container" data-custom-id="iitxvgsrgvrstmeixozlioccbfexqfqoypdt">
                                                               <span class="brz-span brz-icon css-1n2fmpp">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="card-add">
                                                                     <g class="nc-icon-wrapper">
                                                                        <polygon data-color="color-2" fill="currentColor" points="21,15 19,15 19,18 16,18 16,20 19,20 19,23 21,23 21,20 24,20 24,18 21,18 "/>
                                                                        <path fill="currentColor" d="M21,1H3C1.346,1,0,2.346,0,4v13c0,1.654,1.346,3,3,3h9v-2H3c-0.552,0-1-0.449-1-1v-5h22V4 C24,2.346,22.654,1,21,1z M2,6V4c0-0.551,0.448-1,1-1h18c0.552,0,1,0.449,1,1v2H2z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="bfmhhufoghsiihrzljeeqlapertcagubewkn">
                                                                  <p class="brz-mt-sm-0 brz-lh-lg-1_5 brz-lh-sm-im-1_5 brz-lh-xs-im-1_5 brz-fs-lg-25 brz-fs-sm-im-25 brz-ls-lg-1_1 brz-ls-sm-im-1 brz-ls-xs-im-1 brz-ff-overpass brz-ft-google brz-fw-lg-700 brz-fw-sm-im-700 brz-mt-lg-0 brz-fw-xs-400 brz-mt-xs-0 brz-fs-xs-22"><span style="color: rgb(255, 255, 255);">Payment Section&#xA0;</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="kczgdoarfwlitognbuudigrfuiauqwgccmja" id="gallery" class="brz-section brz-css-zbjnw card-pre">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="imuworjwpagqqliakaritmggyrlpylmijhsv">
                  <div class="brz-bg brz-css-ldgql brz-css-wlcjd">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-nrpmh">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="slnaeyrxolcrcnjxjyhnsdqzcsdrowamwmhb">
                                       <h1 class="brz-tp-heading1 brz-text-lg-center brz-mb-lg-0"><span class="brz-cp-color2">Sample vCard Templates </span></h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-qieec">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="uaurzqylkfxiprkbchhecxdycfhogdwmvmeg">
                                       <h3 class="brz-text-lg-center brz-tp-subtitle brz-mb-lg-10 brz-fw-xs-900"><em class="brz-cp-color7">Click the Image to Zoom and see the Designs...</em></h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-azetb">
                                    <div class="brz-image__gallery" data-custom-id="cjjhglqgqfdwihgrnahmvjdmpgtpjmgmrkle">
                                       <div class="brz-image__gallery-wrapper brz-d-xs-flex brz-flex-xs-wrap brz-image__gallery-lightbox brz-css-fzoox brz-css-bjehc">
                                           
                                      <?php 
                                        
                                        for ($i = 1; $i <= 11; $i++){
                                        
                                        echo'
                                        <div class="brz-image__gallery-item" style="margin-bottom:20px;">
                                            <a href="form.php?design='.$i.'">
                                                <img src="assets/assets_new/img/st'.$i.'.png" width="220" style="margin-left:5%">
                                            </a>
                                        </div>';
                                            }
                                        ?>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="lwgflwbmyqzkceskjserruzeeeofqtnezbpp" id="pricing" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="vhzzlrpkkhtldoancyjiceokcahdaxuwoshq">
                  <div class="brz-bg brz-css-ldgql brz-css-ddcgl">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                        <div class="brz-bg-shape brz-bg-shape__top"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-kfjht">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="lzlhxesnhzqgmgzlljmqgbkdjijfaicxdcry">
                                       <h1 class="brz-tp-heading1 brz-mt-lg-34 brz-mb-lg-19 brz-text-lg-center brz-text-xs-center"><span style="color: rgb(219, 253, 4);">      PRICING </span></h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="bfrghoubbbemazyrfjrumstykkeruipemkaf">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz brz-css-ypade">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-vqcci" data-custom-id="dgrawxivodnqytjouydsyesavqkdxrjjvsvh">
                                             <div class="brz-bg brz-css-wqmvr brz-css-travu">
                                                <div class="brz-bg-content"></div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-byrps" data-custom-id="ynhdbkaulwajisujbznopgpwecrtbgdvyrqj">
                                             <div class="brz-bg brz-css-wqmvr brz-css-cszsh">
                                                <div class="brz-bg-content">
                                                   <div class="brz-row__container brz-css-alnld" data-custom-id="sqrmhblthshhkqfmjwlpcgmblwpzaomrmekn">
                                                      <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                                         <div class="brz-bg-content">
                                                            <div class="brz-row brz-row--inner brz-css-ippaq brz-css-ntdxp">
                                                               <div class="brz-columns brz-css-aghhv brz-css-rxbrr" data-custom-id="eabdlraawrxfckkdkdilxuwshoypnjxzbhbt">
                                                                  <div class="brz-bg brz-css-wqmvr brz-css-ozbqc">
                                                                     <div class="brz-bg-content">
                                                                        <div class="brz-css-wfugs brz-wrapper">
                                                                           <div class="brz-d-xs-flex brz-css-gxzco brz-css-jbbej">
                                                                              <div class="brz-rich-text brz-css-jfqjt" data-custom-id="vuqxmkyipqepdbaffzncataspumsnhpshgsi">
                                                                                 <p class="brz-tp-heading1 brz-text-xs-justify"><span class="brz-cp-color8"> &#x20B9; 365 / yr.</span></p>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-xqhgu">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-qkujv" data-custom-id="nvtshzdrpsflcpfanjvzyuclqyrpefsquzhx">
                                                            <div class="brz-icon__container" data-custom-id="bazyrjoxqihhpiewpqwbrdhexppxkekuqncl">
                                                               <span class="brz-span brz-icon css-wtjz1e">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="check-simple">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <polygon fill="currentColor" points="9,20 2,13 5,10 9,14 19,4 22,7 "/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="fmpgbcdmniagsezgagztasmxidqwskzmteve">
                                                                  <p class="brz-tp-paragraph"><span class="brz-cp-color8">Immediate Login</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-tnqgh">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-jqnrf" data-custom-id="rxzwhrakzvczjfjwcketmywqmhiifkwhxkpx">
                                                            <div class="brz-icon__container" data-custom-id="rfnnucilabzcyetpytxzaucntbclwitajqiu">
                                                               <span class="brz-span brz-icon css-wtjz1e">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="check-simple">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <polygon fill="currentColor" points="9,20 2,13 5,10 9,14 19,4 22,7 "/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="ptetyvsdmsbrxkcahrddvvnkniltdbuyqvdq">
                                                                  <p class="brz-tp-paragraph"><span class="brz-cp-color8">15 + Themes</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-zqqkl">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-zjtlj" data-custom-id="ntublwiucttsnvuataaykphrrddkfoopkrjl">
                                                            <div class="brz-icon__container" data-custom-id="eqgdonrsffvbmjsfzqcjrbicunilztgbifoj">
                                                               <span class="brz-span brz-icon css-wtjz1e">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="check-simple">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <polygon fill="currentColor" points="9,20 2,13 5,10 9,14 19,4 22,7 "/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="xehouqmqazyphtgkwnemzydzischqqfhdoge">
                                                                  <p class="brz-tp-paragraph"><span class="brz-cp-color8">Unlimited Shares &amp; Edits</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-rlzpt">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-lhufl" data-custom-id="ozopjcqpzcdpkamfychcmmbfbepigjlyxaqi">
                                                            <div class="brz-icon__container" data-custom-id="crzrwvpnnbsbumkytbtwnkfqiekacwwgwqpv">
                                                               <span class="brz-span brz-icon css-wtjz1e">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="check-simple">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <polygon fill="currentColor" points="9,20 2,13 5,10 9,14 19,4 22,7 "/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="iiwiarcvfaezeyndcpcjybsulsccjskhnyda">
                                                                  <p class="brz-tp-paragraph"><span class="brz-cp-color8">Free Updates </span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-qfboi">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-zrhpc" data-custom-id="wfmegqpzbbxlcpokfuvabltjlnutnewrdqvl">
                                                            <div class="brz-icon__container" data-custom-id="ygdxmdnhmffqekkjkekjizxvhwghmvgmxhoq">
                                                               <span class="brz-span brz-icon css-wtjz1e">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="check-simple">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <polygon fill="currentColor" points="9,20 2,13 5,10 9,14 19,4 22,7 "/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="efmakmrijgikzydessjehkldgjavapkbmqzw">
                                                                  <p class="brz-tp-paragraph"><span class="brz-cp-color8">Exclusive Support</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-geaau"></div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb brz-css-bzjtk">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb brz-css-wsquc">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="ztabcrrcdiypfounebjbysnhlpugjstwpwzw"><a class="brz-a brz-btn brz-css-jzmrc brz-css-jhtjs" href="#gallery" data-brz-link-type="external" data-custom-id="ztabcrrcdiypfounebjbysnhlpugjstwpwzw"><span class="brz-span brz-text__editor">Buy Now</span></a></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-fuxup" data-custom-id="jgthonsabnjtndqsvqzpjllkesoxdkccxwys">
                                             <div class="brz-bg brz-css-wqmvr brz-css-iyroj">
                                                <div class="brz-bg-content"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="ovucdnjsrcajylwcbxjhrnewnlbrpnufhvqo" id="ovucdnjsrcajylwcbxjhrnewnlbrpnufhvqo" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="sqkxkmhdyifkwtgrsgjulharpcakfymdbgbe">
                  <div class="brz-bg brz-css-ldgql brz-css-usbyz">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-bnqen">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="rleevhphqrilstrsuflistqcjsgkqylfzuxe">
                                       <p class="brz-text-lg-center brz-tp-abovetitle"><span class="brz-cp-color3">Make Your Prospecting Effortless...</span></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="rwmydwjqkenidlzoqifhdsshiapgoqggahgz">
                                       <h2 class="brz-tp-heading2 brz-text-lg-center"><span style="color: rgb(255, 255, 255);">Benefited for.... </span></h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-css-ptocf brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                    <div class="brz-spacer brz-css-jyjfy brz-css-kpyxz"></div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="kkwsujtcivauzpqyggxdohmukobjyxgdaoxh">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz brz-css-bvhpm">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-kcdur" data-custom-id="afyonntzwixtkxugxoopvuifetmjsmhpmvdk">
                                             <div class="brz-bg brz-css-wqmvr brz-css-kyfdr">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="jttliamjompdlcjzvfzyurguogdkcvrtmjfs">
                                                               <div class="brz-icon__container" data-custom-id="jttliamjompdlcjzvfzyurguogdkcvrtmjfs">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="briefcase-24">
                                                                        <g class="nc-icon-wrapper">
                                                                           <path data-color="color-2" fill="currentColor" d="M15,18v2H9v-2H1v5c0,0.552,0.448,1,1,1h20c0.552,0,1-0.448,1-1v-5H15z"/>
                                                                           <path fill="currentColor" d="M23,4h-6V1c0-0.552-0.448-1-1-1H8C7.448,0,7,0.448,7,1v3H1C0.448,4,0,4.448,0,5v10c0,0.552,0.448,1,1,1h8v-3 h6v3h8c0.552,0,1-0.448,1-1V5C24,4.448,23.552,4,23,4z M15,4H9V2h6V4z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="rgdskluckzzqdposeumwcipbpwibdpzqmylj">
                                                            <h4 class="brz-text-lg-center brz-tp-heading4"><span class="brz-cp-color2">Business Owners</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="njbpadmlpmzxlowpmdrkzknrlmudamconxkd">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Business owners who call and/or meet prospects personally to get business.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-dosxf brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-yjxwe"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-ojqco" data-custom-id="tjapqycqssspztapumpgojxdqxwbwhqgsyxo">
                                             <div class="brz-bg brz-css-wqmvr brz-css-lzluq">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="fiuerwbtprofjdxtizwlojwolgjcbwxmuzeq">
                                                               <div class="brz-icon__container" data-custom-id="fiuerwbtprofjdxtizwlojwolgjcbwxmuzeq">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="blog">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path d="M21,0H3A1,1,0,0,0,2,1V23a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V1A1,1,0,0,0,21,0ZM18,20H6V18H18Zm0-5H6V13H18Zm0-5H6V4H18Z" fill="currentColor"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="pjrzlodggcjteynwvaancspmrxgtdzxyjuxo">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Marketing Agencies</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="cygbygmaartjdnoalxrubipmlzcdxqghlaig">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Advertising, Branding, News Paper, Printing and Media Planning Houses.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-uxlio brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-nzjcf"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-fffmz" data-custom-id="lygifamflipsqayxzmmtvvptmkqjhjvffalq">
                                             <div class="brz-bg brz-css-wqmvr brz-css-ptpkf">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="wsvwoxklilsgqhrxhibufganiyfrhjxhzxbr">
                                                               <div class="brz-icon__container" data-custom-id="wsvwoxklilsgqhrxhibufganiyfrhjxhzxbr">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="trend-up">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path fill="currentColor" d="M23,6H13l4.503,4.503l-4.541,5.045l-5.255-5.255c-0.391-0.391-1.023-0.391-1.414,0l-5,5 c-0.391,0.391-0.391,1.023,0,1.414s1.023,0.391,1.414,0L7,12.414l5.293,5.293C12.48,17.895,12.735,18,13,18 c0.286,0,0.555-0.122,0.743-0.331l5.175-5.75L23,16V6z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="cnhvmoryffvppyovguteihlhhchkamomhhaw">
                                                            <h4 class="brz-text-lg-center brz-tp-heading4"><span class="brz-cp-color2">Sales Professionals</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="xsfkywxivzrxfbeffqubgekzoslpspwgrgmu">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Independent Sales Professionals, Field Staff and Sales Executives.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-hupan brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-rbkuv"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="nqxlkuhsmwknydnsfhfyvrlwpiqehnvhqarb">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-janpk" data-custom-id="fcijodqcchfhffpwxobfjytrbgxaxtaqojxp">
                                             <div class="brz-bg brz-css-wqmvr brz-css-jykbs">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="mqvsvrzzxcobryorcufciqketczxzkeuamsx">
                                                               <div class="brz-icon__container" data-custom-id="mqvsvrzzxcobryorcufciqketczxzkeuamsx">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="shirt-business">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path fill="currentColor" d="M18,0H6C5.4,0,5,0.4,5,1v2H1C0.4,3,0,3.4,0,4v19c0,0.6,0.4,1,1,1h10V8c0-0.6,0.4-1,1-1s1,0.4,1,1v16h10 c0.6,0,1-0.4,1-1V4c0-0.6-0.4-1-1-1h-4V1C19,0.4,18.6,0,18,0z M7,8.1v-5l3.3,2.8L7,8.1z M12,4.7L8.8,2h6.5L12,4.7z M17,3.1v5 l-3.3-2.2L17,3.1z M21,17h-5v-3h5V17z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jdqcxxtcyqjcmwwdywdsnvaifbafzgltcqvy">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Consultants</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="brfnijdbsfpqffnapksmvlfwxeqwkjjxjgpn">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Architect, Interior Designers, CA, Finance and other Consultants.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-rycnm brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-owain"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-otyyq" data-custom-id="nvmnlnsjmjbvmmkcrshgbwgonrrcwalyxcix">
                                             <div class="brz-bg brz-css-wqmvr brz-css-jqguq">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="mpnebafmdhvisutmbsfadsqxhjujqnxrajvj">
                                                               <div class="brz-icon__container" data-custom-id="mpnebafmdhvisutmbsfadsqxhjujqnxrajvj">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="plane-17">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path data-color="color-2" fill="currentColor" d="M6.611,8.904l4.978-4.977L6.454,0.504c-1.187-0.79-2.777-0.632-3.785,0.375L0.293,3.255 C0.081,3.467-0.024,3.762,0.005,4.061c0.029,0.298,0.191,0.567,0.44,0.733L6.611,8.904z"/>
                                                                           <path data-color="color-2" fill="currentColor" d="M20.073,12.411l-4.978,4.978l4.111,6.166c0.166,0.25,0.436,0.411,0.733,0.44 C19.973,23.999,20.005,24,20.038,24c0.264,0,0.519-0.104,0.707-0.293l2.376-2.376c1.008-1.009,1.165-2.601,0.375-3.786 L20.073,12.411z"/>
                                                                           <path fill="currentColor" d="M21.828,2.172c-1.51-1.512-4.146-1.512-5.656,0L6.394,11.95c-0.067,0.067-0.125,0.144-0.171,0.228 l-1.69,3.095l-3.453-0.27c-0.926-0.071-1.44,1.048-0.784,1.704l2.24,2.224l-1.414,2.589c-0.213,0.389-0.143,0.873,0.171,1.186 C1.485,22.899,1.741,23,2,23c0.164,0,0.328-0.04,0.479-0.122l2.589-1.413l2.224,2.24c0.656,0.656,1.775,0.142,1.704-0.784 l-0.27-3.453l3.095-1.69c0.083-0.046,0.16-0.104,0.228-0.171l9.778-9.778C22.584,7.073,23,6.068,23,5S22.584,2.927,21.828,2.172z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="nmpfqsbmoytytbujxrzvjqodwmubagwmogjl">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Events and Travels</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="ulkkiiosukqduobdkytpmampjtyxesuqgett">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Professionals from Event Management, Tours and Travel Companies.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-frsij brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-ivicr"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-hnkkz" data-custom-id="gdrpbfrzzmquyagtuyvkzspwtnibatazeypv">
                                             <div class="brz-bg brz-css-wqmvr brz-css-kvcai">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="izrbymsdvcjvmhnbpavdaqrygojitqhthcmu">
                                                               <div class="brz-icon__container" data-custom-id="izrbymsdvcjvmhnbpavdaqrygojitqhthcmu">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="award-74">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path fill="currentColor" d="M2,6h18v1h2V5c0-0.553-0.448-1-1-1h-2.735l-6.769-3.868c-0.308-0.176-0.685-0.176-0.992,0L3.735,4H1 C0.448,4,0,4.447,0,5v14c0,0.553,0.448,1,1,1h13v-2H2V6z M11,2.151L14.235,4h-6.47L11,2.151z"/>
                                                                           <rect x="4" y="9" fill="currentColor" width="9" height="2"/>
                                                                           <rect x="4" y="13" fill="currentColor" width="6" height="2"/>
                                                                           <path data-color="color-2" fill="currentColor" d="M16,19.315V24l3-2l3,2v-4.685C21.089,19.749,20.074,20,19,20S16.911,19.749,16,19.315z"/>
                                                                           <circle data-color="color-2" fill="currentColor" cx="19" cy="13" r="5"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="tmxmvemzaifuzrgefhxssobipoiugkysqsxn">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Finance &amp; Realtors</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="fdqtuuuxtspotukzsialvcwusghhiruvzpjc">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">People from Real Estate Brokers and Insurance Advisors.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-hdnss brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-shkzb"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="rvhyzvetdgcfpkrrvhnmcixvtkiqzlmbrpfz">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-wvukl" data-custom-id="fkumwceidgziunybiscpwqmftoiwvhziabum">
                                             <div class="brz-bg brz-css-wqmvr brz-css-igdfv">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="hfqusqmbferwzchcbvlvralpkkpnscolfhgq">
                                                               <div class="brz-icon__container" data-custom-id="hfqusqmbferwzchcbvlvralpkkpnscolfhgq">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="books">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path fill="currentColor" d="M5,2H1C0.448,2,0,2.447,0,3v18c0,0.553,0.448,1,1,1h4c0.552,0,1-0.447,1-1V3C6,2.447,5.552,2,5,2z"/>
                                                                           <path data-color="color-2" fill="currentColor" d="M13,2H9C8.448,2,8,2.447,8,3v18c0,0.553,0.448,1,1,1h4c0.552,0,1-0.447,1-1V3 C14,2.447,13.552,2,13,2z"/>
                                                                           <path fill="currentColor" d="M23.972,19.823L19.736,2.329c-0.13-0.537-0.675-0.87-1.207-0.736l-3.888,0.94 c-0.258,0.062-0.48,0.225-0.618,0.451c-0.138,0.226-0.181,0.498-0.119,0.756l4.235,17.495c0.062,0.258,0.225,0.48,0.451,0.618 C18.75,21.95,18.93,22,19.112,22c0.079,0,0.158-0.01,0.235-0.028l3.888-0.941C23.772,20.9,24.102,20.36,23.972,19.823z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="btidcwgjshcpnccsyspzznvtotkwzmbcvumb">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Education &amp; Training</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="egukpsfuxfqujstupogwvmpgwvfkfffshkes">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Corporate Trainers, Educational Workshops, HR Consultants and Teachers.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-iijnr brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-jqqcb"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-rvghx" data-custom-id="uumanmmqhyfghemwmlvimfpgynscfzhxpspk">
                                             <div class="brz-bg brz-css-wqmvr brz-css-jfoln">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="qkgappthkctryyxojuztnczctfcxboqsaotp">
                                                               <div class="brz-icon__container" data-custom-id="qkgappthkctryyxojuztnczctfcxboqsaotp">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" class="brz-icon-svg" data-type="glyph" data-name="organic-2">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <path d="M11,15v7A13,13,0,0,0,24,9V2A13,13,0,0,0,11,15Z" fill="currentColor"/>
                                                                           <path d="M0,9v4a9,9,0,0,0,9,9V18A9,9,0,0,0,0,9Z" fill="currentColor" data-color="color-2"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="rfgcubogdozycstmipymiapxbfndrcmdjgjo">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Health and Beauty</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="mnqzeomftpdrdbvbkgvvceclpymlkejdlrfi">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">Gym, Beautician, Salon, Dietician, Image Consultants Yoga &amp; Dance Professionals.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-jlfce brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-ytwvo"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-uuabz" data-custom-id="syjprfgxkglekldcvejszvndlwgrnahobkis">
                                             <div class="brz-bg brz-css-wqmvr brz-css-ugyxo">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-image"></div>
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-wrapper-clone brz-css-amamn">
                                                      <div class="brz-wrapper-clone__wrap brz-css-yhslb">
                                                         <div class="brz-d-xs-flex brz-flex-xs-wrap brz-css-ishxb">
                                                            <div class="brz-wrapper-clone__item brz-css-grmwo" id="valuaqmaciatbihisirqbbdubtwoerbjtrfw">
                                                               <div class="brz-icon__container" data-custom-id="valuaqmaciatbihisirqbbdubtwoerbjtrfw">
                                                                  <span class="brz-span brz-icon css-wno9xn">
                                                                     <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="l-system-update">
                                                                        <g class="nc-icon-wrapper" fill="currentColor">
                                                                           <polygon data-color="color-2" fill="currentColor" points="22,17.586 20,19.586 20,13 18,13 18,19.586 16,17.586 14.586,19 19,23.414 23.414,19 "/>
                                                                           <path fill="currentColor" d="M4,4h16v6h2V4c0-1.103-0.897-2-2-2H4C2.897,2,2,2.897,2,4v11h2V4z"/>
                                                                           <path fill="currentColor" d="M0,18c0,2.206,1.794,4,4,4h9v-5H0V18z"/>
                                                                        </g>
                                                                     </svg>
                                                                  </span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="nhcjykzzzajztqwswxhzaspjzinkgwofylzg">
                                                            <h4 class="brz-tp-heading4 brz-text-lg-center"><span class="brz-cp-color2">Software &amp; IT</span></h4>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="dpwioimebxrzaieppdxmsmrhlyqezlxwkylm">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Web Designers, Digital and Social Media Marketers who call / meet business people.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-jgvkd brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-mtriz"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="mndstfmuqbztxftxjjtuckuadofjumuifpoa" id="mndstfmuqbztxftxjjtuckuadofjumuifpoa" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="rmkqrksssxrufomsjipabirtnfmzzigtlodq">
                  <div class="brz-bg brz-css-ldgql brz-css-dnrwz">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-brwvx">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="tcuqxibrapfgyrsayxgihtznpihzsmsfkqyg">
                                       <h1 class="brz-tp-heading1 brz-text-lg-center"><span class="brz-cp-color2">What People Say About Our Digital Visiting Card!!</span></h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-css-yejiw brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco brz-css-ulaqu">
                                    <div class="brz-rich-text brz-css-jfqjt" data-custom-id="odrrdoglbdgmgqohudrbwkujholwjillnxiw">
                                       <p class="brz-text-lg-center brz-tp-subtitle"><em class="brz-cp-color3"> </em></p>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="fjuwxvehdsgbnfgcdnlnqsxtanqvfztcmgip">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-eanvs" data-custom-id="yhzfqecbjldigdzugmmisejuzrjimaedxzld">
                                             <div class="brz-bg brz-css-wqmvr brz-css-sgavb">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-zaxfy brz-css-yplxm">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-gczlv" data-custom-id="kuwaawckjaunyoeqeremmhninsnwigqczcdf">
                                                               <source srcset="assets/img/4c949a49aa9255cf6d3f740e9ffd59ad.jpg 1x, assets/img/79f75f6ec4fcdd9d77d2f659c08324e1.jpg 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/aadd8566a3ee78487530c719d875eab0.jpg 1x, assets/img/e1546bf50a2c3ff0d83202680dc4ca9c.jpg 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/4c949a49aa9255cf6d3f740e9ffd59ad.jpg 1x, assets/img/79f75f6ec4fcdd9d77d2f659c08324e1.jpg 2x" src="assets/img/4c949a49aa9255cf6d3f740e9ffd59ad.jpg" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="nrtrelraymkjmeznogekuqnywhawwgbywdhx">
                                                            <h5 class="brz-text-lg-center brz-tp-heading5"><span class="brz-cp-color2">Dharani Dharan</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="dewqyajnvlixaoqaxejkorisdhlvzuduoeqz">
                                                            <p class="brz-tp-paragraph brz-text-lg-center"><span class="brz-cp-color7">It is a front-end DV Card builder where what you see is what you get. We can design it so you can be in complete control of your website. Just click &amp; modify.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-rvvuf" data-custom-id="povvsdybctdpjrriszalttyxxzaecsbsdqxb">
                                             <div class="brz-bg brz-css-wqmvr brz-css-deasv">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-weuim brz-css-amzjc">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-bmfrp" data-custom-id="upyjdogfbpkbinlxlfyzlyxlngqevpfggjeu">
                                                               <source srcset="assets/img/7cabde1afc2959319d7f05bfcf6e91ed.jpg 1x, assets/img/b500c3e1e468bff8596f66ccb689758e.jpg 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/abdc4b118d5c337c167419392d33bc67.jpg 1x, assets/img/6967d5837ccc57fdcafcdfffd75067ce.jpg 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/7cabde1afc2959319d7f05bfcf6e91ed.jpg 1x, assets/img/b500c3e1e468bff8596f66ccb689758e.jpg 2x" src="assets/img/7cabde1afc2959319d7f05bfcf6e91ed.jpg" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="dtwwfdtjwuemxcjqfedjirroxkuvcijivjrg">
                                                            <h5 class="brz-tp-heading5 brz-text-lg-center"><span class="brz-cp-color2">Aravindh Babu</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="zesityrduelhhmuvmepgmrorccwkkjiyqajl">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Select up-to-date designs without writing a single line of code. Create clean, minimalistic, beautifully crafted Digital Visiting Card perfectly fit for destops, tablets and mobiles.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-vegal" data-custom-id="eczrmyrgjuomeobylvlhjdhjimgrjkykhscv">
                                             <div class="brz-bg brz-css-wqmvr brz-css-hkawu">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-mnaso brz-css-kuhkd">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-rxcks" data-custom-id="vkzofhgrsuhmfsgmzlclwnskxcmazubuqdei">
                                                               <source srcset="assets/img/02f0f8dc4c4a2fd9d99e48df1d5b234c.jpg 1x, assets/img/b1cf06731ecf242b80869f82c1f3eac1.jpg 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/292df2ba0cd92fbdd2dad0bf2a31652e.jpg 1x, assets/img/19fde4d5c90249dd4b9f98403316721d.jpg 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/a01c0bef907117cfc393a499a1f9c95b.jpg 1x, assets/img/a37cd7c81487ebbc4d13c807329e8686.jpg 2x" src="assets/img/02f0f8dc4c4a2fd9d99e48df1d5b234c.jpg" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="ptglnobwnylgvtighbemavkazeizqoxkuiqf">
                                                            <h5 class="brz-tp-heading5 brz-text-lg-center"><span class="brz-cp-color2">Shiva Kiruthika</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="yfclegeqrsltlzeeotrwuykzzzdveqmwokrx">
                                                            <p class="brz-text-lg-center brz-tp-paragraph"><span class="brz-cp-color7">Every text, image, icon, Details can be edited or replaced simply by selecting it and applying the customisation options this platform provides.&#xA0;</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="lpkmahaiuirryhlvbznesgusriisabbgdfiz" id="lpkmahaiuirryhlvbznesgusriisabbgdfiz" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="thyypowvefvnqjpvqjbneqmeoxxfjvsieodd">
                  <div class="brz-bg brz-css-ldgql brz-css-rtaqp">
                     <div class="brz-bg-media">
                        <div class="brz-bg-image"></div>
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="fbeyaradhxijljyehoptcsdtqverrqqrrwyd">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-vqpsi" data-custom-id="hhyoidbaxlfoekvgpocaatlmyxalbjvhmbtt">
                                             <div class="brz-bg brz-css-wqmvr brz-css-wfrul">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-vagpb">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="mnhbslvkeyfzhotnygitokqmwznquzwxxagl">
                                                            <h5 class="brz-fs-xs-im-27 brz-fs-sm-im-27 brz-fs-lg-30 brz-fw-xs-im-700 brz-fw-sm-im-700 brz-fw-lg-700 brz-ft-google brz-ff-overpass brz-ls-xs-im-0 brz-ls-sm-im-0 brz-ls-lg-0 brz-lh-xs-im-1_8 brz-lh-sm-im-1_7 brz-lh-lg-1_6 brz-text-lg-center"><u style="color: rgb(255, 255, 255);">FAQs related to Digital Visiting Card (Mini-Website)</u></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="wvkuenqxkkfibeibwujnvlnzfinxygtgatut">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-scxos" data-custom-id="dzfnjjpdhpibpnvywzizwsqouqnoondjviaz">
                                             <div class="brz-bg brz-css-wqmvr brz-css-oxtgf">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-jexkv">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="wvydwxjphcngikwrpfldpmixkicwhplfxxww">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: What is  e business card&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="kxpvrmawehkxdadebeyjzqoyogzeldktuapr">
                                                            <p class="brz-tp-paragraph brz-text-lg-justify"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F; It is the brief description of yourself or your company with all the relevant details required in the form of text, audio and video.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="pdqninzuphwmdmvtrraugauihajxevejmxvl">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="qcibbkbgutghckbpljpaeqrtqfuhpwfkuyez">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-fvdsv" data-custom-id="yyditcejfstxxobjfbrndcusbainfngmruxz">
                                             <div class="brz-bg brz-css-wqmvr brz-css-iyszu">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-yhupl">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="qkgznxpofsnpzjdztyhjzuqjkkstlpigleyw">
                                                            <h5 class="brz-tp-heading5 brz-text-lg-justify"><span style="color: rgb(255, 255, 255);">Q: What contents can I put in DVcard&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="bzrpowrwnsfjtpsklcfrtcvyauahtwxzwnjl">
                                                            <p class="brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;It is like your own website. You can put your details like (name, number, whatsapp number, email id, google location of ofc/shop) ,address, product/service details(like name ,price, description, image), images, videos, payment details &amp; Bank Details, QR Codes(Phonepe, GPay, Paytm),Customer can even save your number in his phone book at one click etc.,</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="hndvqdwvwdekuzamyvdykfqlqbnzvgysxvmx">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="xcrmgcmnojgtnrqkcyyxauutwmqqcaortbbn">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-phzwl" data-custom-id="hhlcvjhxscpwphsxcqdfchgtxizwzvkbhozf">
                                             <div class="brz-bg brz-css-wqmvr brz-css-hmfsc">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-lyhtv">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="caovlblwwerclkpdmdezrungxzpqlnpsadja">
                                                            <h5 class="brz-tp-heading5 brz-text-lg-justify"><span style="color: rgb(255, 255, 255);">Q: How is it different from website&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="fvzeejpywpixkdmyvvmkzhdlojtkqunwiaus">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;Website needs different hosting and servers. Ecards is domain free. Moreover you can change designs and content unlimited times.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="jizysdceuybdeitsejxiwtyxgotacxgofyyr">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="fmhligtaiewvppxzhusrcktpngdepnhxyixr">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-agond" data-custom-id="liutgqovyfpdwzbxgxbrxamkvydxwdxqvgje">
                                             <div class="brz-bg brz-css-wqmvr brz-css-iulqc">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-meznk">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="tbjpxvwmgyztwucrfetsyhzmzipvuofdzsot">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: How can I share this&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="wqmxrryuzxarntjyoplgktujeakbyjthmyig">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;You can share it via a link. This link can be sent from watsapp, email, sms etc....</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="bvdnwemnclstqdohjcxyabhtldioobofgmyn">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="glpfrsyrhtdeqnxuwanbdclujufwqmarwmbp">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-yzayo" data-custom-id="fxyigdpjblschvokpsuvfcjmaaivzvvvbfvd">
                                             <div class="brz-bg brz-css-wqmvr brz-css-gxdrw">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-kqrqw">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="vguuxxnwxfcrqsyfmbxjjaldasutmyuhwnst">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: Can I edit my DVcard&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="bvwhyopowjaolowpgkcabcrrhdjusxzoithg">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;Yes. You can edit your Ecard infinite times. You can also change the colour and format whenever you want.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="bwywejodjuwkjcoqzlwkjaccbqtqjpubhsfy">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="zcccbjdugjafqdttriznmlsfjwfuhfoyehdh">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-jsoov" data-custom-id="yzcrvtgqdwmhajyqgpmjjyktzutjjfsmncfs">
                                             <div class="brz-bg brz-css-wqmvr brz-css-esdbo">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-dazjs">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="wyuerqdekvwxdyeqpevmskwozjbpkpuoveks">
                                                            <h5 class="brz-tp-heading5 brz-text-lg-justify"><span style="color: rgb(255, 255, 255);">Q: Are there any options for customers to get directly connected with me&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="wisvlywhswdpzrwrzeotwfnkuhwdyvebhnad">
                                                            <p class="brz-tp-paragraph brz-text-lg-justify"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;Yes. Recipient can directly connect you via watsApp and call on a single click only. </span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="dachzichvrzhgpbortxwwuwutbjpjjfmkxkb">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="aeztzclvgwalinkrcvpeyvwhuthcynfztezn">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-fjxoz" data-custom-id="iqbkkclgolndfxgigdojbozpjhydvlcbyuro">
                                             <div class="brz-bg brz-css-wqmvr brz-css-fhbfd">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-dmdtx">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="sdmvuhoitpdajfhubktdavrjgqqfeckxpqfm">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: Do I need to save the card in our phone&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="xqfaatvnqywnmopjghgyznjdlkhfofghkcpp">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;No. Only link needs to be saved. Hence, it will not occupy any space in your phone also.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="ufdxelfjmhyhlhebojswvlcpkkrtrmalligc">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="mocuhezhimyymagwyniwjqhqoyfiyasupnkp">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-qkdwi" data-custom-id="bclbhplfaivjyiltwftgiprcuvhwcavmvqgt">
                                             <div class="brz-bg brz-css-wqmvr brz-css-nhwqj">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-stocp">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="uirhnizuipyxddgceayvgwaaiykvxeaoypci">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: Can I delete any non used products&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="mgwxwiqqjxplojpuhqkggdecnltijkpeqfky">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;Yes You can do that</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-css-wfugs brz-wrapper">
                                 <div class="brz-d-xs-flex brz-css-gxzco">
                                    <div class="brz-line brz-css-pkzjz" data-custom-id="dmfuyuwqfxfkbognadxdvjhgcggijmsjocah">
                                       <hr class="brz-hr">
                                    </div>
                                 </div>
                              </div>
                              <div class="brz-row__container brz-css-alnld" data-custom-id="hjrjitchwwzhrjlufedeuttkxsaedyfbtkwl">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-knazq" data-custom-id="uqxspnjnqgfyxbruakhuttctgrocjsqimzal">
                                             <div class="brz-bg brz-css-wqmvr brz-css-gwrbx">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-tzeps">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="omanlanghiqeyqkqzxdpkekzzbggpilbsriy">
                                                            <h5 class="brz-text-lg-justify brz-tp-heading5"><span style="color: rgb(255, 255, 255);">Q: Can I have card in Hindi/marathi&#x2753;</span></h5>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="gxgnszqafzmtyhesnifkjmuymbgsvryzqced">
                                                            <p class="brz-text-lg-justify brz-tp-paragraph"><span style="color: rgb(255, 255, 255);">&#x1F58A;&#xFE0F;Yes.. You can add your Content in Hindi or Marathi. It will B visible accordingly.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="yfoonswfccjrfvtikvlmdndtxzhovxgmkzxo" id="yfoonswfccjrfvtikvlmdndtxzhovxgmkzxo" class="brz-section brz-css-zbjnw">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="fxiynqphswkarjuyczwitjgdcuqltktwbvfd">
                  <div class="brz-bg brz-css-ldgql brz-css-zovkr">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="lfclnrdwsxwfyqacxwrjgoqebbfhsemyawza">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv" data-custom-id="rixrgomtsxgcanctsdexulohdusqajprnaot">
                                             <div class="brz-bg brz-css-wqmvr brz-css-nopyk">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="qbfazcgadkyoojcpxghrxrochsbpplwclpqg">
                                                            <h3 class="brz-text-lg-left brz-tp-heading3"><span class="brz-cp-color2">Contact Info</span></h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="nabzakbycvrrdoiqpnpzkpkpiqbmjareosih">
                                                            <p class="brz-tp-paragraph brz-mb-lg-10 brz-text-lg-left"><span class="brz-cp-color7" style="background-color: transparent;">Build clean, minimalistic, beautifully crafted Digital Visiting Card perfectly fit for any device.&#xA0;Just click, modify watch results.</span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-eikoe" data-custom-id="ftxeaxedecsclthgseecuuujozvdcmcchlhj">
                                                            <div class="brz-icon__container" data-custom-id="ospkolulgxkjfmllyeiafydbveihsegesivw">
                                                               <span class="brz-span brz-icon css-a0g0ha">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="pin-add">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M12,0C7.576,0,3,3.366,3,9c0,5.289,7.951,13.363,8.29,13.705C11.478,22.894,11.733,23,12,23 s0.522-0.106,0.71-0.295C13.049,22.363,21,14.289,21,9C21,3.366,16.424,0,12,0z M16,10h-3v3h-2v-3H8V8h3V5h2v3h3V10z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="kmqmnwwbsbaowrwpdvxqpprwqhxcqauhxrgb">
                                                                  <h6 class="brz-tp-heading6"><span class="brz-cp-color3">71,Valayapettai Agraharam,Kumbakonam</span></h6>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-kyngb" data-custom-id="fdsyptoklzekqqkjkyogjsljhifnxipeplbl">
                                                            <div class="brz-icon__container" data-custom-id="hqseuorggxahulcnocymyoegxpmhyobekmqs">
                                                               <span class="brz-span brz-icon css-a0g0ha">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="mobile-button">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path fill="currentColor" d="M18,0H6C4.346,0,3,1.346,3,3v18c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3V3C21,1.346,19.654,0,18,0z M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M19,17c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h12c0.552,0,1,0.448,1,1V17z"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="bxjfhfitrexlfakmhaypkvwsvznzwfroqwit">
                                                                  <h6 class="brz-mt-lg-5 brz-tp-heading6"><span class="brz-cp-color3">+91 883808-2531</span></h6>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla brz-css-hwmez" data-custom-id="myyomfgparhpxrxxlaqbbzitszsimssnncjv">
                                                            <div class="brz-icon__container" data-custom-id="tjkqmnrsezwabmewqxlxkqkkbigzuwbvbmdr">
                                                               <span class="brz-span brz-icon css-a0g0ha">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="glyph" data-name="at-sign">
                                                                     <g class="nc-icon-wrapper" fill="currentColor">
                                                                        <path d="M24,10.7a10.687,10.687,0,0,1-.676,3.868c-.84,2.176-2.461,3.75-4.777,3.75a3.314,3.314,0,0,1-3.131-1.894,6.1,6.1,0,0,1-4.276,1.894,5.412,5.412,0,0,1-4.1-1.563c-2.009-2.1-2.177-6.724.47-9.269,2.152-2.069,4.968-2.124,7.929-1.652a15.284,15.284,0,0,1,2.506.58l-.338,7.178q0,2.04,1.117,2.04.94,0,1.5-1.373a9.663,9.663,0,0,0,.559-3.588A8.616,8.616,0,0,0,19.8,6.5a7.4,7.4,0,0,0-6.849-3.721A10.437,10.437,0,0,0,7.789,3.993C4.631,5.751,3.263,9.139,3.263,12.815a8.4,8.4,0,0,0,2.168,6.215c3.156,3.155,9.2,2.348,13.381.815v2.819A17.693,17.693,0,0,1,11.831,24q-5.585,0-8.708-2.936T0,12.9A12.493,12.493,0,0,1,6.136,1.681,13.453,13.453,0,0,1,12.919,0c4,0,7.726,1.6,9.7,5.079A11.208,11.208,0,0,1,24,10.7ZM8.951,12.536q0,3.1,2.528,3.1c2.146,0,2.7-1.818,2.851-3.964l.191-3.243a8.009,8.009,0,0,0-1.69-.163C10.262,8.264,8.951,10.018,8.951,12.536Z" fill="currentColor"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="jxrliatgtylwcvvloqknvlmguamugeqmlwhz">
                                                                  <h6 class="brz-tp-heading6 brz-mt-lg-5"><span class="brz-cp-color3">mail.site101@gmail.com</span></h6>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv" data-custom-id="bpyvnzyaknvwwahltmtqtmmwgheqzaxhkyhc">
                                             <div class="brz-bg brz-css-wqmvr brz-css-huioj">
                                                <div class="brz-bg-media">
                                                   <div class="brz-bg-color"></div>
                                                </div>
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-css-qzysq brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-mxbow"></div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-hqsdm">
                                                         <div class="brz-map brz-css-jukyd brz-css-bqcjp" data-custom-id="qsiycppuxxbtnpvpduvpojiroidcozieeert">
                                                            <div class="brz-map-content"><iframe class="brz-iframe" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCcywKcxXeMZiMwLDcLgyEnNglcLOyB_qw&amp;q=71,valayapettai Agraharam,kumbakonam&amp;zoom=15"></iframe></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="brz-css-wfugs brz-css-lifys brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco brz-css-adtby">
                                                         <div class="brz-spacer brz-css-jyjfy brz-css-hhqud"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="elvahfhgljorucvhuddwvhfhvgqkvzjeaxyz" id="elvahfhgljorucvhuddwvhfhvgqkvzjeaxyz" class="brz-section brz-css-zbjnw brz-css-zrtqi">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="xjxgrnsmwshdbwaxmaytrlctavxyjazzlmls">
                  <div class="brz-bg brz-css-ldgql brz-css-bvbht">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="hjrmpyqdlefqzspoubkfnwsjxsowuaecqjlg">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq brz-css-ntdxp">
                                          <div class="brz-columns brz-css-aghhv brz-css-rorql" data-custom-id="miujtgxcfeccybskasvdayqmhblteryaupnl">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="ljrfatliejegvulfcdhhkbzetvaucganstmc">
                                                            <div class="brz-icon__container" data-custom-id="xmkyxxokczzhebnxoqdqqyztcvmmyqudlbde">
                                                               <span class="brz-span brz-icon css-83kws0">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="phone-call">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <path fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M17,15l-3,3l-8-8l3-3L4,2 L1,5c0,9.941,8.059,18,18,18l3-3L17,15z" stroke-linejoin="miter"/>
                                                                        <path data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M14,1 c4.971,0,9,4.029,9,9" stroke-linejoin="miter"/>
                                                                        <path data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M14,5 c2.761,0,5,2.239,5,5" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="zsekscepboajsadzmrvofebqbskusuxtfknl">
                                                                  <h4 class="brz-tp-heading4"><span class="brz-cp-color2">Have any questions?</span></h4>
                                                                  <p class="brz-tp-subtitle"><em class="brz-cp-color3">+91 883808-2531</em></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-igkrk" data-custom-id="wnxlvxvhtblfgsrlucmvgvqkpdvnsjtmjofz">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="bjaneuuqvvaebwfbuymxucbnmmtjdgyvajbl">
                                                            <div class="brz-icon__container" data-custom-id="bfhngcpdatecadgaurbwvxzlwpprrraclslt">
                                                               <span class="brz-span brz-icon css-83kws0">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="time-alarm">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 12,10 12,14 16,14 " stroke-linejoin="miter"/>
                                                                        <line data-cap="butt" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" x1="3" y1="23" x2="6.3" y2="19.7" stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <line data-cap="butt" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-miterlimit="10" x1="21" y1="23" x2="17.7" y2="19.7" stroke-linejoin="miter" stroke-linecap="butt"/>
                                                                        <circle fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" cx="12" cy="14" r="8" stroke-linejoin="miter"/>
                                                                        <path fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M9.3,2.3C8.5,1.5,7.3,1,6,1 C3.2,1,1,3.2,1,6c0,0.8,0.2,1.5,0.5,2.2C3.2,5.2,6,3.1,9.3,2.3z" stroke-linejoin="miter"/>
                                                                        <path fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" d="M14.7,2.3 C15.5,1.5,16.7,1,18,1c2.8,0,5,2.2,5,5c0,0.8-0.2,1.5-0.5,2.2C20.8,5.2,18,3.1,14.7,2.3z" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="csprixzuocphfbqfammhxrucbhfmbvcgvqya">
                                                                  <h4 class="brz-tp-heading4"><span class="brz-cp-color2">Open Mon - Fri</span></h4>
                                                                  <p class="brz-tp-subtitle"><span class="brz-cp-color3">08:00 - 17:00</span></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv brz-css-zajnu" data-custom-id="iegyuscacyrznrpsvmhewuniajjpkyhgpjzv">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-icon-text brz-css-prwla" data-custom-id="etrnanucywgvmmkoqzwgfhdnefpzheucmsnw">
                                                            <div class="brz-icon__container" data-custom-id="ffcexzdarlyesmbdthtoqpgysaipqoofqtse">
                                                               <span class="brz-span brz-icon css-83kws0">
                                                                  <svg id="nc_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 24 24" xml:space="preserve" class="brz-icon-svg" data-type="outline" data-name="email-85">
                                                                     <g transform="translate(0, 0)" class="nc-icon-wrapper" fill="none">
                                                                        <polyline data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" points=" 19,7 12,14 5,7 " stroke-linejoin="miter"/>
                                                                        <rect x="1" y="3" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" width="22" height="18" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="7" y1="15" x2="5" y2="17" stroke-linejoin="miter"/>
                                                                        <line data-color="color-2" fill="none" stroke="currentColor" vector-effect="non-scaling-stroke" stroke-linecap="square" stroke-miterlimit="10" x1="17" y1="15" x2="19" y2="17" stroke-linejoin="miter"/>
                                                                     </g>
                                                                  </svg>
                                                               </span>
                                                            </div>
                                                            <div class="brz-text-btn">
                                                               <div class="brz-rich-text brz-css-jfqjt" data-custom-id="eeylyvkxhfgljysfazmwujifnlmsjiejhvsh">
                                                                  <h4 class="brz-tp-heading4"><span class="brz-cp-color2">Need some help?</span></h4>
                                                                  <p class="brz-tp-subtitle"><em class="brz-cp-color3">mail.site101@gmail.com</em></p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section data-uid="vukwglugxeqlbajpwvvdfczhcldxzfgrldsq" id="vukwglugxeqlbajpwvvdfczhcldxzfgrldsq" class="brz-section brz-css-zbjnw brz-css-blnwq">
            <div class="brz-section__items">
               <div class="brz-section__content brz-section--boxed" data-custom-id="qluucxjykmgfcypuulqyvbdkdpwewnyrshbd">
                  <div class="brz-bg brz-css-ldgql brz-css-czmjz">
                     <div class="brz-bg-media">
                        <div class="brz-bg-color"></div>
                     </div>
                     <div class="brz-bg-content">
                        <div class="brz-container__wrap brz-css-itweo">
                           <div class="brz-container brz-css-irtvk">
                              <div class="brz-row__container brz-css-alnld" data-custom-id="jtihislzotfubgjnkgcaiayhrxmzqnngmshb">
                                 <div class="brz-bg brz-flex-xs-wrap brz-row__bg brz-css-veruz">
                                    <div class="brz-bg-content">
                                       <div class="brz-row brz-css-ippaq">
                                          <div class="brz-columns brz-css-aghhv" data-custom-id="rwjbztrfgnlmyrwglhbiakxswlsyjskyvoxf">
                                             <div class="brz-bg brz-css-wqmvr">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-image brz-css-crjba brz-css-ueupi">
                                                            <picture class="brz-picture brz-d-block brz-p-relative brz-css-fqnmt" data-custom-id="ggczvqcpuhghwyykqfjqdxegeqggiboyevxb">
                                                               <source srcset="assets/img/3926bf8888a19d47ac30d5b9a7401aa8.png 1x, assets/img/0186f247eb1fa78fbe6c1496c81773c8.png 2x" media="(min-width: 992px)">
                                                               <source srcset="assets/img/1cbbac551e2b99266e78d91572f330ba.png 1x, assets/img/952c4b061c05f7c5ac2fcc8cf5e2a80c.png 2x" media="(min-width: 768px)">
                                                               <img class="brz-img brz-p-absolute" srcset="assets/img/7cbf589b09e2e3d2993eb10a680d51d9.png 1x, assets/img/c5cb2089e87c7d0ac2beff85bbcc083c.png 2x" src="assets/img/3926bf8888a19d47ac30d5b9a7401aa8.png" alt draggable="false" loading="lazy">
                                                            </picture>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="brz-columns brz-css-aghhv" data-custom-id="dhqummdbxhelbxoekkxybpsatbuwipueylnk">
                                             <div class="brz-bg brz-css-wqmvr brz-css-bafle">
                                                <div class="brz-bg-content">
                                                   <div class="brz-css-wfugs brz-wrapper">
                                                      <div class="brz-d-xs-flex brz-css-gxzco">
                                                         <div class="brz-rich-text brz-css-jfqjt" data-custom-id="mpqidlncbhjpxcgdgjhprwdafhdlzbdplxhd">
                                                            <p class="brz-text-lg-center brz-lh-lg-1_9 brz-lh-sm-im-1_6 brz-lh-xs-im-1_6 brz-ls-lg-0 brz-ls-sm-im-0 brz-ls-xs-im-0 brz-ff-overpass brz-ft-google brz-fw-lg-400 brz-fw-sm-im-400 brz-fw-xs-im-400 brz-fs-lg-29 brz-fs-sm-im-28 brz-fs-xs-im-28"><strong style="color: rgb(255, 255, 255);">www.site101.in @2020</strong></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!--<script class="brz-script brz-script-polyfill" src="assets/8c623a2e76798c112f393284d6631137.js"></script><script class="brz-script brz-script-preview" src="assets/34e19bcfc0bf6fa5ada252dff282db62.js"></script><script class="brz-script brz-script-preview-pro" src="assets/a37228a440b367a100d766a575a0699c.js"></script><script class="brz-script brz-script-emit">     jQuery(document).ready(function() {         window.Brizy.emit("init.dom", jQuery(document.body));     }); </script>-->
      <!-- Subscribe Modal Area Start Here -->
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
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Choose Design</h2>
                            <div class="fxt-contact-form col-md-12">
                                
                                <!--<div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1">-->
                                <!--    <img src="assets/assets_new/img/st1.png" width="220">-->
                                <!--    <a href="https://verifiedbiz.online/form.php?design=1" style="width: 80%; height: 30px; padding: 5px 0px; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</a>-->
                                <!--</div>-->
                                <!--<div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1">-->
                                <!--    <img src="assets/assets_new/img/st1.png" width="220">-->
                                <!--    <a href="https://verifiedbiz.online/form.php?design=2" style="width: 80%; height: 30px; padding: 5px 0px; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</a>-->
                                <!--</div>-->
                                <!--<div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1">-->
                                <!--    <img src="assets/assets_new/img/st1.png" width="220">-->
                                <!--    <a href="https://verifiedbiz.online/form.php?design=3"style="width: 80%; height: 30px; padding: 5px 0px; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</a>-->
                                <!--</div>-->
                                
                                <?php 
                                        
                                        for ($i = 1; $i <= 11; $i++){
                                        
                                        echo'
                                        <div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1">
                                            <img src="assets/assets_new/img/st'.$i.'.png" width="220">
                                            <a href="https://verifiedbiz.online/form.php?design='.$i.'" style="width: 80%; height: 30px; padding: 5px 0px; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</a>
                                        </div>';
                                        }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
                    <div class="modal-body">
                        <div class="fxt-contact-wrap">
                            <h2 class="item-title">Reseller Login</h2>
                            <div class="fxt-contact-form col-md-12">
                                <form action="partner/verify-user" method="post">
                                    
                                    <div class="input-group">
                                        <label class="label"> Partner ID / Email ID </label>
                                        <div class="input-group">
                                            <input type="text" name="username" id="email_login" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"> Password </label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password_login" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label"><a href="javascript:;" id="for_part">Forgot password?</a></label>
                                    </div>
                                    
                                    <input type="submit" name="login" class="btn-last">
                                </form>
                            </div>
                        </div>
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
        
        
        <!-- Contact Form Modal Area End Here -->
    </div>

    
    
    
    
    <script src="assets/assets_new/js/jquery-3.5.0.min.js"></script>   
    
    <script src="assets/assets_new/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    
    <script src="assets/assets_new/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    
    <script src="assets/assets_new/js/imagesloaded.pkgd.min.js"></script>  
    <!-- Vegas js -->
    
    <script src="assets/assets_new/js/vegas.min.js"></script>
    <!-- Validator js -->
    
    <script src="assets/assets_new/js/main.js"></script>
    
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
        })
        
        
    </script>
      
     <script>
      
        $("button").click(function() {
            $('html,body').animate({
                scrollTop: $(".second").offset().top},
                'slow');
        });
    </script>
    
   </body>
</html>