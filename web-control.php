<?php
include('dash/db.php');

//owner details
if(isset($_GET['url'])){
    $usern = $_GET['url'];
    $qus = "SELECT * FROM `owners` WHERE `url`='$usern'";
    $datas = $con->query($qus);
    if ($datas->num_rows > 0) {
    	$rowsd = $datas->fetch_assoc();
    	$id = $rowsd['id'];
    	$name = $rowsd['name'];
    	$address = $rowsd['address'];
    	$cname = $rowsd['cname'];
    	$url = $rowsd['url'];
        $category = $rowsd['category'];
        $tagline = $rowsd['tagline'];
    	$mobile = $rowsd['mobile'];
    	$wmobile = $rowsd['whatsapp'];
    	$email = $rowsd['email'];
        $status = $rowsd['status'];
        $pixel = $rowsd['pixel'];
    }
}


//Whatsapp Share================================================================
if(isset($_GET['whatsappmess'])){
    $wnumbe = $con->real_escape_string($_GET['whatsappmess']);
    $web_url = $con->real_escape_string($_GET['url']);
    $date = date("d/m/Y");
    $que = "INSERT INTO `whatsapp`(`whatsapp`, `cust`, `date`) VALUES ('$wnumbe','$id','$date')";
    $data_insert = $con->query($que);
    echo "<script>window.location='https://api.whatsapp.com/send?phone=91".$wnumbe."&text=I love to share you this website : https://$super_url/$web_url'</script>";
}
//Whatsapp Share End============================================================

//Feed Back=====================================================================
if(isset($_GET['subd'])){
    $ccname = $_GET['cperson'];
    $ccdesign = $_GET['design'];
    $ccfemail = $_GET['femail'];
    $ccmsg = $_GET['msg'];
    
    $quei = "INSERT INTO `feedback`(`name`, `desi`, `email`, `message`, `cust`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($quei);
    $stmt->bind_param("sssss",$ccname,$ccdesign,$ccfemail,$ccmsg,$id);
    if($stmt->execute()){
        $stmt->close();
        echo "<script>alert('Submited Successfully!');window.close();</script>";
    }
    $stmt->close();
    
}

//Contact Us====================================================================
if(isset($_GET['subt'])){
    $c_person = $_GET['contactp'];
    $c_email = $_GET['cemail'];
    $c_sub = $_GET['csubject'];
    $c_message = $_GET['cmsg'];
    
    $to = $email; 
    $from = 'sender@'.$email; 
    $fromName = 'Contact from Portable Website'; 
     
    $subject = "Contact from Portable Website"; 
     
    $htmlContent = ' 
        <html> 
        <head> 
            <title>Contact from Portable Website</title> 
        </head> 
        <body> 
            <h1>Contact from Portable Website</h1> 
             <p>
             <strong>Contact Person :</strong> '.$c_person.' <br>
             <strong>Email :</strong> '.$c_email.' <br>
             <strong>Subject :</strong> '.$c_sub.' <br>
             <strong>Message :</strong> '.$c_message.' <br>
             
             </p>
        </body> 
        </html>'; 
     
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
     
    // Additional headers 
    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
    $headers .= '' . "\r\n"; 
    $headers .= '' . "\r\n"; 
     
    // Send email 
    if(mail($to, $subject, $htmlContent, $headers)){ 
        echo "<script>alert('Request has sent successfully.');window.close();</script>"; 
    }else{ 
       echo "<script>alert('Failed To Send.');window.close();</script>"; 
    }
}
?>