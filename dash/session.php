<?php
// include('../session.php');
session_start();

if (empty($_SESSION['user'])) {
	echo "<script>window.location='../';</script>";
}
?>