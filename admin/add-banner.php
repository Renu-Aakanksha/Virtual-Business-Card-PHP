<?php
include('session.php');
include('../dash/db.php');

if (isset($_GET['type_upload'])){
    $type_upload = $_GET['type_upload'];
    echo "<script> var type_upload = ".$type_upload."; </script>";
}


if (isset($_POST['banner'])){
    $display = $_POST['display'];
    $userid = 00000;
    $date = date("d/m/Y");

    if(isset($_FILES['image'])){
      
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $explodee = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($explodee));
      $ifileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
      $image_width = $ifileinfo[0];
      $image_height = $ifileinfo[1];
      
     
      
      $extensions= array("jpeg","jpg","png");
      $rename = rand(10000000,900000000);
      $rename_done = str_replace(' ', '', $rename.$file_name);


      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

         echo "<script>alert('Sorry, Failed To Upload Banner : extension not allowed, please choose a JPEG or PNG file.'); window.location='add-banner'</script>";
      }
      
      if($file_size > 1097152){
         $errors[]='File size must be excately 1 MB';

         echo "<script>alert('Sorry, Failed To Upload Banner : File size must be excately 1 MB'); window.location='add-banner'</script>";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../dash/images/".$rename_done);
         echo "Success";
      }else{
         print_r($errors);
      }


    	if(empty($errors)==true){

            $que = "INSERT INTO `screen`(`image`, `cust`, `display`, `datee`) VALUES ('$rename_done','$userid','$display','$date')";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Banner Uploaded successfully'); window.location='add-banner'</script>";
            }
        }
        else {
            echo "<script>alert('Sorry, Failed To Upload Banner'); window.location='add-banner'</script>";
        }

    }
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Screenshots / Images </title>
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Add Images</a></li>
								    </ol>
								</nav>
							</div>
							
							<hr style="border: 1px solid;">
                            <p align="justify"><strong><span style="color: darkorange;">Instruction :</span></strong> Max Image Size 1 MB
                            </p>
							<hr style="border: 1px solid;">

                            <form method="post" enctype="multipart/form-data">
							    <p>Select Uploading Place</p>
							    <select class="form-control  basic" name="display" id='mySelect'>
									<option value="11">Screenshot</option>
									<option value="12">Slider Screenshot</option>
								</select>
								
								<p>Use this online tool for image resizing</p>
                				<a href="http://www.simpleimageresizer.com/" target="_blank"><button type="button" class="btn btn-success mt-3" style="width: 100%;">Click here to resize your image</button></a>
                				<br><br><br>

                				<p>Image</p>
								<div class="custom-file-container" data-upload-id="myFirstImage">
								    <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">
								        [Click to Clear Image]
								    </a></label>
								    <label class="custom-file-container__custom-file" >
								        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image" required="true">
								        <span class="custom-file-container__custom-file__custom-file-control"></span>
								    </label>
								    <div class="custom-file-container__image-preview"></div>
								</div>


							    <small id="emailHelp2" class="form-text text-muted">*Required Fields</small>

							    
							    <button type="submit" class="btn btn-primary mt-3" name="banner" style="width: 100%;">Add Image</button>

							</form>
                        </div>
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
            if (type_upload) {
                document.getElementById("mySelect").value = type_upload;
            }
            
            var ss = $(".basic").select2({
	    	tags: true,
		    });
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