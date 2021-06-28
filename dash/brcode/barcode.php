<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barcode128.php';
		
		include('../session.php');
        include('../db.php');
        
        if (isset($_POST['addpay'])) {
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
        }


		$product = $cproduct;
		$product_id = $tbarcode;
		/*$rate = $_POST['rate'];*/

		for($i=1;$i<=$tqty;$i++){
			echo "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($product_id))."</p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>