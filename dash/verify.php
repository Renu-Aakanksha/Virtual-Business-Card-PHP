<?php

include('db.php');
require('../config.php');


require('../razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $email = $_POST['email'];
    $cust = $_POST['user'];
    
    $dater = date('d/m/Y', strtotime('+1 years'));
    
    $qe = "Update `renewal` set `rdatee` = '$dater' where `cust` = '$cust' ";
    $data = $con->query($qe);
    
    echo($cust);
    echo($dater);
    
    if ($data) {
        $rid = 'RE'.time();
        $rid2 = base64_encode('FsYe'.$email);
        
        $to = $email;
        $subject = "Thank you for your renewal";
        
        $message = "
        <html>
        <head>
        <title>Thank you for your renewal</title>
        </head>
        <body>
        <h3>Thank you for your renewal</h3>
        <p style='color:#080;font-size:18px;'><a href='https://pocketsite.in/dash/verify-user?se=".$rid."&es=".$rid2."'>Click Here To Login</a></p>';
        </body>
        </html>
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: Pocketsite <noreply@pocketsite.in>' . "\r\n";
        
        if (mail($to,$subject,$message,$headers)) {
            echo "<script>alert('Renewel Successful.'); window.location='thanks'</script>";
        }
        
        $html = "<p>Your payment was successful</p>
                 <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    }
}
else
{
    echo "<script>alert('Payment Failed.'); window.location='/'</script>";
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
