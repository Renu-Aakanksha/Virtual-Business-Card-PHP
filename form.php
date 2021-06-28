<?php
include('dash/db.php');
include('session.php');

$wurl = $_SESSION['wurl'];
$wcname = $_SESSION['wcname'];
$waemail = $_SESSION['waemail'];
$wemail = $_SESSION['wemail'];
$wphone = $_SESSION['wphone'];
$waddress = $_SESSION['waddress'];

if(isset($_GET['design'])){
    $theme = $_GET['design'];
    
}elseif(isset($_POST['register'])){
    
}else{
    header("location:https://".$wurl);
}

// if(isset($_POST['register'])) {
//     $name = $_POST['name'];
//     $address = $_POST['address'];
//     $cname = $_POST['cname'];
//     $ccat = $_POST['cat'];
//     $tagline = $_POST['tagline'];
//     $mobile = "91".$_POST['mobile'];
//     $wmobile = "91".$_POST['wmobile'];
//     $aadhaar = $_POST['aadhaar'];
//     $email = $_POST['email'];
//     $pass = $_POST['password'];
//     $ref = $_POST['ref'];
//     $password = md5($pass);
//     $datea = date("d/m/Y");
//     $dater = date('d/m/Y', strtotime('+1 years'));
//     $lcpre = "LCKY".rand(1000000000,9999999999);
//     $theme = $_POST['theme'];
    
// 	$design = 1;

// 	function clean($string) {
//       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
//       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
//     }

// 	$cleanstr = clean($cname);
// 	$curll = strtolower($cleanstr);
	
    
//     $owners_data = $con->query("SELECT id FROM `owners` ORDER BY `id` DESC LIMIT 1");
//     if($owners_data->num_rows > 0){
//         $ownfe = $owners_data->fetch_assoc();
//         $ownid = $ownfe['id'];
//         $genid = $ownid+1;
//     }
    
//     $owners_email = $con->query("SELECT id FROM `owners` where email = '$email' LIMIT 1");
//     if($owners_email->num_rows > 0){
//         $dup_email = true;
//     }
    
//     $owners_url = $con->query("SELECT id FROM `owners` where url = '$curll' LIMIT 1");
//     if($owners_url->num_rows > 0){
//         $curll = "card".rand(1,999)."-".$curll."-".rand(1,9999)."yt";
//     }
    
//     //adding data to database
//     if (!($dup_email)){
//         $zeroval = 1;
//         $stmt = $con->prepare("INSERT INTO `owners`(`id`, `name`, `address`, `cname`, `url`, `category`, `tagline`, `mobile`, `whatsapp`, `email`, `password`, `aadhaar`, `status`, `datee`, `ref`, `design`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
//         $stmt->bind_param("issssssiisssisss",$genid,$name,$address,$cname,$curll,$ccat,$tagline,$mobile,$wmobile,$email,$password,$aadhaar,$zeroval,$datea,$ref,$design);
//         $stmt->execute();
//         $stmt->close();
        
        
//         $stmt = $con->prepare("INSERT INTO `renewal`(`datee`, `rdatee`, `cust`, `lkey`) VALUES (?,?,?,?)");
//         $stmt->bind_param("ssis",$datea,$dater,$genid,$lcpre);
//         $stmt->execute();
//         $stmt->close();
        
//         $pid = 'demo'.$theme;
//         $qe = "SELECT layout.hover as hover, layout.theme as theme, layout.links as links FROM `layout` INNER JOIN `owners` ON layout.cust = owners.id where owners.url = '$pid' LIMIT 1";
//         $data = $con->query($qe);
        
//         if($data->num_rows > 0){
//             $rows = $data->fetch_assoc();
            
//             $theme = $rows['theme'];
//             $links = $rows['links'];
//             $hover = $rows['hover'];
            
//             $qe = "INSERT INTO `layout`(`hover`, `cust`, `theme`, `links`, `date`) VALUES ('$hover', '$genid', '$theme', '$links', '$datea')";
//             $data = $con->query($qe);
//         }
        
//                 $rid = 'RE'.time();
//                 $rid2 = base64_encode('FsYe'.$email);
                
//                 $to = $email;
//                 $subject = "Thank you for your registration";
                
