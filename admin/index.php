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
<?php 
	$invoiceQuery = "SELECT t.id, t.cart_id, t.firstname, t.email, t.phone, t.address1, t.address2, t.city, t.zipcode, t.productinfo, t.txn_date, t.total, c.items, c.paid FROM transactions t LEFT JOIN cart c ON t.cart_id = c.id WHERE c.paid = 1 ORDER BY t.txn_date";
	$invoiceResults = $db->query($invoiceQuery);
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h3 class="text-center">Orders to Ship</h3>
				<table class="table table-condensed table-bordered table-responsive table-striped">
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
				<div class="row">
					<!-- Sales by month -->
					<?php
						$thisYear = date("Y");
						$lastYear = $thisYear-1;
						$thisYearQ = $db->query("SELECT total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$thisYear}'");
						$lastYearQ = $db->query("SELECT total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$lastYear}'");
						$current = array();
						$last = array();
						$currentTotal = 0;
						$lastTotal = 0;
						while ($x = mysqli_fetch_assoc($thisYearQ)) {
							$month = date("m", strtotime($x['txn_date']));
							if(!array_key_exists($month, $current)){
								$current[(int)$month] = $x['total'];
							}
							else{
								$current[(int)$month] += $x['total'];
							}
							$currentTotal += $x['total'];
						}
						while ($y = mysqli_fetch_assoc($lastYearQ)) {
							$month = date("m", strtotime($y['txn_date']));
							if(!array_key_exists($month, $last)){
								$last[(int)$month] = $y['total'];
							}
							else{
								$last[(int)$month] += $y['total'];
							}
							$lastTotal += $y['total'];
						}
					?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h3 class="text-center">Sales by Month</h3>
				<table class="table table-condensed table-striped table-responsive table-bordered">
					<thead>
						<th></th>
						<th><?=$lastYear;?></th>
						<th><?=$thisYear;?></th>
					</thead>
					<tbody>
						<?php for($i=1;$i<=12;$i++): 
							$dt = DateTime::createFromFormat('!m',$i);
						?>
							<tr<?=(date("m") == $i)?' class="info"':'';?>>
								<td><?=$dt->format("F");?></td>
								<td><?=(array_key_exists($i, $last))?money($last[$i]):money(0);?></td>
								<td><?=(array_key_exists($i, $current))?money($current[$i]):money(0);?></td>
							</tr>
						<?php endfor; ?>
						<tr>
							<td>Total</td>
							<td><?=money($lastTotal);?></td>
							<td><?=money($currentTotal);?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Invoice</h3>
				<table class="table table-condensed table-bordered table-responsive table-striped">
					<thead>
						<th></th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th colspan="2">Address</th>
						<th>City</th>
						<th>Zipcode</th>
						<th>Product Details</th>
						<th>Total</th>
						<th>Date</th>
					</thead>
					<tbody>
						<?php while($invoice = mysqli_fetch_assoc($invoiceResults)): ?>
							<tr>
								<td><a href="invoice.php?txn_id=<?=$invoice['id'];?>" class="btn btn-xs btn-info">Details</a></td>
								<td><?=$invoice['firstname'];?></td>
								<td><?=$invoice['email'];?></td>
								<td><?=$invoice['phone'];?></td>
								<td><?=$invoice['address1'];?></td>
								<td><?=$invoice['address2'];?></td>								
								<td><?=$invoice['city'];?></td>
								<td><?=$invoice['zipcode'];?></td>
								<td><?=$invoice['productinfo'];?></td>
								<td><?=money($invoice['total']);?></td>
								<td><?=date($invoice['txn_date']);?></td>
							</tr>
						<?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
	include 'includes/footer.php';
?>