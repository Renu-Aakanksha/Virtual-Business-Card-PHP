<?php
session_start();
$des = session_destroy();
if ($des) {
	echo "<script>window.location='../';</script>";
}
?>