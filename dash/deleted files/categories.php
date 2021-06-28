<?php 
include('session.php');
include('db.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
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
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Categories</a></li>
						    </ol>
						</nav>
					</div>

				   <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <?php
                        if(isset($_POST['catsub'])){
                            $category = $_POST['category'];
                            $parent = $_POST['parent'];
                            $user = $_SESSION['user'];
                            
                            if(empty($category)){
                                echo "<script>alert('Faild To Add Category, Category cant be empty.'); window.location='categories'</script>";
                                die();
                            }
                            
    						$qqe = "INSERT INTO `category`(`category`, `parent`, `cust`) VALUES ('$category','$parent','$user')";
    						$datain = $con->query($qqe);
    						
    						if($datain){
    						    echo "<script>alert('Category Added Successfully.'); window.location='categories'</script>";
    						}
    						else {
    						    echo "<script>alert('Faild To Add Category.'); window.location='categories'</script>";
    						}
                        }
                        if(isset($_GET['delid'])){
                            $del = $_GET['delid'];
                            $qqede = "DELETE FROM `category` WHERE `id`='$del'";
    						$datainde = $con->query($qqede);
    						
    						if($datainde){
    						    echo "<script>alert('Category Deleted Successfully.'); window.location='categories'</script>";
    						}
    						else {
    						    echo "<script>alert('Faild To Delete Category.'); window.location='categories'</script>";
    						}
                        }
                        if(isset($_POST['upsub'])){
                            $did = $_GET['id'];
                            $dcat = $_POST['category'];
                            
                            
                            $qqede = "UPDATE `category` SET `category`='$dcat' WHERE `id`='$did'";
    						$datainde = $con->query($qqede);
    						
    						if($datainde){
    						    echo "<script>alert('Updated Successfully.'); window.location='categories'</script>";
    						}
    						else {
    						    echo "<script>alert('Faild To Update Category.'); window.location='categories'</script>";
    						}
                        }
                        ?>
                        
                            <hr style="border: 1px solid;">
                            <p align="justify"><strong>Instruction :</strong> Add Categories of your Products below. For Example : in "Grocery -> Salt -> Tata Salt" The Grocey is Category,
                            the Salt is Sub-Category and the name Tata Salt is product name.</p>
							<hr style="border: 1px solid;">	
                        
                        
                    	<form method="post">
							    <div class="form-group mb-4">
							        <input type="text" class="form-control" id="rEmail" <?php if(isset($_GET['cat'])){echo 'value="'.$_GET['cat'].'"';}?> placeholder="Category Name *" name="category">
							    </div>
							    
								<input type="hidden" name="parent" value="0">
							  
							    <button type="submit" class="btn btn-primary" style="width: 100%;"  <?php if(isset($_GET['cat'])){echo 'name="upsub"';}else{echo 'name="catsub"';}?>><?php if(isset($_GET['cat'])){echo 'Update';}else{echo 'Add Category';}?></button>

							</form>
							<br>
							<hr style="border: 1px solid;">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
			    						$user = $_SESSION['user'];
			    						$qef = "SELECT * FROM `category` WHERE `cust`='$user' AND `parent`='0' ORDER BY `id` DESC";
			    						$dataf = $con->query($qef);
			    						if($dataf->num_rows > 0){
			    						    while($rowsf = $dataf->fetch_assoc()){
			    						        $catid = $rowsf['id'];
			    						        $category_ff = $rowsf['category'];
			    						        $parent_ff = $rowsf['parent'];
			    						        echo '
			    						        <tr>
                                                    <td colspan="2">'.$category_ff.'</td>
                                                    <td><center>
                                                    <a href="categories?id='.$catid.'&cat='.$category_ff.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                                                    <a href="categories?delid='.$catid.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></center>
                                                    </td>
                                                </tr>
			    						        ';
			    						    }
			    						}
			    						?>
                                        

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Category</th>
                                            <th>Action</th>
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
</body>
</html>