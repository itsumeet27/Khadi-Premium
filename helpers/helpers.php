<?php

	function display_errors($errors){

		$display = '<ul class="bg-danger">';
		foreach($errors as $error){
			$display .= '<li class="text-danger">'.$error.'</li>';
		}

		$display.= '</ul>';
		return $display;
	}

	function sanitize($dirty){
		return htmlentities($dirty,ENT_QUOTES,"UTF-8");
	}

	function money($number){
		return '&#8377; '.number_format($number);
	}

	function login($user_id){
		$_SESSION['Admin_User'] = $user_id;
		global $db;
		$date = date("Y-m-d H:i:s");
		$db->query("UPDATE users SET last_login = '$date' WHERE id = '$user_id'");
		$_SESSION['success_flash'] = 'You have logged in successfully';
	}

	function is_logged_in(){
		if(isset($_SESSION['Admin_User']) && $_SESSION['Admin_User'] > 0){
			return true;
		}
		return false;
	}

	function login_error_redirect($url = 'login.php'){
		$_SESSION['error_flash'] = 'Please login to access the page';

	}

?>