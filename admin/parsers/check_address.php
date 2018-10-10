<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';
	$name = sanitize($_POST['full_name']);
	$email = sanitize($_POST['email']);
	$address = sanitize($_POST['address']);
	$street = sanitize($_POST['street_name']);
	$landmark = sanitize($_POST['landmark']);
	$city = sanitize($_POST['city']);
	$state = sanitize($_POST['state']);
	$zip = sanitize($_POST['zip']);
	$country = sanitize($_POST['country']);
	$errors = array();
	$required = array(
		'full_name' => 'Full Name',
		'email'     => 'Email',
		'address'   => 'Address',
		'street_name'    => 'Street Name',
		'landmark'  => 'Landmark',
		'city'      => 'City',
		'state'     => 'State',
		'zip'       => 'Zip Code',
		'country'   => 'Country',
	);

	//Check if all required fields are filled out

	foreach ($required as $f => $d) {
		if(empty($_POST[$f]) || $_POST[$f] == ''){
			$errors[] = $d.' is required';
		}
	}

	//Check if valid email address
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Please enter a valid email';
	}

	if(!empty($errors)){
		echo display_errors($errors);
	}else{
		echo 'passed';
	}


?>