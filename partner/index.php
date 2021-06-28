<?php
include('session.php');
include('../dash/db.php');

if (isset($_POST['wall'])){
    $price = $con->real_escape_string($_POST['wallb']);

    $pid = $_SESSION['partner'];
    
    $que = "Update `reseller` Set `price` = '$price' Where reseller.id = '$pid' = 1";
    $data_insert = $con->query($que);

    if ($data_insert) {
        echo "<script>alert('Price Updated successfully'); window.location='index';</script>";
    }else{
        echo "<script>alert('Failed to Update'); window.location='index';</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Partner Dashboard Home</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 
    <link rel="shortcut icon" href="https://www.industrialinfotech.com/images/favicon.png" />
    <link href="assets/css/elements/infobox.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <style>
    
    .small-box>.small-box-footer {
            background: rgba(0, 0, 0, 0.1);
            color: rgba(255, 255, 255, 0.8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }

        .bg-info,
        .bg-info>a {
            color: #fff !important;
        }

        .small-box .icon>i.ion {
            font-size: 70px;
            top: 20px;
        }

        .small-box .icon {
            color: rgba(0, 0, 0, .15);
            z-index: 0;
        }

        .small-box h3,
        .small-box p {
            z-index: 5;
        }

        .small-box h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0 0 0 0;
            padding: 0;
            white-space: nowrap;
        }

        .small-box:hover {
            text-decoration: none;
        }

        .bg-info,
        .bg-info>a {
            color: #fff !important;
        }

        .bg-info {
            background-color: #17a2b8 !important;
        }

        .small-box {
            border-radius: .25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            display: block;
            position: relative;
        }
        /* .fir{
            width: 540px;
            margin-left: 19px;
           
        } */
        /* .sec{
            margin-left: 169px;
            width: 540px;
        } */


        .small-box>.inner {
            padding: 10px;
        }

        .inner> h5, .inner> p {
            color: white;
        }
        .small-box .icon>i {
            font-size: 90px;
            position: absolute;
            right: 15px;
            top: 15px;
            transition: all .3s linear;
        }

        .small-box p {
            z-index: 5;
        }

        .small-box p {
            font-size: 1rem;
        }
        
        .bg-gradient-info {
            background: linear-gradient(180deg, rgba(30,23,156,1) 0%, rgba(22,22,218,1) 73%, rgba(23,23,217,1) 74%, rgba(45,45,189,1) 96%);
        }
    
        .bg-gradient-warning {
           background: linear-gradient(0deg, rgba(189,78,0,1) 6%, rgba(222,92,0,1) 54%, rgba(255,119,23,1) 89%);
        }
        
        .bg-gradient-success {
            background: linear-gradient(0deg, rgba(3,103,30,1) 6%, rgba(2,123,34,1) 18%, rgba(0,166,44,1) 46%);
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

                <div class="row">
                    
                    <div class="col-lg-3 pr-0">
                    <!-- small box -->
                        <div class="small-box bg-gradient-info">
                            <div class="inner w-100">
                            <?php 
                                $pid = $_SESSION['partner'];
                                 $qe = "SELECT * FROM `owners` INNER JOIN `reseller` ON owners.ref = reseller.partner where reseller.id = '$pid' ORDER BY owners.id DESC";
                                 $data = $con->query($qe);
                                 $rows = $data->num_rows;
                             ?>
                                <h5>Total Users</h5>
                                <p><?php echo $rows; ?></p>
                            </div>
                            <div class="icon" style="margin: 20px; color:#f1f2f3;">
                                
                                <i class="ion ion-android-desktop"></i>
                            </div>
                            <a href="javascript:;" class="small-box-footer" id="total_btn" style="color:white;">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
    
                    <div class="col-lg-3 w-100 pr-0 pl-3">
                        <!-- small box -->
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <?php 
                                    $pid = $_SESSION['partner'];
                                     $qe = "SELECT * FROM `owners` INNER JOIN `reseller` ON owners.ref = reseller.partner where reseller.id = '$pid' AND owners.status = 1 ORDER BY owners.id DESC";
                                     $data = $con->query($qe);
                                     $rows = $data->num_rows;
                                ?>
                                
                                <h5>Active Users</h5>
                                <p><?php echo $rows; ?></p>
                            </div>
                            <div class="icon"  style="margin: 20px; color:#f1f2f3;">
                                <i class="ion ion-android-desktop"></i>
                            </div>
                            <a href="javascript:;" id="active_btn" class="small-box-footer" style="color:white;">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 w-100 pr-0 pl-3">
                        <!-- small box -->
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <?php 
                                    $pid = $_SESSION['partner'];
                                     $qe = "SELECT * FROM `owners` INNER JOIN `reseller` ON owners.ref = reseller.partner where reseller.id = '$pid' AND owners.status = 0 ORDER BY owners.id DESC";
                                     $data = $con->query($qe);
                                     $rows = $data->num_rows;

                                ?>
                                <h5>Inactive Users</h5>
                                <p><?php echo $rows; ?></p>
                            </div>
                            <div class="icon" style="margin: 20px; color:#f1f2f3;">
                                <i class="ion ion-android-desktop"></i>
                            </div>
                            <a href="javascript:;" id="inactive_btn" class="small-box-footer" style="color:white;">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 w-100">
                        <!-- small box -->
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <?php 
                                    $qe = "SELECT price FROM `admin` LIMIT 1";
                                     $data = $con->query($qe);
                                     $rows = $data->fetch_assoc();
                                     $aprice = $rows['price'];
                                
                                     $pid = $_SESSION['partner'];
                                     $qe = "SELECT price FROM `reseller` Where reseller.id = '$pid' Limit 1";
                                     $data = $con->query($qe);
                                     $rows = $data->fetch_assoc();
                                ?>
                                <h5>Card Price</h5>
                                <p>Reseller Rs. <?php echo $aprice; ?></p>
                                <p style="margin-bottom:-24px;">Retail Rs. <?php echo $rows['price']; ?></p>
                            </div>
                            <div class="icon" style="margin: 20px; color:#f1f2f3;">
                                <i class="ion ion-android-desktop"></i>
                            </div>
                            <a href="javascript:;" id="inactive_btn" class="small-box-footer" style="color:white;" data-toggle="modal" data-target="#wallll">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing1">
                        <div class="widget widget-table-two" style="padding: 15px;">

                            <div class="widget-heading">
                                <center><h5>Recent Sign-Up's</h5></center>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Business Name</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $daydatee = date("d/m/Y");
                                        $pid = $_SESSION['partner'];
                                        $qe = "SELECT owners.id as oid,
                                        owners.name as oname,
                                        owners.address as oaddress,
                                        owners.cname as ocname,
                                        owners.mobile as omobile,
                                        owners.whatsapp as owhatsapp,
                                        owners.email as oemail,
                                        owners.aadhaar as oaadhaar,
                                        owners.status as ostatus,
                                        owners.datee as odatee,
                                        owners.url as ourl
                                        FROM `owners` INNER JOIN `reseller` ON owners.ref = reseller.partner where reseller.id = '$pid' ORDER BY owners.id DESC limit 10";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['oid'];
                                                $name = $rows['oname'];
                                                $cname = $rows['ocname'];
                                                $mobile = $rows['omobile'];
                                                $status = $rows['ostatus'];
                                                $date = $rows['odatee'];
                                                

                                                echo '

                                                <tr>
                                                    <td>'.$name.'</td>
                                                    <td>'.$cname.'</td>
                                                    <td>'.$mobile.'</td>
                                                    <td>';
                                                    if ($status == 0 OR $status == '') {
                                                        echo '
                                                        <div class="td-content"><span class="badge outline-badge-danger">De-Active</span></div>
                                                        ';
                                                    }
                                                    else if ($status == 1) {echo '<div class="td-content"><span class="badge outline-badge-success">Active</span></div>';
                                                    }
                                                    

                                                    echo '</td>
                                                    <td>'.$date.'</td>
                                                    
                                                </tr>

';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->


<div class="modal fade" id="wallll" tabindex="-1" role="dialog" aria-labelledby="trans" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msg-title">Set Card Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post">

            <p>Amount</p>
		  
		    <div class="form-group mb-4">
		        <input type="number" name="wallb" class="form-control" id="product" placeholder="Price *" required="true">
		    </div>
		    
		    <button type="submit" class="btn btn-primary mt-3" name="wall" style="width: 100%;">Set</button>
		    
		</form>
        
      </div>
    </div>
  </div>
</div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
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