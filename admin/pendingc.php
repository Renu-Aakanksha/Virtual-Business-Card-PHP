<?php
include('session.php');
include('../dash/db.php');
error_reporting(0);

if (isset($_GET['id'])){
    $req = $_GET['id'];
    $date = date("d/m/Y");
    
    // $amoun_t = 0;
    // $qe = "SELECT amount from `credits` where partner = '$pid' AND `status` = 1";
    // $data = $con->query($qe);
    // $rowww = $data->num_rows;
    // if($rowww > 0){
        // while($rows = $data->fetch_assoc()){
        //     $amoun_t = $amoun_t + $rows['amount'];
        // }

        
        $qe = "Update `credits` set `rdate` = '$date', `status` = 2  where `req_no` = '$req'";
        $data = $con->query($qe);
        
        if ($data) {
            echo "<script>alert('Request Successfully Completed'); window.location='pendingc'</script>";
        }else{
            echo "<script>alert('Request Failed'); window.location='pendingc'</script>";
        }
    // }else{
    //         echo "<script>alert('Not a single Credit is their for redemption'); window.location='pendingc'</script>";
    // }
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
                                            <th>REQ NO.</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Bank Name</th>
                                            <th>Acc No</th>
                                            <th>IFSC</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                    
                                        $qe = "SELECT MIN(req_no) AS min_req FROM `credits` where `status` = 1";
                                        $data = $con->query($qe);
                                        $rowww = $data->num_rows;
                                        if($rowww > 0){
                                            $rows = $data->fetch_assoc();
                                            $temp = $rows['min_req'];
                                            if (!empty($temp)){
                                                $reqmin = $temp;
                                            }
                                        }
        
                                        $qe = "SELECT MAX(req_no) AS max_req FROM `credits` where `status` = 1";
                                        $data = $con->query($qe);
                                        $rowww = $data->num_rows;
                                        if($rowww > 0){
                                            $rows = $data->fetch_assoc();
                                            $temp = $rows['max_req'];
                                            if (!empty($temp)){
                                                $reqmax = $temp;
                                            }
                                        }
                                        
                                        if ($reqmin) {
                                            $srno = 0;
                                            while ($reqmin <= $reqmax){
                                                $amoun_t = 0;
                                                
                                                $qe = "SELECT * from `credits` where req_no = '$reqmin' AND `status` = 1";
                                                $data = $con->query($qe);
                                                if($data->num_rows > 0){
                                                    $srno = $srno + 1;
                                                    while($rows = $data->fetch_assoc()){
                                                        $amoun_t = $amoun_t + $rows['amount'];
                                                        $partner = $rows['partner'];
                                                        $ifsc = $rows['ifsc'];
                                                        $acc_no = $rows['acc_no'];
                                                        $name = $rows['name'];
                                                        $bname = $rows['bname'];
                                                        $date = $rows['redate'];
                                                    }
                                                    
                                                    echo '
                                                    <tr>
                                                        <th>'.$reqmin.'</th>
                                                        <th>'.$amoun_t.'</th>
                                                        <th>'.$date.'</th>
                                                        <th>'.$name.'</th>
                                                        <th>'.$bname.'</th>
                                                        <th>'.$acc_no.'</th>
                                                        <th>'.$ifsc.'</th>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="#"><button type="button" class="btn btn-dark btn-sm">Action</button></a>
                                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                                  <a class="dropdown-item" href="pendingc?id='.$reqmin.'">Completed</a>
                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>  ';
                                                }
                                                
                                                $reqmin = $reqmin + 1;
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