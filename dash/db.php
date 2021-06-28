<?php
$server = "localhost";
$user = "Renu";
$password = "As*gauxZNKRxKO1N";
$database = "vcards";

$con = new mysqli($server,$user,$password,$database);
if ($con->connect_error) {
	echo "Faild To Connect Database : ".$con->connect_error;
}

$data_super = $con->query("SELECT * FROM `site`");
if($data_super->num_rows > 0){
	while($store_rows = $data_super->fetch_assoc()){
		$super_name = $store_rows['name'];
		$super_bname = $store_rows['bname'];
		$super_cname = $store_rows['cname'];
		$super_email = $store_rows['email'];
		$super_aemail = $store_rows['aemail'];
		$super_phone = $store_rows['phone'];
		$super_address = $store_rows['address'];
		$super_password = $store_rows['password'];
		$super_url = $store_rows['url'];
		$super_rkey = $store_rows['rkey'];
		$super_rskey = $store_rows['rskey'];
		$super_logo = $store_rows['logo'];
	}
}
//tiny Cloud Code
$tiny_cloud_code = '<script src="https://cdn.tiny.cloud/1/zvqrex8m4l85pe6vdqvsjlubx8i1nj86vypoe6m7w5u2nhkg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>';
?>