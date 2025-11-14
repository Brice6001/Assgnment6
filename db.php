<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'customer_db';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Note: Do not auto-redirect here. Protected pages should check the
// presence of `$_SESSION['my_session']` and redirect to login themselves.

?>