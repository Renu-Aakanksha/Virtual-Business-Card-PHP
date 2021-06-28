<?php
session_start();


$keyId = $_SESSION['wrkey'];
$keySecret = $_SESSION['wrskey'];
$displayCurrency = 'INR';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
