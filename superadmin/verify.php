<?php

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];
    $pass = md5($pass);
    
    if ($email == "mysuper@admin.com" and $pass = "6fe4b1e817d3b136da07b1bad452b34d"){
    		session_start();
            $_SESSION['super'] = "mysuper@admin.com";
            echo "<script>window.location='index';</script>";
	}
	else {
		echo "<script>alert('Wrong email or password'); window.location='../';</script>";
	}
}else{
    echo "<script>window.location='../';</script>";
}

?>