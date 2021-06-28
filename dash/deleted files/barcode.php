<?php
include('session.php');
include('db.php');

/*if (isset($_POST['addpay'])) {
    $cproduct = $_POST['product'];
    $dsize = $_POST['size'];
    $tbarcode = $_POST['barcode'];
    $tqty = $_POST['qty'];
    $ouser = $_SESSION['user'];
    if(empty($tbarcode)){
        $tbarcod = rand(10000000,999999999);
        $tbarcode = "890".$tbarcod;
    }
    
    $checkbar = "SELECT * FROM `barcode` WHERE `product`='$cproduct'";
    $data_check = $con->query($checkbar);
    
    if($data_check->num_rows > 0){
        $que = "UPDATE `barcode` SET `barcode`='$tbarcode' WHERE `product`='$cproduct'";
        $data_insert = $con->query($que);
    }
    else {
        $que = "INSERT INTO `barcode`(`barcode`, `product`, `cust`) VALUES ('$tbarcode','$cproduct','$ouser')";
        $data_insert = $con->query($que);
    }
    
    if ($data_insert) {
        
        echo "<script>window.location='qrcode/barcode?product=".$cproduct."&product_id=".$tbarcode."&rate=&print_qty=".$tqty."</script>";
    }
    else {
        echo "<script>alert('Sorry, Failed Save'); window.location='barcode'</script>";
    }
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Payment Options</title>
    <?php include('links.php');?>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!--  END CUSTOM STYLE FILE  -->
    
    <!--<?php echo $tiny_cloud_code;?>
    <script>tinymce.init({selector:'textarea'});</script>-->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
       <?php include('header.php');?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                        
                        <div class="col-lg-12 layout-spacing" style="padding: 0px;">

                        	<div class="widget-content widget-content-area text-center">
			                	<nav class="breadcrumb-two" aria-label="breadcrumb">
								    <ol class="breadcrumb">
								        <li class="breadcrumb-item"><a href="index">Home</a></li>
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Barcode Print</a></li>
								    </ol>
								</nav>
							</div>
							
                            <hr style="border: 1px solid;">
                            <p align="justify"><strong>Instruction :</strong>
                            <hr style="border: 1px solid;">

                            <form method="post" action="brcode/barcode" enctype="multipart/form-data">
							  
                                <p>Select Product</p>
							    <select class="form-control  basic" name="product" id="category" required="true">
							            
							            <?php if(isset($_GET['id'])){
							               
                                            $usert = $_GET['id'];
                                            $qet = "SELECT * FROM `product` WHERE `id`='$usert'";
                                            $datat = $con->query($qet);
                                            if($datat->num_rows > 0){
                                                $rowst = $datat->fetch_assoc();
                                                $idt = $rowst['id'];
                                                $productt = $rowst['product'];
                                                $pricet = $rowst['price'];
                                            }
							                echo '<option value="'.$idt.'">'.$productt.'</option>';
							            
							            }?>
							            <option hidden>Please Select Product</option>
							    		<?php
                                        $user = $_SESSION['user'];
                                        $qe = "SELECT * FROM `product` WHERE `cust`='$user'";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $product = $rows['product'];
                                                $price = $rows['price'];
                                                $sellprice = $rows['sellprice'];
                                                
                                                echo '
                                                <option value="'.$id.'">'.$product.'</option>
                                                ';
                                            }
                                        }
                                        ?>
								</select>
								
								<br>
								<p>Select Page Size</p>
							    <select class="form-control  basic" name="size" required="true">
							            
							            <option hidden>Select Page Size</option>
							    		<option value="0">A4</option>
							    		<option value="1">A5</option>
								</select>

                  
                              <div class="form-group mb-4">
                                  <p>Enter Barcode Or Leave It Empty To Continue Automatic</p>
                                    <?php
                                    $user = $_GET['id'];
                                    $qew = "SELECT * FROM `barcode` WHERE `product`='$user'";
                                    $dataw = $con->query($qew);
                                    if($dataw->num_rows > 0){
                                        $rowsw = $dataw->fetch_assoc();
                                        $idw = $rowsw['id'];
                                        $productw = $rowsw['product'];
                                        $pricew = $rowsw['barcode'];
                                        
                                        echo '<input type="text" class="form-control" id="rEmail" placeholder="Barcode *" value="'.$pricew.'" name="barcode">';
                                    }
                                    else {
                                        echo '<input type="text" class="form-control" id="rEmail" placeholder="Barcode *" name="barcode">';
                                    }
                                    ?>
                                  
                              </div>
                              
                              <div class="form-group mb-4">
                                  <p>Quantity</p>
                                  <input type="text" class="form-control" id="rEmail" placeholder="Quantity *" value="" name="qty">
                              </div>
								
                  
							    
                           


							    <small id="emailHelp2" class="form-text text-muted">*Required Fields</small>

							    
							    <button type="submit" class="btn btn-primary mt-3" name="addpay" style="width: 100%;">Print Barcode</button>

							</form>
                        </div>
                    </div>

                </div>
            </div>
            <br>
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
        var ss = $(".basic").select2({
	    	tags: true,
		});
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
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
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = this.value;
                var catepar = "barcode?id=";
    
                window.location=catepar+category_id;
            });
        });
    </script>
</body>
</html>