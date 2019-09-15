<?php 
	session_start();
	include 'includes/header.php';
?>

<?php 
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>
<div id="about" class="view" style="height: 50%;background: url('img/ban.JPG')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
  	<div class="mask rgba-black-strong">
	    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
	      <div class="row d-flex justify-content-center text-center">
	        <div class="">
		      	<?php 
				    if(isset($_SESSION['email'])){
				        echo "<div class='text-center white-text p-3'><h3 class='h3-responsive'>Welcome to your account</h3>" . $_SESSION['email'] . "</div>";
				    }
			  	?>
		    </div>
	      </div>
	    </div>
  	</div>
</div>
<!-- <div id="about" class="view" style="height: 50%;background: url('img/2054.jpg')no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;">
	<div class="mask rgba-black-strong">
	    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row d-flex justify-content-center text-center">
			    <div class="">
			      	<?php 
					    if(isset($_SESSION['email'])){
					        echo "<div class='text-center white-text p-3'><h3 class='h3-responsive'>Welcome to your account</h3>" . $_SESSION['email'] . "</div>";
					    }
				  	?>
			    </div>
	  		</div>
	    </div>
	</div>
</div> -->
	<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar z-depth-0" style="font-family: Roboto;font-weight: 400;background-color: #6b5523;">
      	<div class="container">
        <!-- Navbar brand -->
	        <a class="navbar-brand" href="myaccount.php">Dashboard</a>
	        <!-- Collapse button -->
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
	        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      	</button>
	      <!-- Collapsible content -->
	      	<div class="collapse navbar-collapse" id="basicExampleNav">
	        <!-- Links -->
		        <ul class="navbar-nav mr-auto smooth-scroll">
		        	<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?orders">Orders</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?edit_account">Edit Account</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?change_password">Change Password</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?delete_account">Delete Account</a>
          			</li>
		        </ul>
	    	</div>
		</div>
	</nav>
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
	<div class="container-fluid p-3">
		
	</div>
	<?php 
		if(!isset($_GET['orders'])){
			if (!isset($_GET['edit_account'])) {
				if(!isset($_GET['change_password'])){
					if(!isset($_GET['delete_account'])){
						echo 
						"
							<div class='card'>
								<div class='card-header'>
									<h3 class='h3-responsive p-2'>Hello $cus_name</h3>
								</div>
								<div class='card-body table-responsive'>
									<table class='table table-striped table-condensed' style='display: table'>
										
										<tr>
											<th><b>Name: </b></th>
											<td>$cus_name</td>
										</tr>
										<tr>
											<th><b>Phone: </b></th>
											<td>$cus_phone</td>
										</tr>
										<tr>
											<th><b>Email: </b></th>
											<td>$cus_email</td>
										</tr>
										<tr>
											<th><b>Address: </b></th>
											<td>$cus_address1,  $cus_address2</td>
										</tr>
										<tr>
											<th><b>City: </b></th>
											<td>$cus_city</td>
										</tr>
										<tr>
											<th><b>State: </b></th>
											<td>$cus_state</td>
										</tr>
										<tr>
											<th><b>Zipcode: </b></th>
											<td>$cus_zipcode</td>
										</tr>
									</table>
								</div>
							</div>
						";
					}
				}
			}
		}
	?>
	<?php
		if(isset($_GET['orders'])){
			include 'customer/orders.php';
		}
		if(isset($_GET['edit_account'])){
			include 'customer/edit_account.php';
		}
		if(isset($_GET['change_password'])){
			include 'customer/change_password.php';
		}
		if(isset($_GET['delete_account'])){
			include 'customer/delete_account.php';
		}
	?>
<?php include 'includes/footer.php';?>
