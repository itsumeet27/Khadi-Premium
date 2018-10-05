<?php

	require_once '../core/init.php';
	if(!is_logged_in()){
		login_error_redirect();
	}
	include 'includes/header.php'; 
?>

<div class="container-fluid">
	Admin Home
</div>

<?php
	include 'includes/footer.php';
?>