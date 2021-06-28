<?php
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Promotional SMS</title>
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

                <div class="row layout-top-spacing">


                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two" style="padding: 10px;">

                            <div class="widget-heading">
                                <center>
                                <h4 style="color: #1b55e2;">Promotional SMS</h4>
                                <h6>Increase your sales by using Bulk SMS Service</h6>
                                <p>Configured by default for all new accounts, promotional SMS is generally used for sending any offers or promotions to new and existing customers. Messages are sent to non-DND numbers and opt-in numbers (via myDND Manager) between 9 AM and 9 PM only.</p>
                                <h6 style="color: #1b55e2;"><strong>I am interested to purchase Bulk Promotional SMS.</strong></h6>
                                 <a href="https://wa.me/918888185639?text=*I'm%20interested%20to%20purchase%20Bulk%20Promotional%20SMS.%20Please%20feedback.*" target="_blank" class="flex-c-m txt-s-103 cl0 size-a-15B how-btn1 bg10 hov-btn2 trans-04">
                                 <button class="btn btn-primary" style="width: 100%;">Please Send Details</button>
                                 </a>
                                 
                                 <h6 style="color: #d20000;" class="mt-3"><strong>Already Purchased ?</strong></h6>
                                 <a href="http://123.108.46.13/sms-panel/login.php" target="_blank" class="flex-c-m txt-s-103 cl0 size-a-15B how-btn1 bg10 hov-btn2 trans-04">
                                 <button class="btn btn-primary" style="width: 100%;">Click to Login</button>
                                 </a>
                                </center>
                            </div>

                        </div>
                    </div>
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