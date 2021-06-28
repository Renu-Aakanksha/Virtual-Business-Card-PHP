<?php
include('../dash/db.php');
if(isset($_GET['se']) && isset($_GET['es'])){
    
    $fse = $_GET['se'];
    $fes = base64_decode($_GET['es']);
    
    $split = explode("RE", $fse);
    $split2 = explode("FsYe",$fes);
    
    $fse2 = $split[1];
    $fes2 = $split2[1];
    
    $diff = 60 * 60;
    
    if($fse2 and $fes2){
        
        if (time() < ($diff + $fse2)){
            include('../dash/db.php');
            $q = "SELECT partner, id FROM `reseller` WHERE `email`= '$fes2' limit 1";
        	$data = $con->query($q);
        	if ($data->num_rows > 0) {
        	    
        	    $row = $data->fetch_assoc();
		        $ref = $row['partner'];
		        $id = $row['id'];
		        
                session_start();
                 $_SESSION['partner'] = $id;
                 $_SESSION['partner_ref'] = $ref;
                 
                 echo "<script>window.location='index';</script>";
                 
        	}else{
        	    echo "<script>alert('Invalid: Login'); window.location='../';</script>";
        	}
        }else{
            echo "<script>alert('Login Link Experied'); window.location='../';</script>";
        }

    }else{
        echo "<script>alert('Invalid: Login URL'); window.location='../';</script>";
    }
    
}elseif (isset($_POST['login'])) {
	$email = $_POST['username'];
	$pass = $_POST['password'];
	
	$q = "SELECT * FROM `reseller` WHERE (`partner`= '$email' OR `email` = '$email') AND `pass`='$pass' Limit 1";
	$data = $con->query($q);
	if ($data->num_rows > 0) {
	    
		$row = $data->fetch_assoc();
		
		if ($row['status'] == 1) {
		    $id = $row['id'];
		    $ipartner = $row['partner'];
    		session_start();
    		$user = $_SESSION['partner'] = $id;
            $_SESSION['partner_ref'] = $ipartner;
    		if ($user) {
    			echo "<script>window.location='index';</script>";
    		}
    		
		}else{
		    echo "<script>alert('Account Status: Deactivated'); window.location='../';</script>";
		}
	}
	else {
		echo "<script>alert('Wrong email or password'); window.location='../';</script>";
	}
}
?>