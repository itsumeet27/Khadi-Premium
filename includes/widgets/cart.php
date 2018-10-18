<h3 class="text-center">Shopping Cart</h3>
<div>
	<?php if(empty($cart_id)): ?>
		<h5 class="text-center">Your shopping cart is empty!</h5>
	<?php else :
		$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
		$results = mysqli_fetch_assoc($cartQ);
		$items = json_decode($results['items'],true);
		$i=1;
		$sub_total = 0;
	?>
	<table class="table table-responsive" id="cart_widget">
		<tbody>
			<?php foreach($items as $item): 
				$productQ = $db->query("SELECT * FROM products WHERE id = '{$item['id']}'");
				$product = mysqli_fetch_assoc($productQ);
			?>
				<tr>
					<td><?=$item['quantity'];?></td>
					<td><?=substr($product['title'],0,15);?></td>
					<td><?=money($item['quantity'] * $product['price']);?></td>
				</tr>
			<?php endforeach;?>
		</tbody>		
	</table>	
	<a href="cart.php" class="btn btn-xs btn-primary pull-left">View Cart</a>&nbsp;
	<a href="checkout.php" class="btn btn-xs btn-success pull-right">Checkout Now</a>
	<div class="clearfix"></div>
	<?php endif; ?>
</div>