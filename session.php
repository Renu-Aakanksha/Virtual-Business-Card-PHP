<?php


//if ( (empty($_SESSION['wname'])) or (empty($_SESSION['wbname'])) or (empty($_SESSION['wcname'])) or (empty($_SESSION['wemail'])) or (empty($_SESSION['waemail'])) or (empty($_SESSION['waddress'])) or (empty($_SESSION['wurl'])) or (empty($_SESSION['wrkey'])) or (empty($_SESSION['wrskey'])) or (empty($_SESSION['wphone'])) or (empty($_SESSION['wlogo'])) ) {
    
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
    	$logo = $rows['logo'];
    	
    	if ( (empty($name)) or (empty($bname)) or (empty($cname)) or (empty($email)) or (empty($address)) or (empty($url)) or (empty($pass)) or (empty($rkey)) or (empty($rskey)) or (empty($phone)) or (empty($aemail)) or (empty($logo))) 
        {
        	echo "<script>window.location='superadmin/login';</script>";
        	
        }else{
        	$_SESSION['wname'] = $name;
        	$_SESSION['wbname'] = $bname;
        	$_SESSION['wcname'] = $cname;
        	$_SESSION['wemail'] = $email;
        	$_SESSION['waemail'] = $aemail;
        	$_SESSION['waddress'] = $address;
        	$_SESSION['wurl'] = $url;
        	$_SESSION['wrkey'] = $rkey;
        	$_SESSION['wrskey'] = $rskey;
        	$_SESSION['wphone'] = $phone;
        	$_SESSION['wlogo'] = $logo;
        }	
    	
    }else{
        echo "<script>window.location='superadmin/login';</script>";
    }
//}

?>