<?php

	require_once '../core/init.php';
	if(!is_logged_in()){
		login_error_redirect();
	}
	include('includes/head.php');
?>

<!-- Orders to Fill -->

<?php 
	$txnQuery = "SELECT t.id, t.cart_id, t.firstname, t.productinfo, t.txn_date, t.total, c.items, c.paid, c.shipped FROM transactions t
	LEFT JOIN cart c ON t.cart_id = c.id
	WHERE c.paid = 1 AND c.shipped = 0
	ORDER BY t.txn_date";
	$txnResults = $db->query($txnQuery);
?>
<div class="container-fluid">
	<h3 class="text-center">Orders to Ship</h3>
	<table class="table table-condensed table-bordered table-striped">
		<thead>
			<th></th>
			<th>Name</th>
			<th>Description</th>
			<th>Total</th>
			<th>Date</th>
		</thead>
		<tbody>
			<?php while($order = mysqli_fetch_assoc($txnResults)): ?>
				<tr>
					<td><a href="orders.php?txn_id=<?=$order['id'];?>" class="btn btn-xs btn-info">Details</a></td>
					<td><?=$order['firstname'];?></td>
					<td><?=$order['productinfo'];?></td>
					<td><?=money($order['total']);?></td>
					<td><?=date($order['txn_date']);?></td>
				</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>

<?php
	include 'includes/footer.php';
?>