<?php 
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social Information</title>
    <?php include('links.php');?>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    	.dataTables_length {
    		display: none;
    	}
    	.feather-search {
    		display: none;
    	}
    </style>
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('header.php');?>
    </div>
    <!--  END NAVBAR  -->


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">

	                <div class="widget-content widget-content-area text-center">
	                	<nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp; Social Information</a></li>
						    </ol>
						</nav>
					</div>

							

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        
	<hr style="border: 1px solid;">
	<p align="justify"><strong>Instruction : Fill up the below social information for your business promotional pupose.</strong></p>
	<hr style="border: 1px solid;">
                        
                        <?php
                        if(isset($_POST['catsub'])){
                            $mobile = 0;
                            $street = 0;
                            $city = 0;
                            $state = 0;
                            $pin = 0;
                            $country = $_POST['country'];
                            $facebook = $_POST['facebook'];
                            $twitter = $_POST['twitter'];
                            $linkedin = $_POST['linkedin'];
                            $instagram = $_POST['instagram'];
                            $youtube = $_POST['youtube'];
                            $datee = date("d/m/Y");
                            
                            $userid  = $_SESSION['user'];
                            $dataqu = $con->query("SELECT * FROM `schemaa` WHERE `cust`='$userid'");
                            if($dataqu->num_rows > 0){
                                $data_insert = $con->query("UPDATE `schemaa` SET `mobile`='$mobile',`street`='$street',`city`='$city',`state`='$state',`pin`='$pin',`country`='$country',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`instagram`='$instagram',`youtube`='$youtube' WHERE `cust`='$userid'");
                            }
                            else {
                                $data_insert = $con->query("INSERT INTO `schemaa`(`mobile`, `street`, `city`, `state`, `pin`, `country`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `cust`) VALUES ('$mobile','$street','$city','$state','$pin','$country','$facebook','$twitter','$linkedin','$instagram','$youtube','$userid')");
                            }
                            
                            if ($data_insert) {
                                    
                                echo "<script>alert('Updated successfully'); window.location='schema'</script>";
                            }
                            else {
                                echo "<script>alert('Sorry, Failed To update'); window.location='schema'</script>";
                            }
                        }
                        
                        ?>
                        
                        <?php 
                        $user = $_SESSION['user'];
						$qef = "SELECT * FROM `schemaa` WHERE `cust`='$user'";
						$dataf = $con->query($qef);
						if($dataf->num_rows > 0){
						    while($rowsf = $dataf->fetch_assoc()){
						        $fid = $rowsf['id'];
						        $fmobile = $rowsf['mobile'];
						        $fstreet = $rowsf['street'];
						        $fcity = $rowsf['city'];
						        $fstate = $rowsf['state'];
						        $fpin = $rowsf['pin'];
						        $fcountry = $rowsf['country'];
						        $ffacebook = $rowsf['facebook'];
						        $ftwitter = $rowsf['twitter'];
						        $flinkedin = $rowsf['linkedin'];
						        $finstagram = $rowsf['instagram'];
						        $fyoutube = $rowsf['youtube'];
						    }
						}
						?>
                    	<form method="post">
                    	       <!-- <h5>1. Mobile / Telephone</h5>
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fmobile.'"';}?> id="rEmail" placeholder="Contact Number" name="mobile">
							    </div>
							    
							    <h5>2. Postal Address</h5>
							    Street
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fstreet.'"';}?> id="rEmail" placeholder="Street" name="street">
							    </div>
							    Locality/Town/City
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fcity.'"';}?> id="rEmail" placeholder="Locality/Town/City" name="city">
							    </div>
							    State in short e.g. : MH 
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fstate.'"';}?> id="rEmail" placeholder="State" name="state">
							    </div>
							    Postal Code
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fpin.'"';}?> id="rEmail" placeholder="Postal Code" name="pin">
							    </div>
							    Country
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fcountry.'"';}?> id="rEmail" placeholder="Country" name="country">
							    </div>-->
							    
							    <h5>Social Links</h5>
							    Facebook Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$ffacebook.'"';}?> id="rEmail" placeholder="Facebook Link" name="facebook">
							    </div>
							    Twitter Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$ftwitter.'"';}?> id="rEmail" placeholder="Twitter Link" name="twitter">
							    </div>
							    Linkedin Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$flinkedin.'"';}?> id="rEmail" placeholder="Linkedin Link" name="linkedin">
							    </div>
							    Instagram Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$finstagram.'"';}?> id="rEmail" placeholder="Instagram Link" name="instagram">
							    </div>
							    Youtube Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fyoutube.'"';}?> id="rEmail" placeholder="Youtube Link *" name="youtube">
							    </div>
							    Google Map Link
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" <?php if(isset($fid)){echo 'value="'.$fcountry.'"';}?> id="rEmail" placeholder="Country" name="country">
							    </div>

							    <button type="submit" class="btn btn-primary" style="width: 100%;" name="catsub">Update Social Info</button>
						</form>
						<br>
                    </div>

                </div>

            </div>
            <?php include('footer.php');?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        $('#zero-config').DataTable({
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
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

     <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
</body>
</html>