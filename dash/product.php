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
    <title>View Product Details</title>
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
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Products</a></li>
						    </ol>
						</nav>
					</div>
					
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                    
        <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong> View of "Product" details you entered. 
        Click on "Action" icon to view in details, edit or delete these product details.
        <hr style="border: 1px solid;">
            
                        <div class="widget-content widget-content-area br-6">
                            
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                       
                                        <?php
                                        $user = $_SESSION['user'];
                                        $qe = "SELECT * FROM `product` WHERE `cust`='$user'";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $product = $rows['product'];
                                                $category = $rows['category'];
                                                $subcategory = $rows['subcategory'];
                                                $price = $rows['price'];
                                                $sellprice = $rows['sellprice'];
                                                $qty = $rows['qty'];
                                                $dis = $rows['dis'];
                                                $display = $rows['display'];
                                                $image = $rows['image'];
                                                $cust = $rows['cust'];
                                                $datee = $rows['datee'];
                                                $uni = $rows['uni'];
                                                $tax = $rows['tax'];
                                                $url = $rows['url'];
                                                $title = $rows['title'];

                                                echo '

                                                <tr>
                                                    <td>'.$product.'</td>
                                                    <td>'.$sellprice.'</td>
                                                    <td><center><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" data-toggle="modal" data-target="#g'.$id.'"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></center>
                                                    </td>
                                                </tr>



<!-- Modal -->
<div class="modal fade" id="g'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">'.$product.'</h5>
            </div>

            <div class="modal-body">
                <p class="modal-text">
                    <h6><strong>Product Name : </strong>'.$product.'</h6>
                    <h6><strong>Selling Price : </strong>'.$sellprice.'</h6>
                    <h6><strong>Discription : </strong>'.$dis.'</h6>
                    <h6><strong>URL : </strong>'.$url.'</h6>
                    <h6><strong>Button : </strong>'.$title.'</h6>
                    <br>
                    <center><img src="images/'.$image.'" style="width: 65%;"></center>
                    <br>
                    <br>
                    <a href="product?delid='.$id.'"><button class="btn btn-danger">Delete</button></a>
                    <a href="add-product?type=1&img='.$image.'&uni='.$uni.'&tax='.$tax.'&ide='.$id.'&product='.$product.'&id='.$category.'&category='.$subcategory.'&price='.$price.'&sellprice='.$sellprice.'&qty='.$qty.'&dis='.$dis.'&display='.$display.'&url='.$url.'&title='.$title.'"><button class="btn btn-success">Edit</button></a>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                                                ';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </tfoot>
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