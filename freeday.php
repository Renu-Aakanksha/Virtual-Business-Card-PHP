<?php

include('dash/db.php');
require('config.php');

if (isset($_POST['freer']))
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $ccat = $_POST['cat'];
    $tagline = $_POST['tagline'];
    $mobile = "91".$_POST['mobile'];
    $wmobile = "91".$_POST['wmobile'];
    $aadhaar = $_POST['aadhaar'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $ref = $_POST['ref'];
    $password = md5($pass);
    $datea = date("d/m/Y");
    $dater = date('d/m/Y', strtotime('+2 day'));
    $lcpre = "LCKY".rand(1000000000,9999999999);
    $theme = $_POST['theme'];
    
	$design = 1;

	function clean($string) {
      $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
      return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

	$cleanstr = clean($cname);
	$curll = strtolower($cleanstr);
	
    
    $owners_data = $con->query("SELECT id FROM `owners` ORDER BY `id` DESC LIMIT 1");
    if($owners_data->num_rows > 0){
        $ownfe = $owners_data->fetch_assoc();
        $ownid = $ownfe['id'];
        $genid = $ownid+1;
    }
    
    $dup_email = false;
    
    $owners_email = $con->query("SELECT id FROM `owners` where email = '$email' LIMIT 1");
    if($owners_email->num_rows > 0){
        $dup_email = true;
    }
    
    $owners_url = $con->query("SELECT id FROM `owners` where url = '$curll' LIMIT 1");
    if($owners_url->num_rows > 0){
        $curll = "card".rand(1,999)."-".$curll."-".rand(1,9999)."yt";
    }
    
    //adding data to database
    if (!($dup_email)){
        $zeroval = 1;
        $stmt = $con->prepare("INSERT INTO `owners`(`id`, `name`, `address`, `cname`, `url`, `category`, `tagline`, `mobile`, `whatsapp`, `email`, `password`, `aadhaar`, `status`, `datee`, `ref`, `design`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("issssssiisssisss",$genid,$name,$address,$cname,$curll,$ccat,$tagline,$mobile,$wmobile,$email,$password,$aadhaar,$zeroval,$datea,$ref,$design);
        $stmt->execute();
        $stmt->close();
        
        
        $stmt = $con->prepare("INSERT INTO `renewal`(`datee`, `rdatee`, `cust`, `lkey`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssis",$datea,$dater,$genid,$lcpre);
        $stmt->execute();
        $stmt->close();
        
        $pid = 'demo'.$theme;
        $qe = "SELECT layout.hover as hover, layout.theme as theme, layout.links as links FROM `layout` INNER JOIN `owners` ON layout.cust = owners.id where owners.url = '$pid' LIMIT 1";
        $data = $con->query($qe);
        
        if($data->num_rows > 0){
            $rows = $data->fetch_assoc();
            
            $theme = $rows['theme'];
            $links = $rows['links'];
            $hover = $rows['hover'];
            
            $qe = "INSERT INTO `layout`(`hover`, `cust`, `theme`, `links`, `date`) VALUES ('$hover', '$genid', '$theme', '$links', '$datea')";
            $data = $con->query($qe);
        }
        
                $rid = 'RE'.time();
                $rid2 = base64_encode('FsYe'.$email);
                
                $to = $email;
                $subject = "Thank you for your registration";
                
                $message = "
                <html>
                <head>
                <title>Thank you for your registration</title>
                </head>
                <body>
                <h3>Thank you for your registration</h3>
                <h4>Your Login Details :</h4>
                <p><strong>User Id / Email :</strong> ".$email."</p>
                <p><strong>Password :</strong> ".$pass."</p><br>
                <p style='color:#080;font-size:18px;'><a href='https://site101.in/dash/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>';
                </body>
                </html>
                ";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From: Site101 <noreply@site101.in>' . "\r\n";
                
                if (mail($to,$subject,$message,$headers)) {
                     $_SESSION["user"] = $genid;
         
                    echo "<script>alert('Registration Successful.'); window.location='dash/thanks'</script>";
                }
    }
    else {
        echo "<script>alert('Sorry! This email is already registered.'); window.location='form'</script>";
        die();
    }
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    echo "<script>alert('Payment Failed.'); window.location='/'</script>";
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
