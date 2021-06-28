<?php 
include('session.php');
include('db.php');

if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $userdel = $_SESSION['user'];

    $qd = "DELETE FROM `feedback` WHERE `id`='$delid'";
    $data_del = $con->query($qd);
    if ($data_del) {
        echo "<script>alert('Deleted Successfully!'); window.location='feedback';</script>";
    }
    else {
        echo "<script>alert('Failed To Delete!'); window.location='feedback';</script>";
    }
}

if (isset($_GET['upid'])) {
    $delid = $_GET['upid'];
    $updatedd = $_GET['up'];
    $userdel = $_SESSION['user'];
    if($updatedd == 1){
        $updatedd = 0;
    }else{
        $updatedd = 1;
    }

    $qd = "UPDATE `feedback` SET `type`='$updatedd' WHERE `id`='$delid'";
    $data_del = $con->query($qd);
    if ($data_del) {
        echo "<script>alert('Updated Successfully!'); window.location='feedback';</script>";
    }
    else {
        echo "<script>alert('Failed To Update!'); window.location='feedback';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Feedback</title>
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
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Customer Feedback</a></li>
						    </ol>
						</nav>
					</div>
					
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                    
        <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction : You can control the "Customer Feedback" sent from your website feedback page by clicking on action button. </strong>from the
        <hr style="border: 1px solid;">
            
                        <div class="widget-content widget-content-area br-6">
                            
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th><center>Designation</center></th>
                                            <th><center>Email</center></th>
                                            <th><center>Message</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

            <?php
            $user = $_SESSION['user'];
            $quv = "SELECT * FROM `feedback` WHERE `cust`='$user'";
        	$datav = $con->query($quv);
        	if ($datav->num_rows > 0) {
        		while ($rowsv = $datav->fetch_assoc()) {
        			$bidv = $rowsv['id'];
        			$bidvname = $rowsv['name'];
        			$bidvdesi = $rowsv['desi'];
        			$bidvemail = $rowsv['email'];
        			$bidvmessage = $rowsv['message'];
        			$bidvtype = $rowsv['type'];
        			
        			?>
        			<tr>
                        <td><?php echo $bidvname;?></td>
                        <td><?php echo $bidvdesi;?></td>
                        <td><?php echo $bidvemail;?></td>
                        <td><?php echo $bidvmessage;?></td>
                        <td>
                            <a href="feedback?upid=<?php echo $bidv;?>&up=<?php echo $bidvtype;?>"><button class="btn <?php if($bidvtype == 1){ echo "btn-success"; }else{ echo "btn-primary"; } ?>">Show As Feedback</button></a>
                            <a href="feedback?delid=<?php echo $bidv;?>"><button class="btn btn-danger">DEL</button></a>
                            </td>
                    </tr>
        			<?php
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