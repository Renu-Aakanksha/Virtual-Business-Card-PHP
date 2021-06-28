<?php
include('session.php');
include('db.php');

if (isset($_POST['addpay'])) {
    $ccu = $_POST['cu'];
    $dsubject = $_POST['subject'];
    $demail = $_POST['email'];
    $userid = $_SESSION['user'];
    $date = date("d/m/Y");
    $sendtoe = $ccu;
    
    $user = $_SESSION['user'];
    $qec = "SELECT * FROM `owners` WHERE `id`='$user'";
    $datac = $con->query($qec);
    if($datac->num_rows > 0){
        $rowsc = $datac->fetch_assoc();
        $necname = $rowsc['cname'];
        $spcnam = str_replace(' ', '.', $necname);
        $spcname = strtolower($spcnam);
    }
    
    $sap = explode (",", $sendtoe);
    
    foreach ($sap as $sendto) {
        //email
        $to = $sendto;
        $subject = $dsubject;
        $from = $necname.' <'.$spcname.'@brightgoals.in>';
         
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
         
        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= $demail;
        $message .= '</body></html>';
         
        // Sending email
        mail($to, $subject, $message, $headers);
        //end-email
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Bulk Email</title>
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
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  --> 

    <?php echo $tiny_cloud_code;?>
    <script>tinymce.init({selector:'#textarea'});</script>

</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <p>
                    <h3>Please Wait...</h3>
                    <div class="spinner-border text-success  align-self-center loader-lg">Loading...</div>
                </p>
              </div>
            </div>
        
          </div>
        </div>


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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">Email Marketing</a></li>
								    </ol>
								</nav>
							</div>
							           

                            <form method="post" enctype="multipart/form-data">
							  
                                <p>Email List</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="6" class="form-control" name="cu"></textarea>
							    </div>

                                <div class="form-group mb-4">
                                <p>Subject</p>
                                    <input type="text" class="form-control" id="product" placeholder="Subject *" name="subject" required="true">
                                </div>
								
                                <p>Html Template</p>
							    <div class="form-group mb-4">
							        <textarea type="text" rows="6" class="form-control" name="email"></textarea>
							    </div>
							    
							    <button type="submit" class="btn btn-primary mt-3" name="addpay" data-toggle="modal" data-target="#myModal" style="width: 100%;">Send Email</button>

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
    
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>