//                 $message = "
//                 <html>
//                 <head>
//                 <title>Thank you for your registration</title>
//                 </head>
//                 <body>
//                 <h3>Thank you for your registration</h3>
//                 <h4>Your Login Details :</h4>
//                 <p><strong>User Id / Email :</strong> ".$email."</p>
//                 <p><strong>Password :</strong> ".$pass."</p><br>
//                 <p style='color:#080;font-size:18px;'><a href='https://".$wurl."/dash/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>';
//                 </body>
//                 </html>
//                 ";
                
//                 // Always set content-type when sending HTML email
//                 $headers = "MIME-Version: 1.0" . "\r\n";
//                 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
//                 // More headers
//                 $headers .= 'From: '.$wcname.' <noreply@'.$wurl.'>' . "\r\n";
                
//                 if (mail($to,$subject,$message,$headers)) {
//                      $_SESSION["user"] = $genid;
         
//                     echo "<script>alert('Registration Successful.'); window.location='dash/thanks'</script>";
//                 }
//     }
//     else {
//         echo "<script>alert('Sorry! This email is already registered.'); window.location='form'</script>";
//         die();
//     }
    
    
    
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Digital Business Cards, Websites, Brochures - <?php echo $wurl; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Digital Business Kits are one of the innovative ways to share your personal and business details with your prospect by just using your Mobile Phone.">
<meta name="keywords" content="Digital Business Cards with website, Digital Visiting Card with website, Digital Brochure, Portable Website, Mini Website"

<meta name="msapplication-TileImage" content="https://<?php echo $wurl; ?>/assets/images/mymobiz-title.webp"> 
<meta property="og:image" content="https://<?php echo $wurl; ?>/assets/images/mymobiz-title.webp" />
<meta property="og:title" content="Digital Business Cards, Websites, Brochures - <?php echo $wurl; ?>" />
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<meta property="og:url" content="https://<?php echo $wurl; ?>">
<meta property="og:site_name" content="Digital Business Cards, Websites, Brochures">
<meta property="og:description" content="Digital Business Kits are one of the innovative ways to share your personal and business details with your prospect by just using your Mobile Phone.">
 
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/512x512.png" />
    
   <!-- Vegas CSS -->
    <link rel="stylesheet" href="assets/assets_new/css/vegas.min.css">
    
    <!-- Custom Animation CSS -->
    <link rel="stylesheet" href="assets/assets_new/css/fxt-animation.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/assets_new/css/style.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/assets_new/css/bootstrap.min.css">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Wizard Form CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.css" />
    
    <link rel="stylesheet" href="assets/assets_new/css/main.css" />
    
    <style>
        .modal-backdrop{
            display: none;
        }
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
            margin: 5px;
            text-decoration: none;
            text-align: center;
            text-decoration: none;
            width: 100%;
        }
        .btn-next, .btn-back, .btn-last{
            width: 100%;
            margin: 5px;
            text-align: center;
        }
        .hide {
            display: none;
        }
        .input--style-1{
            max-width: none;
        }
    </style>
    

</head>

