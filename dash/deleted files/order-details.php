<?php
include('session.php');
include('db.php');

$prow = $_GET['orderid'];
$qew = "SELECT * FROM `paymode` WHERE `orderid`='$prow'";
$dataw = $con->query($qew);
if($dataw->num_rows > 0){
$rowsw = $dataw->fetch_assoc();
    $idw = $rowsw['id'];
    $gateway = $rowsw['gateway'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Details</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css"> 
    <style type="text/css">
    	@media print {
		    #printbtn {
		        display :  none;
		    }
		}
		@page {
		    size: auto;   /* auto is the initial value */
		    margin: 0;  /* this affects the margin in the printer settings */
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
            	<br>
                <div class="widget-heading">
                    <center>
                    <?php $status = $_GET['status'];?>
                    <?php
                    if ($status == 0 OR $status == '') {
                        echo '
                        <div class="td-content" style="width: 100%; margin-right: 20px;"><span class="badge outline-badge-danger" style="width:100%;">Pending</span></div>
                        ';
                    }
                    else if ($status == 1) {
                        echo '<div class="td-content" style="width: 100%; margin-right: 20px;"><span class="badge outline-badge-success" style="width:100%;">Shipped</span></div>';
                    }
                    else if ($status == 2) {
                        echo '<div class="td-content" style="width: 100%; margin-right: 20px;"><span class="badge outline-badge-primary" style="width:100%;">On The Way</span></div>';
                    }
                    else if ($status == 3) {
                        echo '<div class="td-content" style="width: 100%; margin-right: 20px;"><span class="badge outline-badge-danger" style="width:100%;">Cancel</span></div>';
                    }
                    ?>
                    <br>
                    <h3><?php print $cname; ?></h3>
                    <h6><?php print $caddress; ?></h6><br>
                    </center>
                    <br><h5><?php print $_GET['name'];?></h5>
                    <h6 style="font-size: 14px;"><?php print $_GET['orderid'];?></h6>
                    <h6 style="font-size: 14px;"><?php print $_GET['mobile'];?></h6>
                    <h6 style="font-size: 14px;"><?php print $_GET['address'];?> <?php print $_GET['pincode'];?></h6>
                    <!--<h6 style="font-size: 14px;"><strong>Payment Mode : </strong><?php print $gateway; ?></h6>
                    <h6 style="font-size: 14px;"><strong>Transaction ID : </strong><?php print $_GET['trid'];?></h6>-->
                </div>
                <br>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Product</div></th>
                                    <th><div class="th-content">Unit</div></th>
                                    <th><div class="th-content">Price</div></th>
                                    <!--<th><div class="th-content">Tax</div></th>-->
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
                                                $size = $rows['size'];
                                                $productid = $rows['productid'];
                                                
                                                if(empty($size) || $size == "0"){
                                                    $size = "N/A";
                                                }
                                                
                                                $qea = "SELECT * FROM `product` WHERE `id`='$productid'";
                                                $dataa = $con->query($qea);
                                                if($dataa->num_rows > 0){
                                                $rowsa = $dataa->fetch_assoc();
                                                    $itar = $rowsa['tax'];
                                                    $itax = $itar."%";
                                                }
                                                else {
                                                    $itax = 0;
                                                }
                                                
                                                if(empty($itax) || $itax == "%"){
                                                    $itax = "N/A";
                                                }
                                            
                                                $fprice = ($price/(($itax/100)+1));
                                                
                                                echo '
                                                	<tr>
					                                    <td>'.$product.'</td>
					                                    <td>'.$size.'</td>
					                                    <td>'.$fprice.'</td>
					                                    <!--<td>'.$itax.'</td>-->
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
                		<th style="padding: 10px;">Total Amount :</th>
                		<th style="float: right; padding: 10px; color: #000; margin-right: 5px;">₹ <?php echo $total_price;?></th>
                	</tr>
                </table>
                <br>
                <div style="padding: 5px;">
                	<button class="btn btn-primary" id="printbtn" style="width: 100%;" onclick="window.print()">Download Invoice</button>
                	<!-- <a target="_blank" href="https://api.whatsapp.com/send?phone=9588692013&test=Thank you for your order">
                		<button class="btn btn-success" style="background-color: #145601; border-color: #145601;">Send to Whatsapp</button>
                	</a> -->
                </div>
                <br>
                <div style="padding: 5px;">
                <?php
                if (isset($_POST['pending'])) {
                    $ststa = 0;
                    $update_q = "UPDATE `customer` SET `status`='$ststa' WHERE `orderid`='$pro'";
                    $update_data = $con->query($update_q);
                    if ($update_data) {
                        echo "<script>alert('Status Updated Successfully.');window.location='order';</script>";
                    }
                }
                if (isset($_POST['shipped'])) {
                    $ststa = 1;
                    $update_q = "UPDATE `customer` SET `status`='$ststa' WHERE `orderid`='$pro'";
                    $update_data = $con->query($update_q);
                    if ($update_data) {
                        echo "<script>alert('Status Updated Successfully.');window.location='order';</script>";
                    }
                }
                if (isset($_POST['way'])) {
                    $ststa = 2;
                    $update_q = "UPDATE `customer` SET `status`='$ststa' WHERE `orderid`='$pro'";
                    $update_data = $con->query($update_q);
                    if ($update_data) {
                        echo "<script>alert('Status Updated Successfully.');window.location='order';</script>";
                    }
                }
                if (isset($_POST['cancel'])) {
                    $ststa = 3;
                    $update_q = "UPDATE `customer` SET `status`='$ststa' WHERE `orderid`='$pro'";
                    $update_data = $con->query($update_q);
                    if ($update_data) {
                        echo "<script>alert('Status Updated Successfully.');window.location='order';</script>";
                    }
                }
                ?>
                <form method="post">
                	<button type="submit" name="pending" class="btn btn-danger" id="printbtn" style="width: 100%; background-color: #fd8729;border-color: #fd8729;">Order Pending</button>
                	<br>
                	<br>
                	<button type="submit" name="shipped" class="btn btn-success" id="printbtn" style="width: 100%;">Order Shipped</button>
                	<br>
                	<br>
                	<button type="submit" name="way" class="btn btn-primary" id="printbtn" style="width: 100%;">Order On The Way</button>
                	<br>
                	<br>
                    <button type="submit" name="cancel" class="btn btn-danger" id="printbtn" style="width: 100%;">Order Cancel</button>
                    <br>
                    <br>
                </form>
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