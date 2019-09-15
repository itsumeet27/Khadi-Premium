<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';
	$first_name = sanitize($_POST['first_name']);
	$last_name = sanitize($_POST['last_name']);
	$email = sanitize($_POST['email']);
	$address1 = sanitize($_POST['address1']);
	$address2 = sanitize($_POST['address2']);
	$city = sanitize($_POST['city']);
	$state = sanitize($_POST['state']);
	$zip = sanitize($_POST['zip']);
	$country = sanitize($_POST['country']);
	$errors = array();
	$required = array(
		'first_name' => 'First Name',
		'last_name'  => 'Last Name',
		'email'      => 'Email',
		'address1'   => 'Address',
		'address2'   => 'Street Name',
		'city'       => 'City',
		'state'      => 'State',
		'zip'        => 'Zip Code',
		'country'    => 'Country',
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