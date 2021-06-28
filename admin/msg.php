<?php
include('session.php');
include('../dash/db.php');
error_reporting(0);


if (isset($_POST['sendmsg'])){
    $message = $con->real_escape_string($_POST['message']);
    
    $date = date("d/m/Y");
    $userid = $con->real_escape_string($_POST['hidden-id']);
    
    $title = $con->real_escape_string($_POST['msgtitle']);
    
    $status = "1";
    
    $flag = "0";
    
    $que = "SELECT id FROM `owners`";
    $data = $con->query($que);
    if($data->num_rows > 0){
        while($rows = $data->fetch_assoc()){
            
            $cust = $rows['id'];
            
            $que = "INSERT INTO `notification`(`message`, `cust`, `date`, `status`, `title`, `flag`) VALUES ('$message', '$cust', '$date', '$status', '$title', '$flag')";
            $data_insert = $con->query($que);
        }
        echo "<script>alert('Meassge sent successfully'); window.location='msg'</script>";
    }else{
        echo "<script>alert('Failed to send message'); window.location='msg'</script>";
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
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">Messages</a></li>
						    </ol>
					</nav>
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    
                    <hr style="border: 1px solid;">
                        <p align="justify"><strong>Instruction :</strong> Send Messages in Bulk</p>
    				<hr style="border: 1px solid;">
    				
                    <form method="post">
                        <p>Title</p>
            		  
            		    <div class="form-group mb-4">
            
            		        <input type="text" name="msgtitle" class="form-control" id="product" placeholder="Title *" required="true">
            		    </div>
                        
                        
                        <p>Your Message</p>
            		  
            		    <div class="form-group mb-4">
            		        <input type='hidden' name="hidden-id" id="hidden-id" value="id" />
            		        <input type="text" name="message" class="form-control" id="product" placeholder="Message *" required="true">
            		    </div>
            		    
            		    <button type="submit" class="btn btn-primary mt-3" name="sendmsg" style="width: 100%;">Send</button>
            		    
            		</form>
                </div>

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6" style="background-color: #fff; padding: 10px;">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Store</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $flag = 0;
                                        $qe = "SELECT * `notification` where flag = '$flag' ORDER BY id DESC LIMIT 10";
                                        $data = $con->query($qe);
                                        $srno = 1;
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $cust = $rows['cust'];
                                                $title= $rows['title'];
                                                $msg = $rows['message'];
                                                $status = $rows['status'];
                                                $date = $rows['date'];
                                                
                                                
                                                echo '

                                                <tr>
                                                    <th>'.$id.'</th>
                                                    <th>'.$cust.'</th>
                                                    <th>'.$title.'</th>
                                                    <th>'.$msg.'</th>
                                                    <th>';
                                                    if($status == 1){
                                                        echo '<span style="color: red;">Didn\'t Read</span>';
                                                    }
                                                    else if($status == 0 || $status == ''){
                                                        echo '<span style="color: green;">Read</span>';
                                                    }
                                                    echo '</th>
                                                    <th>'.$date.'</th>
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