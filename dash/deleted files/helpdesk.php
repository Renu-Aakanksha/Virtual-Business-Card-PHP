<?php
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Help Desk</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 
   <link rel="icon" type="image/png" href="icon/512x512.png"/>

</head>
<body>

    <!--  BEGIN NAVBAR  -->
   	<?php include('header.php');?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                  <div class="widget-content widget-content-area text-center">
	                	<nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp; Help Desk</a></li>
						    </ol>
						</nav>
					</div>
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            
            	<hr style="border: 1px solid;">
            	<p align="justify"><strong>Instruction :</strong> Help and support options for you to contact us 24 X 7.</p>
            	<hr style="border: 1px solid;">
            	
            	<?php
                        if(isset($_POST['catsub'])){
                            $titler = $_POST['title'];
                            $messager = $_POST['message'];
                            $user = $_SESSION['user'];
                            $datee = date("d/m/Y");
                            
                            if(empty($titler)){
                                echo "<script>alert('Faild To Sent, Subject cant be empty.'); window.location='helpdesk'</script>";
                                die();
                            }
                            
    						$to = "support@mymobiz.in";
                            $subject = $titler;
                            
                            $message = "
                            <html>
                            <head>
                            <title></title>
                            </head>
                            <body>
                            <h3>Store ID : ".$user."</h3>
                            <h4>".$titler."</h4>
                            <p>".$messager."</p>
                            </body>
                            </html>
                            ";
                            
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            
                            // More headers
                            $headers .= 'From: <auto@mymobiz.in>' . "\r\n";
                            $headers .= 'Cc: ' . "\r\n";
                            
                            $datain = mail($to,$subject,$message,$headers);
    						
    						if($datain){
    						    echo "<script>alert('Sent Successfully.'); window.location='helpdesk'</script>";
    						}
    						else {
    						    echo "<script>alert('Faild To Sent.'); window.location='helpdesk'</script>";
    						}
                        }
                        
                        ?>
                    	<form method="post">
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" id="rEmail" placeholder="Subject *" name="title">
							    </div>

							    <div class="form-group mb-4">
							        <input type="text" class="form-control" id="rEmail" placeholder="Message *" name="message">
							    </div>
							   
							    <button type="submit" class="btn btn-primary" style="width: 100%;" name="catsub">Send</button>
						</form>
							<br>
                
      
                </div>
            </div>
            <?php include('footer.php');?>
        </div>
        <!--  END CONTENT PART  -->

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
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/widgets/modules-widgets.js"></script>
</body>
</html>