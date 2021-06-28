<?php

include('../dash/db.php');
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
    $date = date("d/m/Y");

    $amoun_t = $_SESSION['add_wall'];
    $amount = $con->real_escape_string($_POST['amount']);
    
    if ($amoun_t == $amount){
        $flag = "0";
        
        $_SESSION['add_wall'] = 0;
        
        $userid = $_SESSION['partner_ref'];
        
        $que = "Select wallet from reseller Where `partner`= '$userid'";
        $data = $con->query($que);
        
        $row = $data->fetch_assoc();
        
        $wallet = ($amount + $row['wallet']);
        
        $que = "Update `reseller` Set `wallet` = '$wallet' Where `partner`= '$userid'";
        
        $data_insert = $con->query($que);
        if ($data_insert) {
            
            $que = "INSERT INTO `transactions`(`partner`, `amount`, `date`, `type`, `balance`) VALUES ('$userid', '$amount', '$date', '$flag', '$wallet')";
            $data_insert = $con->query($que);
            
            echo "<script>alert('Transaction successfully'); window.location='index'</script>";
        }else{
            echo "<script>alert('Transaction Failed'); window.location='index'</script>";
        }
    
        echo "<script>window.location='index'</script>";
    
    }
    
    $html = "<p>Your payment was successful</p>
                 <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;