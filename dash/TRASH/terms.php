<?php
include('session.php');
include('db.php');
$userid = $_SESSION['user'];

if (isset($_POST['termsupdate'])){
    $terms = $_POST['terms'];
    
    $dataqu = $con->query("SELECT * FROM `terms` WHERE `cust`='$userid'");
    if($dataqu->num_rows > 0){
        $data_insert = $con->query("UPDATE `terms` SET `terms`='$terms' WHERE `cust`='$userid'");
    }
    else {
        $data_insert = $con->query("INSERT INTO `terms`(`terms`, `cust`) VALUES ('$terms','$userid')");
    }
    
    if ($data_insert) {
            
        echo "<script>alert('Updated successfully'); window.location='terms'</script>";
    }
    else {
        echo "<script>alert('Sorry, Failed To update'); window.location='terms'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Terms of Service </title>
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Terms of Service</a></li>
								    </ol>
								</nav>
							</div>
							
	<hr style="border: 1px solid;">
	<p align="justify"><strong>Instruction :</strong> You can write your sales or payment related terms over here, so that it can be displayed at your storefront for your customer reference.</p>
	<hr style="border: 1px solid;">

                            <form method="post" enctype="multipart/form-data">
							    <div class="form-group mb-4">
                
                                <p>Enter Terms of Service</p>
							    <div class="form-group mb-4">
							        <?php
							        $dataqu = $con->query("SELECT * FROM `terms` WHERE `cust`='$userid'");
							        if($dataqu->num_rows > 0){
							            while($rowd = $dataqu->fetch_assoc()){
							                $fterms = $rowd['terms'];
							            }
							        }
							        else {
							            $fterms = "";
							        }
							        ?>
							        <textarea type="text" rows="9" class="form-control" name="terms"><?php echo $fterms;?></textarea>
							    </div>
							    
							    <button type="submit" class="btn btn-primary mt-3" name="termsupdate" style="width: 100%;">Update</button>

							</form>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <?php
            /*include('footer.php');*/
            ?>
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
        
        $('#product').on('change', function() { 
                    var category_n = this.value;
                    var cateparn = "add-product?product=";

                    $('#category').on('change', function() {
                            var category_id = this.value;
                            var catepar = "&id=";

                            window.location=cateparn+category_n+catepar+category_id;
                    });
         });
    });
    </script>
</body>
</html>