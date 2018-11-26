<?php
	require_once '../core/init.php';
	include 'includes/head.php';

	//Complete Order
	if(isset($_GET['complete']) && $_GET['complete'] == 1){
		$txn_id = sanitize((int)$_GET['txn_id']);
		$db->query("UPDATE orders SET shipped = 1 WHERE id = '{$txn_id}'");
		echo "<script>alert('The order has been shipped!')</script>";
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
	<div id="about" class="view" style="height: 50%;background: url('../img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="">
              <!-- Heading -->
              <a href=""><h1 class="white-text h1-responsive">Orders</h1></a>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid">

	<h2 class="text-center px-2 py-2">Items Ordered</h2>
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
					<?=$txn['fullname'];?><br>
					<?=$txn['address1'];?><br>
					<?=$txn['address2'];?><br>
					<?=$txn['city'].', '.$txn['zipcode'];?><br>
					<?=$txn['country'];?>
				</address>
			</div>
		</div>
		<div class="pull-right">
			<a href="index.php" class="btn white-text" style="background-color: #1c2a48;border-radius: 10em;">Cancel</a>
			<a href="orders.php?complete=1&txn_id=<?=$txn_id;?>" class="btn white-text" style="background-color: #1c2a48;border-radius: 10em;">Complete Order</a>
		</div>
	</div>
</div>

<?php include 'includes/footer.php';?>