<?php 
	include('core/init.php');
?>
<?php
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $cus_id = $row_pro['id'];
          $cus_name = $row_pro['fullname'];
          $cus_email = $row_pro['email'];
          $cus_address1 = $row_pro['address1'];
          $cus_address2 = $row_pro['address2'];
          $cus_city = $row_pro['city'];
          $cus_state = $row_pro['state'];
          $cus_zipcode = $row_pro['zipcode'];
          $cus_phone = $row_pro['phone'];
          $cus_country = $row_pro['country'];
    }
?>
<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Edit Account</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" value="<?php echo $cus_name;?>">
				              <label for="fullname">Full Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?php echo $cus_email;?>">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map prefix"></i>
				              <input type="text" id="address1" class="form-control form-control-sm" name="address1" value="<?php echo $cus_address1;?>">
				              <label for="address1">Address1</label>
				            </div>
							<div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="address2" class="form-control form-control-sm" name="address2" value="<?php echo $cus_address2;?>">
				              <label for="address2">Address2</label>
				            </div>
						</div>
						<div class="col-md-6">
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="city" class="form-control form-control-sm" name="city" value="<?php echo $cus_city;?>">
				              <label for="city">City</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="state" class="form-control form-control-sm" name="state" value="<?php echo $cus_state;?>">
				              <label for="state">State</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="zipcode" class="form-control form-control-sm" name="zipcode" value="<?php echo $cus_zipcode;?>">
				              <label for="zipcode">Zipcode</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
				              <input type="text" id="phone" class="form-control form-control-sm" name="phone" value="<?php echo $cus_phone;?>">
				              <label for="phone">Phone</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="country" class="form-control form-control-sm" name="country" value="India">
				              <label for="country">Country</label>
				            </div>
						</div>
						<div class="text-center mt-4">
			              	<button class="btn" type="submit" name="update" style="background: #607d8b">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['update'])){
		$ip = getIp();
		$customer_id = $cus_id;
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];

		$updateCus = "UPDATE customers SET fullname = '$fullname', email = '$email', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', zipcode = '$zipcode', phone = '$phone', country = '$country' WHERE id = '$customer_id'";
		$run_query = $db->query($updateCus);
		if($run_query){
			echo "<script>alert('Your account has been successfully updated')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>