<?php
session_start();

if (empty($_SESSION['partner'])) {
	echo "<script>window.location='../';</script>";
}

if (empty($_SESSION['partner_ref'])) {
	echo "<script>window.location='../';</script>";
}
?>