<?php
include('session.php');
include('db.php');


if (isset($_POST['savenav'])){
    $selected = $con->real_escape_string($_POST['display']);
    $header = $con->real_escape_string($_POST['header']);
    
    $usern = $_SESSION['user'];
    
    $date = date("d/m/Y");
    
    if (!empty($selected) || $selected != "0" || !empty($header)){
        
        $nav = "nav".$selected;
        
        $find = "Select * from navigation where cust = '$usern' limit 1";
    
        $data = $con->query($find);
        
        if ($data->num_rows > 0){
            
            $que = "Update `navigation` SET `".$nav."` = '$header' where cust = '$usern' limit 1";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Layout Updated successfully'); window.location='navigation'</script>";
            }else{
                echo "<script>alert('Failed to Update Navigation layout'); window.location='navigation'</script>";
            }
            
        }else{
            
            $que = "INSERT INTO `navigation`(`".$nav."`, `cust`, `date`) VALUES ('$header', '$usern', '$date')";
            $data_insert = $con->query($que);
            if ($data_insert) {
                echo "<script>alert('Layout Updated successfully'); window.location='navigation'</script>";
            }else{
                echo "<script>alert('Failed to Update Navigation layout'); window.location='navigation'</script>";
            }
        }
        
    }else{
        
        echo "<script>alert('Input Field Can't Be Empty); window.location='navigation'</script>";
    
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
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Layout Navigation</a></li>
								    </ol>
								</nav>
							</div>
							
							<hr style="border: 1px solid;">
                            <p align="justify"><strong>Instruction :</strong>Select navigation header and change it</p>
							<hr style="border: 1px solid;">

							<form method="post">
							    <?php 
							    
    							    $user =  $_SESSION['user'];
    							    $dataqu = $con->query("SELECT * FROM `navigation` WHERE `cust`='$user' limit 1");
                                	if($dataqu->num_rows > 0){
                                	    $rowsf = $dataqu->fetch_assoc();
                                	    
                                        $nav1 = $rowsf['nav1'];
                                        $nav2 = $rowsf['nav2'];
                                        $nav3 = $rowsf['nav3'];
                                        $nav4 = $rowsf['nav4'];
                                        $nav5 = $rowsf['nav5'];
                                        $nav6 = $rowsf['nav6'];
                                        
                                	}
							    ?>
							    
							    <p>Select Naviagtion Header</p>
							    <select class="form-control  basic" name="display">
							        <option value="0">Select One Option</option>
									<option value="1"><?php if(!empty($nav1)){ echo $nav1;}else{ echo 'Home';} ?></option>
                                    <option value="2"><?php if(!empty($nav2)){ echo $nav2;}else{ echo 'About';} ?></option>
                                    <option value="3"><?php if(!empty($nav3)){ echo $nav3;}else{ echo 'Products';} ?></option>
                                    <option value="4"><?php if(!empty($nav4)){ echo $nav4;}else{ echo 'Gallery';} ?></option>
                                    <option value="5"><?php if(!empty($nav5)){ echo $nav5;}else{ echo 'Feedback';} ?></option>
                                    <option value="6"><?php if(!empty($nav6)){ echo $nav6;}else{ echo 'Contact';} ?></option>
								</select>

							     <div class="form-group mb-4">
                                    <p>Change Navigation Heading <span style="color:orange;">OR</span> Keep empty to hide menu</p>
							        <input type="text" name="header" class="form-control" id="product" placeholder="Title *">
							    </div>
							    <button type="submit" class="btn btn-primary mt-3" name="savenav" style="width: 100%;">Save and Update</button>
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