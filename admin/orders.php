<?php
	require_once '../core/init.php';
	include 'includes/head.php';

	//Complete Order
	if(isset($_GET['complete']) && $_GET['complete'] == 1){
		$cart_id = sanitize((int)$_GET['cart_id']);
		$db->query("UPDATE cart SET shipped = 1 WHERE id = '{$cart_id}'");
		header("Location: index.php");
	}

	$txn_id = sanitize((int)$_GET['txn_id']);
	$txnQuery = $db->query("SELECT * FROM transactions WHERE id = '{$txn_id}'");
	$txn = mysqli_fetch_assoc($txnQuery);
	$cart_id = $txn['cart_id'];
	$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
	$cart = mysqli_fetch_assoc($cartQ);

	$items = json_decode($cart['items'],true);
	$idArray = array();
	$products = array();

	foreach($items as $item){
		$idArray[] = $item['id'];
	}
	$ids = implode(',',$idArray);
	$productQ = $db->query("SELECT i.id as 'id', i.title as 'title', c.id = 'cid', c.category as 'child', p.category as 'parent' FROM products i LEFT JOIN categories c ON i.categories = c.id LEFT JOIN categories p ON c.parent = p.id WHERE i.id IN ({$ids})");

	while ($p = mysqli_fetch_assoc($productQ)) {
		foreach($items as $item){
			if($item['id'] == $p['id']){
				$x = $item;
				continue;
			}
		}

		$products[] = array_merge($x, $p);
	}
?>

	<h2 class="text-center">Items Ordered</h2>
	<div class="container-fluid table-responsive">
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<th>Title</th>
				<th>Quantity</th>
				<th>Category</th>
			</thead>
			<tbody>
				<?php foreach($products as $product):  ?>
					<tr>
						<td><?=$product['title'];?></td>
						<td><?=$product['quantity'];?></td>
						<td><?=$product['parent'].' - '.$product['child'];?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-md-6 table-responsive">
				<h3 class="text-center">Order Details</h3>
				<table class="table table-striped table-bordered table-condensed">
					<tbody>
						<tr>
							<td>Grand Total</td>
							<td><?=money($txn['total']);?></td>
						</tr>
						<tr>
							<td>Order Date</td>
							<td><?=date($txn['txn_date']);?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h3 class="text-center">Shipping Details</h3>
				<address>
					<?=$txn['firstname'];?><br>
					<?=$txn['address1'];?><br>
					<?=$txn['address2'];?><br>
					<?=$txn['city'].', '.$txn['zipcode'];?><br>
					<?=$txn['country'];?>
				</address>
			</div>
		</div>
		<div class="pull-right">
			<a href="index.php" class="btn btn-default btn-large">Cancel</a>
			<a href="orders.php?complete=1&cart_id=<?=$cart_id;?>" class="btn btn-primary btn-default btn-large">Complete Order</a>
		</div>
	</div>

<?php include 'includes/footer.php';?>