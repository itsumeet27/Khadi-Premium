<?php

	require_once '../core/init.php';
	if(!is_logged_in()){
		login_error_redirect();
	}

	if(!has_permission('admin')){
		permission_error_redirect('index.php ');
	}
	include('includes/head.php');
	echo $_SESSION['SBUser']; 

?>

<div class="container-fluid">
	Users
</div>

<?php
	include 'includes/footer.php';
?>