<?php
error_reporting(0);
include('session.php');
include('db.php');

if (isset($_POST['addblog'])){
    $titlere = $_POST['title'];
    $dise = $_POST['dis'];
    $userid = $_SESSION['user'];
    $date = date("d/m/Y");
    $removequa = "'";
    $dis = str_replace($removequa, '', $dise);
    $title = str_replace($removequa, '', $titlere);

    if(isset($_FILES['image'])){
      
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $explodee = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($explodee));
      
      $extensions= array("jpeg","jpg","png");
      $rename = rand(10000000,900000000);
      $rename_done = str_replace(' ', '', $rename.$file_name);


      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

         echo "<script>alert('Sorry, Failed To Upload Banner : extension not allowed, please choose a JPEG or PNG file.'); window.location='service'</script>";
      }
      
      if($file_size > 1097152){
         $errors[]='File size must be excately 1 MB';

         echo "<script>alert('Sorry, Failed To Upload Banner : File size must be excately 1 MB'); window.location='service'</script>";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$rename_done);
         echo "Success";
      }else{
         print_r($errors);
      }


        if(empty($errors)==true){

            $que = "INSERT INTO `blog`(`title`, `dis`, `image`, `cust`, `datee`) VALUES ('$title','$dis','$rename_done','$userid','$date')";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Published successfully'); window.location='service'</script>";
            }
        }
        else {
            echo "<script>alert('Sorry, Failed To Publish Blog'); window.location='service'</script>";
        }

    }
 }

if (isset($_POST['updateb'])){
    $title = $_POST['title'];
    $dis = $_POST['dis'];
    $userid = $_GET['id'];
    $date = date("d/m/Y");

    if(isset($_FILES['image']['name'])){
      
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $explodee = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($explodee));
      
      $extensions= array("jpeg","jpg","png");
      $rename = rand(10000000,900000000);
      $rename_done = str_replace(' ', '', $rename.$file_name);


      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

         echo "<script>alert('Sorry, Failed To Upload Banner : extension not allowed, please choose a JPEG or PNG file.'); window.location='service'</script>";
      }
      
      if($file_size > 1097152){
         $errors[]='File size must be excately 1 MB';

         echo "<script>alert('Sorry, Failed To Upload Banner : File size must be excately 1 MB'); window.location='service'</script>";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$rename_done);
         echo "Success";
      }else{
         print_r($errors);
      }


        if(empty($errors)==true){

            $que = "UPDATE `blog` SET `title`='$title',`dis`='$dis',`image`='$rename_done' WHERE `id`='$userid'";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Updated successfully'); window.location='service'</script>";
            }
        }
        else {
            echo "<script>alert('Sorry, Failed To Update Blog'); window.location='service'</script>";
        }

    }
    else {
            $que = "UPDATE `blog` SET `title`='$title',`dis`='$dis' WHERE `id`='$userid'";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Updated successfully'); window.location='service'</script>";
            }
    }
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Blog</title>
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

     <?php echo $tiny_cloud_code;?>
    <script>tinymce.init({selector:'textarea'});</script>

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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Services</a></li>
								    </ol>
								</nav>
							</div>
							
        <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong>
        <hr style="border: 1px solid;">
        
        <?php
            $user = $_SESSION['user'];
            $bid = $_GET['id'];
            $qe = "SELECT * FROM `blog` WHERE `id`='$bid' AND `cust`='$user'";
            $data = $con->query($qe);
            if($data->num_rows > 0){
                while($rows = $data->fetch_assoc()){
                    $idf = $rows['id'];
                    $titlef = $rows['title'];
                    $disf = $rows['dis'];
                    $imagef = $rows['image'];
                    $dateef = $rows['datee'];
                }
            }
        ?>
                                                

                            <form method="post" enctype="multipart/form-data">
						
							   <div class="form-group mb-4">
                                    <p>Service Title</p>
                                    <input type="text" class="form-control" id="product" placeholder="Title *" <?php if(isset($_GET['id'])){echo 'value="'.$titlef.'"';}?> name="title" required="true">
                                </div>
								
                                <p>Service Discription</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="6" class="form-control" name="dis"><?php if(isset($_GET['id'])){echo $disf;}?></textarea>
							    </div>

                                <p>Service Image</p>
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Image ( Max Size : 1MB ) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">
                                        [Click to Clear Image]
                                    </a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image" required="true">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
							    
							    <button type="submit" class="btn btn-primary mt-3" <?php if(isset($_GET['id'])){echo 'name="updateb"';}else{echo 'name="addblog"';}?> style="width: 100%;"><?php if(isset($_GET['id'])){echo 'Update';}else{echo 'Publish';}?></button>

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
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = this.value;
                var catepar = "payment-gateway?id=";
    
                window.location=catepar+category_id;
            });
        });
    </script>
</body>
</html>