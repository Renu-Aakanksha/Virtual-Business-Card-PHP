<?php
include('session.php');
include('../dash/db.php');

if (isset($_POST['upprofile'])){
    
        $iuser = $_SESSION['partner_ref'];
    
        $iname = $_POST['name'];
        $iaddress = $_POST['address'];
        $cat = $_POST['cat'];
        $imobile = $_POST['mobile'];
        $iwhatsapp = $_POST['whatsapp'];
        $iemail = $_POST['email'];
        $cname = $_POST['cname'];
            
        

        $stmt = $con->prepare("UPDATE `reseller` SET `name`=?,`address`=?,`cat`=?,`mobile`=?,`wmobile`=?,`email`=?,`cname`=? WHERE `partner`=?");
        $stmt->bind_param("ssssssss",$iname,$iaddress,$cat,$imobile,$iwhatsapp,$iemail,$cname,$iuser);
        
        if ($stmt->execute()) {
            $stmt->close();
            echo "<script>alert('Updated Successfully'); window.location='profile'</script>";
        }
        else {
            $stmt->close();
            echo "<script>alert('Sorry, Failed To update '); window.location='profile'</script>";
        }
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

                            <form method="post">

                            	<?php
									$usern = $_SESSION['partner'];
									$qus = "SELECT * FROM `reseller` WHERE `id`='$usern'";
									$datas = $con->query($qus);
									if ($datas->num_rows > 0) {
										$rowsd = $datas->fetch_assoc();
										$id = $rowsd['id'];
										$name = $rowsd['name'];
										$address = $rowsd['address'];
										$cname = $rowsd['cname'];
                                        $cat = $rowsd['cat'];
										$mobile = $rowsd['mobile'];
										$wmobile = $rowsd['wmobile'];
										$email = $rowsd['email'];
										
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
                    			    <p>Business Name</p> 
							        <input type="text" class="form-control" id="product" placeholder="Business Name *" <?php echo 'value="'.$cname.'"';?> name="cname" required="true">
							    </div>
							    
                                <div class="form-group mb-4">
                                    <p>Nature Of Business</p>
                                    <input type="text" class="form-control" id="product" placeholder="Nature Of Business *" <?php echo 'value="'.$cat.'"';?> name="cat" required="true">
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
							    
							    <small id="emailHelp2" class="form-text text-muted">*Required Fields</small>
							    
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