<?php
include('session.php');
include('db.php');

if (isset($_POST['theme'])){
    $hover = $con->real_escape_string($_POST['hover']);
    $theme = $con->real_escape_string($_POST['base']);
    $links = $con->real_escape_string($_POST['links']);
    
    $usern = $_SESSION['user'];
    
    $date = date("d/m/Y");
    
    $find = "Select * from layout where cust = '$usern' limit 1";
    
    $data = $con->query($find);
    
    if ($data->num_rows > 0){
        
        $que = "Update `layout` SET hover = '$hover', theme = '$theme', links = '$links' where cust = '$usern' limit 1";
        $data_insert = $con->query($que);
        if ($data_insert) {
            echo "<script>alert('Layout Updated successfully'); window.location='layout'</script>";
        }else{
            echo "<script>alert('Failed to Update layout Color'); window.location='layout'</script>";
        }
        
    }else{
        
        $que = "INSERT INTO `layout`(`hover`, `theme`, `links`, `cust`, `date`) VALUES ('$hover', '$theme', '$links', '$usern', '$date')";
        $data_insert = $con->query($que);
        if ($data_insert) {
            echo "<script>alert('Layout Updated successfully'); window.location='layout'</script>";
        }else{
            echo "<script>alert('Failed to Update layout Color'); window.location='layout'</script>";
        }
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set layout</title>
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Layout Colors</a></li>
								    </ol>
								</nav>
							</div>
							
							<hr style="border: 1px solid;">
                            <p align="justify"><strong>Instruction :</strong> Select color from the following input fields</p>
							<hr style="border: 1px solid;">

                            <form method="post">
							    <?php 
							    
							    $user =  $_SESSION['user'];
							    $dataqu = $con->query("SELECT * FROM `layout` WHERE `cust`='$user'");
                                	if($dataqu->num_rows > 0){
                                	    $rowsf = $dataqu->fetch_assoc();
                                	    
                                        $hoverc = $rowsf['hover'];
                                        $themec = $rowsf['theme'];
                                        $linksc = $rowsf['links'];
                                	}
							    ?>
							    <div class="form-group mb-4">
							        <p>Theme Color</p>
							        <input type="color" class="form-control" required="true" name="base" value= <?php if(!empty($themec)){ echo $themec;}else{ echo '#021533';} ?> >
							    </div>
							    
							    <div class="form-group mb-4">
							        <p>Hover Color</p>
							        <input type="color" class="form-control" required="true"  name="hover" value= <?php if(!empty($hoverc)){ echo $hoverc;}else{ echo '#FC4119';} ?> >
							    </div>
							    
							    <div class="form-group mb-4">
							        <p>Links Color</p>
							        <input type="color" class="form-control" required="true"  name="links" value= <?php if(!empty($linksc)){ echo $linksc;}else{ echo '#FC4119';} ?> >
							    </div>
							    <button type="submit" class="btn btn-primary mt-3" name="theme" style="width: 100%;">Save Updates</button>
							    
							</form>
							
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
    
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <script>
        $(document).ready(function() {
            App.init();
        });
        var ss = $(".basic").select2({
	    	tags: true,
		});
    </script>

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

   
</body>
</html>