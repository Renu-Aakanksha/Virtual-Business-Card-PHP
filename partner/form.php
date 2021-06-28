<?php
include('session.php');
include('../dash/db.php');
// error_reporting(0);

$qe = "SELECT price FROM `admin` LIMIT 1";
$data = $con->query($qe);
$rows = $data->fetch_assoc();
$aprice = $rows['price'];


if(isset($_POST['register'])) {
    
    $usernv = $_SESSION['partner'];
    $usern_ref = $_SESSION['partner_ref'];
    $que = "Select wallet from reseller Where `id`= '$usernv'";
    $data = $con->query($que);
    $row = $data->fetch_assoc();
    $wallet = $row['wallet'];

    if ($wallet >= $aprice){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $cname = $_POST['cname'];
        $ccat = $_POST['cat'];
        $tagline = $_POST['tagline'];
        $mobile = '91'.$_POST['mobile'];
        $wmobile = '91'.$_POST['wmobile'];
        $aadhaar = $_POST['aadhaar'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $ref = $_SESSION['partner_ref'];
        $password = md5($pass);
        $datea = date("d/m/Y");
        $dater = date('d/m/Y', strtotime('+1 years'));
        $lcpre = "LCKY".rand(1000000000,9999999999);
        
    	$design = 1;
    	$theme = $_POST['design'];
    
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
            $ourl = $ownfe['url'];
            $genid = $ownid+1;
        }
        if($email == $oemail){
            echo "<script>alert('Sorry! This email is already registered.'); window.location='form'</script>";
            die();
        }
        
        if ($curll == $ourl){
            $curll = "card".rand(1,999)."-".$curll."-".rand(1,9999)."yt";
        }
        
        //adding data to database
        if($email != $oemail){
            $zeroval = 0;
            $stmt = $con->prepare("INSERT INTO `owners`(`id`, `name`, `address`, `cname`, `url`, `category`, `tagline`, `mobile`, `whatsapp`, `email`, `password`, `aadhaar`, `status`, `datee`, `ref`, `design`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("issssssiisssisss",$genid,$name,$address,$cname,$curll,$ccat,$tagline,$mobile,$wmobile,$email,$password,$aadhaar,$zeroval,$datea,$ref,$design);
            $stmt->execute();
            $stmt->close();
            
            
            $stmt = $con->prepare("INSERT INTO `renewal`(`datee`, `rdatee`, `cust`, `lkey`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssis",$datea,$dater,$genid,$lcpre);
            $stmt->execute();
            $stmt->close();
            
            
            
            $amount = ($wallet - $aprice);
            $flag = 1;
            $removed= $aprice;
            
            $que = "Update `reseller` Set `wallet` = '$amount' Where `partner`= '$usern_ref'";
            $data_insert = $con->query($que);
            
            $que = "INSERT INTO `transactions`(`partner`, `amount`, `date`, `type`, `balance`) VALUES ('$usern_ref', '$removed', '$datea', '$flag', $amount)";
            $data_insert = $con->query($que);
            
            $pid = 'demo'.$theme;
            $qe = "SELECT layout.hover as hover, layout.theme as theme, layout.links as links FROM `layout` INNER JOIN `owners` ON layout.cust = owners.id where owners.url = '$pid' LIMIT 1";
            $data = $con->query($qe);
            
            if($data->num_rows > 0){
                $rows = $data->fetch_assoc();
                
                $theme = $rows['theme'];
                $links = $rows['links'];
                $hover = $rows['hover'];
                
                $qe = "INSERT INTO `layout`(`hover`, `cust`, `theme`, `links`, `date`) VALUES ('$hover', '$genid', '$theme', '$links', '$datea')";
                $data = $con->query($qe);
            }
            
                    $rid = 'RE'.time();
                    $rid2 = base64_encode('FsYe'.$email);
                    
                    $to = $email;
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
                    <p style='color:#080;font-size:18px;'><a href='https://site101.in/dash/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>';
                    </body>
                    </html>
                    ";
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From: ite101 <noreply@site101.in>' . "\r\n";
            
            echo "<script>alert('Registration Successful.'); window.location='form'</script>";
        }
        else {
            echo "<script>alert('Sorry! This email is already registered.'); window.location='form'</script>";
            die();
        }
        
    }else{
        echo "<script>alert('Sorry!, Your Wallet balance is insufficient to make a purchase'); window.location='form'</script>";
        die();
    }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Ecommerce Dashboard Home</title>

    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <link rel="shortcut icon" href="https://www.industrialinfotech.com/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    
    <link rel="stylesheet" href="assets/css/wizard.css" />
    
</head>

<body>
    
    <!--  BEGIN NAVBAR  -->
   	<?php include('header.php');
   	
   	echo "<script>var hideee = false;</script>";    
    
    if ($wallet >= $aprice){
        echo "<script>hideee = true;</script>";
    }
   	?>
   	
   	
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">Card Creation</a></li>
						    </ol>
					</nav>
                
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        
                    <hr class="hide bal_in" style="border: 1px solid;">
                        <p class="hide bal_in" align="justify"><strong>Note :</strong> Your Wallet balance is insufficient to make a purchase</p>
    				<hr class="hide bal_in" style="border: 1px solid;">
    				
    				<?php  for ($i = 1; $i <= 11; $i++){ ?>
    				
                            <div style="padding: 10px 0px; border: 1px solid #d0d0d0; border-radius: 30px; display: inline-block;" class="col-md-3 m-1 text-center">
                                <img src="../assets/assets_new/img/st<?php echo $i;?>.png" width="220">
                                <button style="width: 80%; background: #0784ef; color: #fff; border: none; border-radius: 50px; margin-top: 10px;" class="hide design_sel" onclick="myForm('<?php echo $i;?>')">Select</button>
                            </div>

                    <?php } ?>
                    </div>
            
                
            </div>
            <?php include('footer.php');?>
        </div>
        <!--  END CONTENT PART  -->
        
        </div>

    </div>



<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="design" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msg-title">Credit Reseller Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
                        <form class="" method="POST" id="js-wizard-form">
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
                                <div class="tab-pane active text-center" id="tab1">
                                    <label class="label">Design You Selected</label>
                                    <div class="input-group img_design text-Center" data-design="1">
                                        <img style="margin-left:auto; margin-right:auto;" id="my_image" src="../assets/assets_new/img/st1.png" alt="">
                                    </div>
                                    
                                    <input type="hidden" name="design" id="hidden-design">
                                    
                                    <div class="btn-next-con">
                                        <a class="btn-back" href="form">Change</a>
                                        <a class="btn-next" href="javascript:;">Next</a>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="tab2">
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Contact Person (*)</label>
                                                <div class="input-group">
                                                    <input type="text" name="name" id="name" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label"> Mobile (*)</label>
                                                <div class="input-group">
                                                    <input type="number" name="mobile" id="mobile" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">WhatsApp (*)</label>
                                                <div class="input-group">
                                                    <input type="number" name="wmobile" id="wmobile" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Email (*)</label>
                                                <div class="input-group">
                                                    <input type="email" name="email" id="email" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Password (*)</label>
                                                <div class="input-group">
                                                    <input name="password" type="password" id="password" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                        </div>    
                                        
                                    </div>
                                
                                    
                                    <div class="btn-next-con">
                                        <a class="btn-back" href="javascript:;">back</a>
                                        <a class="btn-next hide" id="next" href="javascript:;">Next</a>
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane" id="tab3">
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Business Name (*)</label>
                                                <div class="input-group">
                                                    <input type="text" name="cname" id="bname" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label"> Office Address (*)</label>
                                                <div class="input-group">
                                                    <input type="text" name="address" id="address" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Nature of Business (*)</label>
                                                <div class="input-group">
                                                    <input type="text" name="cat" id="nature" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">Business Tag Line</label>
                                                <div class="input-group">
                                                    <input type="text" name="tagline" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="label">GSTIN:</label>
                                                <div class="input-group">
                                                    <input name="aadhaar" type="text" class="input--style-1">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                        </div>    
                                        
                                    </div>
    
                                    <div class="btn-next-con">
                                        <a class="btn-back" href="javascript:;">back</a>
                                        <input type="submit" id="submit_btn" class="btn-last hide" value="Submit" name="register" />
                                    </div>
                                </div>
                            </div>
                        </form>
        
      </div>
    </div>
  </div>
</div>

</body>
    
    <script src="../assets/assets_new/js/jquery-3.5.0.min.js"></script>   
    <script src="../assets/assets_new/js/jquery.bootstrap.wizard.min.js"></script>
    <script src="../assets/assets_new/js/wizard.js"></script>
    
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
             App.init();
            var name
            var password
            var mobile
            var wmobile
            var email
            var emailtemp
            
            if (hideee) {
                $( ".design_sel" ).removeClass( "hide" );
            }else{
                $( ".bal_in" ).removeClass( "hide" );
            }
            
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
             $(document).on('keyup','#wmobile', function(){
                wmobile = $('#wmobile').val();
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
                if ( mobile == null || mobile.length === 0 || mobile.length < 10 || mobile.length > 12){
                    hide();
                    return
                }
                if ( wmobile == null || wmobile.length === 0 || wmobile.length < 10 || wmobile.length > 12){
                    hide();
                    return
                }
                if ( email == null || email.length === 0){
                    hide();
                    return
                }
                $( "#next" ).removeClass( "hide" );
            }
            
            function hide(){
                if (!($( "#next" ).hasClass( "hide" ))) {
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
                $( "#submit_btn" ).removeClass( "hide" );
            }
            
            function hidesub(){
                if (!($( "#submit_btn" ).hasClass( "hide" ))) {
                    $( "#submit_btn" ).addClass( "hide" );
                }
            }
            
        });
        
            function myForm(id) {
    		    $('#hidden-design').val(id);
    		    $('#form').modal('show');
    		    $("#my_image").attr("src","../assets/assets_new/img/st"+id+".png");
		    }
        
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/widgets/modules-widgets.js"></script>
    
    
    <script src="plugins/table/datatable/datatables.js"></script>
  <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    
</body>

</html>