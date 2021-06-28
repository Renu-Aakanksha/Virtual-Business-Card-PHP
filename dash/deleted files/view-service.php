<?php ?>
<?php 
include('session.php');
include('db.php');
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $userdel = $_SESSION['user'];

    $qd = "DELETE FROM `blog` WHERE `id`='$delid'";
    $data_del = $con->query($qd);
    if ($data_del) {
        echo "<script>alert('Deleted Successfully!'); window.location='view-service';</script>";
    }
    else {
        echo "<script>alert('Failed To Delete!'); window.location='view-service';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Blog</title>
    <?php include('links.php');?>
    <style type="text/css">
    	.dataTables_length {
    		display: none;
    	}
    	.feather-search {
    		display: none;
    	}
    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <br>
                <nav class="breadcrumb-two" aria-label="breadcrumb">
				    <ol class="breadcrumb">
				        <li class="breadcrumb-item"><a href="index">Home</a></li>
				        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;View Services</a></li>
				    </ol>
				</nav>
				
                <div class="row layout-top-spacing">

	                	

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        
        <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong> View "Services" details you entered. Click on "Action" icon to view in details, edit, delete or even publish your Service content.
        <hr style="border: 1px solid;">
                        
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_POST['edit'])){
                                            $ids = $_POST['id'];
                                            $titles = $_POST['title'];
                                            $diss = $_POST['dis'];
                                            $locations = $_POST['location'];
										    header("location:blog?id='.$ids.'&title='.$titles.'&dis='.$diss.'&location='.$locations.'");
										}
                                        ?>
                                        <?php
                                        $user = $_SESSION['user'];
                                        $qe = "SELECT * FROM `blog` WHERE `cust`='$user' ORDER BY `id` DESC";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $title = $rows['title'];
                                                $dis = $rows['dis'];
                                                $image = $rows['image'];
                                                $datee = $rows['datee'];

                                                echo '

                                                <tr style="background-color: white;">
                                                    <td colspan="2">'.$title.'</td>
                                                    <td class="row">
                                                    <center>
                                                    <a href="service?id='.$id.'&user='.$user.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" data-toggle="modal" data-target="#g'.$id.'"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>


                                                    <a href="view-service?delid='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                                    </center>
                                                    </td>
                                                </tr>


<!-- Modal -->
<div class="modal fade" id="g'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">'.$title.'</h5>
            </div>

            <div class="modal-body">
                <p class="modal-text">
                    <center><img src="images/'.$image.'" style="width: 65%;"></center>
                    <br>
                    <h6><strong>Service Title : </strong>'.$title.'</h6>
                    <h6><strong>Date : </strong>'.$datee.'</h6>
                    <h6><strong>Service Discription : </strong>'.$dis.'</h6>
                    <br>
                  
                   
					
                   
                </p>
                
                
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
    
    
    <script>
        function myFunction() {
          /* Get the text field */
          var copyText = document.getElementById("myInput");
        
          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        
          /* Copy the text inside the text field */
          document.execCommand("copy");
        
          /* Alert the copied text */
          alert("Copied the text: " + copyText.value);
        }
    </script>
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