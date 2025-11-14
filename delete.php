<?php
include 'db.php';

// Protect this action
if (!isset($_SESSION['my_session'])) {
	header('Location: login.php');
	exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
	mysqli_query($conn, "DELETE FROM customers WHERE id=$id");
}

header('Location: index.php');
exit;
?>
