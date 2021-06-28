<?php
include('session.php');
include('db.php');
$userid = $_SESSION['user'];

if (isset($_POST['aboutupdate1'])){
    $cname = $_POST['cname'];
    $yearofe = $_POST['yearofe'];
    $btype = $_POST['btype'];
    $intro = $_POST['intro'];
    $speci = $_POST['speci'];
    $product = $_POST['product'];
    $pflink = $_POST['flink'];
    $prbtn = $_POST['btn'];
    
    
    $dataqu = $con->query("SELECT * FROM `iabout` WHERE `cust`='$userid'");
    if($dataqu->num_rows > 0){
        $stmt = $con->prepare("UPDATE `iabout` SET `cname`=?,`yearofe`=?,`btype`=?,`intro`=?,`speci`=?,`product`=?, `resume`=?, `btn`=? WHERE `cust`=?");
        $stmt->bind_param("sssssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$pflink,$prbtn,$userid);
        if($stmt->execute()){
            echo "<script>alert('Details Updated'); window.location='about';</script>";
        }else{
            echo "<script>alert('Failed Updated'); window.location='about';</script>";
        }
        $stmt->close();
    }
    else {
        $stmt = $con->prepare("INSERT INTO `iabout`(`cname`, `yearofe`, `btype`, `intro`, `speci`, `product`, `resume`, `btn`, `cust`) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$pflink,$prbtn,$userid);
        if($stmt->execute()){
            echo "<script>alert('Details Updated'); window.location='about';</script>";
        }else{
            echo "<script>alert('Failed Updated'); window.location='about';</script>";
        }
        $stmt->close();
    }
        
    //$uploaded = 'false';
    
    // if(isset($_FILES['fileToUpload'])){
    //     $target_dir = "resumes/";
    //     $target_file = $target_dir.rand(10000000,900000000).basename($_FILES["fileToUpload"]["name"]);
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //     if($imageFileType != "pdf"){
    //         $error ="extension not allowed, please choose a PDF file.";
    //     }
        
    //     if($_FILES["fileToUpload"]["size"] > 20971520){
    //         $error ='File size must be excately 20 MB';
        
    //         echo "<script>alert('Sorry, Failed To Add Resume : File size must be excately 20 MB'); window.location='about'</script>";
    //     }
        
    //     if(empty($error)){
    //         move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    //         $uploaded = 'true';
    //     }
    // }
    
    // $dataqu = $con->query("SELECT * FROM `iabout` WHERE `cust`='$userid'");
    // if($dataqu->num_rows > 0){
    //     $stmt = $con->prepare("UPDATE `iabout` SET `cname`=?,`yearofe`=?,`btype`=?,`intro`=?,`speci`=?,`product`=? WHERE `cust`=?");
    //     $stmt->bind_param("sssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$userid);
    //     $stmt->execute();
    //     $stmt->close();
    // }
    // else {
    //     $stmt = $con->prepare("INSERT INTO `iabout`(`cname`, `yearofe`, `btype`, `intro`, `speci`, `product`, `cust`) VALUES (?,?,?,?,?,?,?)");
    //     $stmt->bind_param("sssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$userid);
    //     $stmt->execute();
    //     $stmt->close();
    // }
    
    
    /*if (isset($_FILES['fileToUpload']) and $uploaded == 'true') {
        $dataqu = $con->query("SELECT * FROM `iabout` WHERE `cust`='$userid'");
        if($dataqu->num_rows > 0){
            $stmt = $con->prepare("UPDATE `iabout` SET `cname`=?,`yearofe`=?,`btype`=?,`intro`=?,`speci`=?,`product`=?, `resume`=? WHERE `cust`=?");
            $stmt->bind_param("ssssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$target_file,$userid);
            $stmt->execute();
            $stmt->close();
        }
        else {
            $stmt = $con->prepare("INSERT INTO `iabout`(`cname`, `yearofe`, `btype`, `intro`, `speci`, `product`, `cust`, `resume`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$userid, $target_file);
            $stmt->execute();
            $stmt->close();
        }
        if(!empty($error)){
            echo "<script>alert('Details Updated but resume not added'); window.location='about'</script>";
        }
    }else{
        $dataqu = $con->query("SELECT * FROM `iabout` WHERE `cust`='$userid'");
        if($dataqu->num_rows > 0){
            $stmt = $con->prepare("UPDATE `iabout` SET `cname`=?,`yearofe`=?,`btype`=?,`intro`=?,`speci`=?,`product`=? WHERE `cust`=?");
            $stmt->bind_param("sssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$userid);
            $stmt->execute();
            $stmt->close();
        }
        else {
            $stmt = $con->prepare("INSERT INTO `iabout`(`cname`, `yearofe`, `btype`, `intro`, `speci`, `product`, `cust`) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss",$cname,$yearofe,$btype,$intro,$speci,$product,$userid);
            $stmt->execute();
            $stmt->close();
        }
    
    }*/
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Business </title>
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;About Business</a></li>
								    </ol>
								</nav>
							</div>
							
	<hr style="border: 1px solid;">
	<p align="justify"><strong>Instruction :</strong> Just write a brief about your company and submit it so that it can be displayed at your website for your customer ready reference.</p>
	<hr style="border: 1px solid;">

                            <form method="post" enctype="multipart/form-data">
                                <?php
						        $dataquv = $con->query("SELECT * FROM `iabout` WHERE `cust`='$userid'");
						        if($dataquv->num_rows > 0){
						            while($rowd = $dataquv->fetch_assoc()){
						                $cname = $rowd['cname'];
                                        $yearofe = $rowd['yearofe'];
                                        $btype = $rowd['btype'];
                                        $intro = $rowd['intro'];
                                        $speci = $rowd['speci'];
                                        $product = $rowd['product'];
                                        $fresume = $rowd['resume'];
                                        $fbtn = $rowd['btn'];
						            }
						        }
						        else {
						            $cname = "";
                                    $yearofe = "";
                                    $btype = "";
                                    $intro = "";
                                    $speci = "";
                                    $product = "";
                                    $fresume = "";
                                    $fbtn = "";
						        }
						        ?>
							    <div class="form-group mb-4">
						        <div class="form-group mb-4">
                                    <p>Company Name</p>
							        <input  maxlength="30" type="text" value="<?php echo $cname;?>" class="form-control" id="product" placeholder="Company Name *" name="cname" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                                    <p>Year Of Estd.</p>
							        <input  maxlength="30" type="text" value="<?php echo $yearofe;?>" class="form-control" id="product" placeholder="Year Of Estd. *" name="yearofe" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                                    <p>Nature Of Business</p>
							        <input  maxlength="30" type="text" value="<?php echo $btype;?>" class="form-control" id="product" placeholder="Nature Of Business *" name="btype" required="true">
							    </div>
                
                                <p>Introduction</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="10" class="form-control" name="intro"><?php echo $intro;?></textarea>
							    </div>
							    
							    <p>Our Specialities</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="10" class="form-control" name="speci"><?php echo $speci;?></textarea>
							    </div>
							    
							    <p>Our Products</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="10" class="form-control" name="product"><?php echo $product;?></textarea>
							    </div>
							    
							    <div class="form-group mb-4">
                                    <p>File Link [ Please paste your file link here. ]</p>
							        <input type="text" value="<?php echo $fresume;?>" class="form-control" id="product" placeholder="File Link" name="flink">
							    </div>
							    
							    <div class="form-group mb-4">
                                    <p>File Button Name</p>
							        <input type="text" value="<?php echo $fbtn;?>" class="form-control" id="product" placeholder="Custom Button Name" name="btn">
							    </div>
							    
							   <!-- <p><strong>Upload Brochure</strong> (PDF *)</p>
                                <input type="file" name="fileToUpload">-->
							    
							    <button type="submit" class="btn btn-primary mt-3" name="aboutupdate1" style="width: 100%;">Submit</button>


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