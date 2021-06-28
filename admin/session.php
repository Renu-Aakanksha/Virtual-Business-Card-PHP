<?php
session_start();
if (empty($_SESSION['admin'])) {
	echo "<script>window.location='login';</script>";
}
?>