<?php
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ecommerce Dashboard Home</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 
    <style type="text/css">
        /*@media only screen and (max-width: 425px) {
            .value {
                font-size: 6px;
            }
        }*/
        .widget-card-four {
            height: 150px;
        }
    </style>
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

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 5px; padding-left: 10px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #027be2; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">Add Product</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to add new product</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 10px; padding-left: 5px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #dc6b00; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">View Products</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to view products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 5px; padding-left: 10px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #009e35; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">Add Banner</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to add new Banners/Logo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 10px; padding-left: 5px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #860292; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">View Banners</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to view banners/logo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 5px; padding-left: 10px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #027be2; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">Business Name</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to update business name</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 10px; padding-left: 5px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #dc6b00; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">About Us</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to update about us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 5px; padding-left: 10px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #009e35; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">Profile</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to view/update profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing1" style="padding-right: 10px; padding-left: 5px; margin-top: 10px;">
                    <div class="widget widget-card-four" style="background-color: #860292; padding: 20px 15px;">
                        <div class="widget-content">
                            <div>
                                <div class="w-info">
                                    <h6 class="value" style="color: #fff;">Security</h6>
                                    <p style="color: #fff; font-size: 13px;">Click here to update password</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
                    $user = $_SESSION['user'];
                    $statuss = 2;
                    $qev = "SELECT * FROM `renewal` WHERE `cust`='$user'";
                    $datav = $con->query($qev);
                    if($datav->num_rows > 0){
                        $droe = $datav->fetch_assoc();
                        $datee = $droe['datee'];
                        $rdatee = $droe['rdatee'];
                    }
                ?>

<a target="_blank" onclick="alert('Under Construction');" class="btn btn-primary" style="width: 100%; margin: 10px;">View My Website</a>

            



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