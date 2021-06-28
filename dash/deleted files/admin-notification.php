<?php
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Notification</title>
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
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp; Admin Notification</a></li>
						    </ol>
						</nav>
					</div>

							

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        
	<hr style="border: 1px solid;">
	<p align="justify"><strong>Instruction :</strong> View any important "Notification" sent by us in this section.</p>
	<hr style="border: 1px solid;">
	
	            <?php
                    $user = $_SESSION['user'];
                    $qev = "SELECT * FROM `notificationadmin` WHERE `cust`='$user'";
                    $datav = $con->query($qev);
                    if($datav->num_rows > 0){
                        while($rowsf = $datav->fetch_assoc()){
                            $title = $rowsf['title'];
                            $message = $rowsf['message'];
                            
                            echo '
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing1" style="padding-right: 5px; padding-left: 10px;">
                                <div class="widget widget-card-four" style="background-color: #009e35; padding: 20px 15px;">
                                    <div class="widget-content">
                                        <div>
                                            <div class="w-info">
                                                <h6 class="value" style="color: #fff;">'.$title.'</h6>
                                                <p style="color: #fff; font-size: 13px;">'.$message.'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }
                ?>
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