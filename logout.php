<?php
include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Unset all session variables and destroy session
$_SESSION = array();
session_unset();
session_destroy();

header('Location: login.php');
exit;
?>