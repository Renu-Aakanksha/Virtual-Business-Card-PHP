<?php 
include('session.php');
include('db.php');
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $userdel = $_SESSION['user'];

    $qd = "DELETE FROM `product` WHERE `id`='$delid'";
    $data_del = $con->query($qd);
    if ($data_del) {
        echo "<script>alert('Product Deleted Successfully!'); window.location='product';</script>";
    }
    else {
        echo "<script>alert('Failed To Delete Product!'); window.location='product';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Status</title>
    <?php include('links.php');?>
    <style type="text/css">
    	.dataTables_length {
    		display: none;
    	}
    	.feather-search {
    		display: none;
    	}
    </style>
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('header.php');?>
    </div>
    <!--  END NAVBAR  -->


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">

	                <div class="widget-content widget-content-area text-center">
	                	<nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Orders</a></li>
						    </ol>
						</nav>
					</div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="padding: 0px;">
                        
         <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong> You can see the "Order Details" you get from your valuable customers.
        After clicking on the icon of Action you can - "Update the Order Status" and even download the Invoice.
        <hr style="border: 1px solid;">
                        
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user = $_SESSION['user'];
                                        $qe = "SELECT * FROM `customer` WHERE `cust`='$user' ORDER BY id DESC";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $name = $rows['name'];
                                                $status = $rows['status'];
                                                $orderid = $rows['orderid'];
                                                $mobile = $rows['mobile'];
                                                $address = $rows['address'];
                                                $pincode = $rows['pincode'];
                                                $trid = $rows['trid'];
                                                

                                                echo '

                                                <tr>
                                                    <td>'.$name.'</td>
                                                    <td>';
                                                    if ($status == 0 OR $status == '') {
                                                        echo '
                                                        <div class="td-content"><span class="badge outline-badge-danger">Pending</span></div>
                                                        ';
                                                    }
                                                    else if ($status == 1) {echo '<div class="td-content"><span class="badge outline-badge-success">Shipped</span></div>';
                                                    }
                                                    else if ($status == 2) {
                                                        echo '<div class="td-content"><span class="badge outline-badge-primary">On The Way</span></div>';
                                                    }
                                                    else if ($status == 3) {
                                                        echo '
                                                        <div class="td-content"><span class="badge outline-badge-danger">Cancel</span></div>
                                                        ';
                                                    }


                                                    echo '</td>
                                                    <td><center><a href="order-details?name='.$name.'&status='.$status.'&orderid='.$orderid.'&mobile='.$mobile.'&address='.$address.'&pincode='.$pincode.'&trid='.$trid.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" "><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></center>
                                                    </td>
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
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>