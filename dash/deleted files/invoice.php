<?php
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 


</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
   
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
            	<br>
                <div class="widget-heading">
                    <center><h5><?php print $_GET['name'];?>
                    <?php $status = $_GET['status'];?>
                    <?php 
                    if ($status == 0 OR $status == '') {
                        echo '
                        <div class="td-content" style="float: right; margin-right: 20px;"><span class="badge outline-badge-danger">Pending</span></div>
                        ';
                    }
                    else if ($status == 1) {
                        echo '<div class="td-content" style="float: right; margin-right: 20px;"><span class="badge outline-badge-primary">On The Way</span></div>';
                    }
                    else if ($status == 2) {
                        echo '<div class="td-content" style="float: right; margin-right: 20px;"><span class="badge outline-badge-success">Shipped</span></div>';
                    }
                    ?></h5></center>
                </div>
                <br>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Product</div></th>
                                    <th><div class="th-content">Price</div></th>
                                    <th><div class="th-content">Qty</div></th>
                                    <th><div class="th-content">Total</div></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                        $pro = $_GET['orderid'];
                                        $qe = "SELECT * FROM `orders` WHERE `orderid`='$pro'";
                                        $data = $con->query($qe);
                                        $total_price = 0;
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $product = $rows['product'];
                                                $price = $rows['price'];
                                                $qty = $rows['qty'];
                                                $total = $rows['total'];

                                                echo '
                                                	<tr>
					                                    <td>'.$product.'</td>
					                                    <td>'.$price.'</td>
					                                    <td>'.$qty.'</td>
					                                    <td>'.$total.'</td>
					                                </tr>
                                                ';

                                                $total_price = $total_price+$total;
                                            }
                                        }
                                        ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <table style="width: 100%; color: #000; border-top: 1px solid #969595; border-bottom: 1px solid #969595;">
                	<tr>
                		<th style="padding: 10px;">Total :</th>
                		<th style="float: right; padding: 10px;">₹ <?php print $total_price;?></th>
                	</tr>
                </table>
                <br>
                <div style="padding: 5px;">
                	<button class="btn btn-primary" style="width: 100%;" onclick="window.print()">Download</button>
                </div>
                <br>
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