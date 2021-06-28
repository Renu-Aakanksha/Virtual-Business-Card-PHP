<?php 
include('../dash/db.php');
include('session.php');
error_reporting(0);


if (isset($_POST['update'])){
	$name = $con->real_escape_string($_POST['name']);
	$bname = $con->real_escape_string($_POST['bname']);
	$cname = $con->real_escape_string($_POST['cname']);

	$email = $con->real_escape_string($_POST['email']);
	$aemail = $con->real_escape_string($_POST['aemail']);

	$phone = $con->real_escape_string($_POST['phone']);
	$address = $con->real_escape_string($_POST['address']);
	$url = $con->real_escape_string($_POST['url']);

	$pass = $con->real_escape_string($_POST['password']);
	$passs = md5($pass);

    $rkey = $con->real_escape_string($_POST['rkey']);
	$rskey = $con->real_escape_string($_POST['rskey']);
	
	$uploaded = false;
    
	if(isset($_FILES['fileToUpload'])){
        $target_dir = "images/";
        $rename_done = rand(10000000,900000000). basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir .$rename_done;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        /*if($imageFileType != "png"){
            $error ="extension not allowed, please choose a PDF file.";
        }*/
        
        if($_FILES["fileToUpload"]["size"] > 20971520){
            $error ='File size must be excately 20 MB';
        
            echo "<script>alert('Sorry, Failed To Add Logo : File size must be excately 20 MB'); window.location='image'</script>";
        }
        
        if(empty($error)){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $uploaded = true;
        }
   }
	
		
	$que = "CREATE TABLE IF NOT EXISTS `site` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
  		`name` varchar(1000) NOT NULL,
		`bname` varchar(1000) NOT NULL,
		`cname` varchar(1000) NOT NULL,
		`email` varchar(1000) NOT NULL,
		`aemail` varchar(1000) NOT NULL,
		`phone` varchar(1000) NOT NULL,
		`address` varchar(1000) NOT NULL,
		`password` varchar(1000) NOT NULL,
		`url` varchar(1000) NOT NULL,
		`rkey` varchar(1000) NOT NULL,
		`rskey` varchar(1000) NOT NULL,
		`logo` varchar(1000) NOT NULL,
		PRIMARY KEY (id)
		);";
	$data_insert = $con->query($que);

	$qe = "SELECT * FROM `site` LIMIT 1";
	$data = $con->query($qe);
	if ($uploaded) {
    	if($data->num_rows > 0){
    		$que = "Update `site` set `name`= '$name', `bname` = '$bname', `cname` = '$cname', `email`= '$email', `phone` = '$phone', `address` = '$address' , `url` = '$url', `rkey` = '$rkey', `rskey` = '$rskey', `password` = '$pass', `aemail` = '$aemail', `logo` = '$rename_done' LIMIT 1";
    		$data_insert = $con->query($que);
    	}else{
    		$que = "Insert into `site` (`name`, `bname`, `cname`, `email`, `phone`, `address` , `url`, `rkey`, `rskey`, `password`, `aemail`, `logo`) VALUES ( '$name', '$bname', '$cname','$email','$phone','$address','$url','$rkey','$rskey','$pass', '$aemail', '$rename_done');";
    		$data_insert = $con->query($que);
    	}
	}else{
	    if($data->num_rows > 0){
    		$que = "Update `site` set `name`= '$name', `bname` = '$bname', `cname` = '$cname', `email`= '$email', `phone` = '$phone', `address` = '$address' , `url` = '$url', `rkey` = '$rkey', `rskey` = '$rskey', `password` = '$pass', `aemail` = '$aemail' LIMIT 1";
    		$data_insert = $con->query($que);
    	}else{
    		$que = "Insert into `site` (`name`, `bname`, `cname`, `email`, `phone`, `address` , `url`, `rkey`, `rskey`, `password`, `aemail`) VALUES ( '$name', '$bname', '$cname','$email','$phone','$address','$url','$rkey','$rskey','$pass', '$aemail');";
    		$data_insert = $con->query($que);
    	}
	}
	$que = "Update `admin` set `email`= '$aemail', `password` = '$passs' LIMIT 1";
	$data_insert = $con->query($que);

	if ($data_insert){
		echo "<script>alert('Updated Successfully'); window.location='index'</script>";
	}else{
		echo "<script>alert('Failed to Update'); window.location='index'</script>";
	}

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Super Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Website Settings
				</span>

				<?php
				$qe = "SELECT * FROM `site` LIMIT 1";
					$data = $con->query($qe);
					if($data->num_rows > 0){
						$rows = $data->fetch_assoc();
						$name = $rows['name'];
						$bname= $rows['bname'];
						$cname = $rows['cname'];
						$email = $rows['email'];
						$address = $rows['address'];
						$url = $rows['url'];
						$pass = $rows['password'];
						$rkey = $rows['rkey'];
						$rskey = $rows['rskey'];
						$phone = $rows['phone'];
						$aemail = $rows['aemail'];
						$img = $rows['logo'];
					}else{
						$name = '';
						$bname= '';
						$cname = '';
						$email = '';
						$address = '';
						$url = '';
						$pass = '';
						$rkey = '';
						$rskey = '';
						$phone = '';
						$aemail = '';
						$img = '';
					}
				?>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<input class="input100" id="name" type="text" name="name" placeholder="Owner Name" value="<?php if (!empty($name)) {echo $name;} ?>">
					<label class="label-input100" for="name">
						<span class="lnr lnr-user"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" id="email" type="text" name="email" placeholder="Owner Email" value="<?php if (!empty($email)) {echo $email;} ?>">
					<label class="label-input100" for="email">
						<span class="lnr lnr-envelope"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Address is required">
					<input class="input100" id="address" type="text" name="address" placeholder="Owner Address" value="<?php if (!empty($address)) {echo $address;} ?>">
					<label class="label-input100" for="address">
						<span class="lnr lnr-home"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Phone is required">
					<input class="input100" id="phone" type="number" name="phone" placeholder="Support Phone Number" value="<?php if (!empty($phone)) {echo $phone;} ?>">
					<label class="label-input100" for="phone">
						<span class="lnr lnr-phone-handset"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" id="aemail" type="text" name="aemail" placeholder="Admin Email" value="<?php if (!empty($aemail)) {echo $aemail;} ?>">
					<label class="label-input100" for="aemail">
						<span class="lnr lnr-envelope"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Eg. brightgoals.in (No https://)">
					<input class="input100" id="url" type="text" name="url" placeholder="Domain Name Eg. brightgoals.in (No https://)" value="<?php if (!empty($url)) {echo $url;} ?>">
					<label class="label-input100" for="url">
						<span class="lnr lnr-envelope"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Business Name is required - Eg. Bright Goals">
					<input class="input100" id="bname" type="text" name="bname" placeholder="Business Name Eg. Bright Goals" value="<?php if (!empty($bname)) {echo $bname;} ?>">
					<label class="label-input100" for="bname">
						<span class="lnr lnr-briefcase"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Credit Name is required">
					<input class="input100" id="cname" type="text" name="cname" placeholder="Footer Credit Eg. Bright Goals" value="<?php if (!empty($cname)) {echo $cname;} ?>">
					<label class="label-input100" for="cname">
					<span class="lnr lnr-briefcase"></span>
					</label>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Razorpay Key is required">
					<input class="input100" id="rkey" type="text" name="rkey" placeholder="Razorpay Key" value="<?php if (!empty($rkey)) {echo $rkey;} ?>">
					<label class="label-input100" for="rkey">
						<span class="lnr lnr-lock"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input" data-validate="Razorpay Secret is required">
					<input class="input100" id="rskey" type="text" name="rskey" placeholder="Razorpay Secret Key" value="<?php if (!empty($rskey)) {echo $rskey;} ?>">
					<label class="label-input100" for="rskey">
						<span class="lnr lnr-lock"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" id="password" type="text" name="password" placeholder="Admin Password" value="<?php if (!empty($pass)) {echo $pass;} ?>">
					<label class="label-input100" for="password">
                        <span class="lnr lnr-lock"></span>
					</label>
				</div>
				
				<div class="wrap-input100">
				    <input type="file" accept="image/*" name="fileToUpload">
				    <?php if (!empty($img)){
				        echo '<img src= "images/'.$img.'" height ="100px" width="200px" alt="Current Logo">';
				    }?>
                </div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type='submit' name="update">
							Update Settings
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
