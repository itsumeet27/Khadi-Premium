<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';
	include 'includes/header.php';
	
	$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
	$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
	$email = trim($email);
	$password = trim($password);
	$errors = array();

?>
<style type="text/css">
	.container{
		background: url('../images/ban3.jpg') no-repeat;
		background-size: cover;
	}

	#login-form{
		box-shadow: 0px 4px 10px 0px rgba(0,0,0,0.4);
		background: rgba(255,255,255,0.9);
		border: 1px solid #ccc;
		border-radius: 5px;
		padding: 1em;
		width: 50%;
		padding: 2em;
		margin-bottom: 4em;
		margin-top: 4em;
	}

	input{
		font-size: 1.2em;
		padding: 0.3em;
		width: 100%;
		border: 1px solid #ccc;
		border-radius: 5px;
		height: 3em;
	}

</style>

<div class="container">
	<center>
		
		<div id="login-form">
			<div>
				<?php
					if($_POST){
						//Form Validation
						if(empty($_POST['email']) || empty($_POST['password'])){
							$errors[] = 'You must provide email and password';
						}

						//Validate Email
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							$errors[] = 'You must enter a valid email';
						}

						//Password is more than 6 characters
						if(strlen($password) < 6){
							$errors[] = 'Password must be atleast 6 characters';
						}

						//Check if email exists in the database
						$query = $db->query("SELECT * FROM users WHERE email = '$email'");
						$user = mysqli_fetch_assoc($query);
						$userCount = mysqli_num_rows($query);
						if($userCount < 1){
							$errors[] = 'The email doesn\'t exist';
						}

						if(!password_verify($password, $user['password'])){
							$errors[] = 'The password is incorrect, please try again';
						}

						//Check for errors
						if(!empty($errors)){
							echo display_errors($errors);
						}else{
							//Log in user
							$user_id = $user['id'];
							login($user_id);
						}
					}
				?>
			</div>
			<h2 class="text-center">Login</h2><hr>
			
				<form action="login.php" method="post">
			
						<div class="form-group">
							<input type="email" name="email" placeholder="Email" classs="form-control" value="<?=$email;?>">
						</div>
				
						<div class="form-group">
							<input type="password" name="password" placeholder="Password" classs="form-control" value="<?=$password;?>">
						</div>
				
						<div class="form-group">
							<input type="submit" name="submit" value="Login" class="btn btn-success">
						</div>
						<p class="text-right">
							<a href="/khadi/index.php" class="btn btn-primary">Visit Site</a>
						</p>		
				</form>
			
		</div>
	</center>
</div>

<?php include 'includes/footer.php'; ?>
