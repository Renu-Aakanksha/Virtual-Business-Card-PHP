<?php
include('db.php');

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
            $q = "SELECT id FROM `owners` WHERE `email`= '$fes2' limit 1";
        	$data = $con->query($q);
        	if ($data->num_rows > 0) {
        	    
        	    $row = $data->fetch_assoc();
		        $id = $row['id'];
		        
                session_start();
                 $_SESSION['user'] = $id;
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
	$password = md5($pass);

	$q = "SELECT * FROM `owners` WHERE `email`='$email' AND `password`='$password' AND `status`='1'";
	$data = $con->query($q);
	if ($data->num_rows > 0) {
		$row = $data->fetch_assoc();
		$id = $row['id'];
		
		$qc = "SELECT * FROM `renewal` WHERE `cust`='$id'";
    	$datac = $con->query($qc);
    	if ($datac->num_rows > 0) {
    		$rowc = $datac->fetch_assoc();
    		$ren = $rowc['rdatee'];
    		
    		$renewald = substr($ren,0,2);
    		$renewalm = substr($ren,3,2);
    		$renewaly = substr($ren,6,4);
    		
    		$cdated = date("d");
    		$cdatem = date("m");
    		$cdatey = date("Y");
    		
    		if($renewald < $cdated && $renewalm <= $cdatem && $renewaly <= $cdatey){
    		    echo "<script>alert('Sorry, Your account is expired!'); window.location='../home';</script>";
    		}
    		if($renewalm < $cdatem && $renewaly <= $cdatey){
    		    echo "<script>alert('Sorry, Your account is expired!'); window.location='../home';</script>";
    		}
    		if($renewaly < $cdatey){
    		    echo "<script>alert('Sorry, Your account is expired!'); window.location='../home';</script>";
    		}
    		
    	}
    	
		session_start();
		$user = $_SESSION['user'] = $id;
		if ($user) {
			echo "<script>window.location='index';</script>";
		}
	}
	else {
		echo "<script>alert('Wrong email or password'); window.location='../home';</script>";
	}
}
?>