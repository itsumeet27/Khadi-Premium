<?php

	require_once 'core/init.php';
	include 'includes/header.php';

	if($cart_id != ''){
		$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
		$result = mysqli_fetch_assoc($cartQ);
		$items = json_decode($result['items'],true);
		$i = 1;
		$sub_total = 0;
		$item_count = 0;
	}
?>
<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<h2 class="text-center">My Shopping Cart</h2><hr>
			<?php if($cart_id == ''): ?>
				<div class="bg-danger">
					<p class="text-center text-danger">
						Your shopping cart is empty!
					</p>
				</div>
			<?php else: ?>
				<table class="table table-striped table-responsive">
					<thead>
						<th>#</th>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
						<?php
							foreach($items as $item){
								$product_id = $item['id'];
								$productQ = $db->query("SELECT * FROM products WHERE id = '{$product_id}'");
								$product = mysqli_fetch_assoc($productQ);								
							?>

							<tr>
								<td><?=$i;?></td>
								<td><?=$product['title']; ?></td>
								<td><?=money($product['price']);?></td>
								<td>
									<button class="btn btn-xs btn-default" onclick="update_cart('removeone','<?=$product['id'];?>');">-</button>
									<?=$item['quantity'];?>
									<?php if($item['quantity'] < 10): ?>
										<button class="btn btn-xs btn-default" onclick="update_cart('addone','<?=$product['id'];?>');">+</button>
									<?php else: ?>
										<span class="text-danger">Max</span>
									<?php endif; ?>
								</td>
								<td><?=money($item['quantity'] * $product['price']);?></td>
							</tr>

						<?php 
								$i++;
								$item_count += $item['quantity'];
								$sub_total += ($product['price'] * $item['quantity']);
							} 
							/*$tax = TAXRATE * $sub_total;
							$tax = number_format($tax,2);*/
							$grand_total = $sub_total;
						?>
					</tbody>
				</table>
				<table class="table table-striped table-responsive">
					<legend>Totals</legend>
					<thead class="totals-table-header">
						<th>Total Items</th>
						<!--<th>Sub Total</th>
						<th>Tax</th>-->
						<th>Grand Total</th>
					</thead>
					<tbody>
						<tr>
							<td><?=$item_count;?></td>
							<!--<td><?=money($sub_total);?></td>
							<td><?=money($tax);?></td>-->
							<td class="bg-success"><?=money($grand_total);?></td>
						</tr>
					</tbody>
				</table>

				<!-- Checkout Modal -->
				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#checkoutModal"><span class="glyphicon glyphicon-shopping-cart"> </span>
				  Checkout Now
				</button>

				<!-- Modal -->
				<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel">
				  	<div class="modal-dialog modal-lg" role="document">
				    	<div class="modal-content">
					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        	<h4 class="modal-title text-center" id="checkoutModalLabel">Shipping Address</h4>
					      	</div>
					      	<div class="modal-body">
					        	<div class="row container-fluid">
					        		<form action="thankYou.php" method="post" id="payment-form" name="payuform">
					        			<input type="hidden" name="key"value="UFu3ed" />
										<input type="hidden" name="hash_string" value="" />
										<input type="hidden" name="hash" />
										<input type="hidden" name="txnid"/>
					        			<span class="bg-danger text-danger" id="payment-errors"></span>
						        		<div class="" id="step1" style="display: block;">       			
					        				<table class="table table-responsive">		        					
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="first_name">First Name</label></td>
							        					<td><input type="text" name="first_name" id="first_name" class="form_control" /></td>
							        				</div>							        				
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="last_name">Last Name</label></td>
							        					<td><input type="text" name="last_name" id="last_name" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="email">Email</label></td>
							        					<td><input type="email" name="email" id="email" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="address">House No./Block No.</label></td>
							        					<td><input type="text" name="address1" id="address" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="adress2">Street Name</label></td>
							        					<td><input type="text" name="address2" id="street_name" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="city">City</label></td>
							        					<td><input type="text" name="city" id="city" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="state">State</label></td>
							        					<td><input type="text" name="state" id="state" class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="zip">Zip Code</label></td>
							        					<td><input type="text" name="zip" id="zip" max=6 min=6 class="form_control" /></td>
							        				</div>
					        					</tr>
					        					<tr>
					        						<div class="form-group">
							        					<td><label for="country">Country</label></td>
							        					<td><input type="text" name="country" id="country" class="form_control" /></td>
							        				</div>
					        					</tr>
					        				</table>	
					        			</div>		
					        			<div class="" id="step2" style="display: none;">
					        				<h3 class="text-center">Keep shopping with us!</h3>
					        				<img src="images/ban3.jpg" class="img-responsive">
					        			</div>			        			
					        	</div>
					      	</div>
					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        	<button type="button" class="btn btn-primary" onclick="check_address();" id="next_button">Next</button>
					        	<button type="button" class="btn btn-info" onclick="back_address();" id="back_button" style="display: none;">Back</button>
					        	<button type="submit" class="btn btn-success" id="checkout_button" style="display: none;">Checkout</button>
					        	</form>
					      	</div>
				    	</div>
				  	</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script type="text/javascript">

	function back_address(){
		jQuery('#payment-errors').html("");
		jQuery('#step1').css("display","block");
		jQuery('#step2').css("display","none");
		jQuery('#next_button').css("display","inline-block");
		jQuery('#back_button').css("display","none");
		jQuery('#checkout_button').css("display","none");
		jQuery('#checkoutModalLabel').html("<h4 class='modal-title text-center'>Shipping Address</h4>");
	}

	function check_address(){
		var data = {
			'first_name' : jQuery('#first_name').val(),
			'last_name' : jQuery('#last_name').val(),
			'email' : jQuery('#email').val(),
			'address1' : jQuery('#address').val(),
			'address2' : jQuery('#street_name').val(),
			'city' : jQuery('#city').val(),
			'state' : jQuery('#state').val(),
			'zip' : jQuery('#zip').val(),
			'country' : jQuery('#country').val(),
		};
		jQuery.ajax({
			url : '/khadi/admin/parsers/check_address.php',
			method : 'POST',
			data : data,
			success : function(data){
				if(data != 'passed'){
					jQuery('#payment-errors').html(data);					
				}
				if(data == 'passed'){
					jQuery('#payment-errors').html("");
					jQuery('#step1').css("display","none");
					jQuery('#step2').css("display","block");
					jQuery('#next_button').css("display","none");
					jQuery('#back_button').css("display","inline-block");
					jQuery('#checkout_button').css("display","inline-block");
					jQuery('#checkoutModalLabel').html("<h4 class='modal-title text-center'>Proceed to the payment gateway</h4>");
				}
			},
			error : function(){
				alert('Something went wrong');
			},
		});
	}
</script>

<?php include 'includes/footer.php'; ?>