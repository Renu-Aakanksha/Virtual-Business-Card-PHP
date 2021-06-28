<?php 
include('session.php');
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Share you Storefront</title>
    <?php include('links.php');?>
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
                
                 <div class="col-lg-12 layout-spacing" style="padding: 0px;">

                        	<div class="widget-content widget-content-area text-center">
			                	<nav class="breadcrumb-two" aria-label="breadcrumb">
								    <ol class="breadcrumb">
								        <li class="breadcrumb-item"><a href="index">Home</a></li>
								        <li class="breadcrumb-item active"><a href="javascript:void(0);">&nbsp;Share you Storefront</a></li>
								    </ol>
								</nav>
							</div>

         <hr style="border: 1px solid;">
        <p align="justify"><strong>Instruction :</strong> You can view your "Storefront", share it to your client, social medias, blogs, etc by coping its link or 
        can create "QR Code" of your Storefront.
        <hr style="border: 1px solid;">
                
                <div class="row layout-top-spacing">
                    <?php $usern = $_SESSION['user'];?>
                    <a target="_blank" href="shop/index?s=<?php echo $usern;?>" class="btn btn-primary" style="width: 100%; margin: 20px;">View My Storefront</a>
                    <br>
                    <h6 style="margin: 20px; width: 100%;">Share your Store :</h6>
                    
                    <input type="text" class="form-control" style="margin: 10px;" id="myInput" placeholder="Product name *" value="https://mymobiz.com/shop/index?s=<?php echo $usern;?>" name="product" readonly>
                    <button target="_blank" href="" class="btn btn-primary" style="width: 100%; margin: 13px;" onclick="myFunction()">Copy link</button>
                    
                    <?php
            			$qus = "SELECT * FROM `owners` WHERE `id`='$usern'";
            			$datas = $con->query($qus);
            			if ($datas->num_rows > 0) {
            				$rowsd = $datas->fetch_assoc();
            				$cnames = $rowsd['cname'];
            				$caddresss = $rowsd['address'];
            			}
            		?>
                    <form target="_blank" action="qrcode/index" method="post" style="width: 91%;">
                    	<input type="hidden" name="data" value="https://mymobiz.com/shop/index?s=<?php echo $usern;?>">
                    	<input type="hidden" name="level" value="H">
                    	<input type="hidden" name="size" value="10">
                    	<input type="hidden" name="cname" value="<?php print $cnames;?>">
                    	<input type="hidden" name="caddress" value="<?php print $caddresss;?>">
                    	<button type="submit" class="btn btn-primary" value="GENERATE" style="width: 100%; margin: 13px;">View My QR Code</button>
                    </form>
                    <?php
                    if(isset($_POST['subre'])){
                        // the message
                        $msg = "OR Request : ".$cnames;
                        
                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        
                        // send email
                        $ssen = mail("chandandadhekar@gmail.com","QR Request",$msg);
                        
                        if($ssen){
                            echo "<script>alert('Request Sent Successfully'); window.location='store'</script>";
                        }

                    }
                    ?>
                    <form method="post" style="width: 91%;">
                        <button type="submit" name="subre" class="btn btn-primary" value="GENERATE" style="width: 100%; margin: 13px;">Request QR Code</button>
                    </form>
                    
                    
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