<?php

$db = mysqli_connect('localhost', 'root', '', 'khadipremium');
if(mysqli_connect_errno()){
	echo "Database connection failed with following errors: ".mysqli_connect_error();
	die();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/config.php';
require_once BASEURL.'helpers/helpers.php';


?>

