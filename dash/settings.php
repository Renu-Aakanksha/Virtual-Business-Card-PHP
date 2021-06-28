<?php
include('session.php');
include('db.php');

if (isset($_POST['banner'])){
    $display = $_POST['display'];
    $userid = $_SESSION['user'];

    $thesel = "SELECT * FROM `theme` WHERE `cust`='$userid'";
    $thedata = $con->query($thesel);
    if($thedata->num_rows > 0){
        $theup = "UPDATE `theme` SET `theme`='$display' WHERE `cust`='$userid'";
        $dataupth = $con->query($theup);
        
        if($dataupth){
            echo "<script>alert('Updated successfully'); window.location='settings'</script>";
        }
        else {
            echo "<script>alert('Failed to update'); window.location='settings'</script>";
        }
    }
    else {
        $theup = "INSERT INTO `theme`(`theme`, `cust`) VALUES ('$display','$userid')";
        $dataupth = $con->query($theup);
        
        if($dataupth){
            echo "<script>alert('Updated successfully'); window.location='settings'</script>";
        }
        else {
            echo "<script>alert('Failed to update'); window.location='settings'</script>";
        }
    }
 }
 if (isset($_POST['store'])) {
    $uid = $_SESSION['user'];
    $storename = $_POST['storename'];

    $upstoreq = "UPDATE `owners` SET `cname`='$storename' WHERE `id`='$uid'";
    $updata = $con->query($upstoreq);

    if($updata){
        echo "<script>alert('Updated successfully'); window.location='settings'</script>";
    }
    else {
        echo "<script>alert('Failed to update'); window.location='settings'</script>";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Settings </title>
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

                        	<div class="widget-content widget-content-area text-center">
			                	<nav class="breadcrumb-two" aria-label="breadcrumb">
								    <ol class="breadcrumb">
								        <li class="breadcrumb-item"><a href="index">Home</a></li>
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Website Settings</a></li>
								    </ol>
								</nav>
							</div>

         <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong> You can update your "Website Title Name" from here.
        <hr style="border: 1px solid;">

                            <!-- <form method="post" enctype="multipart/form-data">
							    

							    <p>Select Store Theme</p>
							    <select class="form-control  basic" name="display">
									    <option value="0">Light Theme</option>
										<option value="1">Dark Theme</option>
								</select>

							    <button type="submit" class="btn btn-primary mt-3" name="banner" style="width: 100%;">Update Theme</button>

							</form> 
                            <br>
                            <hr style="border: 1px solid gray;">-->
                            <br>
                            <form method="post" enctype="multipart/form-data">

                                <p>Change Website Name</p>
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control" id="product" placeholder="Website Name *" name="storename" required="true">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="store" style="width: 100%;">Update</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <br>
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