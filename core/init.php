<?php

$db = mysqli_connect('localhost', 'root', '', 'khadipremium');
if(mysqli_connect_errno()){
	echo "Database connection failed with following errors: ".mysqli_connect_error();
	die();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/config.php';
require_once BASEURL.'helpers/helpers.php';

$cart_id = '';
if(isset($_COOKIE[CART_COOKIE])){
	$cart_id = sanitize($_COOKIE[CART_COOKIE]);
}

if(isset($_SESSION['SBUser'])){
	$user_id = $_SESSION['SBUser'];
	$query = $db->query("SELECT * FROM users WHERE id = '$user_id'");
	$user_data = mysqli_fetch_assoc($query);
	$fn = explode(' ', $user_data['full_name']);
	$user_data['first'] = $fn[0];
	$user_data['last'] = $fn[1];
}

// if(isset($_SESSION['success_flash'])){
// 	echo '<p class="text-success text-center">'.$_SESSION['success_flash'].'</p>';
// 	unset($_SESSION['success_flash']);
// }

// if(isset($_SESSION['error_flash'])){
// 	echo '<p class="text-danger text-center">'.$_SESSION['error_flash'].'</p>';
// 	unset($_SESSION['error_flash']);
// }

?>

