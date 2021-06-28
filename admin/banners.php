<?php
include('session.php');
include('../dash/db.php');
if (isset($_GET['delid'])) {
	$delid = $_GET['delid'];
	$qedel = $con->query("DELETE FROM `screen` WHERE `id`='$delid'");
	if ($qedel) {
		echo "<script>alert('Deleted Successfully.'); window.location='banners'</script>";
	}
	else {
		echo "<script>alert('Failed To Delete.'); window.location='banners'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Banners</title>
    <?php include('links.php');?>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
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
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
       <?php include('header.php');?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="col-lg-12 layout-spacing" style="padding: 0px;">
					<div class="widget-content widget-content-area">

						<?php
						$qu = "SELECT * FROM `screen`";
						$data = $con->query($qu);
						if ($data->num_rows > 0) {
							while ($rows = $data->fetch_assoc()) {
								$bid = $rows['id'];
								$bimage = $rows['image'];
								$bdisplay = $rows['display'];
								if ($bdisplay == 1) {
									$display_name = "Banner";
								}
								else if($bdisplay == 2) {
									$display_name = "Profile 1";
								}
								else if($bdisplay == 3) {
									$display_name = "Profile 2";
								}
								else if($bdisplay == 4) {
									$display_name = "Background Image";
								}
                                else if($bdisplay == 11) {
                                    $display_name = "Screenshot";
                                }
                                else if($bdisplay == 12) {
                                    $display_name = "Slider Screenshot";
                                }


								echo '
									<div class="card component-card_2">
			                            <img src="../dash/images/'.$bimage.'" class="card-img-top" alt="widget-card-2">
			                            <div class="card-body">
			                                <h5 class="card-title">'.$display_name.'</h5>
			                                <a href="banners?delid='.$bid.'" class="btn btn-primary" style="margin: 0px; width: 100%;">Delete</a>
			                            </div>
			                        </div>
			                        <br>
								';
							}
						}
						?>
                    </div>  
                </div>
            </div>
            <br>
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
        var ss = $(".basic").select2({
	    	tags: true,
		});
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
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