<body>
    <div class="page-wrapper" style="padding-top: 10px;">
        <div class="wrapper wrapper--w690">
            <div class="card card-1" style="box-shadow: none;">   
                <div class="card-body">
                        <form class="wizard-container" method="POST" action="pay.php" id="js-wizard-form">

                            <div class="progress" id="js-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="progress-val">25%</span>
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
                                <li>
                                    <a href="#tab4" data-toggle="tab">1</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active text-center" id="tab1">
                                    <label class="label">Design You Selected</label>
                                    <div class="input-group img_design text-Center" data-design="1">
                                        <img style="margin-left:auto; margin-right:auto;" src="../assets/assets_new/img/st<?php echo $theme;?>.png" alt="">
                                    </div>
                                    
                                    <input type="hidden" name="theme" value="<?php echo $theme;?>">
                                    
                                    <div class="btn-next-con">
                                        <a class="btn-next" href="javascript:;">Next</a>
                                        <a class="btn-back" href="/">Change</a>
                                    </div>
                                    
                                </div>
                                
                                <!--<div class="tab-pane" id="tab2">-->
                                
                                <!--    <label class="label">Choose Theme</label>-->
                                <!--    <div class="fxt-contact-form col-md-12">-->
                                        
                                        <?php 
                                        
                                        // for ($i = 1; $i <= 10; $i++){
                                        
                                        // echo'
                                        // <div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1 text-center">
                                        //     <img src="assets/assets_new/img/st1.png" width="220">
                                        //     <a href="javascript:;" data-theme="'.$i.'" class="sel_theme" style="width: 80%; height: 30px; padding: 5px 0px; background: #999; color: #fff; border: none; border-radius: 50px; margin-top: 10px;">Select</a>
                                        // </div>';
                                        // }
                                        ?>
                                        
                                <!--        <input type="hidden" id="hidden-theme" name="theme" value='1'>-->
                                <!--    </div>-->
                                    
                                <!--    <div class="btn-next-con">-->
                                <!--        <a class="btn-back" href="javascript:;">back</a>-->
                                <!--        <a class="btn-next" href="javascript:;">Next</a>-->
                                <!--    </div>-->
                                    
                                <!--</div>-->
                                
                                <div class="tab-pane" id="tab2">
                                    
                                    
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
                                        <label class="label">WhatsApp</label>
                                        <div class="input-group">
                                            <input type="number" name="wmobile" id="wmobile" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Email (*)</label>
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Password (*)</label>
                                        <div class="input-group">
                                            <input name="password" type="password" id="password" class="input--style-1">
                                        </div>
                                    </div>

                                    
                                    <div class="btn-next-con">
                                        <a class="btn-next hide" id="next" href="javascript:;">Next</a>
                                        <a class="fake-btn" id="fake-btn" href="javascript:;">Next</a>
                                        <a class="btn-back" href="javascript:;">back</a>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="tab3">
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
                                    
                                    <div class="input-group">
                                        <label class="label">Business Caption or Tag Line</label>
                                        <div class="input-group">
                                            <input type="text" name="tagline" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">GSTIN:</label>
                                        <div class="input-group">
                                            <input name="aadhaar" type="text" class="input--style-1">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label class="label">Refrence Id</label>
                                        <div class="input-group">
                                            <input type="text" name="ref" class="input--style-1">
                                        </div>
                                    </div>
    
                                    <div class="btn-next-con">
                                        <a class="fake-btn" id="fake-btnn" href="javascript:;">Submit</a>
                                        <button type="submit" id="nextt" class="btn-last hide" value="Submit" name="register">Submit</button>
                                        <a class="btn-back" href="javascript:;">back</a>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="wizard/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="wizard/vendor/jquery-validate/jquery.validate.min.js"></script>
    <script src="wizard/vendor/bootstrap-wizard/bootstrap.min.js"></script>
    <script src="wizard/vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- Main JS-->
    <script src="wizard/js/global.js"></script>

</body>
    
    
    <!-- jQuery -->
    <script src="assets/assets_new/js/jquery-3.5.0.min.js"></script>   
    
    <!-- Popper js -->
    
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
                    val += 25;
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
                    val -= 25;
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
    </script>
    
    <script>
        $(document).ready(function() {
            var name
            var password
            var mobile
            var email
            var emailtemp
            var theme
            
            $(document).on('keyup','#name', function(){
                name = $('#name').val();
                checkval();
            });
            
             $(document).on('keyup','#password', function(){
                password = $('#password').val();
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
                if ( password == null || password.length === 0){
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
                    $( "#fake-btn" ).removeClass( "hide" );
                    $( "#next" ).addClass( "hide" );
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
                if ( bname == null || bname.length === 0){
                    hidesub();
                    return
                }
                if ( nature == null || nature.length === 0){
                    hidesub();
                    return
                }
                if ( address == null || address.length === 0){
                    hidesub();
                    return
                }
                $( "#nextt" ).removeClass( "hide" );
                $( "#fake-btnn" ).addClass( "hide" );
            }
            
            function hidesub(){
                if (!($( "#nextt" ).hasClass( "hide" ))) {
                    $( "#nextt" ).addClass( "hide" );
                    $( "#fake-btnn" ).removeClass( "hide" );
                }
            }
            
            $(document).on('click','.sel_theme', function(){
                $(this).css({'background': '#36c240'});
                ('#hidden-theme').val($(this).data('theme'));
            });
            
        })
        
    </script>

</body>

</html>