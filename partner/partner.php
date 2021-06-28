<?php
include('session.php');
include('../dash/db.php');
error_reporting(0);
if(isset($_GET['action'])){
    $action = $_GET['action'];
    $acid = $_GET['id'];
    if($action == "a"){
        $ac_update = $con->query("UPDATE `reseller` SET `status`='1' WHERE `id`='$acid'");
        if($ac_update){
            echo "<script>window.location='https://api.whatsapp.com/send?phone=+".$_GET['num']."&text=Auto-generated messege : %0a%0a*Congratulation !!* Your Partner Account for *Online Visiting Cards cum Portable Website* has been activated. %0a%0a*For any query please contact our service team.*';</script>";
        }
    }
    else if($action == "d"){
        $ac_update = $con->query("UPDATE `reseller` SET `status`='0' WHERE `id`='$acid'");
    }
    
    if($ac_update){
        echo "<script>alert('Updated Successfully.'); window.location='partner'</script>";
    }
}
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $ac_updatew = $con->query("DELETE FROM `reseller` WHERE `id`='$delid'");
    $ac_updatew2 = $con->query("DELETE FROM `reseller` WHERE `cust`='$delid'");
    if($ac_updatew && $ac_updatew2){
        echo "<script>alert('Deleted Successfully.'); window.location='partner'</script>";
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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6" style="background-color: #fff; padding: 10px;">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Business</th>
                                            <th>NOB</th>
                                            <th>Partner</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Whatsapp</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $qe = "SELECT * FROM `reseller` ORDER BY `id` DESC";
                                        $data = $con->query($qe);
                                        $srno = 1;
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $name = $rows['name'];
                                                $partner= $rows['partner'];
                                                $cname = $rows['cname'];
                                                $cat = $rows['cat'];
                                                $mobile = $rows['mobile'];
                                                $wmobile = $rows['wmobile'];
                                                $email = $rows['email'];
                                                $status = $rows['status'];
                                                $date = $rows['datee'];
                                                
                                                
                                                echo '

                                                <tr>
                                                    <th>'.$id.'</th>
                                                    <th>'.$name.'</th>
                                                    <th>'.$cname.'</th>
                                                    <th>'.$cat.'</th>
                                                    <th>'.$partner.'</th>
                                                    <th>'.$email.'</th>
                                                    <th>'.$mobile.'</th>
                                                    <th>'.$wmobile.'</th>
                                                    <th>';
                                                    if($status == 0 || $status == ''){
                                                        echo '<span style="color: red;">De-Active</span>';
                                                    }
                                                    else if($status == 1){
                                                        echo '<span style="color: green;">Active</span>';
                                                    }
                                                    echo '</th>
                                                    <th>'.$date.'</th>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#"><button type="button" class="btn btn-dark btn-sm">Action</button></a>
                                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                              <a class="dropdown-item" href="partner?action=a&id='.$id.'&num='.$wmobile.'">Active</a>
                                                              <a class="dropdown-item" href="partner?action=d&id='.$id.'">De-Active</a>
                                                              
                                                              
                                                              <div class="dropdown-divider"></div>
                                                              <a class="dropdown-item" href="partner?delid='.$id.'">Delete</a>
                                                            </div>
                                                          </div>
                                                    </td>
                                                </tr>                                              

                                                ';
                                                    
                                                    
                                                // $srno++;
                                                
                                                // $id = '';
                                                // $name = '';
                                                // $address = '';
                                                // $cname = '';
                                                // $mobile = '';
                                                // $wmobile = '';
                                                // $email = '';
                                                // $aadhaar = '';
                                                // $status = '';
                                                // $date = '';
                                                // $rnote = '';
                                                // $pproduct = '';
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