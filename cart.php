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
<div class="container-fluid">
	<h2 class="text-center h2-responsive px-3 py-3">My Shopping Cart</h2>
		<?php if($cart_id == ''): ?>
			<div class="">
				<p class="text-center text-danger">
					Your shopping cart is empty! Browse products <a href="products.php">here</a>
				</p>
			</div>
		<?php else: ?>
		<div class="table-responsive">
			<table class="table table-condensed" style="display: table;">
				<thead style="background: #54899095;color: #fff">
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
							<th><?=$i;?></th>
							<th><?=$product['title']; ?></th>
							<th><?=money($product['price']);?></th>
							<th>
								<button class="btn-xs" onclick="update_cart('removeone','<?=$product['id'];?>');" style="border: none;border-radius: 5px;cursor: pointer;background-color: #1c2a48;color: #fff">-</button>
								<?=$item['quantity'];?>
								<?php if($item['quantity'] < 10): ?>
									<button class="btn-xs" onclick="update_cart('addone','<?=$product['id'];?>');" style="border: none;border-radius: 5px;cursor: pointer;background-color: #1c2a48;color: #fff">+</button>
								<?php else: ?>
									<span class="text-danger">Max</span>
								<?php endif; ?>
							</th>
							<th><?=money($item['quantity'] * $product['price']);?></th>
						</tr>
						

					<?php 
							$i++;
							$item_count += $item['quantity'];
							$sub_total += ($product['price'] * $item['quantity']);
						}
						$grand_total = $sub_total;
					?>						
				</tbody>
				<tfoot>
					<tr class="blue-grey" style="color: #fff">
						<th colspan="3">Total</th>
						<th>No. of items: <?=$item_count;?></th>
						<th><?=money($grand_total);?></th>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="text-right">
			<a href="checkout.php" class="btn" style="border-radius: 10em;background: #1c2a48"><i class="fa fa-shopping-cart">&nbsp;</i>Checkout</a>
		</div>
		<?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>