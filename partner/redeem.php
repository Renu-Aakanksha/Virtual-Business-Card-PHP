<?php
include('session.php');
include('../dash/db.php');
error_reporting(0);

if (isset($_POST['sendmsg'])){
    $name = $_POST['name'];
    $bname = $_POST['bname'];
    $acc = $_POST['acc'];
    $ifsc = $_POST['ifsc'];
    
    $date = date("d/m/Y");
    // $amoun_t = 0;
    $pid = $_SESSION['partner_ref'];
    $qe = "SELECT amount from `credits` where partner = '$pid' AND `status` = 0";
    $data = $con->query($qe);
    $rowww = $data->num_rows;
    if($rowww > 0){
        $req = 0;
        
        $qe = "SELECT MAX(req_no) AS max_req FROM `credits`";
        $data = $con->query($qe);
        $rowww = $data->num_rows;
        if($rowww > 0){
            $rows = $data->fetch_assoc();
            $temp = $rows['max_req'];
            if (!empty($temp)){
                $req = $temp;
            }
        }
        
        $req =  $req + 1;
        
        $qe = "Update `credits` set `redate` = '$date', `status` = 1, `req_no` = '$req', `acc_no` = '$acc', `name` = '$name', `bname` = '$bname', `ifsc` = '$ifsc'  where partner = '$pid' AND `status` = 0";
        $data = $con->query($qe);
        
        if ($data) {
            echo "<script>alert('Request Created successfully'); window.location='redeem'</script>";
        }else{
            echo "<script>alert('Request Failed'); window.location='redeem'</script>";
        }
    }else{
            echo "<script>alert('Not a single Credit is their for redemption'); window.location='redeem'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ecommerce Dashboard Home</title>
    <?php include('links.php');?>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="shortcut icon" href="https://www.industrialinfotech.com/images/favicon.png" />
    
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    

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
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">Credits</a></li>
						    </ol>
					</nav>
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6" style="background-color: #fff; padding: 10px;">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr NO.</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Requested On</th>
                                            <th>Redeem Date</th>
                                            <th>Status</th>
                                            <th>Req Id</th>
                                            <th>Name</th>
                                            <th>Acc No</th>
                                            <th>Bank Name</th>
                                            <th>IFSC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $pid = $_SESSION['partner_ref'];
                                        $qe = "SELECT * from `credits` where partner = '$pid' ORDER BY id DESC";
                                        $data = $con->query($qe);
                                        $srno = 1;
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $amount = $rows['amount'];
                                                $rdate = $rows['rdate'];
                                                $date = $rows['date'];
                                                $redate = $rows['redate'];
                                                $status = $rows['status'];
                                                $req = $rows['req_no'];
                                                $ifsc = $rows['ifsc'];
                                                $acc_no = $rows['acc_no'];
                                                $name = $rows['name'];
                                                $bname = $rows['bname'];
                                                
                                                echo '

                                                <tr>
                                                    <th>'.$id.'</th>
                                                    <th>'.$amount.'</th>
                                                    <th>'.$date.'</th>
                                                    <th>'.$redate.'</th>
                                                    <th>'.$rdate.'</th>
                                                    <th>';
                                                    if($status == 0 || $status == ''){
                                                        echo '<span style="color: red;">Pending</span>';
                                                    }
                                                    else if($status == 1){
                                                        echo '<span style="color: blue;">queue</span>';
                                                    }else if ($status == 2){
                                                        echo '<span style="color: green;">Redeem</span>';
                                                    }
                                                    echo '</th>
                                                    <th>'.$req.'</th>
                                                    <th>'.$name.'</th>
                                                    <th>'.$acc_no.'</th>
                                                    <th>'.$bname.'</th>
                                                    <th>'.$ifsc.'</th>
                                                </tr>                                              

                                                ';
                                                    
                        
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <a href="javascript:;" class="btn btn-primary mt-3" style="width: 100%;"  data-toggle="modal" data-target="#msg">Redeem All Pending Credits to Bank</a>
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
    
<div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="msg" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msg-title">Bank Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post">
            <p>Name</p>
		    <div class="form-group mb-4">
		        <input type="text" name="name" class="form-control"  placeholder="Acc Holder Name *" required="true">
		    </div>
            
            <p>Name Of Bank</p>
		    <div class="form-group mb-4">
		        <input type="text" name="bname" class="form-control"  placeholder="Name of Bank *" required="true">
		    </div>
		    
		    <p>Acc No</p>
		    <div class="form-group mb-4">
		        <input type="text" name="acc" class="form-control"  placeholder="Acc No *" required="true">
		    </div>
            
            <p>IFSC Code</p>
		    <div class="form-group mb-4">
		        <input type="text" name="ifsc" class="form-control"  placeholder="IFSC Code *" required="true">
		    </div>
		    
		    <button type="submit" class="btn btn-primary mt-3" name="sendmsg" style="width: 100%;">Request</button>
		    
		</form>
        
      </div>
    </div>
  </div>
</div>

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
    
    
    <script src="plugins/table/datatable/datatables.js"></script>
  <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
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
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>
</html>