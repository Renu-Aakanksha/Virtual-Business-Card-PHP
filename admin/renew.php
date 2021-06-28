<?php 
include('session.php');
include('../dash/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php include('links.php');?>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>

    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    
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

	                	<nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">Renewal</a></li>
						    </ol>
						</nav>

							

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <?php
                        if(isset($_POST['renew'])){
                            $cust = $_POST['cust'];
                            $day = $_POST['day'];
                            $month = $_POST['month'];
                            $year = $_POST['year'];
                            $datee = $day.'/'.$month.'/'.$year;
                            
                            
                            if(empty($day) || empty($month) || empty($year)){
                                echo "<script>alert('Faild To Renew, Day or Month or Year cant be empty.'); window.location='renew'</script>";
                                die();
                            }
                            
    						$qqe = "UPDATE `renewal` SET `rdatee`='$datee' WHERE `cust`='$cust'";
    						$datain = $con->query($qqe);
    						
    						if($datain){
    						    echo "<script>alert('Renewal Successfully.'); window.location='renew'</script>";
    						}
    						else {
    						    echo "<script>alert('Faild To Renew.'); window.location='renew'</script>";
    						}
                        }
                        ?>
                    	<form method="post">
                    	        <div class="form-group mb-4">
							        <input type="number" class="form-control" id="rEmail" placeholder="Store ID *" <?php if(isset($_GET['id'])){echo 'value="'.$_GET['id'].'"';}?> name="cust" required="true">
							    </div>
							    <div class="form-group mb-4">
							        <input type="number" class="form-control" id="rEmail" placeholder="Day *" name="day" required="true">
							    </div>
							    <div class="form-group mb-4">
							        <input type="number" class="form-control" id="rEmail" placeholder="Month *" name="month" required="true">
							    </div>
							    <div class="form-group mb-4">
							        <input type="number" class="form-control" id="rEmail" placeholder="Year *" name="year" required="true">
							    </div>
							   
							    <button type="submit" class="btn btn-primary" style="width: 100%;" name="renew">Renew Store</button>
						</form>
						<br>
                    </div>
                    
                    
                    

                </div>
                
                <!--  BEGIN CONTENT PART  -->
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6" style="background-color: #fff; padding: 10px;">
                                    <div class="table-responsive mb-4 mt-4">
                                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Store ID</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Date</th>
                                                    <th>Re-Date</th>
                                             <!--  <th>L-Key</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                $qe = "SELECT * FROM `owners` ORDER BY `id` DESC";
                                                $data = $con->query($qe);
                                                $srno = 1;
                                                if($data->num_rows > 0){
                                                    while($rows = $data->fetch_assoc()){
                                                        $id = $rows['id'];
                                                        $name = $rows['name'];
                                                        $address = $rows['address'];
                                                        $cname = $rows['cname'];
                                                        $mobile = $rows['mobile'];
                                                        $wmobile = $rows['whatsapp'];
                                                        $email = $rows['email'];
                                                        $aadhaar = $rows['aadhaar'];
                                                        $status = $rows['status'];
                                                        $date = $rows['datee'];
        
                                                        $qew = "SELECT * FROM `renewal` WHERE `cust`='$id' ORDER BY `id` DESC";
                                                        $dataw = $con->query($qew);
                                                        if($dataw->num_rows > 0){
                                                            $datarw = $dataw->fetch_assoc();
                                                            $adatee = $datarw['datee'];
                                                            $rdatee = $datarw['rdatee'];
                                                            $lkey = $datarw['lkey'];
                                                        }
                                                        
                                                        $qusde = "SELECT * FROM `refnote` WHERE `cust`='$id'";
                										$datasde = $con->query($qusde);
                										if ($datasde->num_rows > 0) {
                											$rowsdde = $datasde->fetch_assoc();
                											
                											$nide = $rowsdde['id'];
                											$rnote = $rowsdde['message'];
                										}
                										
                										$ren = $rdatee;
                                                		$renewald = substr($ren,0,2);
                                                		$renewalm = substr($ren,3,2);
                                                		$renewaly = substr($ren,6,4);
                                                		
                                                		/*$cdated = date("d");
                                                		$cdatem = date("m");
                                                		$cdatey = date("Y");*/
                                                		
                                                		$ren2 = date("d/m/Y", strtotime("+10 day"));
                                                		$cdated = substr($ren2,0,2);
                                                		$cdatem = substr($ren2,3,2);
                                                		$cdatey = substr($ren2,6,4);
                                                	
                                                		
                                                		if($renewald < $cdated && $renewalm <= $cdatem && $renewaly <= $cdatey){
                                                		    echo '
        
                                                                <tr>
                                                                    <th>'.$srno.'</th>
                                                                   
                                                                    <th>'.$id.'</th>
                                                                    <th>'.$name.'</th>
                                                                    <th>'.$mobile.'</th>
                                                                    
                                                                    <th>'.$adatee.'</th>
                                                                    <th>'.$rdatee.'</th>
                                                                <!-- <th>'.$lkey.'</th> -->
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="renew?id='.$id.'"><button type="button" class="btn btn-dark btn-sm">Renew</button></a>
                                                                          
                                                                          </div>
                                                                    </td>
                                                                </tr>                                              
                
                                                            ';
                                                		}
                                                		else if($renewalm < $cdatem && $renewaly <= $cdatey){
                                                		    echo '
        
                                                        <tr>
                                                            <th>'.$srno.'</th>
                                                            <th>'.$id.'</th>
                                                            <th>'.$name.'</th>
                                                            <th>'.$mobile.'</th>
                                                            
                                                            <th>'.$adatee.'</th>
                                                            <th>'.$rdatee.'</th>
                                                        <!-- <th>'.$lkey.'</th> -->
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="renew?id='.$id.'"><button type="button" class="btn btn-dark btn-sm">Renew</button></a>
                                                                  
                                                                  </div>
                                                            </td>
                                                        </tr>                                              
        
                                                        ';
                                                		}
                                                		else if($renewaly < $cdatey){
                                                		    echo '
        
                                                        <tr>
                                                            <th>'.$srno.'</th>
                                                            <th>'.$id.'</th>
                                                            <th>'.$name.'</th>
                                                            <th>'.$mobile.'</th>
                                                            
                                                            <th>'.$adatee.'</th>
                                                            <th>'.$rdatee.'</th>
                                                        <!-- <th>'.$lkey.'</th> -->
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="renew?id='.$id.'"><button type="button" class="btn btn-dark btn-sm">Renew</button></a>
                                                                  
                                                                  </div>
                                                            </td>
                                                        </tr>                                              
        
                                                        ';
                                                		}
                                                		else {
                                                		    
                                                		}
                										
                                                        
                                                        $srno++;
                                                        
                                                        $id = '';
                                                        $name = '';
                                                        $address = '';
                                                        $cname = '';
                                                        $mobile = '';
                                                        $wmobile = '';
                                                        $email = '';
                                                        $aadhaar = '';
                                                        $status = '';
                                                        $date = '';
                                                        $rnote = '';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                </div>
                <!--  END CONTENT PART  -->
        
        </div>
            
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

     <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    
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