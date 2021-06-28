<?php
include('session.php');
include('db.php');

$usernv = $_SESSION['user'];
$qusv = "SELECT * FROM `owners` WHERE `id`='$usernv'";
$datasv = $con->query($qusv);
if ($datasv->num_rows > 0) {
	$rowsdv = $datasv->fetch_assoc();
	$idv = $rowsdv['id'];

}

$needabout = true;
$needprofile = true;
$needimage = true;
$needvideo = true;
$needpayment = true;
$needproduct = true;

$qusvv = "SELECT * FROM `iabout` WHERE `cust`='$usernv' limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needabout = false;
}

$qusvv = "SELECT * FROM `banner` WHERE `cust`='$usernv' and display = 2 limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needprofile = false;
}

$qusvv = "SELECT * FROM `banner` WHERE `cust`='$usernv' and display = 1 limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needimage = false;
}

$qusvv = "SELECT * FROM `online_payment` WHERE `cust`='$usernv' limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needpayment = false;
}

$qusvv = "SELECT * FROM `video` WHERE `cust`='$usernv' limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needvideo = false;
}

$qusvv = "SELECT * FROM `product` WHERE `cust`='$usernv' limit 1";
$data = $con->query($qusvv);
if ($data->num_rows > 0) {
	$needproduct = false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VCard Dashboard Home</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 
    <style type="text/css">
        /*@media only screen and (max-width: 425px) {
            .value {
                font-size: 6px;
            }
        }*/
        .widget-card-four {
            height: 150px;
        }
    </style>
    
    <link href="assets/css/elements/infobox.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/elements/alert.css">
</head>
<body>

    <!--  BEGIN NAVBAR  -->
   	<?php include('header.php');?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    
					
					<?php if ($needprofile) { ?>
					
					<div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span> Logo Image is not added.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="location.href='add-banner?type_upload=2'" class="btn btn-default btn-dismiss">Upload Logo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php } if ($needabout) { ?>
                    
                    <div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span>About Us Content is not added.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="location.href='about'" class="btn btn-default btn-dismiss">Add About Us</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PAYMENT NEEDED!-->
                    
                   <!-- 
                    
                    <div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span> Payment Details is not added.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="location.href='payment-gateway'" class="btn btn-default btn-dismiss">Add Payment Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>!-->
                    
                    <?php } if ($needimage) { ?>
                    
                    <div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span> Not a Single Image is added to Gallery.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="location.href='add-banner'" class="btn btn-default btn-dismiss">Add Image to Gallery</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                <!--  <?php } if ($needvideo) { ?>
                    
                    <div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <!--<div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span> Not a Single Video is added to Video Gallery.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="location.href='add-video'" class="btn btn-default btn-dismiss">Add Video to Gallery</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>!-->
                    </div>
                    
                    <?php } if($needproduct){ ?>
                    
                    <div id="alertCustom" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
        					<div class="alert custom-alert-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Warning! </strong><span> Not a Single Product/Service is added.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" onclick="add-product'" class="btn btn-default btn-dismiss">Add Products/Services</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $user = $_SESSION['user'];
                    $statuss = 2;
                    $qev = "SELECT * FROM `renewal` WHERE `cust`='$user'";
                    $datav = $con->query($qev);
                    if($datav->num_rows > 0){
                        $droe = $datav->fetch_assoc();
                        $datee = $droe['datee'];
                        $rdatee = $droe['rdatee'];
                    }
                ?>
                
                <?php
    				$qusv = "SELECT * FROM `owners` WHERE `id`='$user'";
                    $datasv = $con->query($qusv);
                    
    				if ($datas->num_rows > 0) {
    					$rowsd = $datasv->fetch_assoc();
    					$id = $rowsd['id'];
    					$name = $rowsd['name'];
    					$address = $rowsd['address'];
    					$cname = $rowsd['cname'];
    					$url = $rowsd['url'];
                        $category = $rowsd['category'];
                        $tagline = $rowsd['tagline'];
    					$mobile = $rowsd['mobile'];
    					$wmobile = $rowsd['whatsapp'];
    					$email = $rowsd['email'];
    					$status = $rowsd['status'];
    					
    
    					$qusd = "SELECT * FROM `renewal` WHERE `cust`='$id'";
    					$datasd = $con->query($qusd);
    					if ($datasd->num_rows > 0) {
    						$rowsdd = $datasd->fetch_assoc();
    
    						$nid = $rowsdd['id'];
    						$ndatee = $rowsdd['datee'];
    						$nrdatee = $rowsdd['rdatee'];
    						$nlkey = $rowsdd['lkey'];
    						
    
    						
    					}
    					
    				}
    			?>
    			

                    <?php } ?>
                    
                    <?php $wurl = $_SESSION['wurl'];
                    
                        $user = $_SESSION['user'];
                        
                        $qusv = "SELECT * FROM `owners` WHERE `id`='$user'";
                        $datasv = $con->query($qusv);
        				if ($datasv->num_rows > 0) {
        					$rowsd = $datasv->fetch_assoc();
        					$id = $rowsd['id'];
        					$name = $rowsd['name'];
        					$address = $rowsd['address'];
        					$cname = $rowsd['cname'];
        					$url = $rowsd['url'];
                            $category = $rowsd['category'];
                            $tagline = $rowsd['tagline'];
        					$mobile = $rowsd['mobile'];
        					$wmobile = $rowsd['whatsapp'];
        					$email = $rowsd['email'];
        					$status = $rowsd['status'];
        					
        
        					$qusd = "SELECT * FROM `renewal` WHERE `cust`='$id'";
        					$datasd = $con->query($qusd);
        					if ($datasd->num_rows > 0) {
        						$rowsdd = $datasd->fetch_assoc();
        
        						$nid = $rowsdd['id'];
        						$ndatee = $rowsdd['datee'];
        						$nrdatee = $rowsdd['rdatee'];
        						$nlkey = $rowsdd['lkey'];
        						
        
        						
        					}
        					
        				}
                    
                    
                    ?>
                    

                <a target="_blank" <?php echo 'href="https://'.$wurl.'/'.$url.'"';?> class="btn btn-primary" style="width: 100%; margin: 10px;">View My Website</a>
                <div class="col-12">
                    <input class="form-control" type="test" value="https://<?php echo $wurl.'/'.$url;?>" id="myInput" readonly>
                </div>
                
                
                <button onclick="myFunction()" class="btn btn-primary share-button" style="width: 100%; margin: 10px;">Copy Your Website Link</button>
                    

                         


                </div>
            </div>
            <?php include('footer.php');?>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        function myFunction() {
          var copyText = document.getElementById("myInput");
          copyText.select();
          copyText.setSelectionRange(0, 99999)
          document.execCommand("copy");
          alert("Copied the text: " + copyText.value);
        }
    </script>
    
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/widgets/modules-widgets.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>

</body>
</html>