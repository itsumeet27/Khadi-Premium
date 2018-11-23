<?php
	session_start();
	require_once 'core/init.php';
	include 'includes/header.php';
?>
<div id="about" class="view" style="height: 50%;background: url('img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row d-flex justify-content-center text-center">
				<div class="">
				  <!-- Heading -->
				  <a href=""><h1 class="white-text h1-responsive">Shopping Cart</h1></a>
				  <a href="checkout.php" class="btn btn-outline-white">Checkout Now<i class="fa fa-shopping-cart ml-2"></i></a>
				</div>
			</div>
        </div>
    </div>
</div>
<div class="container-fluid" style="padding: 1em;">
	<h2 class="text-center h2-responsive px-3 py-3">My Shopping Cart</h2>
		<div class="table-responsive">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-condensed" style="display: table;">
					<thead style="background: #54899095;color: #fff">						
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
						<th>Remove</th>
					</thead>
					<tbody>
							<?php
								$total = 0;
								global $db;
								$ip = getIp();
								$sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
								$run_price = $db->query($sel_price);
								while ($p_price = mysqli_fetch_array($run_price)) {	
									$qty = $p_price['quantity'];	
									$pro_id = $p_price['pid'];
									$pro_price = "SELECT * FROM products WHERE id = '$pro_id'";
									$run_pro_price = $db->query($pro_price);
									while ($pp_price = mysqli_fetch_array($run_pro_price)) {			
										$product_price = array($pp_price['price']);
										$product_title = $pp_price['title'];
										$single_price = $pp_price['price'];
										$values = array_sum($product_price);
										$total += $values * $qty;

									// echo "&#8377; " . $total;
							?>
						<tr>
							<td><?php echo $product_title; ?></td>
							<td><?php echo "&#8377; " . $single_price; ?></td>
							<td>
								<input id="" type="number" name="quantity[<?php echo $pro_id; ?>]" value="<?php echo $qty; ?>" style="width:70px;text-align:center;border:none;border-bottom: 1px solid #54899095; background: none"/>
                                <input type="hidden" name="item_id[<?php echo $pro_id; ?>]" value="<?php echo $pro_id; ?>">
  							</td>
                                
                                <?php
	                                $ip = getIp();                
	                                if (isset($_POST['update_cart'])){	                                    
		                                foreach ($_POST['item_id'] as $key => $id) {		                                
		                                    $item_id = $id;
		                                    $quantity = $_POST['quantity'][$key];
		                                    $update_products = "UPDATE cart SET quantity = '$quantity' WHERE pid = '$item_id' AND ip_add = '$ip';";
		                                    $run_update = $db->query($update_products);
		                                    //$i++;
		                                }	                                
		                                if($update_products){	                            
		                                    echo "<script>window.open('cart.php','_self')</script>";
		                                }
	                                }                                                             
                                ?>
							<td><?php echo '&#8377; '. $single_price * $qty;  ?></td>
							<td>							
								<div class="custom-control custom-checkbox">								    			   
								    <button type="submit" class="btn-xs btn-default" name="remove_cart" style="border: none;border-radius: 10em;cursor: pointer"><i class="fa fa-minus-circle"></i></button>
								</div>
							</td>
							
						</tr>
					<?php } } ?>
						<tr style="background: #54856099;color: #fff">
							<th><b>Total</b></th>
							<td colspan="4"><?php echo "&#8377; " . $total; ?></td>
						</tr>
					</tbody>					
				</table>
				<div class="text-right">
					<button type="submit" name="update_cart" class="btn" style="border-radius: 10em;background: #1c2a48">Update Cart</button>
					<a href="product.php" class="btn white-text" style="border-radius: 10em;background: #1c2a48">Continue Shopping</a>
					<a href="checkout.php" class="btn white-text" style="border-radius: 10em;background: #1c2a48">Checkout <i class="fa fa-shopping-cart">&nbsp;</i></a>
				</div>
			</form>	
			<?php
				
				$ip = getIp();
				
					if(isset($_POST['remove_cart'])){
						$delete_product = "DELETE FROM cart WHERE pid = '$pro_id' AND ip_add = '$ip'";
						$run_del = $db->query($delete_product);
						if($run_del){
							echo "<script>window.open('cart.php', '_self')</script>";
						}
					}
				
			?>		
		</div>
</div>

<?php include 'includes/footer.php'; ?>