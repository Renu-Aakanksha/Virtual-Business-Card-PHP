<?php
include('session.php');
include('db.php');

if (isset($_POST['upprofile'])){
    $iname = $_POST['name'];
    $iaddress = $_POST['address'];
    $category = $_POST['category'];
    $tagline = $_POST['tagline'];
    $imobile = $_POST['mobile'];
    $iwhatsapp = $_POST['whatsapp'];
    $pixel = $_POST['pixel'];
    $iemail = $_POST['email'];
    $idate = date("d/m/Y");
    $iuser = $_SESSION['user'];
    $urlup = $_POST['urlup'];
    
    $validurl = $con->query("SELECT * FROM `owners` WHERE `url`='$urlup'");
    if($validurl->num_rows > 0){
        
        $stmt = $con->prepare("UPDATE `owners` SET `name`=?,`address`=?,`category`=?,`tagline`=?,`mobile`=?,`whatsapp`=?,`email`=?, `pixel`=? WHERE `id`=?");
        $stmt->bind_param("ssssiissi",$iname,$iaddress,$category,$tagline,$imobile,$iwhatsapp,$iemail,$pixel,$iuser);
        
        if ($stmt->execute()) {
            
            echo "<script>alert('Details Updated Successfully | URL Not Avaiable, Unable to update URL. '); window.location='profile'</script>";
        }
        else {
            echo "<script>alert('Sorry, Failed To update '); window.location='profile'</script>";
        }
        $stmt->close();
        
        
    }
    else {
        $stmt = $con->prepare("UPDATE `owners` SET `name`=?,`address`=?,`url`=?,`category`=?,`tagline`=?,`mobile`=?,`whatsapp`=?,`email`=?, `pixel`=? WHERE `id`=?");
        $stmt->bind_param("sssssiissi",$iname,$iaddress,$urlup,$category,$tagline,$imobile,$iwhatsapp,$iemail,$pixel,$iuser);
    }

    
    /*$que = "UPDATE `owners` SET `name`='$iname',`address`='$iaddress',`category`='$category',`tagline`='$tagline',`mobile`='$imobile',`whatsapp`='$iwhatsapp',`email`='$iemail' WHERE `id`='$iuser'";
    $data_update = $con->query($que);*/

    /*$stmt = $con->prepare("UPDATE `owners` SET `name`=?,`address`=?,`url`=?,`category`=?,`tagline`=?,`mobile`=?,`whatsapp`=?,`email`=?, `pixel`=? WHERE `id`=?");
    $stmt->bind_param("sssssiissi",$iname,$iaddress,$urlup,$category,$tagline,$imobile,$iwhatsapp,$iemail,$pixel,$iuser);*/
    
    if ($stmt->execute()) {
            
        echo "<script>alert('Updated Successfully'); window.location='profile'</script>";
    }
    else {
        echo "<script>alert('Sorry, Failed To update '); window.location='profile'</script>";
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp; User Profile</a></li>
								    </ol>
								</nav>
							</div>
							<hr style="border: 1px solid;">
							<p align="justify"><strong>Instruction :</strong> You can update your below profile information.</p>
							<hr style="border: 1px solid;">

                            <form method="post" enctype="multipart/form-data">

                            	<?php
									$usern = $_SESSION['user'];
									$qus = "SELECT * FROM `owners` WHERE `id`='$usern'";
									$datas = $con->query($qus);
									if ($datas->num_rows > 0) {
										$rowsd = $datas->fetch_assoc();
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
                                        $pixel = $rowsd['pixel'];
										

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

							    <div class="form-group mb-4">
                    			<p>Name</p>
							        <input type="text" class="form-control" id="product" placeholder="Name *" <?php echo 'value="'.$name.'"';?> name="name" required="true">
							    </div>

							    <div class="form-group mb-4">
                    			<p>Address</p>
							        <input type="text" class="form-control" id="product" placeholder="Address *" <?php echo 'value="'.$address.'"';?> name="address" required="true">
							    </div>

                                <div class="form-group mb-4">
                                <p>Nature Of Business</p>
                                    <input type="text" class="form-control" id="product" placeholder="Nature Of Business *" <?php echo 'value="'.$category.'"';?> name="category" required="true">
                                </div>

                                <div class="form-group mb-4">
                                <p>Caption / Tag Line</p>
                                    <input type="text" class="form-control" id="product" placeholder="Caption / Tag Line *" <?php echo 'value="'.$tagline.'"';?> name="tagline" required="true">
                                </div>

							    <div class="form-group mb-4">
                    			<p>Mobile Number</p>
							        <input type="text" class="form-control" id="product" placeholder="Mobile Number *" <?php echo 'value="'.$mobile.'"';?> name="mobile" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>WhatsApp Number</p>
							        <input type="text" class="form-control" id="product" placeholder="WhatsApp Number *" <?php echo 'value="'.$wmobile.'"';?> name="whatsapp" required="true" >
							    </div>

							    <div class="form-group mb-4">
                    			<p>Email</p>
							        <input type="text" class="form-control" id="product" placeholder="Email *" <?php echo 'value="'.$email.'"';?> name="email" required="true">
							    </div>
							    
							    <!--<center><div style="width: 100%; height: 40px; background:#0082f1; padding: 5px;"><h4 style="color:white;">Social Links</h4></div></center>
							    <br>
							    
							    <div class="form-group mb-4">
                    			<p>Google Location URL</p>
							        <input type="text" class="form-control" id="product" placeholder="Google Location URL" <?php echo 'value="'.$email.'"';?> name="googleloc" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>Facebook URL</p>
							        <input type="text" class="form-control" id="product" placeholder="Facebook URL" <?php echo 'value="'.$email.'"';?> name="facebook" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>Twitter URL</p>
							        <input type="text" class="form-control" id="product" placeholder="Twitter URL" <?php echo 'value="'.$email.'"';?> name="twitter" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>Linked In URL</p>
							        <input type="text" class="form-control" id="product" placeholder="Linked In URL" <?php echo 'value="'.$email.'"';?> name="linkedin" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>Instagram URL</p>
							        <input type="text" class="form-control" id="product" placeholder="Instagram URL" <?php echo 'value="'.$email.'"';?> name="instagram" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>Youtube URL</p>
							        <input type="text" class="form-control" id="youtube" placeholder="Youtube URL" <?php echo 'value="'.$email.'"';?> name="youtube" required="true">
							    </div>
							    
							    <hr style="border:1px solid gray;">-->

							    <div class="form-group mb-4">
                    			<p style="display: inline-block;">Business Name</p> 
                                <a href="settings"><p style="float: right; display: inline-block; color: blue;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> Edit Business Name</p></a>
							        <input type="text" class="form-control" id="product" placeholder="Business Name *" <?php echo 'value="'.$cname.'"';?> name="product" required="true" readonly>
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>URL Update (Note: Do not add any space and special symbol's)</p>
                    			<input type="text" class="form-control" id="product" placeholder="URL *" <?php echo 'value="'.$url.'"';?> name="urlup" required="true">
							    </div>
							    
							    <div class="form-group mb-4">
                    			<p>URL</p>
								<?php $wurl = $_SESSION['wurl']; ?>
                    			<input type="text" class="form-control" id="product" placeholder="URL *" <?php echo 'value="https://'.$wurl.'/'.$url.'"';?> name="url" required="true" readonly>
							    </div>

							    <!--<div class="form-group mb-4">
                    			<p>Date of Activation </p>
							        <input type="text" class="form-control" id="product" placeholder="Date *" <?php echo 'value="'.$ndatee.'"';?> name="product" required="true" readonly>
							    </div>

							    <div class="form-group mb-4">
                    			<p>Date of Renewal</p>
							        <input type="text" class="form-control" id="product" placeholder="Renewal Date *" <?php echo 'value="'.$nrdatee.'"';?> name="product" required="true" readonly>
							    </div>

							    <div class="form-group mb-4">
                    			<p>Licence Key</p>
							        <input type="text" class="form-control" id="product" placeholder="Licence Key *" <?php echo 'value="'.$nlkey.'"';?> name="product" required="true" readonly>
							    </div>-->
							    
							  <!--  <div class="form-group mb-4">
                    			<p>Reference Note</p>
							        <input style="border-color: orange; color: orange;" type="text" class="form-control" id="product" <?php echo 'value="'.$rnote.'"';?> name="product" required="true" readonly>
							    </div> -->
							    
							    <!--<div class="form-group mb-4">
                    			<p>Shop ID</p>
							        <input type="text" class="form-control" id="product" placeholder="Licence Key *" <?php echo 'value="'.$_SESSION['user'].'"';?> name="product" required="true" readonly>
							    </div>-->

							    <div class="form-group mb-4">
                    			<p>System Status</p>
							        <input type="text" class="form-control" id="product" placeholder="Status *" value="System Is Active And Running Perfectly" name="product" required="true" style="border-color: green; color: green;" readonly>
							    </div>
                  
                               
						

							    <!-- <small id="emailHelp2" class="form-text text-muted">*Required Fields</small> -->

							    
							    <button type="submit" class="btn btn-primary mt-3" style="width: 100%;" name="upprofile">Update Profile</button>

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