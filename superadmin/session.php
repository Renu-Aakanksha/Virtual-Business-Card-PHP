<?php
session_start();
if (empty($_SESSION['super'])) {
	echo "<script>window.location='../';</script>";
}
?>